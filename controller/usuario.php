<?php
require 'acceso.php';
class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $login;
    private $password;
    private $nivel;
    private $ultimaEnt;
    private $progUtil;
    private $sector;
    private $menu;
    private $query;
    public $acceso;  
    public function __construct(){
        $this->id = "";
        $this->nombre = ""; 
        $this->email = "";
        $this->login = "";
        $this->password = "";
        $this->nivel="";
        $this->ultimaEnt="";
        $this->progUtil="";
        $this->sector="";
        $this->menu="";
        $this->query = new Query();
        $this->acceso = new Acceso();
    }
    public function cargarUsuario($id, $nombre, $email, $login, $password, $nivel, $ultimaEnt, $progUtil, $sector, $menu){   
        $this->setId($id);
        $this->setNombre($nombre); 
        $this->setEmail($email);
        $this->setLogin($login);
        $this->setPass($password);
        $this->setNivel($nivel);
        $this->setUltimaEnt($ultimaEnt);
        $this->setProgUtil($progUtil);
        $this->setSector($sector);
        $this->setMenu($menu);
    }
    /******* getters ********/
    public function getId(){
        return  $this->id; 
    }
    public function getNombre(){
        return  $this->nombre; 
    }    
    public function getEmail(){
        return  $this->email;
    }
    public function getLogin(){
        return  $this->login;       
    }
    public function getPass(){
        return  $this->password;
    }
    public function getNivel(){
        return  $this->nivel;                
    }
    public function getUltimaEnt(){
        return  $this->ultimaEnt;                
    }
    public function getProgUtil(){
        return  $this->progUtil;                
    }
    public function getSector(){
        return $this->sector;
    }
    public function getMenu(){
      return $this->menu;
    }
    /******* setters ********/
    public function setId($id){
        $this->id=$id; 
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }    
    public function setEmail($email){
        $this->email = $email;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setPass($password){
        $this->password = $password;
    }
    public function setNivel($nivel){
        $this->nivel = $nivel;
    }
    public function setUltimaEnt($ultimaEnt){
        $this->ultimaEnt = $ultimaEnt;
    }
    public function setProgUtil($progUtil){
        $this->progUtil = $progUtil;
    }
    public function setSector($sector){
        $this->sector = $sector;
    }
    public function setMenu($menu){
        $this->menu = $menu;
    }
    /*****************************************************************************************************/
    /*****************************************************************************************************/
    public function agregarUsuario(){
        $SQL = "INSERT INTO usuario (id_usuario, nombre, email, login, password, nivel, fec_ult_ut, prog_utl, sector, menu)
                VALUES ( NULL,
                         '".$this->getNombre()."',
                         '".$this->getEmail()."',
                         '".$this->getLogin()."',
                         '".$this->getPass()."',
                         '".$this->getNivel()."',
                         '".$this->getUltimaEnt()."',
                         '".$this->getProgUtil()."',
                         '".$this->getSector()."',
                         '".$this->getMenu()."')";
        //echo $SQL;       
        $this->query->executeQuery($SQL);           
        // if($this->query->executeQuery($SQL)){
        //     echo " USUARIO CARGADO CORRECTAMENTE!!!!<br><br>";
        // }
        // else{
        //     echo " ERROR!!! EL USUARIO NO PUDO CARGARSE... <br><br>";           
        // }                
    }
    /*****************************************************************************************************/ 
    public function editarUsuario($id,$nombre,$email, $login, $password, $nivel, $fec_ult_ut, $progUtil, $sector,$menu){
        $modo='EDIT';
        $usuario = new Usuario();
        $usuario->cargarUsuario($id,$nombre,$email,$login,$password,$nivel, $fec_ult_ut, $progUtil, $sector, $menu);
        $SQL =" UPDATE usuario 
                SET nombre='".$usuario->getNombre()."',                     
                    email='".$usuario->getEmail()."', 
                    login='".$usuario->getLogin()."', 
                    password='".$usuario->getPass()."', 
                    nivel='".$usuario->getNivel()."',
                    fec_ult_ut='".$usuario->getNivel()."',
                    prog_utl='".$usuario->getUltimaEnt()."',
                    sector='".$usuario->getSector()."',
                    menu='".$usuario->getMenu()."'  
                WHERE id_usuario= ".$usuario->getId();  
        //echo $SQL;
        $this->query->executeQuery($SQL);                
        // if($this->query->executeQuery($SQL)){
        //     echo " USUARIO EDITADO CORRECTAMENTE!!!!<br><br>";
        // }
        // else{
        //     echo " ERROR!!! EL USUARIO NO HA PODIDO SER CARGARDO... <br><br>";   
        // }
        return $modo;
    }
    /*****************************************************************************************************/
    public function eliminarUsuario($id){
        $SQL = " DELETE FROM usuario WHERE id_usuario =". $id;
        //$this->query->executeQuery($SQL);
        if ($this->query->executeQuery($SQL)){
            $response = $id;
            //echo " USUARIO ELIMINADO CORRECTAMENTE!!!<br><br>";            
        }
        // else{
        //   echo " ERROR!!! EL USUARIO NO HA SIDO ELIMINADO .... <br><br>";               
        // }
        return $response;
    }
    /*****************************************************************************************************/
    public function buscarUsuario($id){
        $rows = array();               
        $SQL = " SELECT id_usuario, nombre, email, login, password, nivel, fec_ult_ut, prog_utl, sector, menu FROM usuario WHERE id_usuario =".$id;
        $this->query->executeQuery($SQL);
        $row = $this->query->fetchAll();
        $usuario = new Usuario();
        $usuario->cargarUsuario($row[0][0],$row[0][1],$row[0][2],$row[0][3],$row[0][4],$row[0][5],$row[0][6],$row[0][7],$row[0][8],$row[0][9]);                        
        return $usuario;
    }
    /*****************************************************************************************************/
    public function listarUsuarios(){
        $vectorUsuarios = array();
        $SQL = " SELECT id_usuario, nombre, email, login, password, nivel, fec_ult_ut, prog_utl, sector, menu FROM usuario ";
        $this->query->executeQuery($SQL);
        $largo = $this->query->getResultados();        
        $rows = $this->query->fetchAll();
        for ($i=0; $i < $largo; $i++) {                     
            
            $usuario = new Usuario();
            $usuario->cargarUsuario($rows[$i][0],$rows[$i][1],$rows[$i][2],$rows[$i][3],$rows[$i][4],$rows[$i][5],$rows[$i][6],$rows[$i][7],$rows[$i][8],$rows[$i][9]);
            
            array_push($vectorUsuarios,$usuario);
        }   
        return $vectorUsuarios;
    }
    /*****************************************************************************************************/   
    public function verificarLogin($login){
        $SQL = "SELECT * FROM usuario WHERE login='".$login."'";
        $this->query->executeQuery($SQL);
        $filas = $this->query->getResultados();
        return $filas;
    }
    /*****************************************************************************************************/
    public function __destruct(){
       unset($this->id);
       unset($this->nombre);
       unset($this->email);
       unset($this->login);
       unset($this->password);
       unset($this->nivel);
       unset($this->ultimaEnt);
       unset($this->progUtil);
       unset($this->sector);
       unset($this->menu);
       //echo "objeto destruido correctamente!!!<br><br>";
    }
   /******************************************************************************************************/
}// FIN CLASE