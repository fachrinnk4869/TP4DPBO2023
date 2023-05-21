<?php

  class TambahOrganisasiView {
    public function render($data){
      $dataTambah = null;
      $dataOrganisasi = null;
      if(!empty($data['organisasi'])){
        list($id, $nama) = $data['organisasi'][0];
        $dataTambah .= "<label> NAME: </label>
        <input type='hidden' name='id' class='form-control' value='".$id."'> <br>
        <input type='text' name='name' class='form-control' value='".$nama."'> <br>
       
       
        <button class='btn btn-success' type='submit' name='save'> Save </button><br>
        <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>";
      }else{
        $dataTambah .= "<label> NAME: </label>
        <input type='text' name='name' class='form-control'> <br>
       
       
        <button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
        <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>";
      }

      $linkTambah = "tambahorganisasi.php";


      $tpl = new Template("templates/tambah.html");

      $tpl->replace("LINK_TAMBAH", $linkTambah);
      $tpl->replace("DATA_TABEL", $dataTambah);
      $tpl->write(); 
    }
  }
?>