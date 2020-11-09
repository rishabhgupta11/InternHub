<?php
    if(!isset($_SESSION)) 
    { 
        session_start();
    }
?> 
<nav class="navbar navbar-expand-lg container-fluid" id="header">
    <div id="mySidebar" class="sidebar">
        <div id="changingMenu">
            <hr>
            <div class="nav-item" style="margin-top:8px;">
                <a class="nav-link headerOption" style="padding-right:200px;margin-bottom:8px;" href="../home/index.php">HOME</a>
            </div>
            <hr>
            <div class="nav-item" style="margin-top:8px;">
                <a class="nav-link headerOption" style="padding-right:200px;margin-bottom:8px;" href="../home/about.php">ABOUT</a>
            </div>
            <hr>
        </div>
        <?php 
        if(isset($_SESSION['email'])) 
        { 
        ?> 
            <div class="sidebarBottomMenu">
                <a href="../home/my_account.php" title="My Account">
                    <div style="display:flex;">
                        <p style="margin-top:1px;margin-bottom:1px;font-size:14px;font-weight:600">MY ACCOUNT</p>&nbsp;
                        <span class="material-icons">keyboard_arrow_right</span>
                    </div>
                </a>
                <a href="../home/logout.php" title="Logout">
                    <div style="display:flex;">
                        <p style="margin-top:1px;margin-bottom:1px;font-size:14px;font-weight:600">LOGOUT</p>&nbsp;
                        <span class="material-icons">keyboard_arrow_right</span>
                    </div>
                </a>
            </div>
        <?php 
        } 
        ?>
    </div>
    
    <div class="container-fluid w-100" style="padding-left:0px;">
        <div class="row w-100" style="margin:0px;">
            <div class="col-4" style="padding-left:10px;padding-top:6px;">
                <div class="navbar-burger-menu-div">
                    <button class="openbtn" onclick="toggleNav()" style="padding-bottom:0px;padding-top:8px;">
                        <span id="navbar-burger-menu-option" class="material-icons" style="color:#f5f5f5;font-size:37px;">menu</span>
                    </button>
                </div>
                <div class="navbar-collapse collapse order-1 order-lg-0" style="margin-top:7px;">
                    <ul class="navbar-nav" style="padding-left:0px;">
                        <li class="nav-item">
                            <a class="nav-link headerOption" href="../home/index.php">HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link headerOption" href="../home/about.php">ABOUT</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-4 text-center">
                <a class="navbar-brand" href="../home/index.php"><img src="../images/logo01.jpg" alt="InternHub" style="width:50px;height:50px;"></a>
            </div>
            <div class="col-4" style="padding-right:8px;padding-top:6px;">
                <?php 
                if(isset($_SESSION['email'])) 
                { 
                ?>
                    <div style="padding-top:15px;display:flex;justify-content:flex-end">
                        <div style="display:flex;justify-content:space-around;">
                            <a class="login" href="../home/my_account.php" title="My Account"><span class="material-icons" style="color:#f5f5f5;">account_circle</span></a>
                            <a class="logout" href="../home/logout.php" title="Logout"><span class="material-icons" style="color:#f5f5f5;">login</span></a>
                        </div>
                    </div>
                <?php 
                } 
                else 
                { 
                ?>
                    <div style="padding-top:6px;display:flex;justify-content:flex-end">
                        <a class="login" href="../home/login.php" style="padding-top:7px;padding-right:6px;" title="Login/Signup"><span class="material-icons">person</span></a>
                    </div>
                <?php 
                } 
                ?>
            </div>
        </div>
    </div>
</nav>

<script>
    $('.dropdown').on('show.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideDown();
    });

    $('.dropdown').on('hide.bs.dropdown', function() {
        $(this).find('.dropdown-menu').first().stop(true, true).slideUp();
    });
    
    function toggleNav() 
    {
        var x = document.getElementById("navbar-burger-menu-option").innerHTML;
        if(x == "menu")
        {
            document.getElementById("mySidebar").style.width = "100%";
            document.getElementById("navbar-burger-menu-option").innerHTML="close";
        }
        else
        {
            if(x == "close")
            {
                document.getElementById("mySidebar").style.width = "0";
                document.getElementById("navbar-burger-menu-option").innerHTML="menu";
            }
        }
    }
</script>