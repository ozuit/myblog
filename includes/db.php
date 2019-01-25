<?php

$host       = '127.0.0.1';
$user       = 'root';
$password   = 'passwd';
$db_name    = 'myblog';

$con = mysqli_connect($host, $user, $password, $db_name) or die('Can not connect database !');
mysqli_select_db($con, $db_name);
mysqli_set_charset($con,"utf8");

function esc($text) {
    global $con;
    return mysqli_real_escape_string($con, $text);
}

function db_get_all($sql) {
    global $con;
    $result = mysqli_query($con, $sql);
    $data = array();
    
    if ($result) {
        while ($row = mysqli_fetch_assoc($result)) {
            $data[] = $row;
        }
    }
    
    return $data;
}

function db_insert($table, $data) {
    global $con;
    $fields = array_keys($data);
    $e_data = array_map('esc', $data);
    
    $sql = "INSERT INTO `{$table}` (`" . implode('`, `', $fields). "`) VALUES ('"  . implode("', '", $e_data) . "')";
    mysqli_query($con, $sql);
    
    $inserted_id = mysqli_insert_id($con);
    return $inserted_id;
}

function db_update($table, $data, $where) {
    global $con;
    $fields = array_keys($data);
    $e_data = array_map('esc', $data);
    $sets = array();
    
    foreach ($fields as $field) {
        $sets[] = "{$field} = '{$e_data[$field]}'";
    }
    
    $sql = "UPDATE `{$table}` SET "  . implode(", ", $sets) . " WHERE {$where}";
    mysqli_query($con, $sql);
    
    return mysqli_affected_rows($con);
}


function db_delete($table, $where) {
    global $con;
    $sql = "DELETE FROM `{$table}` WHERE {$where}";
    mysqli_query($con, $sql);

    return mysqli_affected_rows($con);
}
