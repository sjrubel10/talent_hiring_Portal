<?php
include('main/init.php');
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 9/1/2022
 * Time: 1:32 AM
 */
$tablename="jobcircular";
$retrivebyvalue=$_GET['jobkey'];
$retrivefromcolumn='jobkey';
//$id=get_id_from_given_column($tablename,'jobkey',$retrivebyvalue);
$jobdata=get_data_from_table($tablename,$retrivefromcolumn,$retrivebyvalue);
//var_test_die($jobdata);
?>

<head>
    <title>Job Circular Upload </title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css" type="text/css" />

</head>
<body>
    <div class="container">
        <div class="card" style="width: 100%;border: 0px">
            <div class="card-body">
                <h5 class="card-title"><?php echo $jobdata[0]['jobtitlename']?></h5>
                <h6 class="card-subtitle mb-2"><span class="text-muted">Position: </span><?php echo $jobdata[0]['jobposition']?></h6>
                <p class="card-text"><?php echo $jobdata[0]['jobdescription']?></p>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>
    </div>

    <div id="overlay" style="display: block">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New User</h5>
                    <button type="button" class="close" >
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="model-body p-4">
                    <form action="#" method="post">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control form-control-lg" placeholder="name">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control form-control-lg" placeholder="email" >
                        </div>
                        <div class="form-group">
                            <input type="tel" name="phone" class="form-control form-control-lg" placeholder="phone number" >
                        </div>

                        <div class="form-group">
                            <input type="file" name="uploadimage" >
                        </div>

                        <div class="form-group">
                            <button class="btn btn-info btn-block btn-lg" >Add User</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</body>




<script>

</script>
