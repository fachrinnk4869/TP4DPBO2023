<?php

include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Member.controller.php");
include_once("controllers/Organisasi.controller.php");

$member = new MemberController();
if (isset($_POST['submit'])) {
  //memanggil add
  $member->store($_POST);
}else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $member->edit($id);
} else if (isset($_POST['save'])) {
  //memanggil add
  // $id = $_POST['id_edit'];
  $member->update($_POST);
} else{
    $member->add();
}
