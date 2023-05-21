<?php

include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Member.controller.php");
include_once("controllers/Organisasi.controller.php");

$member = new MemberController();

if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $member->delete($id);
}else{
    $member->index();
}
