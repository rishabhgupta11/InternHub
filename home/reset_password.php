<?php
    require("../includes/connect.php");
    include("../includes/fetch_css.php");
    require_once "../../vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>    
<?php
if(isset($_SESSION['reset_password']))
{
?>
<?php
    $confirm = "";
    if(isset($_POST['new_pass']) && isset($_POST['confirm_new_pass']) && isset($_POST['resetPass'])) 
    {
        $passwordnew = $_POST['new_pass'];
        $confirmpasswordnew = $_POST['confirm_new_pass'];
        if($passwordnew == $confirmpasswordnew)
        {
            $password = md5($passwordnew);
            $query = "UPDATE user SET Password='$password' WHERE Email='".$_SESSION['forgot_email']."'";
            mysqli_query($con, $query);
            if(mysqli_affected_rows($con) > 0)
            {
                $email = $_SESSION['forgot_email'];
                $name = $_SESSION['forgot_name'];
                date_default_timezone_set("Asia/Kolkata");
                $date = date("Y/m/d");
                $time = date("h:i:sa");
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;       
                $mail->isSMTP();                             
                $mail->Host = "smtp.hostinger.in";
                $mail->SMTPAuth = true;             
                $mail->Username = "";                 
                $mail->Password = "";  
                $mail->Port = 587;  
                $mail->From = "";
                $mail->FromName = "InternHub";
                $mail->addAddress("$email", "$name");
                $mail->isHTML(true);
                $mail->Subject = "Password Reset Successful";
                $mail->Body = "<div style='background-color:#f5f5f5;'>"
                                . "<br>"
                                . "<center>"
                                    . "<h2 style='letter-spacing:3px;color:#212a2f;'>Password Reset Successful<h2>"
                                    . "<h4 style='letter-spacing:2px;color:#212a2f;'>The password for your account <br>".$email."<br> was changed on ".$date." at ".$time.".</h4>"
                                . "</center>"
                                . "<br>"
                            . "</div>";
                $mail->AltBody = "Password Reset Successful";
                try 
                {
                    $mail->send();
                ?>
                    <script>
                        location.href = "../home/login.php";
                    </script>
                <?php
                } 
                catch (Exception $e) 
                {
                    echo "Mailer Error: " . $mail->ErrorInfo;
                }
                
            }
            else
            {
            ?>
                <script>
                    if(confirm("New Password cannot be an Old Password. Please try again."))
                    {
                        location.href = "../home/login.php";
                    }
                    else
                    {
                        location.href = "../home/login.php";
                    }
                </script>
            <?php
            }
        }
        else
        {
            echo "<script>alert('Passwords do not match!');</script>";
        }
    }
?>
    <html>
        <head>
            <title>InternHub | RESET</title>
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

            <div class="container-fluid text-center" id="banner-signup" style="margin-top:60px;padding-top:60px;background-color:#f5f5f5;">
                <h2 style="margin-top:50px;text-decoration:underline;margin-bottom:75px;color:black;">Reset Password</h2>
                <form method="POST" action="">
                    <div class="form-group" style="display:flex; justify-content:center;">
                        <input class="stayintouch" style="font-weight:700;letter-spacing:3px;width:250px;" placeholder="Enter New Password" type="password" minlength="6" maxlength="30" name="new_pass" id="new_pass" required>
                    </div>
                    <div class="form-group" style="display:flex; justify-content:center;">
                        <input class="stayintouch" style="font-weight:700;letter-spacing:3px;width:250px;" placeholder="Confirm New Password" type="password" minlength="6" maxlength="30" name="confirm_new_pass" id="confirm_new_pass" required>
                    </div>
                    <div class="form-group">    
                        <button type="submit" class="button10 button105" style="vertical-align:middle" id="resetPass" name="resetPass"><span>CONFIRM</span></button>
                    </div>
                </form>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
            </div>  

            <div id="footer">
            <?php
            include("../includes/footer.php");
            ?>
            </div>     
        </body>
    </html>
<?php
}
else
{
    header('location: ../home/login.php');
}
?>
