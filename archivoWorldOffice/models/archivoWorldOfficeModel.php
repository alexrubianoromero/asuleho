<?php

$raiz =dirname(dirname(dirname(__file__)));
//  die('rutamodel '.$raiz);

require_once($raiz.'/conexion/Conexion.php');

class ArchivoWorldOfficeModel extends Conexion
{
    public function traerRegistrosIntegrin()
    {
        $sql = "select * from integrin ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $parametros = $this->get_table_assoc($consulta);
        return $parametros;
    }

    public function limpiarTablaIntegrin()
    {
        $sql = "truncate integrin";
        $consulta = mysql_query($sql,$this->connectMysql());
    }
    // public function limpiarTablaNombreArchivo()
    // {
    //     $sql = "truncate cargue_nombre";
    //     $consulta = mysql_query($sql,$this->connectMysql());
    // }

    public function traerClienteFiltrado($idCliente)
    {
        $sql = "select * from cliente0  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = mysql_fetch_assoc($consulta);
        return $cliente;
    }
    public function traerClienteFiltrado2($idCliente)
    {
        $sql = "select * from cliente0  where idcliente = '".$idCliente."' ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }
    public function grabarCliente($request)
    {
        $sql = "insert into cliente0  (nombre,identi,telefono,email,direccion,ciudad,idTipoContribuyente,sede)    
            values ('".$request['nombre']."','".$request['nit']."','".$request['telefono']."'
            ,'".$request['email']."'
            ,'".$request['direccion']."'
            ,'".$request['ciudad']."'
            ,'".$request['idTipoContribuyente']."'
            ,'".$request['sede']."'
            ) ";
        $consulta = mysql_query($sql,$this->connectMysql());
        // $clientes = $this->get_table_assoc($consulta);
        // return $clientes;
    }

    public function traerClienteId($id)
    {
        $sql = "select * from cliente0 where idcliente = '".$id."'  ";
        $consulta = mysql_query($sql,$this->connectMysql());
        $cliente = $this->get_table_assoc($consulta);
        return $cliente;
    }


}