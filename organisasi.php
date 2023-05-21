<?php

include_once("models/Template.model.php");
include_once("models/DB.model.php");
include_once("controllers/Organisasi.controller.php");

$organisasi = new OrganisasiController();

if (!empty($_GET['id_hapus'])) {
    //memanggil add
    $id = $_GET['id_hapus'];
    $organisasi->delete($id);
}else{
    $organisasi->index();
}
