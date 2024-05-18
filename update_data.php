<?php require_once "./conn.php";

// echo "<pre>";
// print_r($_POST);

if(isset($_POST['submit'])){

    $old_image=$_POST['oldpic'];
    $new_image=$old_image;



    if(isset( $_FILES['pic'])){

        echo $name;

        $name= $_FILES['pic']['name'];
        $tmp_name= $_FILES['pic']['tmp_name'];
        $error= $_FILES['pic']['error'];
        $typr= $_FILES['pic']['type'];

        if ($error == 0){
            $filename = time() . $name;
            $path = "./uploads/" . $filename;
           if( move_uploaded_file($tmp_name, $path)){

            unlink("./uploads/".$old_image);
            $new_image=$filename;
           }
        }

    }

  
    // if ($error == 0){
        // $filename = time() . $name;
        // $path = "./uploads/" . $filename;
        // move_uploaded_file($tmp_name, $path);

            $id=$_POST['id'];
            $Fname=$_POST['Fname'];
            $Lname=$_POST['Lname'];
            $Gender=$_POST['Gender'];
            $State=$_POST['State'];
            $City=$_POST['City'];
            $Email=$_POST['Email'];
            $Phone=$_POST['codepno'].$_POST['Phone'];
            $uname=$_POST['username'];
            $pass=$_POST['pass'];
            $cpass=$_POST['cpass'];

        $query="UPDATE `students` SET `Fname`='$Fname',`Lname`='$Lname',`Gender`='$Gender',`State`='$State',
                `City`='$City',`Phone`='$Phone',`Email`='$Email',`uname`='$uname',`pass`='$pass',`cpass`='$cpass',`iname`='$new_image' WHERE `id`='$id' ";
        $result=mysqli_query($conn,$query);

    if($result){
    ?>
    <script>
        alert("Data Updated Success");
      //  window.location.href="table.php";
    </script>
    <?php
    }
    else
    {
        echo "Insert Error";
    }
}

?>