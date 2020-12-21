<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
    
    if(isset($_REQUEST['id']))
    {
        $postNo = $_REQUEST['id'];
        $email = $_SESSION['email'];
        
        $query1 = "SELECT * FROM post WHERE postNo='$postNo'";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_array($result1);
        
        $Title = $row1['Title'];
        $companyName = $row1['companyName'];
        $companyEmail = $row1['companyEmail'];
        $Domain = $row1['Domain'];
        $Duration = $row1['Duration'];
        $City = $row1['City'];
        $Stipend = $row1['Stipend'];
        $Description = $row1['Description'];
        $Requirements = $row1['Requirements'];
        $Status = $row1['Status'];
    
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
                        <h3><u>APPLY FOR INTERNSHIP</u></h3>
                        <br>
                        <hr>
                        <br>
                    </center>
                </div>
                <div class="container">
                    <br>
                    <h2 style="color:black;"><u><?php echo $companyName; ?></u> <span style="font-size:15px;color:#1c74bc;">(<?php echo $companyEmail; ?>)</span></h2>
                    <br>
                    <h5><b>Domain</b></h5>
                    <h6 style="color:black;"> <?php echo $Domain; ?></h6>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h5><b>Title</b></h5>
                            <h6 style="color:black;"> <?php echo $Title; ?></h6>
                        </div>

                        <div class="col-6">
                            <h5><b>Stipend</b></h5>
                            <h6 style="color:black;"> Rs. <?php echo $Stipend; ?></h6>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-6">
                            <h5><b>Duration</b></h5>
                            <h6 style="color:black;"> <?php echo $Duration; ?></h6>
                        </div>

                        <div class="col-6">
                            <h5><b>City</b></h5>
                            <h6 style="color:black;"> <?php echo $City; ?></h6>
                        </div>
                    </div>
                    <br>
                    <h5><b>Description</b></h5>
                    <h6 style="color:black;"> <?php echo $Description; ?></h6>
                    <br>
                    <h5><b>Requirements</b></h5>
                    <h6 style="color:black;"> <?php echo $Requirements; ?></h6>
                    <br>
                    <br>
                    <?php
                    $query2 = "SELECT CVfile FROM user_cv WHERE Email='$email'";
                    $result2 = mysqli_query($con, $query2);
                    $row2 = mysqli_fetch_array($result2);
                    if(mysqli_num_rows($result2) > 0)
                    {
                    ?>
                        <center>
                            <form method="post" action="../includes/apply-internship.php">
                                <div class="form-group">
                                    <button type="submit" class="button1" style="width:20%;vertical-align:middle" id="apply" name="apply"><span>APPLY </span></button>
                                    <input type="hidden" value="<?php echo $postNo; ?>" name="postNo" id="postNo">
                                </div>
                            </form>
                            <div style="display:flex;justify-content:center;color:black;">
                                <span class="material-icons" style="margin-top:2px;font-size:20px;">error_outline</span>
                                <p>&nbsp;Your CV will be attached with this application automatically.</p>
                            </div>
                        </center>
                    <?php
                    }
                    else
                    {
                    ?>
                        <div style="display:flex;justify-content:center;color:black;">
                            <span class="material-icons" style="margin-top:2px;font-size:20px;">error_outline</span>
                            <p>&nbsp;Create a CV <a href="../student/your-cv.php">HERE</a> before applying for internships.</p>
                        </div>
                    <?php
                    }
                    ?>
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
        header('location: ../student/browse.php');
    }
?>