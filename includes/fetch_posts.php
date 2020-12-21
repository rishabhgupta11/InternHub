<?php
require("../includes/connect2.php");
require("../includes/connect.php");

if(isset($_POST['action']))
{
    $email = $_SESSION['email'];
    $sql= "SELECT * FROM post WHERE Status='Open'";
    
    if(isset($_POST['domain'])){
        $domain = implode("','", $_POST['domain']);
        $sql .= " AND Domain IN ('".$domain."')";
    }
    if(isset($_POST['stipend'])){
        $stipend = implode("','", $_POST['stipend']);
        $sql .= " AND Stipend IN ('".$stipend."')";
    }
    if(isset($_POST['city'])){
        $city = implode("','", $_POST['city']);
        $sql .= " AND City IN ('".$city."')";
    }
    if(isset($_POST['duration'])){
        $duration = implode("','", $_POST['duration']);
        $sql .= " AND Duration IN ('".$duration."')";
    }
    $result = $conn->query($sql);
    $output = '';
    
    if($result->num_rows>0)
    {
        while($row = $result->fetch_assoc())
        {
            $postNo = $row['postNo'];
            
            $output.='  <div class="col-12" style="padding:40px;">
                            <div class="container" style="border:2px solid black;padding:20px;text-align:left;">
                                <h4>'.$row["Domain"].'</h4>
                                <h6 style="color:black;font-weight:bold;">'.$row['Title'].'</h6>
                                <h6 style="color:black;padding-top:10px;">Duration: '.$row['Duration'].'</h6>
                                <h6 style="color:black;padding-top:10px;">Stipend: Rs. '.$row['Stipend'].'</h6>
                                <h6 style="color:black;padding-top:10px;">Company: '.$row['companyName'].'</h6>
                                <div style="display:flex;justify-content:space-between">
                                    <h6 style="color:black;padding-top:10px;">City: '.$row['City'].'</h6>';
                                    $query1 = "SELECT * FROM application WHERE postNo='$postNo' AND Email='$email'";
                                    $result1 = mysqli_query($con, $query1);
                                    if(mysqli_num_rows($result1) > 0)
                                    {
                                        $output.='<button class="apply" disabled><b>APPLIED</b></button>';
                                    }
                                    else
                                    {
                                        $output.='<a href="../student/apply.php?id='.$row['postNo'].'"><button class="apply"><b>APPLY</b></button></a>';
                                    }
                    $output.='  </div>
                            </div>
                        </div>';
        }
    }
    else
    {
        $output= "<h3>No Posts Found.</h3>";
    }
    echo $output;
}

?>

