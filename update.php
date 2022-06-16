
<?php
function format($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
}

$np=format($_POST['pass2']);
$op=format($_POST['pass1']);
$e=format($_POST['email']);

$connection=new mysqli("localhost","root","","wanderlust");

if(mysqli_connect_error()){
    die('connection error('. mysqli_connect_errno(). ')'. mysqli_connect_error());
}else{
    session_start();
    $u=$_SESSION['username'];
    $p=$_SESSION['pass'];
        if($p==$op){
            $connection->query("UPDATE users SET pass='$np' Where username='$u'");
            $connection->query("UPDATE users SET email='$e' Where username='$u'");
            sleep(3);
            header('Location:surf.html');
        }
    $connection->close();
}
?>    