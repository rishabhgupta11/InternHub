<?php
require("../includes/connect.php");
require_once "../../vendor/autoload.php";
include("../includes/fetch_css.php");
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function add_account()
{
    $password = md5($password_1);
    $query = "INSERT INTO user (Name, Email, Password) VALUES('$name', '$email', '$password')";
    mysqli_query($con, $query);
    $_SESSION['email'] = $email;
    header('location: ../home/index.php');
}

if (isset($_REQUEST['reg_user'])) 
{
    $name = mysqli_real_escape_string($con, $_REQUEST['name']);
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password_1 = mysqli_real_escape_string($con, $_REQUEST['password_1']);
    $password_2 = mysqli_real_escape_string($con, $_REQUEST['password_2']);
    $type = mysqli_real_escape_string($con, $_REQUEST['type']);
    if($password_1 == $password_2)
    {
        $user_check_query = "SELECT * FROM user WHERE email='$email' LIMIT 1";
        $result = mysqli_query($con, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        if (!$user) 
        {
            $otp = rand(100000, 999999);
            $mail = new PHPMailer(true);

            $mail->SMTPDebug = 0;       
            $mail->isSMTP();                             
            $mail->Host = "smtp.hostinger.in";
            $mail->SMTPAuth = true;             
            $mail->Username = "noreply-internhub@ngenza.com";                 
            $mail->Password = "ASEProjectInternHub1";  
            $mail->Port = 587;  
            $mail->From = "noreply-internhub@ngenza.com";
            $mail->FromName = "InternHub";
            $mail->addAddress("$email", "$name");
            $mail->isHTML(true);
            $mail->Subject = "OTP For E-Mail Verification";
            $mail->Body = "<div style='background-color:#f5f5f5;'>"
                            . "<br>"
                            . "<center>"
                                . "<h1 style='letter-spacing:10px;color:black;'>".$otp."<h1>"
                                . "<h4 style='letter-spacing:2px;color:black;'>is the OTP for your e-mail verification.</h4>"
                                . "<br>"
                                . "<h4 style='letter-spacing:2px;color:black;'>DO NOT SHARE YOUR OTP WITH ANYONE ELSE</h4>"
                                . "<h4 style='letter-spacing:2px;color:black;'>If this isn't you, kindly ignore this e-mail.</h4>"
                            . "</center>"
                            . "<br>"
                        . "</div>";
            $mail->AltBody = $otp." is the OTP for your e-mail verification.";
            try 
            {
                $mail->send();
                $_SESSION['prov_email'] = $email;
                $_SESSION['prov_name'] = $name;
                $password = md5($password_1);
                $_SESSION['prov_password'] = $password;
                $_SESSION['prov_type'] = $type;
                $_SESSION['otp'] = $otp;
            ?>
                <script>
                    if(confirm("An OTP has been sent to your e-mail successfully!"))
                    {
                        location.href = "../home/verify-email.php";
                    }
                    else
                    {
                        location.href = "../home/verify-email.php";
                    }
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
                if(confirm("This E-mail Already Exists!\nTry Logging-in."))
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
    ?>
        <script>
            if(confirm("PASSWORDS DO NOT MATCH!"))
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
?>
        
        
<?php
if (isset($_REQUEST['login_user'])) 
{
    $email = mysqli_real_escape_string($con, $_REQUEST['email']);
    $password1 = mysqli_real_escape_string($con, $_REQUEST['password']);

    
    $password = md5($password1);
    $query = "SELECT * FROM user WHERE Email='$email' AND Password='$password'";
    $results = mysqli_query($con, $query);
    if(mysqli_num_rows($results) == 1) 
    {
        $_SESSION['email'] = $email;
        header('location: ../home/index.php');
    }
    else
    {
    ?>
        <script>
            if(confirm("Incorrect Email or Password!"))
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
?>