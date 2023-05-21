<?php

class Organisasi extends DB
{
    function getOrganisasiById($id)
    {
        $query = "SELECT * FROM organisasi WHERE id_organisasi='$id'";
        return $this->execute($query);
    }
    function getOrganisasi()
    {
        $query = "SELECT * FROM organisasi";
        return $this->execute($query);
    }

    function add($data)
    {
        $name = $data['name'];

        $query = "INSERT into organisasi values ('', '$name')";

        // Mengeksekusi query
        return $this->execute($query);
    }

    function delete($id)
    {

        $query = "DELETE FROM organisasi WHERE id_organisasi = '$id'";

        // Mengeksekusi query
        return $this->execute($query);
    }
    function update($data){
        // var_dump($data);
        // exit;
        $id = $data["id"];
        $name = $data["name"];

        $query = "UPDATE organisasi set nama_organisasi='$name' where id_organisasi='$id'";
        // $result = $conn->query($sql);
        return $this->executeAffected($query);
    }

}
