<?php require 'header.php'; ?>
        <!-- ======================================================================
                                        START CONTENT
        ======================================================================= -->
        <div class="content">
            <div class="container">
                <div class="site-title"><div class="site-inside"><span>Login / Register</span></div></div>         
                <div class="row">
                    <div class="col-md-6">
                        <div class="forms-separation">
                            <div class="login-form-box">
                                <form class="login-form" method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('loginuser'); ?>">
                                    <h3>login now</h3>
                                    <p>Username or e-mail</p>
                                    <input type="text" name="usernameemail" class="login-line" autocomplete="off">
                                    <p>Password</p>
                                    <input type="password" name="password" class="login-line" autocomplete="off">
                                    <input type="submit" value="Login" class="button-6">
                                    <a href="#" class="lost-password">Lost password</a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <form class="register-form" method="post" action="prosesuser/hanuser?thisposition=<?php echo base64_encode('registeruser'); ?>">
                            <h3>Register</h3>
<?php $idu=substr(md5(rand()), 0,9);?>
                            <input type="hidden" name="id_user" class="input-line" value="<?php echo $idu; ?>" readonly autocomplete="off">
                            <p>Username</p>
                            <input type="text" name="username" class="input-line" required autocomplete="off">
                            <p>E-mail</p>
                            <input type="email" name="email" class="input-line" required autocomplete="off">
                            <p>Password</p>
                            <input type="password" name="password" class="input-line" required autocomplete="off">
                            <input type="submit" value="Register" class="button-6">
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ======================================================================
                                        END CONTENT
        ======================================================================= -->

        <!-- ======================================================================
                                        START FOOTER
        ======================================================================= -->
<?php require 'footer.php'; ?>