<?php
session_start();
require_once('../../utils/utility.php');
require_once('../../Database/dbhelper.php');
$user = getUserToken();
if($user==null){
    die();
}
if(!empty($_POST)){
    $action = getPost('action');
    switch ($action){
        case 'mark':
            markRead();
            break;
    }
    
}
function markRead(){
    $updated_at  = date("Y-m-d H:i:s");
    $id = getPost('id');
    $sql = "update feedback set status=1,updated_at='$updated_at' where id = $id";
    execute($sql);
    // echo $sql;
}
?>