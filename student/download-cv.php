<?php
    require("../../vendor/autoload.php");
    use Dompdf\Dompdf;
    include("../includes/fetch_css.php");
    require("../includes/connect.php");

    $dompdf = new Dompdf();
    $email = $_SESSION['email'];
    if(isset($_REQUEST['id']) && isset($_REQUEST['email']) && $_REQUEST['id'] == "getStudentCV")
    {
        $email = $_REQUEST['email'];
    }
    $query1 = "SELECT CVfile FROM user_cv WHERE Email='$email'";
    $result1 = mysqli_query($con, $query1);
    $row1 = mysqli_fetch_array($result1);
    
    $cvfile = $row1['CVfile'];
    
    $query2 = "SELECT * FROM cv_details WHERE CVfile='$cvfile'";
    $result2 = mysqli_query($con, $query2);
    $row2 = mysqli_fetch_array($result2);
    
    $name = $row2['Name'];
    $email = $row2['Email'];
    $mobile = $row2['Mobile'];
    $qualification1 = $row2['Qualification1'];
    $institute1 = $row2['Institute1'];
    $grade1 = $row2['Grade1'];
    $year1 = $row2['Year1'];
    $qualification2 = $row2['Qualification2'];
    $institute2 = $row2['Institute2'];
    $grade2 = $row2['Grade2'];
    $year2 = $row2['Year2'];
    $qualification3 = $row2['Qualification3'];
    $institute3 = $row2['Institute3'];
    $grade3 = $row2['Grade3'];
    $year3 = $row2['Year3'];
    $qualification4 = $row2['Qualification4'];
    $institute4 = $row2['Institute4'];
    $grade4 = $row2['Grade4'];
    $year4 = $row2['Year4'];
    $qualification5 = $row2['Qualification5'];
    $institute5 = $row2['Institute5'];
    $grade5 = $row2['Grade5'];
    $year5 = $row2['Year5'];
    $type1 = $row2['Type1'];
    $company1 = $row2['Company1'];
    $title1 = $row2['Title1'];
    $duration1 = $row2['Duration1'];
    $type2 = $row2['Type2'];
    $company2 = $row2['Company2'];
    $title2 = $row2['Title2'];
    $duration2 = $row2['Duration2'];
    $type3 = $row2['Type3'];
    $company3 = $row2['Company3'];
    $title3 = $row2['Title3'];
    $duration3 = $row2['Duration3'];
    $type4 = $row2['Type4'];
    $company4 = $row2['Company4'];
    $title4 = $row2['Title4'];
    $duration4 = $row2['Duration4'];
    $type5 = $row2['Type5'];
    $company5 = $row2['Company5'];
    $title5 = $row2['Title5'];
    $duration5 = $row2['Duration5'];
    $skill1 = $row2['Skill1'];
    $skill2 = $row2['Skill2'];
    $skill3 = $row2['Skill3'];
    $skill4 = $row2['Skill4'];
    $skill5 = $row2['Skill5'];
    $skill6 = $row2['Skill6'];
    $skill7 = $row2['Skill7'];
    $skill8 = $row2['Skill8'];
    $skill9 = $row2['Skill9'];
    $skill10 = $row2['Skill10'];
    $link = $row2['Link'];
    ob_start();
