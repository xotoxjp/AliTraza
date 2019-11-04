<?php      

require 'query.php';

class Acceso{
    
    private $ID;
    private $pantalla;
    private $acceso;
    private $alta;
    private $baja;
    private $modifica;
    private $orden;
    private $proceso;
    private $query;
    
    
    public function __construct(){

        $this->id = "";
        $this->pantalla = ""; 
        $this->acceso = "";
        $this->alta = "";        
        $this->baja = "";
        $this->modifica = "";
        $this->orden = "";
        $this->proceso = "";                  
        $this->query = new Query();


    } 

    public function cargarAcceso($ID, $pantalla, $acceso, $alta, $baja, $modifica, $orden, $proceso){
       
       $this->setID($ID);
       $this->setPantalla($pantalla);
       $this->setAcceso($acceso);
       $this->setAlta($alta);
       $this->setBaja($baja);
       $this->setModifica($modifica);
       $this->setOrden($orden);
       $this->setProceso($proceso);
    } 
   

    /* SETTERS */
    
    public function setID($ID){
        $this->ID = $ID;
    }
    public function setPantalla($pantalla){
        $this->pantalla = $pantalla; 
    } 

    public function setAcceso($acceso){
        $this->acceso = $acceso;
    }
    
    public function setAlta($alta){
       $this->alta = $alta;	
    }

    public function setBaja($baja){
       $this->baja = $baja;	
    }

    public function setModifica($modifica){
       $this->modifica = $modifica;	
    }
     
    public function setOrden($orden){
       
       $this->orden = $orden;     
    }  
    
     public function setProceso($proceso){
       
       $this->proceso = $proceso;     
    }  

    /* GETTERS */
    
    public function getID(){

        return $this->ID;
    }
    
    public function getPantalla(){
        return $this->pantalla;  
    }

    public function getAcceso(){
        return $this->acceso;
    }
    
    public function getAlta(){
       return $this->alta;
    }

    public function getBaja(){
       return $this->baja;
    }

    public function getModifica(){
       return $this->modifica;
    }

    public function getOrden(){
        return $this->orden;
    }

    public function getProceso(){
        return $this->proceso;
    }
    
    /************************************************************************/

    public function agregarAccesos(){
        
        $SQL = "INSERT INTO accesos_op (id_usuario, pantalla, acceso, alta, baja, modifica, orden, proceso)
                VALUES ('".$this->getID()."' ,
                        '".$this->getPantalla()."',
                        '".$this->getAcceso()."',
                        '".$this->getAlta()."',
                        '".$this->getbaja()."',
                        '".$this->getModifica()."',
                        '".$this->getOrden()."',
                        '".$this->getProceso()."')";
        
        //echo $SQL;
        $this->query->executeQuery($SQL);
    }
    
    /************************************************************************/
    
    // public function editarAccesos($ID, $pantalla, $acc, $alta, $baja, $modifica, $orden, $proceso){
                    
    //     $acceso = new Acceso();        
    //     $acceso->cargarAcceso($ID, $pantalla, $acc, $alta, $baja, $modifica, $orden, $proceso);
        
    //     $SQL = " UPDATE accesos_op 
    //                  SET id_usuario='".$acceso->getID()."',                     
    //                     pantalla='".$acceso->getPantalla()."', 
    //                     acceso='".$acceso->getAcceso()."', 
    //                     alta='".$acceso->getAlta()."', 
    //                     baja='".$acceso->getBaja()."',
    //                     modifica='".$acceso->getModifica()."',
    //                     orden='".$acceso->getOrden()."',
    //                     proceso='".$acceso->getProceso()."'                      
    //                 WHERE id_usuario= ".$acceso->getID(); 
    //     //echo $SQL;
    //     $this->query->executeQuery($SQL);
    //     //$result = mysql_query( $SQL ) or die("Couldn't execute query.".mysql_error());  
           
    // }       
        
    /************************************************************************/
    
    public function getPantallas($nro_usuario){
        //       
        $SQL =  " SELECT pantalla FROM accesos_op WHERE id_usuario = ".$nro_usuario ;
        //$query = new Query(); 
        $this->query->executeQuery($SQL);
        $elementos = $this->query->getResultados();
        $rows = $this->query->fetchAll();
        for ($i=0; $i < $elementos ; $i++) {             
            $vector[$i] = $rows[$i][0];
        }        
        return $vector; 
    }

    /************************************************************************/          
    
    // public function getAccesoPantalla($nro_usuario){
    //     /*
    //     SELECT pantalla, orden, proceso FROM `accesos_op` WHERE `id_usuario`=25 ORDER BY `orden` ASC
    //     */       
    //     $SQL =  " SELECT pantalla, orden, proceso FROM accesos_op WHERE id_usuario = ".$nro_usuario;
    //     //$query = new Query(); 
    //     $this->query->executeQuery($SQL);        
    //     $rows = $this->query->fetchAll();
          
    //     return $rows; 
    // }    
      
    /************************************************************************/        
    
    public function buscarAcciones($nro_usuario){
        
        $SQL = " SELECT id_usuario, pantalla, acceso, alta, baja, modifica, orden, proceso  FROM accesos_op WHERE id_usuario = ". $nro_usuario;
        //$query = new Query(); 
        $this->query->executeQuery($SQL);
        $largo = $this->query->getResultados($SQL);
        $rows = $this->query->fetchAll();      
        
        return $rows;
    }   
    
    /************************************************************************/
    
    public function eliminarAcceso($nro_usuario){
 
        $SQL = " DELETE FROM accesos_op WHERE id_usuario= $nro_usuario"; 
        $this->query->executeQuery($SQL);

    }
    /************************************************************************/

    public function __destruct(){
          
        unset($this->ID);
        unset($this->pantalla);
        unset($this->acceso);
        unset($this->alta);
        unset($this->baja);
        unset($this->modifica);
        unset($this->orden);
        unset($this->proceso);
        
        //echo " objeto acceso destruido correctamente!!!!<br><br>";
    }

}// fin de clase