<?php

include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Organisasi.controller.php");

$organisasi = new OrganisasiController();
// var_dump($_POST);
if (isset($_POST['submit'])) {
  //memanggil add
  $organisasi->store($_POST);
}else if (!empty($_GET['id_edit'])) {
    //memanggil add
    $id = $_GET['id_edit'];
    $organisasi->edit($id);
} else if (isset($_POST['save'])) {
  //memanggil add
  // $id = $_POST['id_edit'];
  $organisasi->update($_POST);
}else{
    $organisasi->add();
}
