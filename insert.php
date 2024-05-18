<?php require_once "./conn.php";

// echo "<pre>";
// print_r($_POST);

if(isset($_POST['submit'])){

    $name= $_FILES['pic']['name'];
    $tmp_name= $_FILES['pic']['tmp_name'];
    $error= $_FILES['pic']['error'];
    $typr= $_FILES['pic']['type'];

    if ($error == 0){
        $filename = time() . $name;
        $path = "./uploads/" . $filename;
        move_uploaded_file($tmp_name, $path);
    
        $Fname=$_POST['Fname'];
        $Lname=$_POST['Lname'];
        $Gender=$_POST['Gender'];
        $State=$_POST['State'];
        $City=$_POST['City'];
        $Email=$_POST['Email'];
        $Phone=$_POST['codepno'].$_POST['Phone'];
        $Username=$_POST['username'];
        $pass=$_POST['pass'];
       // $pic=$_POST['pic'];
        $cpass=$_POST['cpass'];

    $query="INSERT INTO `students`(`Fname`,`Lname`,`Gender`,`State`,`City`,`Email`,`Phone`,`uname`,`pass`,`iname`,`cpass`) VALUES('$Fname','$Lname','$Gender','$State','$City','$Email','$Phone','$username','$pass','$filename','$cpass') ";
    $result=mysqli_query($conn,$query);

    if($result){
        ?>
        <script>
            alert("Data Saved Success");
            window.location.href="table.php";
        </script>


        <?php

        }else{
            echo "Insert Error";
        }
            }
        }

?>