<?php
    $connection=new mysqli("localhost","root","","wanderlust");
    session_start();
    $u=$_SESSION['username'];
    $result=mysqli_query($connection,"SELECT * FROM users WHERE username='$u'");
    $row=mysqli_fetch_assoc($result);
    $i=$row['id'];
    $p=$_POST['place'];
    $c=$_POST['city'];

    $file=$_FILES['file'];
    $fileName=$file['name'];
    $fileName1=basename($_FILES['file']['name'],".jpg");
    $fileTmpName=$file['tmp_name'];
    $fileSize=$file['size'];
    $fileError=$file['error'];
    $fileType=$file['type'];

    $fileExt= explode('.',$fileName);
    $fileActualExt = strtolower(end($fileExt));


        if($fileError == 0){
            if($fileSize < 1000000){
                $fileNameNew = uniqid('', TRUE).".".$fileActualExt;
                $fileDestination = 'uploads/'.$fileNameNew;
                move_uploaded_file($fileTmpName,$fileDestination);

                $sql = "INSERT INTO image VALUES ('$i','$fileName','$p','$c')";
                mysqli_query($connection,$sql);

                header("Location : TravelDairies.html");

            }else{
                echo "Your file is too big";
            }

        }else{
            echo "There is error in uploading the file";
        }

    
?>