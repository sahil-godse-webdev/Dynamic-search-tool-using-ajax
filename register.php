<?php
    $name=$_REQUEST['name'];
    $date=$_REQUEST['date'];
    
    //connecting to database
    include('connectdB.php');
    $q="insert into students (name,doj) values('$name','$date')";
    mysqli_query($con,$q);
    echo "Data inserted successfully!!";
?>