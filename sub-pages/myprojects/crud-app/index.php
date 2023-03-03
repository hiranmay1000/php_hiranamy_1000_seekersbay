<!---------------------------------PHP_SECTION--------------------------------->
<?php

$isInserted = false; // for validating insertion of data in form 
$isEdited = false; // for validating updatation of form 
$isDeleted = false; // for validating deletion of data 
$isDelAll = false; // for validating deletion of whole table 


require('_crud_db_server.php'); // Establish connection with crud_db database




if (isset($_POST['slnoEdit'])) { // to edit perticualt data
    // Get the form data
    $databaseSno = $_POST['slnoEdit'];
    $modalTitle = $_POST['modalTitle'];
    $modalTextInfo = $_POST['modalTextInfo'];


    // Update the data in the database
    $sql = "UPDATE `crud_data` SET `title` = '$modalTitle', `desc_`='$modalTextInfo', `date` = current_timestamp() WHERE `slno` = $databaseSno";
    $result = $connection->query($sql);

    // Check if the update was successful
    if ($result) {
        $isEdited = true;
    } else {
        echo "<p style='color:lightred'>Conncection error</p>";
        echo "Error updating data: " . mysqli_error($connection);
    }

    if (!$result) {
        die("Error updating data: " . mysqli_error($connection));
    }





} else if (isset($_POST['insert_crud_data'])) { // to insert new data
    $title = $_POST['noteTitle'];
    $desc = $_POST['descTextArea'];


    $sql = "INSERT INTO `crud_data` (`title`, `desc_`, `date`) VALUES ('$title', '$desc', current_timestamp()) ";
    $insertedNewData = $connection->query($sql);


    if ($insertedNewData) {
        $isInserted = true;
    } else {
        echo "<p style='color:lightred'>Conncection error</p>";
    }




} else if (isset($_GET['delete'])) { // to delete perticular data
    $dbSnoDel = $_GET['delete'];
    $sql = "DELETE FROM `crud_data` WHERE `slno` = $dbSnoDel";
    $res = $connection->query($sql);

    if ($res) {
        $isDeleted = true;
    } else {
        die("Unable to delete due to " . mysqli_error($connection));
    }




} else if (isset($_GET['delete_all']) && $_GET['delete_all'] == "true") { // to delete/truncate whole datatable
    // SQL query to delete all data from the table
    $sql = "TRUNCATE TABLE crud_data";

    if ($connection->query($sql) === false) {
        echo "Error deleting data: " . $connection->error();
    } else {
        $isDelAll = true;
    }
}




?>




<!---------------------------------HTML_SECTION--------------------------------->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <!-- For Data Table -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">

    <title>CRUD APP</title>
</head>

<body>




    <!-- Button trigger modal -->
    <!-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#confirmationModal">
  Launch static backdrop modal
