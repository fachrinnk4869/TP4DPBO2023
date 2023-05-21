<?php

  class OrganisasiView {
    public function render($data){
      $no = 1;
      $dataOrganisasi = null;
      $dataOrganisasi = null;
      foreach($data['organisasi'] as $val){
        list($id, $nama) = $val;
        $dataOrganisasi .= "<tr>
                <td>" . $id . "</td>
                <td>" . $nama . "</td>";
        $dataOrganisasi .= "
            <td>
              <a href='tambahorganisasi.php?id_edit=" . $id .  "' class='btn btn-warning' '>Edit</a>
              <a href='organisasi.php?id_hapus=" . $id . "' class='btn btn-danger' '>Hapus</a>
            </td>";
        $dataOrganisasi .= "</tr>";
      }
      $dataOrganisasiHeader = "<tr>
                <th> No </th>
                <th> Nama </th>
                <th> Action </th>
              </tr>";
      $linkTambah = "tambahorganisasi.php";


      $tpl = new Template("templates/tabel.html");

      $tpl->replace("LINK_TAMBAH", $linkTambah);
      $tpl->replace("DATA_HEADER", $dataOrganisasiHeader);
      $tpl->replace("DATA_TABEL", $dataOrganisasi);
      $tpl->write(); 
    }
  }
?>