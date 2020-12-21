<?php
    include("../includes/connect.php");
    require("../includes/connect2.php");
    include("../includes/fetch_css.php");
?>    
<?php
    $email = $_SESSION['email'];
    $exist = 0;
    if(isset($_REQUEST['add_cv']))
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $mobile = $_POST['mobile'];
        $qualification1 = $_POST['qualification1'];
        $institute1 = $_POST['institute1'];
        $grade1 = $_POST['grade1'];
        $year1 = $_POST['year1'];
        $qualification2 = $_POST['qualification2'];
        $institute2 = $_POST['institute2'];
        $grade2 = $_POST['grade2'];
        $year2 = $_POST['year2'];
        $qualification3 = $_POST['qualification3'];
        $institute3 = $_POST['institute3'];
        $grade3 = $_POST['grade3'];
        $year3 = $_POST['year3'];
        $qualification4 = $_POST['qualification4'];
        $institute4 = $_POST['institute4'];
        $grade4 = $_POST['grade4'];
        $year4 = $_POST['year4'];
        $qualification5 = $_POST['qualification5'];
        $institute5 = $_POST['institute5'];
        $grade5 = $_POST['grade5'];
        $year5 = $_POST['year5'];
        $type1 = $_POST['type1'];
        $company1 = $_POST['company1'];
        $title1 = $_POST['title1'];
        $duration1 = $_POST['duration1'];
        $type2 = $_POST['type2'];
        $company2 = $_POST['company2'];
        $title2 = $_POST['title2'];
        $duration2 = $_POST['duration2'];
        $type3 = $_POST['type3'];
        $company3 = $_POST['company3'];
        $title3 = $_POST['title3'];
        $duration3 = $_POST['duration3'];
        $type4 = $_POST['type4'];
        $company4 = $_POST['company4'];
        $title4 = $_POST['title4'];
        $duration4 = $_POST['duration4'];
        $type5 = $_POST['type5'];
        $company5 = $_POST['company5'];
        $title5 = $_POST['title5'];
        $duration5 = $_POST['duration5'];
        $skill1 = $_POST['skill1'];
        $skill2 = $_POST['skill2'];
        $skill3 = $_POST['skill3'];
        $skill4 = $_POST['skill4'];
        $skill5 = $_POST['skill5'];
        $skill6 = $_POST['skill6'];
        $skill7 = $_POST['skill7'];
        $skill8 = $_POST['skill8'];
        $skill9 = $_POST['skill9'];
        $skill10 = $_POST['skill10'];
        $link = $_POST['link'];
        
        $query2 = "INSERT INTO cv_details (Name, Email, Mobile, Qualification1, Institute1, Grade1, Year1, Qualification2, Institute2, "
                . "Grade2, Year2, Qualification3, Institute3, Grade3, Year3, Qualification4, Institute4, Grade4, Year4, Qualification5, "
                . "Institute5, Grade5, Year5, Type1, Company1, Title1, Duration1, Type2, Company2, Title2, Duration2, Type3, Company3, "
                . "Title3, Duration3, Type4, Company4, Title4, Duration4, Type5, Company5, Title5, Duration5, Skill1, Skill2, Skill3, Skill4, "
                . "Skill5, Skill6, Skill7, Skill8, Skill9, Skill10, Link) VALUES('$name', '$email', '$mobile', '$qualification1', '$institute1', "
                . "'$grade1', '$year1', '$qualification2', '$institute2', '$grade2', '$year2', '$qualification3', '$institute3', '$grade3', '$year3', "
                . "'$qualification4', '$institute4', '$grade4', '$year4', '$qualification5', '$institute5', '$grade5', '$year5', '$type1', "
                . "'$company1', '$title1', '$duration1', '$type2', '$company2', '$title2', '$duration2', '$type3', '$company3', '$title3', '$duration3', "
                . "'$type4', '$company4', '$title4', '$duration4', '$type5', '$company5', '$title5', '$duration5', '$skill1', '$skill2', '$skill3', "
                . "'$skill4', '$skill5', '$skill6', '$skill7', '$skill8', '$skill9', '$skill10', '$link')";
        mysqli_query($con, $query2);
        
        $query3 = "SELECT CVfile FROM cv_details WHERE Email='$email'";
        $result3 = mysqli_query($con, $query3);
        $row3 = mysqli_fetch_array($result3);
        $cvfile = $row3['CVfile'];
        
        $query4 = "INSERT INTO user_cv (Email, CVfile) VALUES ('$email', '$cvfile')";
        mysqli_query($con, $query4);
    }
    
    $query = "SELECT * FROM user_cv WHERE Email='$email'";
    $result = mysqli_query($con, $query);
    if(mysqli_num_rows($result) > 0)
    {
        $exist = 1;
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
        <title>InternHub | YOUR CV</title>
    </head>
    <body style="background-color:#f8f8f8;">
        <?php
        include("../includes/header-2.php");
        ?>

        <div class="container-fluid" style="margin-top:60px;">
            <br>
            <br>
            <center>
                <h3><u>YOUR CV</u></h3>
                <br>
                <hr>
                <br>
            </center>
        </div>
        <?php
        if($exist == 0)
        {
        ?>
            <div class="container">
                <form method="post" action="">
                    <h5><u>Personal Details</u></h5>
                    <br>
                    <div style="display:flex;">
                        <div class="form-group">
                            <label style="color:black;">Name</label>
                            <input type="text"  class="form-control" name="name" id="name" required>
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <div class="form-group">
                            <label style="color:black;">Email</label>
                            <input type="email"  class="form-control" name="email" id="email" required>
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <div class="form-group">
                            <label style="color:black;">Mobile Number</label>
                            <input type="number"  class="form-control" name="mobile" id="mobile" required>
                        </div>
                    </div>
                    <br>
                    <h5><u>Education Details</u></h5>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Education 1: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="qualification1" id="qualification1">
                                <option value="--Qualification--">--Qualification--</option>
                                <option value="Secondary(X)">Secondary(X)</option>
                                <option value="Senior Secondary(XII)">Senior Secondary(XII)</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="institute1" id="institute1" placeholder="Name of Institute" required>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="grade1" id="grade1" placeholder="Percentage/Grade" required>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="number"  class="form-control" name="year1" id="year1" placeholder="Year of Completion" required>
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Education 2: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="qualification2" id="qualification2">
                                <option value="--Qualification--">--Qualification--</option>
                                <option value="Secondary(X)">Secondary(X)</option>
                                <option value="Senior Secondary(XII)">Senior Secondary(XII)</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="institute2" id="institute2" placeholder="Name of Institute">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="grade2" id="grade2" placeholder="Percentage/Grade">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="number"  class="form-control" name="year2" id="year2" placeholder="Year of Completion">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Education 3: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="qualification3" id="qualification3">
                                <option value="--Qualification--">--Qualification--</option>
                                <option value="Secondary(X)">Secondary(X)</option>
                                <option value="Senior Secondary(XII)">Senior Secondary(XII)</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="institute3" id="institute3" placeholder="Name of Institute">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="grade3" id="grade3" placeholder="Percentage/Grade">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="number"  class="form-control" name="year3" id="year3" placeholder="Year of Completion">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Education 4: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="qualification4" id="qualification4">
                                <option value="--Qualification--">--Qualification--</option>
                                <option value="Secondary(X)">Secondary(X)</option>
                                <option value="Senior Secondary(XII)">Senior Secondary(XII)</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="institute4" id="institute4" placeholder="Name of Institute">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="grade4" id="grade4" placeholder="Percentage/Grade">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="number"  class="form-control" name="year4" id="year4" placeholder="Year of Completion">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Education 5: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="qualification5" id="qualification5">
                                <option value="--Qualification--">--Qualification--</option>
                                <option value="Secondary(X)">Secondary(X)</option>
                                <option value="Senior Secondary(XII)">Senior Secondary(XII)</option>
                                <option value="Graduation">Graduation</option>
                                <option value="Post Graduation">Post Graduation</option>
                                <option value="Diploma">Diploma</option>
                                <option value="PhD">PhD</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="institute5" id="institute5" placeholder="Name of Institute">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="grade5" id="grade5" placeholder="Percentage/Grade">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="number"  class="form-control" name="year5" id="year5" placeholder="Year of Completion">
                        </div>
                    </div>
                    <br>
                    <h5><u>Experience Details</u></h5>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Experience 1: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="type1" id="type1">
                                <option value="--Select Type--">--Select Type--</option>
                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="company1" id="company1" placeholder="Name of Company">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="title1" id="title1" placeholder="Title">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="duration1" id="duration1" placeholder="Duration">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Experience 2: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="type2" id="type2">
                                <option value="--Select Type--">--Select Type--</option>
                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="company2" id="company2" placeholder="Name of Company">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="title2" id="title2" placeholder="Title">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="duration2" id="duration2" placeholder="Duration">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Experience 3: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="type3" id="type3">
                                <option value="--Select Type--">--Select Type--</option>
                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="company3" id="company3" placeholder="Name of Company">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="title3" id="title3" placeholder="Title">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="duration3" id="duration3" placeholder="Duration">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Experience 4: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="type4" id="type4">
                                <option value="--Select Type--">--Select Type--</option>
                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="company4" id="company4" placeholder="Name of Company">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="title4" id="title4" placeholder="Title">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="duration4" id="duration4" placeholder="Duration">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Experience 5: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <select class="form-control" name="type5" id="type5">
                                <option value="--Select Type--">--Select Type--</option>
                                <option value="Job">Job</option>
                                <option value="Internship">Internship</option>
                            </select>
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="company5" id="company5" placeholder="Name of Company">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="title5" id="title5" placeholder="Title">
                        </div>
                        &emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="duration5" id="duration5" placeholder="Duration">
                        </div>
                    </div>
                    <br>
                    <h5><u>Skills/Technologies</u></h5>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Skill 1: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill1" id="skill1" placeholder="Skill/Technology" required>
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h6 style="color:black;padding-top:10px;">Skill 2: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill2" id="skill2" placeholder="Skill/Technology">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Skill 3: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill3" id="skill3" placeholder="Skill/Technology">
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h6 style="color:black;padding-top:10px;">Skill 4: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill4" id="skill4" placeholder="Skill/Technology">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Skill 5: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill5" id="skill5" placeholder="Skill/Technology">
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h6 style="color:black;padding-top:10px;">Skill 6: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill6" id="skill6" placeholder="Skill/Technology">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Skill 7: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill7" id="skill7" placeholder="Skill/Technology">
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h6 style="color:black;padding-top:10px;">Skill 8: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill8" id="skill8" placeholder="Skill/Technology">
                        </div>
                    </div>
                    <br>
                    <div style="display:flex;justify-content:flex-start;">
                        <h6 style="color:black;padding-top:10px;">Skill 9: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill9" id="skill9" placeholder="Skill/Technology">
                        </div>
                        &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                        <h6 style="color:black;padding-top:10px;">Skill 10: </h6>
                        &emsp;&emsp;
                        <div class="form-group">
                            <input type="text"  class="form-control" name="skill10" id="skill10" placeholder="Skill/Technology">
                        </div>
                    </div>
                    <br>
                    <h5><u>Work Profile Link</u></h5>
                    <br>
                    <div class="form-group">
                        <label style="color:black;">LinkedIn Account Link</label>
                        <input type="text"  class="form-control" name="link" id="link" style="width:25%;" required>
                    </div>
                    <br>
                    <br>
                    <br>
                    <center>
                        <div class="form-group">
                            <button type="submit" class="button1" style="width:50%;vertical-align:middle" id="add_cv" name="add_cv"><span>SUBMIT </span></button>
                        </div>
                    </center>
                </form>
            </div>
        <?php
        }
        else
        {
        ?>
            <div class="container">
                <br>
                <br>
                <center>
                    <h4 style="color:black;">You have created a CV.</h4>
                    <br>
                    <div style="display:flex;justify-content:center;cursor:pointer;">
                        <a href="../student/download-cv.php" style="text-decoration:none !important;"><span class="material-icons" style="font-size:25px;">get_app</span></a>
                        &emsp;
                        <a href="../student/download-cv.php" style="text-decoration:none !important;"><h6>Click Here to Download your CV.</h6></a>
                    </div>
                    <br>
                    <a href="../student/delete-cv.php" style="text-decoration:none !important;"><h6 style="color:red;cursor:pointer;">Click Here to Delete your CV and create a new one.</h6></a>
                </center>
            </div>
        <?php
        }
        ?>
        <br>
        <br>
        <br>
        <br>
        <div id="footer">
            <?php
                include("../includes/footer.php");
            ?>
        </div> 
    </body>
</html>
