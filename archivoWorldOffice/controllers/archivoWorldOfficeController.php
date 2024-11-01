<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/traductor/models/TraductorModel.php'); 
require_once($raiz.'/integrin/models/IntegrinModel.php'); 
// require_once($raiz.'/archivoWorldOffice/views/archivoWorldOfficeView.php'); 
// require_once($raiz.'/partes/models/PartesModel.php'); 
// require_once($raiz.'/movimientos/models/MovimientoParteModel.php'); 

class archivoWorldOfficeController
{
    protected $traductorModel;
    protected $integrinModel;
    // protected $vista;
    // protected $partesModel;
    // protected $MovParteModel;

    public function __construct()
    {
        session_start();
        if(!isset($_SESSION['id_usuario']))
        {
            echo 'la sesion ha caducado';
            echo '<button class="btn btn-primary" onclick="irPantallaLogueo();">Continuar</button>';
            die();
        }
        $this->traductorModel = new TraductorModel();
        $this->integrinModel = new IntegrinModel();
        // $this->vista = new archivoWorldOfficeView();
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='archivoWorldOffice')
        {
            $this->archivoWorldOffice();
        }

    }
   
    public function archivoWorldOffice()
    {
        ?>

        <div class="col-lg-2">
            <!-- <a role="button" class="btn btn-primary"  href="generarExcell.php" target="_blank">Generar Archivo Excell</a> -->
            <a role="button" class="btn btn-primary mt-3"  href="generarPhpExcell.php" target="_blank">Generar Archivo Excell</a>
        </div>
        <?php

       $registrosIntegrin =  $this->integrinModel->traerRegistrosIntegrin(); 
       echo '<table class="table table-striped">';
       $this->generarTitulosArchivo();
       $i=1; 
       foreach ($registrosIntegrin as $registroItegrin)
       {
           $traduccion = $this->traductorModel->traerTraducccionXCodigoC($registroItegrin['codigo_c']); 
           $empresa  = $traduccion['empresa'];
           $verificar = $this->traductorModel->verificasTraducccionXCodigoC($registroItegrin['codigo_c']);
           if($verificar==0){
               $empresa = 'CODIGO '.$registroItegrin['codigo_c'].' NO ENCONTRADO EN TRADUCTOR '; 
           }
           echo '<tr>'; 
           echo '<td>'.$i.'</td>';
           echo '<td>'.$empresa.'</td>';
           echo '<td>'.$traduccion['tipoDocumento'].'</td>';
           echo '<td>'.$traduccion['periodo'].'</td>';
           echo '<td>'.$traduccion['documentoNumero'].'</td>';
           $ano = substr($traduccion['periodo'],0,2);
           $mes = substr($traduccion['periodo'],3,2);
           if($verificar==0){
               echo '<td></td>';
            }else{
                echo '<td>01-'.$mes.'-20'.$ano .'</td>';
            }

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
           //recorrer el campo y si encuentra un menos es negativo

            $cuentaWorldOffice = $traduccion['cuentasWorldOffice'];
                if(floatval($registroItegrin['ult_0']) < 0){
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
            echo '<td>'.$codTercero.'</td>';
            echo '<td></td>'; 
            
            switch ($traduccion['naturaleza']) 
            {
                case 'CR':
                    {
                        echo '<td>0</td>';
                        echo '<td>'.$registroItegrin['ult_0'].'</td>';
                        break;
                        
                    }
                    case 'DB':
                        {
                            echo '<td>'.$registroItegrin['ult_0'].'</td>';
                            echo '<td>0</td>';
                            break;
                        }
                    case 0:
                        {
                             if($registroItegrin['ult_0'] > 0)
                            {
                                echo '<td>0</td>';
                                // echo '<td>'.$registroItegrin['ult_t']*(-1).'</td>';
                                echo '<td>'.$registroItegrin['ult_0'].'</td>';
                                break;
                            }else{
                                 echo '<td>'.$registroItegrin['ult_0']*(-1).'</td>';
                                //  echo '<td>'.$registroItegrin['ult_t'].'</td>';
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
                $this->duplicarResgistroComoDebito($registroItegrin,$traduccion['cuentaTotal']);
           }
           $i++;
        }
        echo '</table>';
    }

    public function duplicarResgistroComoDebito($registroItegrin,$cuentaTotal)
    {
        $traduccion = $this->traductorModel->traerTraducccionXCodigoC($registroItegrin['codigo_c']); 
        echo '<tr>'; 
        echo '<td>'.$i.'</td>';
        echo '<td>'.$traduccion['empresa'].'</td>';
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
         $cuentaWorldOffice = $cuentaTotal;
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
         echo '<td>'.$codTercero.'</td>';
         echo '<td></td>'; 
               
            echo '<td>'.$registroItegrin['ult_0'].'</td>';
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



    public function generarTitulosArchivo()
    {
       ?>
            <tr>
                <th>id</th>
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
                <th>Detalle Con: Débito</th>
                <th>Detalle Con: Crédito</th>
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

    public function crearExcell()
    {

    }
    
}    