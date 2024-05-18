<?php require_once "./conn1.php";

if(isset($_POST['log'])){
$uname=$_POST['uname'];
$email=$_POST['email'];
$pass=$_POST['pass'];

$query="INSERT INTO `login`(`uname`,`email`,`pass`) VALUES('$uname','$email','$pass')";
$result=mysqli_query($conn,$query);

if($result){
    ?>
    <script>
        alert("Data Saved Success");
        window.location.href="login.php"
    </script>


    <?php

    }else{
        echo "Insert Error";
    }
        
    
}
?>