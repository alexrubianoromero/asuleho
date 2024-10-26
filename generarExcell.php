<?php

$raiz = dirname(dirname(dirname(__file__)));
include('valotablapc.php'); 
// require_once($raiz.'/integrin/models/IntegrinModel.php'); 
// require_once($raiz.'/traductor/models/TraductorModel.php'); 
// require_once($raiz.'/integrin/models/IntegrinModel.php'); 

// $traductorModel = new TraductorModel();
// $integrinModel = new IntegrinModel();

// echo 'buenas como esta';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename= archivo.xls");




$registrosIntegrin =  traerRegistrosIntegrin($conexion); 

echo '<table class="table table-striped">';
generarTitulosArchivo();

$i=1; 
foreach ($registrosIntegrin as $registroItegrin)
{
    // die('generar excell');
    $traduccion = traerTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion); 
    $resultado = verificasTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion);
    // echo '<pre>'; print_r($traduccion);   echo '</pre>';
    // die();
    $empresa  = $traduccion['empresa'];
    
    if($resultado==0){
        $empresa = 'CODIGO '.$registroItegrin['codigo_c'].' NO ENCONTRADO EN TRADUCTOR '; 
    }
    // echo '<pre>'; print_r($traduccion); echo '</pre>';
    // die();
 

    echo '<tr>'; 
    echo '<td>'.$empresa.'</td>';
    echo '<td>'.$traduccion['tipoDocumento'].'</td>';
    echo '<td>'.$traduccion['periodo'].'</td>';
    echo '<td>'.$traduccion['documentoNumero'].'</td>';
    $ano = substr($traduccion['periodo'],0,2);
    $mes = substr($traduccion['periodo'],3,2);
    echo '<td>01-'.$mes.'-20'.$ano .'</td>';
    echo '<td>'.$traduccion['cedulaCarga'].'</td>';
    echo '<td>'.$traduccion['nit'].'</td>';
    echo '<td>'.$traduccion['tipoNotaContable'].'</td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
     $cuentaWorldOffice = $traduccion['cuentasWorldOffice'];
         if($registroItegrin['ult_t'] < 0){
             $cuentaWorldOffice = $traduccion['cuentaSecundariaWorldOffice'];
         }
    echo '<td>'.$cuentaWorldOffice .'</td>';
    echo '<td>'.$traduccion['nota2'].'</td>';
    $primeros6CaracteresCodPredio = substr($registroItegrin['codpredio'],0,6); 
    $primeros4CaracteresCodPredio = substr($registroItegrin['codpredio'],0,4); 
    $caracterNumero6 = substr($registroItegrin['codpredio'],5,1); 
    if($caracterNumero6 == '0'){
        $codTercero = $primeros4CaracteresCodPredio;
     }else{
         $codTercero = $primeros6CaracteresCodPredio;
     }
     echo "<td>'".$codTercero."</td>";
    //  echo "<td>".addslashes($codTercero)."</td>";
     echo '<td></td>'; 
     
     switch ($traduccion['naturaleza']) 
     {
         case 'CR':
             {
                 echo '<td>0</td>';
                 echo '<td>'.$registroItegrin['ult_t'].'</td>';
                 break;
                 
             }
             case 'DB':
                 {
                     echo '<td>'.$registroItegrin['ult_t'].'</td>';
                     echo '<td>0</td>';
                     break;
                 }
             case 0:
                 {
                      if($registroItegrin['ult_t'] > 0)
                     {
                         echo '<td>0</td>';
                         echo '<td>'.$registroItegrin['ult_t']*(-1).'</td>';
                         break;
                     }else{
                          echo '<td>'.$registroItegrin['ult_t']*(-1).'</td>';
                         echo '<td>0</td>';
                         break;
                     }
                     

                         
                 }
     }
                 
         echo '<td>'.$traduccion['fechaFin'].'</td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
    echo '</tr>';
    

    if($traduccion['nota1']=='FACTURACION RIEGO' || $traduccion['nota1']=='FACTURACION DERECHOS INACTIVOS'  ){
         //duplique el registro como debito por el mismo valor y cuenta 14080211
         duplicarResgistroComoDebito($registroItegrin,$conexion,$traduccion);
    }
    $i++;
 }


echo '</table>';




/////////////////////////////////////////////////funciones



