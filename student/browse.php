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
        <title>InternHub | BROWSE</title>
    </head>
    <body style="background-color:#f8f8f8;">
        <?php
        include("../includes/header-2.php");
        ?>
        
        <div class="container-fluid" style="margin-top:60px;">
            <div class="container-fluid">
                <center>
                    <br>
                    <h3><u>BROWSE INTERNSHIPS</u></h3>
                    <br>
                    <hr>
                    <br>
                    <div class="container-fluid" style="display:flex;justify-content:space-around;">
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:black;">Domain</a>
                            <div class="dropdown-menu">
                                <div style="width: 200px; height: auto; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $sql="SELECT DISTINCT Domain FROM post";
                                $result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                ?>
                                    <br>
                                    <div class="checkbox" style="margin-left:10px;">
                                        <label>
                                            <input type="checkbox" class="post_check" value="<?= $row['Domain']; ?>" id="domain" style="display:inline; vertical-align:-2px;">
                                            <p style="white-space:nowrap; display:inline; padding:5px;"><?= $row['Domain']; ?></p>
                                        </label>
                                    </div>
                                <?php
                                } 
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:black;">Stipend</a>
                            <div class="dropdown-menu">
                                <div style="width: 200px; height: auto; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $sql="SELECT DISTINCT Stipend FROM post ORDER BY Stipend";
                                $result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                ?>
                                    <br>
                                    <div class="checkbox" style="margin-left:10px;">
                                        <label>
                                            <input type="checkbox" class="post_check" value="<?= $row['Stipend']; ?>" id="stipend" style="display:inline; vertical-align:-2px;">
                                            <p style="white-space:nowrap; display:inline; padding:5px;">Rs. <?= $row['Stipend']; ?></p>
                                        </label>
                                    </div>
                                <?php 
                                } 
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:black;">Duration</a>
                            <div class="dropdown-menu">
                                <div style="width: 200px; height: auto; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $sql="SELECT DISTINCT Duration FROM post ORDER BY Duration";
                                $result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                ?>
                                    <br>
                                    <div class="checkbox" style="margin-left:10px;">
                                        <label>
                                            <input type="checkbox" class="post_check" value="<?= $row['Duration']; ?>" id="duration" style="display:inline; vertical-align:-2px;">
                                            <p style="white-space:nowrap; display:inline; padding:5px;"><?= $row['Duration']; ?></p>
                                        </label>
                                    </div>
                                <?php 
                                } 
                                ?>
                                </div>
                            </div>
                        </div>
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" style="color:black;">City</a>
                            <div class="dropdown-menu">
                                <div style="width: 200px; height: auto; overflow-y: auto; overflow-x: hidden;">
                                <?php
                                $sql="SELECT DISTINCT City FROM post ORDER BY City";
                                $result=$conn->query($sql);
                                while($row=$result->fetch_assoc())
                                {
                                ?>
                                    <br>
                                    <div class="checkbox" style="margin-left:10px;">
                                        <label>
                                            <input type="checkbox" class="post_check" value="<?= $row['City']; ?>" id="city" style="display:inline; vertical-align:-2px;">
                                            <p style="white-space:nowrap; display:inline; padding:5px;"><?= $row['City']; ?></p>
                                        </label>
                                    </div>
                                <?php 
                                } 
                                ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <hr>
                    <br>
                </center>
            </div>
        
            <div class="container" style="padding-bottom:25px;">
                <div class="text-center">
                    <img src="../images/loader.gif" id="loader" width="100"  style="display:none;">
                </div>
                <div class="row text-center" id="result">
                    <?php
                        $email = $_SESSION['email'];
                        $sql="SELECT * FROM post WHERE Status='Open'";
                        $result=$conn->query($sql);
                        while($row = $result->fetch_assoc())
                        {
                            $postNo = $row['postNo'];
                    ?>
                            <div class="col-12" style="padding:40px;">
                                <div class="container" style="border:2px solid black;padding:20px;text-align:left;">
                                    <h4><?php echo $row['Domain']; ?></h4>
                                    <h6 style="color:black;font-weight:bold;"><?php echo $row['Title']; ?></h6>
                                    <h6 style="color:black;padding-top:10px;">Duration: <?php echo $row['Duration']; ?></h6>
                                    <h6 style="color:black;padding-top:10px;">Stipend: Rs. <?php echo $row['Stipend']; ?></h6>
                                    <h6 style="color:black;padding-top:10px;">Company: <?php echo $row['companyName']; ?></h6>
                                    <div style="display:flex;justify-content:space-between">
                                        <h6 style="color:black;padding-top:10px;">City: <?php echo $row['City']; ?></h6>
                                        <?php
                                        $query1 = "SELECT * FROM application WHERE postNo='$postNo' AND Email='$email'";
                                        $result1 = mysqli_query($con, $query1);
                                        if(mysqli_num_rows($result1) > 0)
                                        {
                                        ?>
                                            <button class="apply" disabled><b>APPLIED</b></button>
                                        <?php
                                        }
                                        else
                                        {
                                        ?>
                                            <button onclick="location='../student/apply.php?id=<?php echo $row['postNo'];?>'" class="apply"><b>APPLY</b></button>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    ?>
                </div>
            </div>
        </div>
            
        <div id="footer">
            <?php
                include("../includes/footer.php");
            ?>
        </div>    
        
        
        <script>
            $(document).ready(function(){
                
                $(".post_check").click(function(){
                    $("#loader").show();
                    var action = 'action';
                    var domain = get_filter_text('domain');
                    var stipend = get_filter_text('stipend');
                    var duration = get_filter_text('duration');
                    var city = get_filter_text('city');
                   
                    $.ajax({
                        url: '../includes/fetch_posts.php',
                        method: 'POST',
                        data:{action:action, domain:domain, stipend:stipend, duration:duration, city:city},
                        success:function(data){
                            $("#result").html(data);
                            $("#loader").hide();
                        }
                    });
                });
                
                function get_filter_text(text_id){
                    var filterData = [];
                    $('#'+text_id+':checked').each(function(){
                        filterData.push($(this).val());
                    });
                    return filterData;
                };
                
            });
            
            
        </script>
    </body>
</html>
