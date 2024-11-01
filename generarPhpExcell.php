<?php
$raiz = dirname(dirname(dirname(__file__)));
include('valotablapc.php'); 
require_once './PHPExcel/Classes/PHPExcel.php';
$registrosIntegrin =  traerRegistrosIntegrin($conexion); 

////////////
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


$objPHPExcel = new PHPExcel();
$objPHPExcel->setActiveSheetIndex(0);
$objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(60);
$objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('D')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('E')->setWidth(20);
$objPHPExcel->getActiveSheet()->getColumnDimension('F')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('G')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('H')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('I')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('J')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('K')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('L')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('M')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('N')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('O')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('P')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Q')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('R')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('S')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('T')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('U')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('V')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('W')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('X')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Y')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('Z')->setWidth(40);
$objPHPExcel->getActiveSheet()->getColumnDimension('AA')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AB')->setWidth(30);
$objPHPExcel->getActiveSheet()->getColumnDimension('AC')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AD')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AE')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AF')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AG')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AH')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AI')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AJ')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AK')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AL')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AM')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AN')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AO')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AP')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AQ')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AR')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AS')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AT')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AU')->setWidth(25);
$objPHPExcel->getActiveSheet()->getColumnDimension('AV')->setWidth(25);
$objPHPExcel->getActiveSheet()->setCellValue("A1", 'Encab: Empresa');
$objPHPExcel->getActiveSheet()->setCellValue('B1', 'Encab: Tipo Documento');
$objPHPExcel->getActiveSheet()->setCellValue('C1', 'Encab: Prefijo');
$objPHPExcel->getActiveSheet()->setCellValue('D1', 'Encab: Documento Número');
$objPHPExcel->getActiveSheet()->setCellValue('E1', 'Encab: Fecha');
$objPHPExcel->getActiveSheet()->setCellValue('F1', 'Encab: Tercero Interno');
$objPHPExcel->getActiveSheet()->setCellValue('G1', 'Encab: Tercero Externo');
$objPHPExcel->getActiveSheet()->setCellValue('H1', 'Encab: Nota');
$objPHPExcel->getActiveSheet()->setCellValue('I1', 'Encab: Verificado');
$objPHPExcel->getActiveSheet()->setCellValue('J1', 'Encab: Anulado');
$objPHPExcel->getActiveSheet()->setCellValue('K1', 'Encab: Sucursal');
$objPHPExcel->getActiveSheet()->setCellValue('L1', 'Encab: Clasificación');
$objPHPExcel->getActiveSheet()->setCellValue('M1', 'Encab: Personalizado 1');
$objPHPExcel->getActiveSheet()->setCellValue('N1', 'Encab: Personalizado 2');
$objPHPExcel->getActiveSheet()->setCellValue('O1', 'Encab: Personalizado 3');
$objPHPExcel->getActiveSheet()->setCellValue('P1', 'Encab: Personalizado 4');
$objPHPExcel->getActiveSheet()->setCellValue('Q1', 'Encab: Personalizado 5');
$objPHPExcel->getActiveSheet()->setCellValue('R1', 'Encab: Personalizado 6');
$objPHPExcel->getActiveSheet()->setCellValue('S1', 'Encab: Personalizado 7');
$objPHPExcel->getActiveSheet()->setCellValue('T1', 'Encab: Personalizado 8');
$objPHPExcel->getActiveSheet()->setCellValue('U1', 'Encab: Personalizado 9');
$objPHPExcel->getActiveSheet()->setCellValue('V1', 'Encab: Personalizado 10');
$objPHPExcel->getActiveSheet()->setCellValue('W1', 'Encab: Personalizado 11');
$objPHPExcel->getActiveSheet()->setCellValue('X1', 'Encab: Personalizado 12');
$objPHPExcel->getActiveSheet()->setCellValue('Y1', 'Encab: Personalizado 13');
$objPHPExcel->getActiveSheet()->setCellValue('Z1', 'Encab: Personalizado 14');
$objPHPExcel->getActiveSheet()->setCellValue('AA1', 'Encab: Personalizado 15');
$objPHPExcel->getActiveSheet()->setCellValue('AB1', 'Detalle Con: idCuentaContable');
$objPHPExcel->getActiveSheet()->setCellValue('AC1', 'Detalle Con: Nota');
$objPHPExcel->getActiveSheet()->setCellValue('AD1', 'Detalle Con: Tercero Externo');
$objPHPExcel->getActiveSheet()->setCellValue('AE1', 'Detalle Con: Cheque');
$objPHPExcel->getActiveSheet()->setCellValue('AF1', 'Detalle Con: Debito');
$objPHPExcel->getActiveSheet()->setCellValue('AG1', 'Detalle Con: Credito');
$objPHPExcel->getActiveSheet()->setCellValue('AH1', 'Detalle Con: Vencimiento');
$objPHPExcel->getActiveSheet()->setCellValue('AI1', 'Detalle Con: Centro Costos');
$objPHPExcel->getActiveSheet()->setCellValue('AJ1', 'Detalle Con: Activo Fijo');
$objPHPExcel->getActiveSheet()->setCellValue('AK1', 'Detalle Con: Tipo_Base');
$objPHPExcel->getActiveSheet()->setCellValue('AL1', 'Detalle Con: Porcentaje_Retención');
$objPHPExcel->getActiveSheet()->setCellValue('AM1', 'Detalle Con: BaseRetención');
$objPHPExcel->getActiveSheet()->setCellValue('AN1', 'Detalle Con: PagoRetención');
$objPHPExcel->getActiveSheet()->setCellValue('AO1', 'Detalle Con: IVAalCosto');
$objPHPExcel->getActiveSheet()->setCellValue('AP1', 'Detalle Con: Sucursal');
$objPHPExcel->getActiveSheet()->setCellValue('AQ1', 'Detalle Con: Importación');
$objPHPExcel->getActiveSheet()->setCellValue('AR1', 'Detalle Con: Caja Menor');
$objPHPExcel->getActiveSheet()->setCellValue('AS1', 'Detalle Con: Excluir NIIF');
$objPHPExcel->getActiveSheet()->setCellValue('AT1', 'Detalle Con: ImpoConsumoCosto');
$objPHPExcel->getActiveSheet()->setCellValue('AU1', 'Detalle Con: No Deducible');
$objPHPExcel->getActiveSheet()->setCellValue('AV1', 'Detalle Con: Código Centro Costos');

