<?php

class TambahView
{
  public function render($data)
  {
    $dataTambah = null;
    $dataOrganisasi = null;
    // exit;
    if (isset($_GET['id_edit'])) {
      $member = $data['member'][0];
      $dataTambah .= "<label> NAME: </label>
      <input type='hidden' name='id_member' class='form-control' value='" . $member['id_member'] . "'> <br>
      <input type='text' name='name' class='form-control' value='" . $member['name'] . "'> <br>
      
      <label> EMAIL: </label>
      <input type='text' name='email' class='form-control' value='" . $member['email'] . "'> <br>
      
      <label> PHONE: </label>
      <input type='text' name='phone' class='form-control' value='" . $member['phone'] . "'> <br>
      
        <label> Organisasi: </label>";


      $dataTambah .= "<select class='form-select' name='id_organisasi' required>
        <option value=''>-- Pilih Organisasi --</option>";

      foreach ($data['organisasi'] as $row) {
        $dataTambah .= "<option value=" . $row['id_organisasi'] . " " . (($row['id_organisasi'] == $member['id_organisasi']) ? "selected" : " ") . ">" . $row['nama_organisasi'] . "</option>";
      }
      $dataTambah .= "</select>";
      $dataTambah .= "<button class='btn btn-success' type='submit' name='save'> Save </button><br>
        <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>";
    } else {
      // var_dump($data['organisasi']);
      $dataTambah .= "<label> NAME: </label>
        <input type='text' name='name' class='form-control' required> <br>
       
        <label> EMAIL: </label>
        <input type='text' name='email' class='form-control' required> <br>
       
        <label> PHONE: </label>
        <input type='text' name='phone' class='form-control' required> <br>
        <label> Organisasi: </label>";


      $dataTambah .= "<select class='form-select' name='id_organisasi' required>
      <option value=''>-- Pilih Organisasi --</option>";
      foreach ($data['organisasi'] as $row) {
        // var_dump($row);
        $dataTambah .= "<option value=" . $row['id_organisasi'] . ">" . $row['nama_organisasi'] . "</option>";
      }
      $dataTambah .= "</select>";
      $dataTambah .= "<button class='btn btn-success' type='submit' name='submit'> Submit </button><br>
        <a class='btn btn-info' type='submit' name='cancel' href='index.php'> Cancel </a><br>";
    }

    $linkTambah = "tambah.php";


    $tpl = new Template("templates/tambah.html");

    $tpl->replace("LINK_TAMBAH", $linkTambah);
    $tpl->replace("DATA_TABEL", $dataTambah);
    $tpl->write();
  }
}
