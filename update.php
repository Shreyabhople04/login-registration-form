<?php

require_once "./conn.php"; 

if(isset($_GET['id'])){
    $id=$_GET['id'];

    
    $query="SELECT * FROM `students` WHERE `id`=$id";
    $result=mysqli_query($conn,$query);

    if($result){
        $data=mysqli_fetch_assoc($result);

        $Male="";
        $Female="";

        if($data['Gender']== 'Male'){
            $Male="checked";

        }
        else{
            $Female="checked";
        }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">

    <title>registration form</title>

</head>

<body>
    <div class="row container">
        <form action="update_data.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="id" id="id" value="<?php echo $data['id']; ?>">
            <center>    
                <h1>REGISTRATION FORM</h1>
            </center>
            <br>

            <div class="row">
                    <div class="input-box col-sm-8">
                        <label class="form-label"> <b>Upload image: </b>
                        <span class="teer"> * </span>
                        <input class="form-control" id="new" type="file" name="pic">
                        
                    </label>
                    </div>

                    <div class="col-sm-4">
                        <img height="100px" width="100px" margin-top="10px"  src="./uploads/<?php echo $data['iname']; ?>" id="box">
                        <input  type="hidden" name="oldpic" value="<?php echo $data['iname'];?>">
                    </div>
                </div>

                <div class="mt-2 col-md-12">
                    <label for="Firststudent" class="form-label"><b>First name:- <span class="star">*</span></b></label>
                    <input onkeyup="fnvalidation()" name="Fname" type="text" class="form-control form-control-sm form"
                        value="<?php echo $data['Fname']; ?>" id="Firststudent" placeholder="Enter First name">
                    <label class="error-input">Required</label>
                </div>

                <div class="mt-2 col-md-12">
                    <label for="Laststudent" class="form-label"><b>Last name:- <span class="star">*</span></b></label>
                    <input onkeyup="lnvalidation()" type="text" name="Lname" class="form-control form-control-sm form"
                        value="<?php echo $data['Lname']; ?>" id="Laststudent" placeholder="Enter Last name">
                    <label class="error-input">Required</label>
                </div>

                <div class="mt-2 col-md-12">
                    <label class="form-label"><b>Gender:- <span class="star">*</span></b></label><br>
                    <div class="form-check form-check-inline">

                        <input onchange="gendervalidation()" type="radio"  <?php echo $Male?> class="form-check-input form" value="Male"
                            id="Male" name="Gender" checked>
                        <label for="Male" class="form-check-label">
                            <b>Male</b>
                        </label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input onchange="gendervalidation()" type="radio" <?php echo $Female?> class="form-check-input form" value="Female"
                            id="Female" name="Gender">
                        <label for="female" class="form-check-label">
                            <b>Female</b>
                        </label>
                    </div>
                    <label class="error-input">Required</label>
                </div>

                <div class="row mt-2">
                    <div class="col-sm-6">
                        <label for="State" class="form-label"><b>State:- </b></label>
                        <select onchange="statevalidation()" class="form-select" name="State"  id="State"
                            aria-label="Default select example">
                            <option value="0">Select Your State</option>
                            <option value="MP">MP</option>
                            <option value="Gujarat">Gujarat</option>
                            
                        </select>
                    </div>
                    <div class="col-sm-6">
                        <label for="City" class="form-label"><b>City:- </b></label>
                        <select onchange="cityvalidation()" class="form-select" name="City"  id="City"
                            aria-label="Default select example">
                            <option value="0">Select Your City</option>
                            <option value="Surat">Surat</option>
                            <option value="Mumbai">Mumbai</option>
                            <option value="Vadodra">Vadodra</option>
                            <option value="Ahemdabad">Ahemdabad</option>
                            <option value="Bhavnagar">Bhavnagar</option>
                            <option value="Nagpur">Nagpur</option>
                            <option value="Pune">Pune</option>
                            <option value="Rajkot">Rajkot</option>
                            <option value="Gandhinagar">Gandhinagar</option>
                        </select>
                    </div>

                </div>
                
                <div class="row">
                    <div class="col-sm-6">
                        <label class="error-input">City Required.</label>
                    </div>
                    <div class="col-sm-6">
                        <label class="error-input">State Required.</label>
                    </div>
                </div>

                <div class="mt-2 col-md-12">
                    <label for="Email" class="form-label"><b>Email:- <span class="star">*</span></b></label>
                    <input onkeyup="emailvalidation()" type="email" class="form-control form-control-sm form"
                        name="Email" value="<?php echo $data['Email']; ?>" id="Email" placeholder="Enter your Email">
                    <label class="error-input">Email Required.</label>
                </div>

                <div class="mt-2 col-md-12">
                    <label for="Phone" class="form-label"><b>Phone no:- <span class="star">*</span></b></label>
                    <div class="row">
                        <div class="col-md-2">
                            <select class="form-select" id="City4545" name="codepno" aria-label="Default select example"
                                required>
                                <option>+1</option>
                                <option>+52</option>
                                <option>+61</option>
                                <option selected>+91</option>
                                <option>+81</option>
                                <option>+92</option>
                                <option>+64</option>
                            </select>
                        </div>
                        <div class="col-md-10">
                            <input onkeyup="phvalidation()" type="tel" class="form-control form" name="Phone" value="<?php echo $data['Phone']; ?>"
                                id="Phone" placeholder="Enter Phone Number">
                            <label class="error-input">Phone Number is Required.</label>
                            <!-- <label class="error-input">Phone Number should be 10 digits.</label> -->
                        </div>
                    </div>
                </div>

                <div class="mt-2 col-md-12">
                    <label for="username" class="form-label"><b>username:- <span class="star">*</span></b></label>
                    <input onkeyup="uservalidation()" type="username" class="form-control form-control-sm form"
                        name="username" value="<?php echo $data['uname']; ?>" id="user" placeholder="Enter your username">
                    <label class="error-input">Username Required.</label>
                </div>

                <div class="row">

                    <div class="col-sm-6">
                        <label class="form-label"><b>Password:- <span class="star">*</span></b></label>
                        <input onkeyup="passvalidation()" type="password" class="form-control form-control-sm form"
                            name="pass" value="<?php echo $data['pass']; ?>" id="password" placeholder="Enter your password">
                        <label class="error-input">password Required.</label>
                    </div>

                    <div class="col-sm-6">
                        <label class="form-label"><b>confirm Password:- <span class="star">*</span></b></label>
                        <input onkeyup="confirmvalidation()" type="password" class="form-control form-control-sm form"
                            name="cpass" value="<?php echo $data['cpass']; ?>" id="cpass" placeholder="Enter your password">
                        <label class="error-input">Confirm password Required.</label>
                    </div>
                </div>

                <div class="submit mt-4">
                    <button type="button" value="Submit" onclick="formvalidation()" class="btn btn-primary">Submit</button>
                    <button type="Reset" value="Reset" class="btn btn-danger">Reset</button>
                    <button type="submit" style="display: none;" name="submit" id="studentbtn"></button>
                </div>
        </form>
    </div>

    <script>

// const image=document.getElementById("box"),
//         input=document.getElementById("new");

//         input.addEventListener("change",()=>
//             {
//                 image.src=URL.createObjectURL(input.files[0]);
//             });




       document.getElementById("State").value="<?php echo $data['State']; ?>"
        document.getElementById("City").value="<?php echo $data['City']; ?>"



        const image=document.getElementById("box"),
        input=document.getElementById("new");

        input.addEventListener("change",()=>
            {
                image.src=URL.createObjectURL(input.files[0]);
            });


        function formvalidation() {
            fnvalidation();
            lnvalidation();
            gendervalidation();
            cityvalidation();
            statevalidation();
            emailvalidation();
            phvalidation();
            uservalidation();
            passvalidation();
            confirmvalidation();

            if (fnvalidation() && lnvalidation() && gendervalidation() && cityvalidation() && statevalidation() && emailvalidation() && phvalidation() && uservalidation() && passvalidation() && confirmvalidation()) {
                document.getElementById("studentbtn").click();
            }
        }


        function fnvalidation() {
            let fname = document.getElementById("Firststudent").value;
            let ferror = document.getElementsByClassName("error-input");
            // console.log(ferror);

            if (fname == '') {
                ferror[0].style = "display:block";
                return false;
            }
            else {
                ferror[0].style = "display:none";
                return true;
            }
        }

        function lnvalidation() {
            let lname = document.getElementById("Laststudent").value;
            let ferror = document.getElementsByClassName("error-input");

            if (lname == '') {

                ferror[1].style = "display:block";
                return false;
            }
            else {
                ferror[1].style = "display:none";
                return true;
            }
        }

        function gendervalidation() {
            let male = document.getElementById("Male");
            let female = document.getElementById("Female");
            let ferror = document.getElementsByClassName("error-input");

            if (male.checked || female.checked) {
                ferror[2].style = "display:none";
                return true;
            }
            else {
                ferror[2].style = "display:block";
                return false;
            }
        }

        function cityvalidation() {
            let city = document.getElementById("City").value;
            let ferror = document.getElementsByClassName("error-input");

            if (city == 0) {
                ferror[3].style = "display:block";
                return false;
            }
            else {
                ferror[3].style = "display:none";
                return true;
            }
        }

        function statevalidation() {
            let state = document.getElementById("State").value;
            let ferror = document.getElementsByClassName("error-input");

            if (state == 0) {
                ferror[4].style = "display:block";
                return false;
            }
            else {
                ferror[4].style = "display:none";
                return true;
            }
        }

        function emailvalidation() {
            let email = document.getElementById("Email").value;
            let ferror = document.getElementsByClassName("error-input");

            if (email == '') {
                ferror[5].style = "display:block";
                return false;
            }
            else {
                ferror[5].style = "display:none";
                return true;
            }
        }

        function phvalidation() {
            let phone = document.getElementById("Phone").value;
            let ferror = document.getElementsByClassName("error-input");

            if (phone == '') {
                ferror[6].style = "display:block";
                return false;
            }
            else {
                ferror[6].style = "display:none";
                return true;
            }
        }

        function uservalidation() {
            let username = document.getElementById("user").value;
            let ferror = document.getElementsByClassName("error-input");

            if (username == '') {
                ferror[7].style = "display:block";
                return false;
            }
            else {
                ferror[7].style = "display:none";
                return true;
            }
        }

        function passvalidation() {
            let password = document.getElementById("password").value;
            let ferror = document.getElementsByClassName("error-input");

            if (password == '') {
                ferror[8].style = "display:block";
                return false;
            }
            else {
                ferror[8].style = "display:none";
                return true;
            }
        }

        function confirmvalidation() {
            let confirmpassword = document.getElementById("cpass").value;
            let ferror = document.getElementsByClassName("error-input");

            if (confirmpassword == '') {
                ferror[9].style = "display:block";
                return false;
            }
            else {
                ferror[9].style = "display:none";
                 return true;
            }
    }
    </script>


   

</body>

</html>

<?php  } 

    }
?>