$i=2; 
foreach ($registrosIntegrin as $registroItegrin)
{
    $traduccion = traerTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion); 
    $empresa  = $traduccion['empresa'];
    $verificar = verificasTraducccionXCodigoC($registroItegrin['codigo_c'],$conexion);
    if($verificar==0){
        $empresa = 'CODIGO '.$registroItegrin['codigo_c'].' NO ENCONTRADO EN TRADUCTOR '; 
    }
        $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $empresa);
        $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $traduccion['tipoDocumento']);
        $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $traduccion['periodo']);
        $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $traduccion['documentoNumero']);
        $ano = substr($traduccion['periodo'],0,2);
        $mes = substr($traduccion['periodo'],3,2);
        if($verificar==0){
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, '');
         }else{
             $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, '01-'.$mes.'-20'.$ano );
         }
        $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$traduccion['cedulaCarga']);
        $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $traduccion['nit']);
        $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $traduccion['tipoNotaContable']);
        $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('K'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('L'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('M'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('N'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('O'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('P'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('R'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('S'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('T'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('U'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('V'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('W'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('X'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('Y'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('Z'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AA'.$i, '');
        $cuentaWorldOffice = $traduccion['cuentasWorldOffice'];
        if(floatval($registroItegrin['ult_0']) < 0){
            $cuentaWorldOffice = $traduccion['cuentaSecundariaWorldOffice'];
        }
        $objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, $cuentaWorldOffice);
        $objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, $traduccion['nota2']);
        $primeros6CaracteresCodPredio = substr($registroItegrin['codpredio'],0,6); 
        $primeros4CaracteresCodPredio = substr($registroItegrin['codpredio'],0,4); 
        $caracterNumero6 = substr($registroItegrin['codpredio'],5,1); 
        if($caracterNumero6 == '0'){
            $codTercero = $primeros4CaracteresCodPredio;
        }else{
            $codTercero = $primeros6CaracteresCodPredio;
        }
        $objPHPExcel->getActiveSheet()->setCellValue('AD'.$i,$codTercero);
        $objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, '');
        switch ($traduccion['naturaleza']) 
        {
            case 'CR':
                {
                    $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, 0);
                    $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $registroItegrin['ult_0']);
                    break;
                    
                }
                case 'DB':
                    {
                        $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $registroItegrin['ult_0']);
                        $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, 0);
                        break;
                    }
                    case 0:
                    {
                            if($registroItegrin['ult_0'] > 0)
                            {
                                
                                $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, 0);
                                // $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $registroItegrin['ult_t']*(-1));
                                $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, $registroItegrin['ult_0']);
                                // echo '<td>0</td>';
                                // echo '<td>'.$registroItegrin['ult_t']*(-1).'</td>';
                                break;
                            }else{
                                $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $registroItegrin['ult_0']*(-1));
                                $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, 0);
                                // echo '<td>'.$registroItegrin['ult_t']*(-1).'</td>';
                                // echo '<td>0</td>';
                                break;
                            }
                            
                    }
                    
        } //fin de switch
        $objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, $traduccion['fechaFin']);
        $objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AM'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AN'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AO'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AP'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AQ'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AR'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AS'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AT'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AU'.$i, '');
        $objPHPExcel->getActiveSheet()->setCellValue('AV'.$i, '');

        
        if($traduccion['nota1']=='FACTURACION RIEGO' || $traduccion['nota1']=='FACTURACION DERECHOS INACTIVOS'  ){
            //duplique el registro como debito por el mismo valor y cuentaTotal
            $i=$i+1;
            $objPHPExcel->getActiveSheet()->setCellValue('A'.$i, $empresa);
            $objPHPExcel->getActiveSheet()->setCellValue('B'.$i, $traduccion['tipoDocumento']);
            $objPHPExcel->getActiveSheet()->setCellValue('C'.$i, $traduccion['periodo']);
            $objPHPExcel->getActiveSheet()->setCellValue('D'.$i, $traduccion['documentoNumero']);
            $ano = substr($traduccion['periodo'],0,2);
            $mes = substr($traduccion['periodo'],3,2);
            $objPHPExcel->getActiveSheet()->setCellValue('E'.$i, '01-'.$mes.'-20'.$ano );
            $objPHPExcel->getActiveSheet()->setCellValue('F'.$i,$traduccion['cedulaCarga']);
            $objPHPExcel->getActiveSheet()->setCellValue('G'.$i, $traduccion['nit']);
            $objPHPExcel->getActiveSheet()->setCellValue('H'.$i, $traduccion['tipoNotaContable']);
              //     $objPHPExcel->getActiveSheet()->setCellValue('I'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('J'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('K'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('L'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('M'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('N'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('O'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('P'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('Q'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('R'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('S'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('T'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('U'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('V'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('W'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('X'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('Y'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('Z'.$i, '');
            $objPHPExcel->getActiveSheet()->setCellValue('AA'.$i, '');
            $cuentaWorldOffice = $traduccion['cuentaTotal'];
            $objPHPExcel->getActiveSheet()->setCellValue('AB'.$i, $cuentaWorldOffice);
            $objPHPExcel->getActiveSheet()->setCellValue('AC'.$i, $traduccion['nota2']);
            
                $primeros6CaracteresCodPredio = substr($registroItegrin['codpredio'],0,6); 
                $primeros4CaracteresCodPredio = substr($registroItegrin['codpredio'],0,4); 
                $caracterNumero6 = substr($registroItegrin['codpredio'],5,1); 
                if($caracterNumero6 == '0'){
                    $codTercero = $primeros4CaracteresCodPredio;
                }else{
                    $codTercero = $primeros6CaracteresCodPredio;
                }
                $objPHPExcel->getActiveSheet()->setCellValue('AD'.$i,$codTercero);
                $objPHPExcel->getActiveSheet()->setCellValue('AE'.$i, '');
                $objPHPExcel->getActiveSheet()->setCellValue('AF'.$i, $registroItegrin['ult_0']);
                $objPHPExcel->getActiveSheet()->setCellValue('AG'.$i, 0);
                
                    $objPHPExcel->getActiveSheet()->setCellValue('AH'.$i, $traduccion['fechaFin']);
                    $objPHPExcel->getActiveSheet()->setCellValue('AI'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AJ'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AK'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AL'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AM'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AN'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AO'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AP'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AQ'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AR'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AS'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AT'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AU'.$i, '');
                    $objPHPExcel->getActiveSheet()->setCellValue('AV'.$i, '');
       } //fiin de duplicar registro 



    $i++;        
}//fin de foreach




// Guardar el archivo Excel en formato .xlsx
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('archivo.xlsx');
// O enviar el archivo directamente al navegador:
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="archivo.xlsx"');
header('Cache-Control: max-age=0');
$objWriter->save('php://output');





?>