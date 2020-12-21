<?php
    require("../includes/connect.php");
    include("../includes/fetch_css.php");
    require_once "../../vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
?>    
<?php
    $confirm = "";
    $otp = rand(100000, 999999);
    if(isset($_POST['search_email'])) 
    {
        if(isset($_POST['forgot_email']))
        {
            $query = "SELECT * FROM user WHERE Email='".$_POST['forgot_email']."'";
            $result = mysqli_query($con, $query);
            if(mysqli_num_rows($result) > 0)
            {
                $row = mysqli_fetch_array($result);
                $email = $row['Email'];
                $name = $row['Name'];
                $_SESSION['forgot_email'] = $row['Email'];
                $_SESSION['forgot_name'] = $row['Name'];
                $_SESSION['otp2'] = $otp;
                $mail = new PHPMailer(true);
                $mail->SMTPDebug = 0;       
                $mail->isSMTP();                             
                $mail->Host = "smtp.hostinger.in";
                $mail->SMTPAuth = true;             
                $mail->Username = "no-reply@internhub.ngenza.com";                 
                $mail->Password = "ASEProjectInternHub1";  
                $mail->Port = 587;  
                $mail->From = "no-reply@internhub.ngenza.com";
                $mail->FromName = "InternHub";
                $mail->addAddress("$email", "$name");
                $mail->isHTML(true);
                $mail->Subject = "OTP For Password Reset";
                $mail->Body = "<div style='background-color:#f5f5f5;'>"
                                . "<br>"
                                . "<center>"
                                    . "<h1 style='letter-spacing:10px;color:#212a2f;'>".$otp."<h1>"
                                    . "<h4 style='letter-spacing:2px;color:#212a2f;'>is the OTP for your password reset request.</h4>"
                                    . "<br>"
                                    . "<h4 style='letter-spacing:2px;color:#212a2f;'>DO NOT SHARE YOUR OTP WITH ANYONE ELSE</h4>"
                                    . "<h4 style='letter-spacing:2px;color:#212a2f;'>If this isn't you, kindly ignore this e-mail.</h4>"
                                . "</center>"
                                . "<br>"
                            . "</div>";
                $mail->AltBody = $otp." is the OTP for your password reset.";
                try 
                {
                    $mail->send();
                    echo "<script>confirm('An OTP has been sent to your e-mail successfully!');</script>";
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
                    if(confirm("This E-mail Doesn't Exist!\nTry Signing-in."))
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
    }
    
    if(isset($_POST['confirmOTP']))
    {
        if($_SESSION['otp2'] == $_POST['OTP'])
        {
            $_SESSION['reset_password'] = $_POST['OTP'];
            header('location: ../home/reset_password.php');
        }
        else
        {
            $confirm = "Incorrect OTP!";
        }
    }
?>
<html>
    <head>
        <title>InternHub | VERIFY</title>
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
            <h2 style="margin-top:50px;text-decoration:underline;margin-bottom:75px;color:black;">Enter OTP</h2>
            <form method="POST" action="">
                <div class="form-group" style="display:flex; justify-content:center;">
                    <input class="stayintouch" style="font-weight:700;letter-spacing:20px;width:185px;" type="tel" minlength="6" maxlength="6" name="OTP" id="OTP" required>
                </div>
                <div class="form-group">    
                    <button type="submit" class="button10 button105" style="vertical-align:middle" id="confirmOTP" name="confirmOTP"><span>CONFIRM</span></button>
                </div>
            </form>
            <?php
            if($confirm == "Incorrect OTP!")
            {
                echo "<p style='font-size:14px;color:red;'><b>$confirm</b></p>"; 
            }
            ?>
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