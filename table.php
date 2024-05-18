<?php require_once "./conn.php"; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>table</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        body {
            background-color: pink;
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }
        .text-center {
            background-color: lightblue;
        }

        .img{
            border: 2px solid black;
            border-radius: 50px;

        }
        
        .img:hover{
            cursor: pointer;
            transform: scale(2.5);
            transition-duration: 2s;
        }

    </style>
</head>

<body>

    <h1 class="text-center">
        STUDENTS DATA
    </h1>

    <div class="container mt-5">
        <div class="d-flex justify-content-end">
            <a href="./form.php" class="btn btn-primary my-3">Add new</a>
        </div>

        <table class="table table-primary">
            <thead>
                <tr class="">
                    <th>sr.no</th>
                    <th>image</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th colspan="2">Action</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                $query="SELECT * FROM `students`";
                $result=mysqli_query($conn,$query);

                if($result){
                    $i=1;
                    while($data=mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo "<td>".$i."</td>";
                            echo "<td><img src='./uploads/".$data['iname']."' height='100px' width='100px' class='img' /></td>";
                            echo "<td>".$data['Fname']." ".$data['Lname']."</td>";
                            echo "<td>".$data['Gender']."</td>";
                            echo "<td>".$data['State']."</td>";
                            echo "<td>".$data['City']."</td>";
                            echo "<td>".$data['Email']."</td>";
                            echo "<td>".$data['Phone']."</td>";
                            echo "<td><a href='update.php?id=".$data['id']."'><i class='bi bi-pencil-square'></i></a></td>";
                            echo "<td><a href='javascript:void(0);' onclick='deletedata(".$data['id'].")' class='btn btn-danger'><i class='bi bi-trash3-fill'></i></a></td>";
                            echo "</tr>";
                        $i++;
                    }
                }

            ?>
            </tbody>
    </div>
    </table>
    <script>
        function deletedata(id)
        {
            let del = confirm("do you want to delete?");
            if(del)
            {
                window.location.href="delete.php?id="+id;
            }
        }
    </script>
</body>

</html>