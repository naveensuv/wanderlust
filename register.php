<?php
function format($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

$u=format($_POST['username1']);
$p=format($_POST['pass1']);
$rp=format($_POST['retype_password']);
$e=format($_POST['email']);

$connection=new mysqli("localhost","root","","wanderlust");

if(mysqli_connect_error()){
    die('connection error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
}else{

     $result=mysqli_query($connection,"SELECT * FROM `users` WHERE username='$u'");
     
     if(mysqli_num_rows($result)==0){
        $stmt=$connection->prepare("INSERT INTO `users`(`username`, `pass`, `email`) VALUES (?,?,?)");
        $stmt->bind_param("sss",$u,$p,$e);
        $stmt->execute();
        
        echo "Registration successful...";
        sleep(3);
        header("location:surf.html");
        session_start();
        $_SESSION['username']=$u;
        $_SESSION['email']=$e;
        $_SESSION['pass']=$p;
    }else{ 
         echo "username exists...try another name..";
         sleep(3);
         header("location:login_page.html");
     }
     $stmt->close();
     $connection->close(); 
}
?>