<?php
//include_once 'dbconfig.php';
//require 'dbconfig.php';
include('main/init.php');
$microtime=microtime();
//$profilekey=$_SESSION['user_logged_in_data']['profilekey'];
$questiontitlemd5=md5($microtime.'questiontitle'.$profilekey);
$md5jobcircular=md5($microtime.'questions'.$profilekey);
?>
<head>
    <title>Job Circular Upload </title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/jquery-ui.js" type="text/javascript"></script>
    <script src="js/jquery.md5.js" type="text/javascript"></script>

</head>
<body>
<div id="header">
    <label>Job Circular Upload</label>
</div>
<div class="circularformholder">
    <form class="circularformcontainer" id="jobcircularform" action="main/jsvalidation/jsuploadjobcircular.php" method="post" enctype="multipart/form-data">
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="inputEmail4">Job title</label>
                    <input type="text" name="jobtitlename" class="form-control" id="jobtitle" placeholder="job title">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Position</label>
                <input type="text" class="form-control" name="jobposition" id="jobposition" placeholder="Position">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Job Description</label>
                <input type="text" class="form-control" name="jobdescription" id="description" placeholder="job description">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Last date of application</label>
                <input type="text" class="form-control" name="applyenddate" id="endDate" placeholder="last date of application">
            </div>

            <div class="form-group">
                <div class="sendbuttonholder"><button type="submit" class="btn btn-primary">Create Job Circular</button></div>
            </div>

<!--        <div class="sendbuttonholder"><button class="sendbutton" type="submit" name="btn-upload">upload</button></div>-->
    </form>

</div>



</body>
<script>
    $(function () {
        $("#endDate").datepicker({ dateFormat: 'yy-mm-dd:' });
    });

var clickcount=1;
    $('#jobcircularform').submit(function(e) {
        data = $('#jobcircularform').serialize();
        console.log(data);
        $.ajax({
            url: 'main/jsvalidation/jsuploadjobcircular.php',
            type: 'POST',
            data: data,
            success: function(response) {
                var result= JSON.parse(response);
                console.log(result);
                if(result["success"]===true){
                    window.location.replace("jobcircular/"+result["jobkey"]+"");
                }else{
                    alert('Something went wrong');
                }
            }
        });
        e.preventDefault();
    });
</script>
