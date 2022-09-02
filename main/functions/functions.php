<?php
/**
 * Created by PhpStorm.
 * User: Sj
 * Date: 8/31/2022
 * Time: 12:58 AM
 */

/*$createusertable="CREATE TABLE `talenthiring`.`users` ( `userid` INT(11) NOT NULL AUTO_INCREMENT , `name` VARCHAR(256) NOT NULL , `email` INT(128) NOT NULL , `phone` INT(11) NOT NULL , `cv` VARCHAR(128) NOT NULL , `approve` TINYINT(1) NOT NULL , PRIMARY KEY (`userid`), UNIQUE (`email`), UNIQUE (`phone`)) ENGINE = InnoDB CHARSET=utf8 COLLATE utf8_general_ci;";

$createjobtable="CREATE TABLE `jobcircular` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `jobkey` VARCHAR(11) NOT NULL , `jobtitlename` VARCHAR(512) NOT NULL , `jobposition` VARCHAR(512) NOT NULL , `jobdescription` VARCHAR(1024) NOT NULL , `createtime` DATETIME NOT NULL , `timeoffset` INT(1) NOT NULL DEFAULT '6' , `applyenddate` DATETIME NOT NULL , `recorded` TINYINT(1) NOT NULL , `publish` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;";*/

//$db = Db_connect::getInstance()->getConnection();
function var_test_die($obj){
    echo '<pre>';
    die(var_dump($obj));
}
function sanitize($data){
    $db = Db_connect::getInstance()->getConnection();
    return htmlentities(strip_tags(mysqli_real_escape_string($db, $data)));
}
function get_multiple_types($values){
    $types_string = null;
    foreach ($values as $value){
        $type = gettype($value);
        if($type == 'integer'){
            $types_string = $types_string.'i';
        }else if($type == 'string'){
            $types_string = $types_string.'s';
        }
    }
    return $types_string;
}
function insert_jobcircular_data($fields_data,$table_name){
//    var_test_die($fields_data);
    $mysqli = Db_connect::getInstance()->getConnection();
    $params = $data_types_array = array();
    $fields_string = $query_values= null;

    foreach($fields_data as $field => &$value){
        $params[] = &$value;
        $data_types_array[] = $value;
        $fields_string = $fields_string.'`'.$field.'`,';
        $query_values = $query_values.'?,';
    }
    $data_types_string = get_multiple_types($fields_data);
    $fields_string = trim($fields_string,',');
    $query_values = trim($query_values,',');
    $parameter_values = array_merge(array($data_types_string), $params);
    $query = "INSERT INTO  `$table_name` (".$fields_string.") VALUES (".$query_values.")";
    $statement = $mysqli->prepare($query);
    call_user_func_array(array($statement, 'bind_param'), $parameter_values);
    $statement->execute();
    if ($statement === false) {
        $last_actionid= 0;
    }else{
        $last_actionid = $statement->insert_id;
    }
    $statement->close();
    return $last_actionid;
}
function insert_jobcirculartitledata($fields_data,$table_name){
//    var_test_die($fields_data);
    $mysqli = Db_connect::getInstance()->getConnection();
    $params = $data_types_array = array();
    $fields_string = $query_values= null;

    foreach($fields_data as $field => &$value){
        $params[] = &$value;
        $data_types_array[] = $value;
        $fields_string = $fields_string.'`'.$field.'`,';
        $query_values = $query_values.'?,';
    }
    $data_types_string = get_multiple_types($fields_data);
    $fields_string = trim($fields_string,',');
    $query_values = trim($query_values,',');
    $parameter_values = array_merge(array($data_types_string), $params);
    $query = "INSERT INTO  `$table_name` (".$fields_string.") VALUES (".$query_values.")";
    $statement = $mysqli->prepare($query);
    call_user_func_array(array($statement, 'bind_param'), $parameter_values);
    $statement->execute();
    if ($statement === false) {
        $last_actionid= 0;
    }else{
        $last_actionid = $statement->insert_id;
    }
    $statement->close();
    return $last_actionid;
}

function get_id_from_given_column($tablename,$column_name,$column_value){
    $column_name = sanitize($column_name);
    $users_pointer=null;
    $mysqli = Db_connect::getInstance()->getConnection();
    $query="SELECT `id` FROM `$tablename` WHERE `$column_name` = ? AND `recorded`=1";
    $statement = $mysqli->prepare($query);
    $statement->bind_param("s", $column_value);
    $statement->execute();
    $users_pointer = $statement->get_result()->fetch_assoc()['id'];
    $statement->close();
    return $users_pointer;
}

function get_data_from_table($tablename,$retrivefromcolumn,$retrivebyvalue){
    $registration_data=array();
    $db = Db_connect::getInstance()->getConnection();
    $query="SELECT `id`,`jobkey`,`jobtitlename`,`jobposition`,`jobdescription`,`timeoffset`,`applyenddate`,`recorded`,`publish` FROM `$tablename` WHERE `$retrivefromcolumn`='$retrivebyvalue'";
    $st = $db->prepare($query);
    $st->execute();
    $st->bind_result($id,$jobkey,$jobtitlename,$jobposition,$jobdescription,$timeoffset,$applyenddate,$recorded,$publish);
    $st->store_result();
    while($st->fetch()){
        $registration_data[] = array(
            'jobkey'=>$jobkey,
            'jobtitlename'=>$jobtitlename,
            'jobposition'=>$jobposition,
            'jobdescription'=>$jobdescription,
            'applyenddate'=>$applyenddate,
            'recorded'=>$recorded,
            'publish'=>$publish,
        );
    }
    $st->close();
    return array_values($registration_data);
}
