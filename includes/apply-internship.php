<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
    
    if(isset($_REQUEST['apply']))
    {
        $postNo = $_REQUEST['postNo'];
        $email = $_SESSION['email'];
        
        $query1 = "SELECT CVfile FROM user_cv WHERE Email='$email'";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_array($result1);
        
        $cvfile = $row1['CVfile'];
        
        $query2 = "INSERT INTO application (postNo, Email, CVfile) VALUES ('$postNo', '$email', '$cvfile')";
        mysqli_query($con, $query2);
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
                <title>InternHub | APPLY</title>
            </head>
            <body style="background-color:#f8f8f8;">
                <?php
                include("../includes/header-2.php");
                ?>
                <div class="container-fluid" style="margin-top:60px;">
                    <center>
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
                        <h3>Internship Application Successful!</h3>
                        <h4 style="color:black;"><a href="../student/browse.php">Click Here</a> to browse more Internships.</h4>
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
                    </center>
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
        header('location: ../student/browse.php');
    }
 ?>