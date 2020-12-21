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
    $type = "";
    if(isset($_REQUEST['confirmOTP'])) 
    {
        $name = $_SESSION['prov_name'];
        $email = $_SESSION['prov_email'];
        $password = $_SESSION['prov_password'];
        $type = $_SESSION['prov_type'];
        $otp = $_SESSION['otp'];
        if($otp == $_POST['OTP'])
        {
            $query = "INSERT INTO user (Name, Email, Password, Type) VALUES('$name', '$email', '$password', '$type')";
            mysqli_query($con, $query);
            $_SESSION['email'] = $email;
            $confirm = "OTP Matched!";
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
            $mail->Subject = "Welcome to InternHub";
            $mail->Body = "<body style='background-color:#f5f5f5;'>"
                            . "<br>"
                            . "<center>"
                                . "<h2 style='letter-spacing:3px;color:#212a2f;'>Hey, ".$name."!<h2>"
                                . "<h1 style='letter-spacing:3px;color:#212a2f;'>WELCOME TO INTERNHUB<h1>"
                                . "<br>"
                            . "</center>"
                            . "<br>"
                        . "</body>";
            $mail->AltBody = "WELCOME TO InternHub";
            $mail->send();
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
            else
            {
                if($confirm == "OTP Matched!")
                {
                    if($type == 'Student')
                    {
                    ?>
                        <script>
                            location.href = "../student/browse.php";
                        </script>
                    <?php
                    }
                    else
                    {
                        if($type == 'Company')
                        {
                        ?>
                            <script>
                                location.href = "../company/applications.php";
                            </script>
                        <?php
                        }
                    }
                }
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