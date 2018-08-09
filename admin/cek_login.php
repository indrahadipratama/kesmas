<?php
/**
 * Created by PhpStorm.
 * User: indra
 * Date: 10/08/2018
 * Time: 4:00
 */
  include "../config/database.php";

  $userid = $_POST['userid'];
  $passid = $_POST['passid'];

  $where = array("username" => $userid, "password" => $passid);

  $cek = $db->select_data("users", $where);
  if($cek != null){
     session_start();
     $_SESSION['username'] = $cek['username'];
     $_SESSION['namalengkap'] = $cek['nm_lengkap'];
     $_SESSION['level'] = $cek['level'];
     echo "true";
  }else{
      echo "false";
  }
?>