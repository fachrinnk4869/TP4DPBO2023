<?php
include_once("config/Config.php");
include_once("models/Member.model.php");
include_once("models/Organisasi.model.php");
include_once("views/Member.view.php");
include_once("views/Tambah.view.php");

class MemberController {
  private $member;
  private $organisasi;

  function __construct(){
    $this->member = new Member(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
    $this->organisasi = new Organisasi(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index() {
    $this->member->open();
    $this->organisasi->open();
    $this->member->getMemberJoin();
    $this->organisasi->getOrganisasi();
    
    $data = array(
      'member' => array(),
      'organisasi' => array()
    );
    while($row = $this->member->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['member'], $row);
    }
    while($row = $this->organisasi->getResult()){
      array_push($data['organisasi'], $row);
    }
    $this->member->close();
    $this->organisasi->close();

    $view = new MemberView();
    $view->render($data);
  }

  
  function add(){
    
    $this->member->open();
    $this->organisasi->open();
    $this->member->getMemberJoin();
    $this->organisasi->getOrganisasi();
    
    $data = array(
      'member' => array(),
      'organisasi' => array()
    );
    while($row = $this->member->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['member'], $row);
    }
    while($row = $this->organisasi->getResult()){
      array_push($data['organisasi'], $row);
    }
    $this->member->close();
    $this->organisasi->close();

    $view = new TambahView();
    $view->render($data);
  }

  function store($data){
    $this->member->open();
    $this->member->add($data);
    $this->member->close();
    
    header("location:index.php");
  }

  function edit($id){
    $this->member->open();
    $this->organisasi->open();
    $this->member->getMemberById($id);
    $this->organisasi->getOrganisasi();
    
    $data = array(
      'member' => array(),
      'organisasi' => array()
    );
    while($row = $this->member->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['member'], $row);
    }
    while($row = $this->organisasi->getResult()){
      array_push($data['organisasi'], $row);
    }
    $this->member->close();
    $this->organisasi->close();

    $view = new TambahView();
    $view->render($data);
  }
  function update($id){
    $this->member->open();
    $this->member->update($id);
    $this->member->close();

    header("location:index.php");
  }

  function delete($id){
    $this->member->open();
    $this->member->delete($id);
    $this->member->close();

    header("location:index.php");
  }

}