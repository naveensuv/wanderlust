<?php

    function format($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $s=format($_POST['search']);
    $connection=new mysqli("localhost","root","","wanderlust");

    if(mysqli_connect_error())
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    else{
        $select="SELECT photo FROM image where place='$s' or city='$s'";
        $result=mysqli_query($connection,$select);

        if(mysqli_num_rows($result)>0){
            $row=mysqli_fetch_assoc($result);    
        }    
    }
?>
<!DOCTYPE html>
<head>
    <title>surf</title>
    <link rel="stylesheet" href="surf.css">
</head>
<body> 

 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<h1>Surf</h1>
<h2>Search for Tourist Places</h2>

 <form class="example" action="action_page.php">
   <input type="text" placeholder="Enter place..." name="search"></br>
   <a href="TravelDairies.html"><button type="submit"><i class="fa fa-search"> Search</i></button></a>
 </form> 


 <div id="mySidenav" class="sidenav">
  <a href="profile.php" id="blog"><button>View Profile</button></a><br>
  <a href="surf.html" id="projects"><button>Surf</button></a><br>
  <a href="TravelDairies.html" id="travel"><button>Travel Dairies</button> </a><br>
  <a href="login_page.html" id="contact"><button onlick="logout.php">Logout</button></a>
</div>
<div>
  <table>
    <?php
        var $i;
        $row=mysqli_fetch_assoc($result);
        for($i=0;$i<mysqli_num_rows($result);$i++){
            echo "<tr>";
            echo "<td><img src='uploads/$row[$i] height='200' width='200'>'></td>";
            echo "</tr>";
        }
    ?>
  </table>
</div>    
</body>
</html>