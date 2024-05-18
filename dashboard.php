<?php
require_once "./conn1.php";
if(!isset($_SESSION['logindata'])){
    header("Location:login.php");
}
// echo "Welcome Back...!!!";

// echo "<pre>";
// print_r($_SESSION);

echo $_SESSION['logindata']['id']. "<br>";
echo "Welcome ". $_SESSION['logindata']['uname']. "<br>";
echo $_SESSION['logindata']['email']. "<br>";
echo $_SESSION['logindata']['pass']. "<br>";

?>
<br><br>
<form action="./logout.php">

    <button type="submit">Log Out</button>
</form>