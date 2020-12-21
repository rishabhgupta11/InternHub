<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
    
    $email = $_SESSION['email'];
    
    if(isset($_REQUEST['add_post']))
    {
        $title = mysqli_real_escape_string($con, $_POST['title']);
        $stipend = $_POST['stipend'];
        $domain = mysqli_real_escape_string($con, $_POST['domain']);
        $duration = mysqli_real_escape_string($con, $_POST['duration']);
        $city = mysqli_real_escape_string($con, $_POST['city']);
        $requirements = mysqli_real_escape_string($con, $_POST['requirements']);
        $description = mysqli_real_escape_string($con, $_POST['description']);
        $email = $_SESSION['email'];
        $query1 = "SELECT Name FROM user WHERE Email='$email'";
        $result1 = mysqli_query($con, $query1);
        $row1 = mysqli_fetch_array($result1);
        $name = $row1['Name'];

        $query2 = "INSERT INTO post (Title, companyName, companyEmail, Domain, Duration, City, Stipend, Description, Requirements, Status) VALUES('$title', '$name', '$email', '$domain', '$duration', '$city', '$stipend', '$description', '$requirements', 'Open')";
        mysqli_query($con, $query2); 
?>        
        <script>
            if(confirm("Post Added Successfully!"))
            {
                location.href = "../company/post.php";
            }
        </script>
<?php
    }
    
    if(isset($_REQUEST['delete']))
    {
        $postNo = $_REQUEST['delete'];
        
        $query4 = "DELETE FROM post WHERE postNo='$postNo'";
        mysqli_query($con, $query4);
?>
    <script>
        if(confirm("Post Deleted Successfully!"))
        {
            location.href = "../company/post.php";
        }
    </script>    
<?php        
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
        <title>InternHub | POSTS</title>
    </head>
    <body style="background-color:#f8f8f8;">
        <?php
        include("../includes/header-3.php");
        ?>
        <div class="container-fluid" style="margin-top:60px;">
            <br>
            <br>
            <center>
                <h3><u>POSTS</u></h3>
                <br>
                <hr>
                <br>
            </center>
        </div>
        <div class="container">
            <br>
            <h3><u>Create New Post</u></h3>
            <br>
            <form method="post" action="">
                <div style="display:flex;">
                    <div class="form-group">
                        <label style="color:black;">Title</label>
                        <input type="text"  class="form-control" name="title" id="title" required>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="form-group">
                        <label style="color:black;">Stipend</label>
                        <input type="number"  class="form-control" name="stipend" id="stipend" required>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="form-group">
                        <label style="color:black;">Domain</label>
                        <select class="form-control" name="domain" id="domain">
                            <option value="App Development">App Development</option>
                            <option value="Web Development">Web Development</option>
                            <option value="UI/UX Design">UI/UX Design</option>
                            <option value="Software Testing">Software Testing</option>
                        </select>
                    </div>
                </div>
                <div style="display:flex;">
                    <div class="form-group">
                        <label style="color:black;">Duration</label>
                        <input type="text"  class="form-control" name="duration" id="duration" required>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="form-group">
                        <label style="color:black;">City</label>
                        <input type="text"  class="form-control" name="city" id="city" required>
                    </div>
                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                    <div class="form-group">
                        <label style="color:black;">Requirements</label>
                        <input type="text"  class="form-control" name="requirements" id="requirements" required>
                    </div>
                </div>
                <div style="display:flex;">
                    <div class="form-group">
                        <label style="color:black;">Description</label>
                        <input type="text"  class="form-control" name="description" id="description" style="height:100px;width:580px;" required>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="button1" style="width:20%;vertical-align:middle" id="add_post" name="add_post"><span>SUBMIT </span></button>
                </div>
            </form>
            <br>
            <hr>
            <br>
            <br>
            <h3><u>Current Posts</u></h3>
            <?php
            $query3 = "SELECT * FROM post WHERE companyEmail='$email'";
            $result3 = mysqli_query($con, $query3);
            while($row3 = mysqli_fetch_array($result3))
            {
                $postNo = $row3['postNo'];
            ?>
                <div class="row">
                    <div class="col-12" style="padding:40px;">
                        <div class="container" style="border:2px solid black;padding:20px;text-align:left;">
                            <h4><?php echo $row3['Domain']; ?></h4>
                            <h6 style="color:black;font-weight:bold;"><?php echo $row3['Title']; ?></h6>
                            <h6 style="color:black;padding-top:10px;">Duration: <?php echo $row3['Duration']; ?></h6>
                            <h6 style="color:black;padding-top:10px;">Stipend: Rs. <?php echo $row3['Stipend']; ?></h6>
                            <h6 style="color:black;padding-top:10px;">Company: <?php echo $row3['companyName']; ?></h6>
                            <div style="display:flex;justify-content:space-between">
                                <h6 style="color:black;padding-top:10px;">City: <?php echo $row3['City']; ?></h6>
                                <button onclick="location='../company/post.php?delete=<?php echo $row3['postNo'];?>'" class="apply"><b>CLOSE</b></button>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
        <div id="footer">
            <?php
                include("../includes/footer.php");
            ?>
        </div>    
    </body>
</html>
