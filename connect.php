<?php 
//DB connection file;
$hostname = "localhost";
$username = "root";
$dbname = "axis_college";
$password = "";
try{
    //procedural approach;
    $con = mysqli_connect($hostname,$username,$password,$dbname);
    
    //object-oriented approach;
    // $conn = new mysqli($hostname,$username,$password,$dbname);
    // $subject = $conn->query($sql);
    // if($subject->num_rows>0){
    //     while($sub = $subject->fetch_assoc()){
    //         // print_r($sub);
    //     }
    // }

}catch(exception $e){
    echo "connection failed";// echo $e;
}
echo "<br>";