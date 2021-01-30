<?php require APPROOT . '\views\includes\head.php'; ?>


<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="car card-body bg-light mt-5">
            <h2>Login</h2>
            <p>PLease fill in the form to register with us</p>
            <form action="" method="post">
                <div class="form-group">
                    <label for="email">Email: <sup>*</sup></label>
                    <input type="text" name="email" id="email"
                           class="<?php echo !empty($data['emailErr']) ? 'is-invalid' : ''; ?> form-control form-control-lg"
                           value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['emailErr']; ?></span>
                </div>

                <div class="form-group">
                    <label for="password">Password: <sup>*</sup></label>
                    <input type="password" name="password" id="password"
                           class="<?php echo !empty($data['passwordErr']) ? 'is-invalid' : ''; ?> form-control form-control-lg"
                           value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['passwordErr']; ?></span>
                </div>

                <div class="row mt-3">
                    <div class="col">
                        <input type="submit" class="btn btn-secondary w-100" value="login">
                    </div>
                    <div class="col">
                        <a href="<?php echo URLROOT ?>/users/register" class="btn btn-light w-100">No account?
                            Register</a>
                    </div>

                </div>
            </form>
        </div>
    </div>
</div>


<?php require APPROOT . '\views\includes\footer.php'; ?>
