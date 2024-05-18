<?php require_once "./conn1.php";


if(isset($_POST['login'])){

$uname = $_POST['uname'];
$pass = $_POST['pass'];

$query="SELECT * FROM `login` WHERE `uname`='$uname' AND `pass`='$pass' ";
$result=mysqli_query($conn,$query);

if($result){


    if(mysqli_num_rows($result)>0){

       $data=mysqli_fetch_assoc($result);
   
        $_SESSION['logindata']=$data;
       ?>
       <script>
        alert("Login Successfully....");
        window.location.href="dashboard.php"
       </script>

       <?php

    }else{

        //echo "Invalid Username Or Password";
        ?>
        <script>
            alert(" invalid username or password");
            window.location.href="login.php"
        </script>
        <?php
        
    }
    
}


}

?>