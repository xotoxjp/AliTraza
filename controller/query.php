<?php

require 'conexion.php';

class Query {

	var $coneccion;
	var $consulta;
	var $resultados;
	var $error;
	
	function Query()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->coneccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $consulta
	{
		//$this->consulta= mysql_query($cons,$this->coneccion->getConexion());
		$this->consulta = mysql_query($cons,$this->coneccion->getConexion());		
		return $this->consulta;
	}		
	function getResults()   // retorna la consulta en forma de result.
	{return $this->consulta;}
	
	function Close()		// cierra la conexion
	{$this->coneccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->consulta);}
	
	function getResultados() // devuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->coneccion->getConexion()) ;}

    function fetchAll()
    {
        $rows=array();
		if ($this->consulta)
		{
			while($row=  mysql_fetch_array($this->consulta))
			{
				$rows[]=$row;
			}
		}
        return $rows;
    }

    function __destruct(){

    	unset($this->coneccion);
		unset($this->consulta);
		unset($this->resultados);

		//echo "objeto query destruido correctamente!!!<br><br>";
    }
}