$(document).ready(function () {
    $('#myTable').DataTable({
        lengthMenu: [
            [10, 25, 50, 100, -1],
            [10, 25, 50, 100, 'All'],
        ],
        columns: [
            { width: "7%" },
            { width: "25%" },
            { width: "53%" },
            { width: "15%" }
        ],
        scroll: true,
        scrollY: 500,
        columnDefs: [
            {
                targets: 0,
                className: "text-color-grey",
                orderable: true
            }
        ],
        rowCallback: function (row, data) {
            if (data[0] % 2 != 0) {
                $(row).css("background-color", "#191919");
            } else {
                $(row).css("background-color", "#212121");
            }
        }
    });
});


edits = document.getElementsByClassName('edit');

Array.from(edits).forEach(element => {
    element.addEventListener('click', (e) => {
        tr = e.target.parentNode.parentNode;
        title = tr.getElementsByTagName('td')[0].innerText;
        information = tr.getElementsByTagName('td')[1].innerText;
        console.log(title, information);
        modalTitle.value = title;
        modalTextInfo.value = information;
        slnoEdit.value = e.target.id;
        console.log(e.target.id);
    })
})



deletes = document.getElementsByClassName('del');

Array.from(deletes).forEach(element => {
    element.addEventListener('click', e => {
        snoDel = e.target.id;
        console.log(snoDel);

        window.location = "sub-pages/myprojects/crud-app/index.php?delete=" + snoDel;
    })
})




var mainDelBtn = document.getElementById("myButton");
mainDelBtn.addEventListener("click", function () { });

var deleteAllBtn = document.getElementById('modalWarnBtn');
deleteAllBtn.addEventListener('click', function () {
    window.location = "sub-pages/myprojects/crud-app/index.php?delete_all=" + true;
})