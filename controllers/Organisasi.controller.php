<?php
include_once("config/Config.php");
include_once("models/Organisasi.model.php");
include_once("views/Organisasi.view.php");
include_once("views/TambahOrganisasi.view.php");

class OrganisasiController {
  private $organisasi;

  function __construct(){
    $this->organisasi = new Organisasi(Config::$db_host, Config::$db_user, Config::$db_pass, Config::$db_name);
  }

  public function index() {
    $this->organisasi->open();
    $this->organisasi->getOrganisasi();
    
    $data = array(
      'organisasi' => array()
    );
    while($row = $this->organisasi->getResult()){
      array_push($data['organisasi'], $row);
    }
    $this->organisasi->close();

    $view = new OrganisasiView();
    $view->render($data);
  }

  
  function add(){
    
    $data = array(
      'organisasi' => array()
    );

    $view = new TambahOrganisasiView();
    $view->render($data);
  }

  function store($data){
    $this->organisasi->open();
    $this->organisasi->add($data);
    $this->organisasi->close();
    
    header("location:organisasi.php");
  }

  function edit($id){
    $this->organisasi->open();
    $this->organisasi->getOrganisasiById($id);
    
    $data = array(
      'organisasi' => array()
    );
    while($row = $this->organisasi->getResult()){
      // echo "<pre>";
      // print_r($row);
      // echo "</pre>";
      array_push($data['organisasi'], $row);
    }
    $this->organisasi->close();
    // var_dump($data);
    $view = new TambahOrganisasiView();
    $view->render($data);
  }

  function update($data){
    $this->organisasi->open();
    $this->organisasi->update($data);
    $this->organisasi->close();

    header("location:organisasi.php");
  }

  function delete($id){
    $this->organisasi->open();
    $this->organisasi->delete($id);
    $this->organisasi->close();

    header("location:organisasi.php");
  }

}