?>
        <html>
            <head>
                <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
                <link href="<?php echo $cssfilename; ?>" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
                <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta charset="UTF-8">
                <style>
                    .fieldsurround{
                        margin:0px;
                    }
                    body{
                        font-size: 13px;
                        font-family: "Helvetica";
                    }
                    .table-bottom-border{
                        border-bottom: 1px solid #dfe3e8;
                        padding-top: 8px;
                        padding-bottom: 8px;
                    }
                    .table-header-set-1{
                        padding-top: 10px;
                        padding-bottom: 10px;
                        text-align: left;
                    }
                    .table-header-set-2{
                        padding-top: 10px;
                        padding-bottom: 10px;
                        text-align: right;
                    }
                </style>
            </head>
            <body>
                <div>
                    <center>
                        <p style="font-size:20px;" class="fieldsurround"><u><b>RESUME</b></u></p>
                    </center>
                </div>
                <br>
                <table style="width:100%;">
                    <tr>
                        <td>
                            <div>
                                <p style="font-size:16px;" class="fieldsurround"><b><?php echo $name; ?></b></p>
                                <br>
                                <p class="fieldsurround"><?php echo $email; ?></p>
                                <p class="fieldsurround"><?php echo $mobile; ?></p>
                                <br>
                            </div>
                        </td>
                    </tr>
                </table>
                <hr>
                <br>
                <p style="font-size:16px;" class="fieldsurround"><b>Education Details: </b></p>
                <br>
                <table style="width:100%;border:1px solid #cccccc;">
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($qualification1 != "--Qualification--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $qualification1; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $institute1; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Grade/Percentage: <?php echo $grade1; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Year of Passing: <?php echo $year1; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                        
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($qualification2 != "--Qualification--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $qualification2; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $institute2; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Grade/Percentage: <?php echo $grade2; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Year of Passing: <?php echo $year2; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>    
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($qualification3 != "--Qualification--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $qualification3; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $institute3; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Grade/Percentage: <?php echo $grade3; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Year of Passing: <?php echo $year3; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                        
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($qualification4 != "--Qualification--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $qualification4; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $institute4; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Grade/Percentage: <?php echo $grade4; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Year of Passing: <?php echo $year4; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($qualification5 != "--Qualification--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $qualification5; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $institute5; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Grade/Percentage: <?php echo $grade5; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Year of Passing: <?php echo $year5; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <p style="font-size:16px;" class="fieldsurround"><b>Experience Details: </b></p>
                <br>
                <table style="width:100%; text-align:left;">
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($type1 != "--Select Type--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $type1; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $company1; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Title: <?php echo $title1; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Duration: <?php echo $duration1; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                        
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($type2 != "--Select Type--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $type2; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $company2; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Title: <?php echo $title2; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Duration: <?php echo $duration2; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>  
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($type3 != "--Select Type--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $type3; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $company3; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Title: <?php echo $title3; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Duration: <?php echo $duration3; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                        
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($type4 != "--Select Type--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $type4; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $company4; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Title: <?php echo $title4; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Duration: <?php echo $duration4; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                    <tr style="background-color: #dfe3e8;">
                        <td style="width:50%;padding-left:8px;padding-right:8px;border-right:1px solid #cccccc;">
                            <?php
                            if($type5 != "--Select Type--")
                            {
                            ?>
                            <br>
                            <p style="font-size:14px;" class="fieldsurround"><b><?php echo $type5; ?></b></p>
                            <p style="font-size:14px;" class="fieldsurround"><?php echo $company5; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Title: <?php echo $title5; ?></p>
                            <p style="font-size:14px;" class="fieldsurround">Duration: <?php echo $duration5; ?></p>
                            <br>
                            <?php
                            }
                            ?>
                        </td>
                    </tr>
                </table>
                <br>
                <hr>
                <br>
                <p style="font-size:16px;" class="fieldsurround"><b>Skills/Technologies: </b></p>
                <br>
                <p style="font-size:14px;" class="fieldsurround">
                    <?php if($skill1!=NULL)echo $skill1; ?>
                    <?php if($skill2!=NULL)echo ', '.$skill2; ?>
                    <?php if($skill3!=NULL)echo ', '.$skill3; ?>
                    <?php if($skill4!=NULL)echo ', '.$skill4; ?> 
                    <?php if($skill5!=NULL)echo ', '.$skill5; ?> 
                    <?php if($skill6!=NULL)echo ', '.$skill6; ?>
                    <?php if($skill7!=NULL)echo ', '.$skill7; ?> 
                    <?php if($skill8!=NULL)echo ', '.$skill8; ?> 
                    <?php if($skill9!=NULL)echo ', '.$skill9; ?>
                    <?php if($skill10!=NULL)echo ', '.$skill10; ?>
                </p>
                <br>
                <hr>
                <br>
                <p style="font-size:16px;" class="fieldsurround"><b>LinkedIn Account Link: </b></p>
                <br>
                <p style="font-size:14px;" class="fieldsurround"><?php if($link!=NULL)echo $link; ?></p>
            </body>
        </html>
<?php
    $html = ob_get_clean();
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    $dompdf->stream($cvfile.'.pdf', Array("Attachment" => 0));
    $output = $dompdf->output();
?>