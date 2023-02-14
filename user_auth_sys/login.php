

<div class="modal fade" id="signupModal" aria-hidden="true" aria-labelledby="signupModalLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background: #cacaca">
            <div class="modal-header">
                <h1 class="modal-title fs-4" id="signupModalLabel">Register yourself</h1>
                <button type="button" class="btn btn-secondary btn-close" data-bs-dismiss="modal" aria-label="Close"
                    style="margin:0"></button>
            </div>
            <div class="modal-body">

                <form action="" method="post">
                    <div class="mb-3">
                        <label for="cust_uname" class="form-label">Username</label>
                        <input type="username" class="form-control" id="cust_uname" name="cust_uname"
                            aria-describedby="emailHelp" placeholder="Email / username" required>
                        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                    </div>
                    <div class="mb-3">
                        <label for="cust_pass" class="form-label">Password</label>
                        <input type="password" class="form-control" id="cust_pass" name="cust_pass" required>
                        <label for="cust_cpass" class="form-label">Confirm password</label>
                        <input type="password" class="form-control" id="cust_cpass" name="cust_cpass">
                    </div>
                    <p id="" class="form-text">Already have an account? <a data-bs-toggle="modal"
                            href="#loginModal" role="button">Login</a>.</p>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="user_signup">Signup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>