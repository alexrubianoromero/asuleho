<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class TraductorModel extends Conexion
{

    function verificasTraducccionXCodigoC($codigo)
    {
        $sql = "select * from traductor  where codigo_c = '".$codigo."'  ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $traductor = mysql_fetch_assoc($consulta);
        $filas = mysql_num_rows($consulta); 
        return $filas;
    }
    public function traerRegistrostraductor()
    {
        $sql = "select * from traductor ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $parametros = $this->get_table_assoc($consulta);
        return $parametros;
    }

    public function limpiarTablaTraductor()
    {
        $sql = "truncate traductor";
        $consulta = mysql_query($sql,$this->connectMysql());
    }
    public function limpiarTablaNombreArchivo()
    {
        $sql = "truncate cargue_nombre";
        $consulta = mysql_query($sql,$this->connectMysql());
    }

    public function traerTraducccionXCodigoC($codigo)
    {
        $sql = "select * from traductor  where codigo_c = '".$codigo."'  ";
        // die($sql); 
        $consulta = mysql_query($sql,$this->connectMysql());
        $traductor = mysql_fetch_assoc($consulta);
        return $traductor;
    }
    public function traerClienteFiltrado2($idCliente)
    {
        $sql = "select * from cliente0  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
   

    public function traerClienteId($id)
    {
        $sql = "select * from cliente0 where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }


}