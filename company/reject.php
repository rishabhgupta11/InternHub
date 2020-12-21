<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
    require_once "../../vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    if(isset($_REQUEST['email']) && isset($_REQUEST['id'])) 
    {
        $postNo = $_REQUEST['id'];
        $email = $_REQUEST['email'];
        $query = "UPDATE application SET Status='Rejected' WHERE Email='$email' AND postNo='$postNo'";
        mysqli_query($con, $query);
        $query2 = "SELECT * FROM post WHERE postNo='$postNo'";
        $result2 = mysqli_query($con, $query2);
        $row2 = mysqli_fetch_array($result2);
        $title = $row2['Title'];
        $companyName = $row2['companyName'];
        $companyEmail = $row2['companyEmail'];
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
        $mail->addAddress("$email");
        $mail->isHTML(true);
        $mail->Subject = "Internship Application Update";
        $mail->Body = "<body style='background-color:#f5f5f5;'>"
                        . "<br>"
                        . "<center>"
                            . "<h1 style='letter-spacing:3px;color:#212a2f;'>You have NOT been shortlisted by ".$companyName." for the internship as a ".$title.".<h1>"
                            . "<h2 style='letter-spacing:3px;color:#212a2f;'>Don't lose hope! Keep on applying for more internships.<h2>"
                            . "<br>"
                        . "</center>"
                        . "<br>"
                    . "</body>";
        $mail->AltBody = "You have NOT been shortlisted for the internship.";
        $mail->send();
    }
?>    
<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link href="<?php echo $cssfilename; ?>" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Tinos:ital@1&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>InternHub | APPLICATIONS</title>
    </head>
    <body style="background-color:#f8f8f8;">
        <?php
        include("../includes/header-3.php");
        ?>
        <div class="container-fluid" style="margin-top:60px;">
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <center><h2>Candidate has been rejected and a confirmation email has been sent. Go back to review other applications.</h2></center>
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

