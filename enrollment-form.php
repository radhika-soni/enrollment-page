
<?php
//validate checking at least 3 checkboxes;
//disable all other cbox after checking total 3 cboxes;
//add select input(name prop = "stream") with 3 streams(arts, science, commerce);
require_once "connect.php";
$max_sub = 3;
$sql = "select * from subject_info";
if(isset($_POST['submit'])){
    if(isset($_POST['Arts']) && count($_POST['Arts'])==3){
        // exit();

        $Arts = $_POST['Arts'];
        $fees = 0;
        $add = true;
        $t = 0;
        $p = 0;
        for($i=0;$i<count($Arts);$i++){
            $sql2 = "select sub_type,sub_fees from subject_info where id='$Arts[$i]'";
            $sub_info = mysqli_query($con,$sql2) or die(mysqli_error($con));
            if(mysqli_num_rows($sub_info)>0){
                $res = mysqli_fetch_assoc($sub_info);
                if($res['sub_type']=='T'){
                    $t++;
                }else{
                    $p++;
                }
                
                if($add){
                if(!isset($res['sub_fees'])){
                    $fees+=8000;
                    $add = false;
                }
                }else{
                    if(isset($res['sub_fees'])){
                        $fees+=$res['sub_fees'];
                    }
                }
            }
        }
        if($p==$max_sub){
            $error = "you must select at least one theoretical subject!";
            
        }else{
            $name = mysqli_real_escape_string($con,$_POST['name']);
            $address = mysqli_real_escape_string($con,$_POST['address']);
            $mobile = mysqli_real_escape_string($con,$_POST['mobile']);
            $insertion = "insert into student_info(name,address,mobile,fees) values('$name','$address','$mobile','$fees')";
            $result = mysqli_query($con,$insertion);
            $query = "select enroll_id from student_info where name = '$name' and mobile = '$mobile'";
            // echo $eid;
            $eid = mysqli_query($con,$query);
            // print_r($eid);
            // exit();
            if(mysqli_num_rows($eid)>0){
                $eid = mysqli_fetch_assoc($eid)['enroll_id'];
                // echo $eid;
                // die();
                for($x = 0;$x<count($Arts);$x++){
                $sbid = $Arts[$x];
                $insert2 = "insert into st_sb(st_id,sb_id) values('$eid','$sbid')";
                $stsb = mysqli_query($con,$insert2);
                unset($_POST);
            }
            }
    }
        // print_r($Arts);
    // echo $fees;
    }else{
        // echo "any checkbox in Arts stream not selected";
        $error = "Please select $max_sub subjects!";
    }

}
?>
<html>
    <head>
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <script src="bootstrap/js/enroll.js"></script>
        <script>
        function hideTable(){

            if(document.getElementById('table').style.visibility == "hidden"){
                document.getElementById('table').style.visibility = "visible";  
            }else{
            document.getElementById('table').style.visibility = "hidden";
            }}
        </script>
<!-- <style>
    #table{
        display:none;
    }
</style> -->
</head>
<body onload="hideTable()">

    <div class="container">
<form method="post">
 <div class="card-body bg-light">
 <div class="h3 text-center mb-3">
        Student Enrollment-Form
    </div>
    <div class="row g-2">
        <div class="col-md-6">
    <input type="text" class="form-control mb-4" autocomplete="off" name="name" id="name" placeholder="Name" value="<?=$_POST['name']??''?>" required>
    </div>
    
    <Div class="col-md-6">
    <input type="mobile" title="enter valid mobile number" autocomplete="off" pattern="^[7-9]{1}[0-9]{9}$" class="form-control mb-4" value="<?=$_POST['mobile']??''?>" name="mobile" id="mobile" placeholder="Mobile" required>
    </div>
    </div>
    <div class="row">
        <Div class="col-lg-12">
    <input type="text" class="form-control mb-4" name="address" autocomplete="off" id="address" placeholder="Address" value="<?=$_POST['address']??''?>" required style="height:60px">
    </div>
    </div>
    <div class="h6 mb-3">
    
    Subjects
    
    </div>
    <?php
    if(isset($error)){
    ?>
    <div class="container alert alert-danger" id = "error">
<?=$error;?>
    </div>
    <?php
    }?>
    <div id="subjects" >
    <?php
    $subjects = mysqli_query($con,$sql) or die(mysqli_error($con));
    if(mysqli_num_rows($subjects)>0){
        $value = 0;
        while($sub=mysqli_fetch_assoc($subjects)){
            // print_r($sub['id']);
            if($sub['sub_type']=='T'){
                $value++;
            }
    ?>
    <div class="form-check">
    <input type="checkbox" name="Arts[]" id="<?=$sub['sub_name']?>" value = "<?=$sub['id']?>" class="form-check-input" onclick="call()" >
    <label class="form-check-label" for="<?=$sub['sub_name']?>">
    <?php
    echo $sub['sub_name'];
    ?>
  </label>
  </div>
<?php
}}
?>
    </div>
    
    <div class="container">
    <!-- <div class="text-center"> -->
    <button class="mt-4 btn btn-Success" value="submit" id="submit" name ="submit" onclick="cbox(event)">Enroll</button>
    <!-- </div> -->
    </div>
    </div>

</form>
</div>
<hr>
<div class="container"><button name="info" onclick=hideTable() value="hide"class="border border-light">Check Subject Info</button> </div>


<hr>
<div class="container">
<table class="table table-striped table-bordered mb-5" id="table">
    <thead class="table-dark">
        <tr>
            <td>
                S.No.
            </td>
            <td>
                Subject Name
            </td>
            <td>
                Type    
            </td>
            <!-- <td>
                Fees
            </td> -->
        </tr>
    </thead>
    <tbody >
        <?php
        $subjects = mysqli_query($con,$sql);
        if(mysqli_num_rows($subjects)>0){
            $num=1;
            // $value = 0;
            while($sub=mysqli_fetch_assoc($subjects)){
                ?>
            <tr>
                <td>
                    <?=$num?>
                </td>
                <td>
                    <?=$sub['sub_name']?>
                </td>
                <td>
                    <?=($sub['sub_type']=='T')?'Theoretical':'Practical'?>
                </td>
                <!-- <td colspan="<?=$value?>"> -->
                    <!-- <?($sub['sub_stream']=='Arts')?++$value:"8000"?> -->
                    <!-- <?=($sub['sub_fees'])?$sub['sub_fees']:"-"?> -->
                    
                <!-- </td> -->
            </tr>
                <?php
                $num++;


            }
        }
        ?>

        </tr>
    </tbody>
    
</table>
</div>