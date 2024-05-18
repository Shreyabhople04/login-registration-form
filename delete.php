<?php
    require_once "./conn.php";

    if(isset($_GET['id']))
    {
        $id=$_GET['id'];

        $query="SELECT `iname` FROM `students` WHERE `id`=$id";
        $result=mysqli_query($conn,$query);

        if ($result){
            $data=mysqli_fetch_assoc($result);

            $iname=$data['iname'];
            unlink("./uploads/".$iname);
        



        $query="DELETE FROM `students` WHERE `id`='$id' ";
        $result=mysqli_query($conn,$query);

        if($result)
        {

            ?>

                <script>
                    alert("Data DELETED Succesfully");
                    window.location.href="table.php";
                </script>   

            <?php
        }
        else
        {
            echo "Delete Failed";
        }

    }

}

?>