</button> -->

    <!-- Modal -->
    <div class="modal fade" id="confirmationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="confirmationModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="confirmationModalLabel">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Whole data will be deleted and cannot be retrived back.<br>Are you sure!</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary btn-warning" id='modalWarnBtn'>Understood</button>
                </div>
            </div>
        </div>
    </div>








    <!-- Modal -->
    <div class="modal fade" id="editModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="editModalLabel">Edit information</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <input type="hidden" id="slnoEdit" name='slnoEdit'>
                        <div class="form-group">
                            <label for="modalTitle">Title</label>
                            <input type="text" class="form-control" id="modalTitle" name="modalTitle"
                                placeholder="Title">
                        </div>
                        <div class="form-group my-3">
                            <label for="modalTextInfo">Add note</label>
                            <textarea class="form-control" id="modalTextInfo" name="modalTextInfo" rows="3"
                                placeholder="Description" required></textarea>
                            <small id="client-disclaimer" class="form-text text-muted">We'll never share your
                                information with anyone else.</small>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <div class="content">
            <div class="input-area">
                <h1 class="main-heading">CRUD APPLICATION - (Create, Read, Update & Delete) </h3>
                <hr>
                <h2 class="mt-5" style="color:white;">Add Note</h2>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="noteTitle">Heading</label>
                        <input type="text" class="form-control" id="noteTitle" name="noteTitle" placeholder="Title">
                    </div>
                    <div class="form-group my-3">
                        <label for="descTextArea">Add note</label>
                        <textarea class="form-control" id="descTextArea" name="descTextArea" rows="3"
                            placeholder="Description" required></textarea>
                        <small id="client-disclaimer" class="form-text text-muted" style="color:grey !important;">We'll
                            never share your information with anyone else.</small>
                    </div>
                    <button type="submit" class="btn btn-primary" name="insert_crud_data">Create</button>
                </form>
            </div>
            <div class="show-area my-5">
                <?php
                if ($isInserted) {
                    echo "<p id='save_feedback' style=' color: lightgreen; font-size:15px; display:block; ' >Created successfully</p>";
                    echo "  <script>
                                function hideFeedbackModal(){
                                        document.getElementById('save_feedback').style.display = 'none';
                                        return;
                                    }setInterval('hideFeedbackModal()', 3000);
                                </script>";
                } else if ($isEdited) {
                    echo "<p id='save_feedback' style=' color: orange; font-size:15px; display:block; ' >Changed successfully</p>";
                    echo "  <script>
                                function hideFeedbackModal(){
                                        document.getElementById('save_feedback').style.display = 'none';
                                        return;
                                    }setInterval('hideFeedbackModal()', 3000);
                                </script>";
                } else if ($isDeleted) {
                    echo "<p id='save_feedback' style=' color: #ec5757; font-size:15px; display:block; ' >Record deleted</p>";
                    echo "  <script>
                                function hideFeedbackModal(){
                                        document.getElementById('save_feedback').style.display = 'none';
                                        return;
                                    }setInterval('hideFeedbackModal()', 3000);
                                </script>";
                } else if ($isDelAll) {
                    echo "<p id='save_feedback' style=' color: #ec5757; font-size:15px; display:block; ' >All records has been deleted</p>";
                    echo "  <script>
                                function hideFeedbackModal(){
                                        document.getElementById('save_feedback').style.display = 'none';
                                        return;
                                    }setInterval('hideFeedbackModal()', 3000);
                                </script>";
                }
                ?>

                <h4>All Records</h4>
                <hr>
                <table class="table" id="myTable" style="color:#fff">

                    <thead>
                        <tr>
                            <th scope="col">Sl no</th>
                            <th scope="col">Title</th>
                            <th scope="col">Info</th>
                            <th scope="col" class='dt-center'>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $sql = "SELECT * FROM `crud_data`";
                        $result = mysqli_query($connection, $sql);

                        $sno = 1;
                        while ($rowData = mysqli_fetch_assoc($result)) {
                            echo "
                            <tr style='border: 1px solid #3b3b3b'>
                            <th scope='row'>$sno.</th>
                            <td>" . $rowData['title'] . "</td>
                            <td>" . $rowData['desc_'] . "</td>
                            <td class='dt-center'> 
                                <button class='btn-group mr-2 edit btn btn-sm btn-primary ' id=" . $rowData['slno'] . "  data-bs-toggle='modal' data-bs-target='#editModal' >Edit</button>
                                <button class=' del btn btn-sm btn-secondary' id=" . $rowData['slno'] . " >Delete</button>
                            </td>
                            ";
                            $sno++;
                        }
                        ?>
                    </tbody>
                </table>
                <hr>
                <!-- <button type="submit" name="delete_all" class=" btn btn-danger" id="myButton" data-bs-target='#confirmationModal'>Delete All</button> -->
                <button type="submitt" name="delete_all" class="btn btn-danger" id="myButton" data-bs-toggle="modal"
                    data-bs-target="#confirmationModal">DELETE ALL</button>
            </div>
        </div>
    </div>




    <!---------------------------------JAVASCRIPT_SECTION--------------------------------->
    <!------- CDN For table ------->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN"
        crossorigin="anonymous"></script>
    <script src="//cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>

    <!------- Main.js ------->
    <script src="main.js"></script>


    <!----------------------------->
</body>

</html>

<?php
$connection->close(); // Close the connection 
?>