
<?php
include('../../main/init.php');
$is_admin=true;
    if($is_admin){
        if (!empty($_POST)) {
            if ($_POST !== false) {
                $getformdata = $_POST;
                $newarray=array(
                    "jobkey"=>substr(md5(microtime() . $getformdata['jobposition']), 0, 11),
                    "createtime"=>date("Y-m-d h:i:s"),
                    "recorded"=>1,
                    "publish"=>1,
                );
                $getjobcirculartitledata=array_merge($getformdata,$newarray);

                $table_name='jobcircular';
                $insert_pointer=insert_jobcirculartitledata($getjobcirculartitledata,$table_name);
                $success=array(
                    "success"=>true,
                    "jobkey"=>$getjobcirculartitledata["jobkey"]
                );
            }else{
                $success=array(
                    "success"=>false,
                    "jobkey"=>"Something went wrong"
                );
            }
        }else{
            $success=array(
                "success"=>false,
                "jobkey"=>"Something went wrong"
            );
        }
    }else{
        $success=array(
            "success"=>false,
            "jobkey"=>"Something went wrong"
        );
    }
/*}else{
    $success=false;
}*/
echo json_encode($success);
?>