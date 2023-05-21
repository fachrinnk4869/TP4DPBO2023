<?php

class Member extends DB
{
    function getMember()
    {
        $query = "SELECT * FROM member";
        return $this->execute($query);
    }
    function getMemberById($id)
    {
        $query = "SELECT * FROM member JOIN organisasi ON member.id_organisasi=organisasi.id_organisasi WHERE member.id_member=$id";
        return $this->execute($query);
    }
    function getMemberJoin()
    {
        $query = "SELECT * FROM member JOIN organisasi ON member.id_organisasi=organisasi.id_organisasi ORDER BY member.id_member";

        return $this->execute($query);
    }

    function add($data)
    {
        $id = $data['id_organisasi'];
        $name = $data['name'];
        $email = $data['email'];
        $phone = $data['phone'];
        $query = " INSERT INTO member VALUES ('', '$id', '$name', '$email', '$phone','' )";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function delete($id)
    {

        // $id = $data['id'];
        $query = "DELETE from member where id_member=$id";

        // Mengeksekusi query
        return $this->executeAffected($query);
    }

    function update($data){
        var_dump($data);
        $id = $data["id_member"];
        $id_organisasi = $data["id_organisasi"];
        $name = $data["name"];
        $email = $data["email"];
        $phone = $data["phone"];

        $query = "UPDATE member 
            set id_organisasi='$id_organisasi', 
            name='$name', 
            email='$email', 
            phone='$phone' 
            where id_member='$id'";
        // $result = $conn->query($sql);
        return $this->executeAffected($query);
    }
}


?>