function duplicarResgistroComoDebito($registroItegrin,$conexion,$traduccion)
{
    $traduccion = traerTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion); 
    $resultado = verificasTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion);
    // echo '<pre>'; print_r($traduccion); echo '</pre>';
    // die(); 

    // echo '<td>'.$i.'</td>';
    $empresa  = $traduccion['empresa'];
    
    if($resultado==0){
        $empresa = 'CODIGO '.$registroItegrin['codigo_c'].'   NO ENCONTRADO EN TRADUCTOR ';
        return 0; 
    }
    echo '<tr>';
    echo '<td>'.$empresa.'</td>';
    echo '<td>'.$traduccion['tipoDocumento'].'</td>';
    echo '<td>'.$traduccion['periodo'].'</td>';
    echo '<td>'.$traduccion['documentoNumero'].'</td>';
    $ano = substr($traduccion['periodo'],0,2);
    $mes = substr($traduccion['periodo'],3,2);
    echo '<td>01-'.$mes.'-20'.$ano .'</td>';
    echo '<td>'.$traduccion['cedulaCarga'].'</td>';
    echo '<td>'.$traduccion['nit'].'</td>';
    echo '<td>'.$traduccion['tipoNotaContable'].'</td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
    echo '<td></td>';
     $cuentaWorldOffice = '14080211';
        //  if($registroItegrin['ult_t'] < 0){
        //      $cuentaWorldOffice = $traduccion['cuentaSecundariaWorldOffice'];
        //  }
    echo '<td>'.$cuentaWorldOffice .'</td>';
    echo '<td>'.$traduccion['nota2'].'</td>';
    $primeros6CaracteresCodPredio = substr($registroItegrin['codpredio'],0,6); 
    $primeros4CaracteresCodPredio = substr($registroItegrin['codpredio'],0,4); 
    $caracterNumero6 = substr($registroItegrin['codpredio'],5,1); 
    if($caracterNumero6 == '0'){
        $codTercero = $primeros4CaracteresCodPredio;
     }else{
         $codTercero = $primeros6CaracteresCodPredio;
     }
     echo "<td>'".$codTercero."</td>";

     echo '<td></td>';
     echo '<td>'.$registroItegrin['ult_t'].'</td>'; 
           
        echo '<td>0</td>';

         echo '<td>'.$traduccion['fechaFin'].'</td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
         echo '<td></td>';
    echo '</tr>';

}



function verificasTraducccionXCodigoC($codigo,$conexion)
{
    $sql = "select * from traductor  where codigo_c = '".$codigo."'  ";
    // die($sql); 
    $consulta = mysql_query($sql,$conexion);
    $traductor = mysql_fetch_assoc($consulta);
    $filas = mysql_num_rows($consulta); 
    return $filas;
}
function traerTraducccionXCodigoC($codigo,$conexion)
{
    $sql = "select * from traductor  where codigo_c = '".$codigo."'  ";
    // die($sql); 
    $consulta = mysql_query($sql,$conexion);
    $traductor = mysql_fetch_assoc($consulta);
    $filas = mysql_num_rows($consulta); 
    return $traductor;
}

function traerRegistrosIntegrin($conexion)
{
    $sql = "select * from integrin ";
    $consulta = mysql_query($sql,$conexion);
    $parametros = get_table_assoc($consulta);
    return $parametros;
}



function get_table_assoc($datos)
{
     $arreglo_assoc='';
    $i=0;	
    while($row = mysql_fetch_assoc($datos)){		
    $arreglo_assoc[$i] = $row;
    $i++;
    }
return $arreglo_assoc;
}

function generarTitulosArchivo()
{
   ?>
        <tr>
            <!-- <th>id</th> -->
            <th>Encab: Empresa</th>
            <th>Encab: Tipo Documento</th>
            <th>Encab: Prefijo</th>
            <th>Encab: Documento Número</th>
            <th>Encab: Fecha</th>
            <th>Encab: Tercero Interno</th>
            <th>Encab: Tercero Externo</th>
            <th>Encab: Tercero Nota</th>
            <th>Encab: Verificado</th>
            <th>Encab: Anulado</th>
            <th>Encab: Sucursal</th>
            <th>Encab: Clasificación</th>
            <th>Encab: Personalizado 1</th>
            <th>Encab: Personalizado 2</th>
            <th>Encab: Personalizado 3</th>
            <th>Encab: Personalizado 4</th>
            <th>Encab: Personalizado 5</th>
            <th>Encab: Personalizado 6</th>
            <th>Encab: Personalizado 7</th>
            <th>Encab: Personalizado 8</th>
            <th>Encab: Personalizado 9</th>
            <th>Encab: Personalizado 10</th>
            <th>Encab: Personalizado 11</th>
            <th>Encab: Personalizado 12</th>
            <th>Encab: Personalizado 13</th>
            <th>Encab: Personalizado 14</th>
            <th>Encab: Personalizado 15</th>
            <th>Detalle Con: idCuentaContable</th>
            <th>Detalle Con: Nota</th>
            <th>Detalle Con: Tercero Externo</th>
            <th>Detalle Con: Cheque</th>
            <th>Detalle Con: Debito</th>
            <th>Detalle Con: Credito</th>
            <th>Detalle Con: Vencimiento</th>
            <th>Detalle Con: Centro Costos</th>
            <th>Detalle Con: Actibo Fijo</th>
            <th>Detalle Con: Tipo_Base</th>
            <th>Detalle Con: Porcentaje_Retención</th>
            <th>Detalle Con: BaseRetención</th>
            <th>Detalle Con: PagoRetención</th>
            <th>Detalle Con: IVAalCosto</th>
            <th>Detalle Con: Sucursal</th>
            <th>Detalle Con: Importación</th>
            <th>Detalle Con: Caja Menor</th>
            <th>Detalle Con: Excluir NIIF</th>
            <th>Detalle Con: ImpoConsumoCosto</th>
            <th>Detalle Con: No Deducible</th>
            <th>Detalle Con: Código Centro Costos</th>
        </tr>
        <?php
}


?>