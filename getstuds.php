<?php
    $text=$_REQUEST['text'];
    include('connectdB.php');
    if($text==''){
        $q= "select * from students";    
    }
    else{
        $q= "select * from students where name like '$text%'";
    }
    
    $result= mysqli_query($con,$q);
    $arr=[];
    while($res=mysqli_fetch_array($result)){
        array_push($arr,$res);
    }
    
    echo json_encode($arr);
?>