<?php
    require("../includes/connect.php");
    include("../includes/google_signin.php");
    include("../includes/facebook_signin.php");
    include("../includes/fetch_css.php");
?>    
<html>
    <head>
        <title>InternHub | LOGIN</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="<?php echo $cssfilename; ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
    </head>
    <body>
        <?php
        include("../includes/header.php");
        ?>
        <div>
            <div id="banner-signup">
                <div class="container">
                    <div id="Signup">
                        <div class="row">
                            <?php
                            if(!isset($_SESSION['email']))
                            {
                            ?>
                            <div class="col-md offset-md-1">
                                <p class="create-acc" style="margin-bottom:20px;">LOGIN</p>
                                <form method="post" action="../includes/server.php">
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="email"  class="form-control" name="email" id="email" required>
                                    </div>
                                    <div class="form-group form-password">
                                        <label>PASSWORD</label>
                                        <input type="password"  class="form-control" name="password" id="password" required>
                                    </div>
                                    <div class="forgot-password">
                                        <a data-toggle="modal" data-target="#exampleModal">Forgot Password</a>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button1" style="vertical-align:middle" id="login_user" name="login_user"><span>SIGN IN </span></button>
                                    </div>
                                </form>
                                <div class="modal fade" style="margin-top:60px;" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header" style="border:0px;">
                                                <h6 class="modal-title" id="exampleModalLabel"><b>ENTER E-MAIL</b></h6>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form method="POST" action="../home/forgot_password.php">
                                                    <div class="form-group">
                                                        <input type="email"  class="form-control" name="forgot_email" id="forgot_email" required>
                                                    </div>
                                                    <div class="form-group">
                                                        <button type="submit" class="button1" style="vertical-align:middle" id="search_email" name="search_email"><span> SEND OTP </span></button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <br>
                                <p class="create-acc" style="margin-top:20px;margin-bottom:10px;">OR LOGIN WITH</p>
                                <div style="display:flex;justify-content:flex-start;">
                                    <span class="material-icons" style="margin-top:2px;font-size:20px;">error_outline</span>
                                    <p>&nbsp;For Students Only</p>
                                </div>
                                <div class="container or-login-with">
                                <?php
                                    echo '<i>'.$login_button.'</i>';
                                    if(isset($facebook_login_url))
                                    {
                                        echo '<i style="padding-top:5px;">'.$facebook_login_but.'</i>';
                                    }
                                ?>    
                                </div>
                                <br>
                            </div>
                            <div class="col-md offset-md-3">
                                <p class="create-acc" style="margin-bottom:15px;">CREATE AN ACCOUNT</p>
                                <div style="display:flex;justify-content:flex-start;">
                                    <span class="material-icons" style="margin-top:2px;font-size:20px;">error_outline</span>
                                    <p>&nbsp;For Students and Company</p>
                                </div>
                                <br>
                                <form method="post" action="../includes/server.php">
                                    <div class="form-group">
                                        <label>NAME</label>
                                        <input type="text"  class="form-control" id="name" name="name" required>
                                    </div>
                                    <div class="form-group">
                                        <label>EMAIL</label>
                                        <input type="email"  class="form-control" id="email" name="email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>PASSWORD</label>
                                        <input type="password"  minlength="6" maxlength="30" class="form-control" id="password_1" name="password_1" required>
                                    </div>
                                    <div class="form-group">
                                        <label>CONFIRM PASSWORD</label>
                                        <input type="password"  minlength="6" maxlength="30" class="form-control" id="password_2" name="password_2" required>
                                    </div>
                                    <div class="form-group">
                                        <label>TYPE</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="Student">Student</option>
                                            <option value="Company">Company</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="button1" style="vertical-align:middle" id="reg_user" name="reg_user"><span>REGISTER </span></button>
                                    </div>
                                </form>
                            </div>
                            <?php
                            }
                            else
                            {
                            ?>
                                <div class="offset-md-4 col-md-4 col-xs-12">
                                    <center>
                                        <h3 style="margin:200px 0px 200px 0px;">You are already signed in!</h3>
                                    </center>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                </div>  
            </div>
        </div> 
        <div id="footer">
        <?php
        include("../includes/footer.php");
        ?>
        </div>     
    </body>
</html>

