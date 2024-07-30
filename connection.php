<?php
$con=mysqli_connect("localhost","root","","bloodhub");
if(mysqli_connect_error()){
    echo"<script>Cannot connect to database</script>";
    exit();
}
?>