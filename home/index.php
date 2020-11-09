<?php
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
        <title>InternHub | HOME</title>
    </head>
    <body>
        <?php
        include("../includes/header.php");
        ?>
        
        <div class="container-fluid" style="padding:0px;">
            <div class="row no-gutters home-banner">
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" id="bannerForDesktop">
                    <img src="../images/banner.jpg" style="width:100%;height:auto;">
                </div>
                <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12" id="bannerForMobile">
                    <img src="../images/banner_mobile.jpg" style="width:100%;height:auto;">
                </div>
                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12 home-banner-content">
                    <br>
                    <h1 style="font-size:100px;">&#8220;find&emsp;</h1>
                    <h1 style="font-size:100px;">yourself&#8221;</h1>
                    <br>
                    <br>
                    <br>
                    <h2 style="letter-spacing:4px;font-family:'Didact Gothic';"><b>InternHub</b></h2>
                    <h5 style="font-family:'Didact Gothic';">Bridging the gap between employers and students.</h5>
                </div>
            </div>
            <br>
            <div class="container-fluid home-banner-2">
                <br>
                <br>
                <h5 style="letter-spacing:3px;">SAY HELLO TO THE NEW WAY OF FINDING INTERNSHIPS!</h5>
                <br>
                <br>
                <h6 style="margin-left:15%;margin-right:15%;letter-spacing:2px;">Discover new ways of finding where you belong and experiencing important aspects for your future work life through our platform.</h6>
                <br>
                <br>
                <button onclick="location='../home/login.php'" class="getStarted"><b>GET STARTED</b></button>
                <br>
                <br>
            </div>
            <br>
            <div class="container-fluid home-desc">
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="padding:30px;">
                        <h2>DISCOVER</h2>
                        <ul>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">FIND LISTS OF YOUR PREFERRED INTERNSHIPS EASILY</li>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">USE FILTERS TO MATCH YOUR CHOICES</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-12" style="padding:30px;">
                        <h2>APPLY</h2>
                        <ul>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">SEND APPLICATIONS TO COMPANIES YOU LIKE</li>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">SAVE YOUR CV ON THE SERVER AND ATTACH THEM TO APPLICATIONS</li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-xs-12" style="padding:30px;">
                        <h2>GENERATE CV</h2>
                        <ul>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">GENERATE A CV FOR YOURSELF USING OUR EASY-TO-USE FORM-FIELD SYSTEM</li>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">DOWNLOAD GENERATED CV IN PDF FORMAT</li>
                        </ul>
                    </div>
                    <div class="col-md-6 col-xs-12" style="padding:30px;">
                        <h2>ORGANIZATIONS</h2>
                        <ul>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">POST INTERNSHIP POSTINGS WITH DETAILED REQUIREMENTS AND CRITERIA</li>
                            <li style="font-size:14px;margin-bottom:3px;text-align:left;">ACCEPT APPLICATIONS OR INVITE CANDIDATES OF YOUR LIKING</li>
                        </ul>
                    </div>
                </div>
            </div>
            <br>
        </div>
        
        <div id="footer">
        <?php
        include("../includes/footer.php");
        ?>
        </div>    
        <script>
            function topFunc() {
                document.body.scrollTop = 0;
            }
        </script>
    </body>
</html>
