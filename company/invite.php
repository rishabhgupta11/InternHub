<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
    
    require_once "../../vendor/autoload.php";
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    $email = $_SESSION['email'];
    
    if(isset($_REQUEST['invite'])) 
    {
        $postNo = $_POST['postNo'];
        $studentEmail = $_POST['studentEmail'];
        $query3 = "INSERT INTO invite (companyEmail, studentEmail) VALUES ('$email', '$studentEmail')";
        mysqli_query($con, $query3);
        $query4 = "SELECT * FROM post WHERE postNo='$postNo'";
        $result4 = mysqli_query($con, $query4);
        $row4 = mysqli_fetch_array($result4);
        $title = $row4['Title'];
        $companyName = $row4['companyName'];
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
        $mail->addAddress("$studentEmail");
        $mail->isHTML(true);
        $mail->Subject = "Invitation to Apply on InternHub";
        $mail->Body = "<body style='background-color:#f5f5f5;'>"
                        . "<br>"
                        . "<center>"
                            . "<h2 style='letter-spacing:3px;color:#212a2f;'>Congratulations!<h2>"
                            . "<h1 style='letter-spacing:3px;color:#212a2f;'>You have been invited by ".$companyName." for the internship as a ".$title.".<h1>"
                            . "<h2 style='letter-spacing:3px;color:#212a2f;'>Click <a href='http://localhost/ngenza/InternHub/student/apply.php?id=".$postNo."'>Here</a> to apply.<h2>"
                            . "<br>"
                        . "</center>"
                        . "<br>"
                    . "</body>";
        $mail->AltBody = "Congratulations! You have been invited for the internship.";
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
        <title>InternHub | INVITE</title>
    </head>
    <body style="background-color:#f8f8f8;">
        <?php
        include("../includes/header-3.php");
        ?>
        <div class="container-fluid" style="margin-top:60px;">
            <br>
            <br>
            <center>
                <h3><u>INVITE STUDENTS</u></h3>
                <br>
                <hr>
                <br>
            </center>
        </div>    
        <div class="container" style="padding-bottom:25px;">
            <div class="row text-center">
                <?php
                $email = $_SESSION['email'];
                $query = "SELECT * FROM user WHERE Type='Student'";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result))
                {
                    $studentEmail = $row['Email'];
                    $studentName = $row['Name'];
                ?>
                    <div class="col-12" style="padding:40px;">
                        <div class="container" style="border:2px solid black;padding:20px;text-align:left;">
                            <h4><?php echo $studentName; ?></h4>
                            <div style="display:flex;cursor:pointer;">
                                <a href="../student/download-cv.php?id=getStudentCV&email=<?php echo $studentEmail ;?>"><span style="font-size:21px;" class="material-icons">visibility</span></a>
                                &nbsp;
                                <a href="../student/download-cv.php?id=getStudentCV&email=<?php echo $studentEmail ;?>"><h6>View Resume</h6></a>
                            </div>
                            <br>
                            <form method="post" action="">
                                <div style="display:flex;justify-content:space-between">
                                    <?php
                                    $query1 = "SELECT * FROM post WHERE companyEmail='$email'";
                                    $result1 = mysqli_query($con, $query1);
                                    ?>
                                    <select class="form-control" name="postNo" id="postNo" style="width:30%;">
                                    <?php
                                    while($row1 = mysqli_fetch_array($result1))
                                    {
                                    ?>
                                        <option value="<?php echo $row1['postNo']; ?>"><?php echo $row1['Title'];?></option>
                                    <?php
                                    }
                                    ?>
                                    </select>
                                    <?php
                                    $query2 = "SELECT * FROM invite WHERE companyEmail='$email' AND studentEmail='$studentEmail'";
                                    $result2 = mysqli_query($con, $query2);
                                    if(mysqli_num_rows($result2) > 0)
                                    {
                                    ?>
                                        <button class="apply" disabled><b>INVITED</b></button>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <div style="display:flex;">
                                            <input type="hidden" name="studentEmail" id="studentEmail" value="<?php echo $studentEmail; ?>">
                                            <button type="submit" class="button1" style="vertical-align:middle" id="invite" name="invite"><span>INVITE </span></button>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </form>
                        </div>
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
