<?php
require_once "connect.php";
//view the information of the student on this page if not enrolled(no entry in db) EITHER redirect to admission form OR display form link
if(isset($_POST['submit'])){
    if(!isset($_POST['checkname']) || !isset($_POST['checkenrollid'])){
        echo "please enter id and name!";
    }else{
        $checkname = mysqli_real_escape_string($con,$_POST['checkname']);
        $checkenrollid = mysqli_real_escape_string($con,$_POST['checkenrollid']);
        $sql = "select fees from student_info where name = '$checkname' and enroll_id = '$checkenrollid'";
        $result = mysqli_query($con,$sql);
        if(mysqli_num_rows($result)>0){
            $data = [];
            $fee = mysqli_fetch_assoc($result)['fees'];
            $sql2 = "select sb_id from st_sb where st_id = '$checkenrollid'";
            $res = mysqli_query($con,$sql2);
            if(mysqli_num_rows($res)>0){
                while($s = mysqli_fetch_assoc($res)){
                    $sbid = $s['sb_id'];
                    $sql3 = "select sub_fees,sub_name from subject_info where id = '$sbid'";
                    $sresult = mysqli_query($con,$sql3);
                    if(mysqli_num_rows($sresult)>0){
                        $sresult = mysqli_fetch_assoc($sresult);
                        $subjectname = $sresult['sub_name'];
                        $subjectfees = $sresult['sub_fees'];
                        $data["$subjectname"] = $subjectfees;
                    }
                }
            }
        }else{
            $error = "Invalid Enrollment Information!";
        }
        
    }
}
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="bootstrap/css/index.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="form-link">
            <a href ="enrollment-form.php">Enroll Here</a>
        </div>
<div class="container mt-10  row  mx-auto col-10 col-md-8 col-lg-6">
<form method="post" class=" mt-13 container bg-light " style="width:70%;height:50%;margin:10% auto;">
<div class="card-body">

    <div class="h5 mb-3 mt-3 text-center">Enter Your Enrollment Info</div>
    <?php
    if(isset($error)){?>
    <div class="alert alert-danger"><?=$error?></div>
    <?php
    }
    ?>
    <!-- <div class="row"> -->
    <div class="form-group mt-4 mb-2">
    <label for="checkname">Name: </label>
    <input type="text" class="form-control" id="checkname" name="checkname" required>
    </div>
    <div class="form-group mb-2">
        <label for="checkenrollid">Enrollment Id: </label>
        <input type="text" pattern="^[0-9]{3}$" class="form-control" id="checkenrollid" required name="checkenrollid">
    </div>
    <!-- </div> -->
    <div class="container mt-4 mb-1 text-center">
        <button type="submit" class="btn btn-info" name="submit">Check</button>
    </div></div>
</form>
</div>
<?php
if(isset($data)){
    // print_r($data);
    foreach($data as $k=>$v){
        echo $k .":-".($v??'8000');
        echo "<br>";
    }
}