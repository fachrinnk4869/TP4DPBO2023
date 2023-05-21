<?php

  class MemberView {
    public function render($data){
      $no = 1;
      $dataMember = null;
      $dataOrganisasi = null;
      foreach($data['member'] as $val){
        // list($id, $nama, $email, $phone, $join_date) = $val;
        $dataMember .= "<tr>
                <td>" . $val['id_member'] . "</td>
                <td>" . $val['name'] . "</td>
                <td>" . $val['nama_organisasi'] . "</td>
                <td>" . $val['email'] . "</td>
                <td>" . $val['phone'] . "</td>
                <td>" . $val['join_date'] . "</td>";
        $dataMember .= "
            <td>
              <a href='tambah.php?id_edit=" . $val['id_member'] .  "' class='btn btn-warning' '>Edit</a>
              <a href='index.php?id_hapus=" . $val['id_member'] . "' class='btn btn-danger' '>Hapus</a>
            </td>";
        $dataMember .= "</tr>";
      }
      $dataMemberHeader = "<tr>
                <th> No </th>
                <th> Nama </th>
                <th> Nama Organisasi </th>
                <th> Email </th>
                <th> Phone </th>
                <th> Join Date </th>
                <th> Action </th>
              </tr>";
      $linkTambah = "tambah.php";


      $tpl = new Template("templates/tabel.html");

      $tpl->replace("LINK_TAMBAH", $linkTambah);
      $tpl->replace("DATA_HEADER", $dataMemberHeader);
      $tpl->replace("OPTION", $dataOrganisasi);
      $tpl->replace("DATA_TABEL", $dataMember);
      $tpl->write(); 
    }
  }
?>