<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
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
            <center>
                <h3><u>APPLICATIONS</u></h3>
                <br>
                <hr>
                <br>
            </center>
        </div>    
        <div class="container" style="padding-bottom:25px;">
            <div class="row text-center">
                <?php
                    $email = $_SESSION['email'];
                    $query = "SELECT * FROM post WHERE companyEmail='$email'";
                    $result = mysqli_query($con,$query);
                    while($row = mysqli_fetch_array($result))
                    {
                        $postNo = $row['postNo'];
                        $query1 = "SELECT * FROM application ap INNER JOIN user us ON ap.Email = us.Email WHERE postNo='$postNo'";
                        $result1 = mysqli_query($con, $query1);
                        while($row1 = mysqli_fetch_array($result1))
                        {
                            $studentEmail = $row1['Email'];
                ?>
                            <div class="col-12" style="padding:40px;">
                                <div class="container" style="border:2px solid black;padding:20px;text-align:left;">
                                    <h4><?php echo $row1['Name']; ?>&nbsp;&nbsp;<span style="color:black;font-size:13px;"><b>applied for</b></span></h4>
                                    <h5 style="color:black;font-weight:bold;"><?php echo $row['Title']; ?></h5>
                                    <div style="display:flex;cursor:pointer;">
                                        <a href="../student/download-cv.php?id=getStudentCV&email=<?php echo $studentEmail ;?>"><span style="font-size:21px;" class="material-icons">visibility</span></a>
                                        &nbsp;
                                        <a href="../student/download-cv.php?id=getStudentCV&email=<?php echo $studentEmail ;?>"><h6>View Resume</h6></a>
                                    </div>
                                    <div style="display:flex;justify-content:space-between">
                                        <h6 style="color:black;padding-top:10px;">City: <?php echo $row['City']; ?></h6>
                                        <?php
                                        $query2 = "SELECT * FROM application WHERE postNo='$postNo' AND Email='$studentEmail' AND (Status='Shortlisted' OR Status='Rejected')";
                                        $result2 = mysqli_query($con, $query2);
                                        if(mysqli_num_rows($result2) > 0)
                                        {
                                            $row2 = mysqli_fetch_array($result2);
                                            if($row2['Status'] == 'Shortlisted')
                                            {
                                        ?>
                                                <button class="apply" disabled><b>SHORTLISTED</b></button>
                                        <?php
                                            }
                                            else
                                            {
                                        ?>
                                                <button class="apply" disabled><b>REJECTED</b></button>
                                        <?php
                                            }
                                        }
                                        else
                                        {
                                        ?>
                                            <div style="display:flex;">
                                                <button onclick="location='../company/shortlist.php?email=<?php echo $studentEmail ;?>&id=<?php echo $postNo ;?>'" class="apply"><b>SHORTLIST</b></button>
                                                &emsp;
                                                <button onclick="location='../company/reject.php?email=<?php echo $studentEmail ;?>&id=<?php echo $postNo ;?>'" class="apply"><b>REJECT</b></button>
                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                <?php
                        }
                    }
                ?>
            </div>
        </div>
        <div id="footer">
            <?php
                include("../includes/footer.php");
            ?>
        </div>    
    </body>
</html>
