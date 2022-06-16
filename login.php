<?php

    function format($data){
        $data=trim($data);
        $data=stripslashes($data);
        $data=htmlspecialchars($data);
        return $data;
    }
    $u=format($_POST['username']);
    $p=format($_POST['pass']);
    $connection=new mysqli("localhost","root","","wanderlust");

    if(mysqli_connect_error())
        die('connect error('.mysqli_connect_errno().')'.mysqli_connect_error());
    else{
        $select="SELECT * FROM users where username='$u'";
        $result=mysqli_query($connection,$select);

        if(mysqli_num_rows($result)==1){
            $row=mysqli_fetch_assoc($result);

            if($row['pass']==$p){
                session_start();
                $_SESSION['username']=$row['username'];
                $_SESSION['email']=$row['email'];
                $_SESSION['pass']=$row['pass'];
                header("Location: surf.html");
            }else{
                sleep(3);
                echo "Invalid Credentails";
                header("Location:login_page.html");
            }
        }else{
            sleep(3);
            header("Location:login_page.html");
        }
    }
?>