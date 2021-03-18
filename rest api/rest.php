<?php
require_once("db.php");
require_once("untill.php");
$debug_mode = false;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    debug_text("GET METHOD Process...", $debug_mode);
    echo json_encode(show_data($debug_mode));
}else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    debug_text("POST METHOD May be implement soon...", $debug_mode);
    $message = array("Status" => print_r($_POST));
    add_data($_POST['u_name'], $_POST['u_age'], $debug_mode);
    echo json_encode($message);
}else{
    debug_text("May be implement soon...", $debug_mode);
    http_response_code(405);
}

function show_data($debug_mode) {
    $mydb = new DB("root", "", "personal", $debug_mode);
    $data = $mydb->query("SELECT * FROM data");
    return $data;
}

function add_data($name, $age, $debug_mode) {
    $mydb = new DB("root", "", "personal", $debug_mode);
    $data = $mydb->insert("INSERT INTO data (`name`, `age`) VALUES ('{$name}', '{$age}')");
}