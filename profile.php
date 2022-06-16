<?php
    session_start();
?>
<?php
    $connection=new mysqli("localhost","root","","wanderlust");
    if(mysqli_connect_error())
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    else{
        $u=$_SESSION['username'];
        $select="SELECT * FROM `users` WHERE username=$u";
        $result=mysqli_query($connection,$select);
    }
?>
<html>
    <head>
        <title>profile</title>
        <link rel="stylesheet" href="profile.css">
    </head>
    <body>
        <div>
            <h1>WanderLust.com</h1> 
            <h2>Show Your Pride</h2>                   
        </div>
        <div id="mySidenav" class="sidenav">
        <a href="profile.php" id="blog"><button>View Profile</button></a>
        <a href="surf.html" id="projects"><button>Surf</button></a>
        <a href="TravelDairies.html" id="travel"><button>Travel Dairies</button> </a>
        <a href="login_page.html" id="contact"><button onlick="logout.php">Logout</button></a>
      </div>
        <div>
                <table>
                    <tr>
                        <th>Username</th>
                        <td> <?php echo $_SESSION['username']; ?></td>
                    </tr>
                    <tr>
                        <th>EmailId</th>
                        <td> <?php echo $_SESSION['email']; ?></td>
                    </tr>
                </table>
                <center><a href="updatepage.html"><button class="but1">Update details</button></a></center>
        </div>
         
    </body>
</html>

