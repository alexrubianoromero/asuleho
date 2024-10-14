<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/traductor/models/TraductorModel.php'); 
require_once($raiz.'/integrin/models/IntegrinModel.php'); 
// require_once($raiz.'/partes/models/PartesModel.php'); 
// require_once($raiz.'/movimientos/models/MovimientoParteModel.php'); 

class archivoWorldOfficeController
{
    protected $traductorModel;
    protected $integrinModel;
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
        // $this->partesModel = new PartesModel();
        // $this->MovParteModel = new MovimientoParteModel();

        if($_REQUEST['opcion']=='archivoWorldOffice')
        {
            $this->archivoWorldOffice();
        }

    }
   
    public function archivoWorldOffice()
    {
       $registros =  $this->integrinModel->traerRegistrosIntegrin(); 
       
       $this->generarTitulosArchivo();

       foreach ($registros as $registro)
       {
           $traduccion = $this->traductorModel->traerTraducccionXCodigoC($registro['codigo_c']); 
           echo '<tr>'; 
           echo $traduccion['empresa'];
           echo '</tr>';
           
        }
        echo '</table>';
    }

    public function generarTitulosArchivo()
    {
       ?>
        <>
            <tr>

                <th>Encab: Empresa</th>
                <th>Encab: Tipo Documento</th>
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
            <th>Detalle Con: Código Centro Costos
                </th>
            </tr>
            
            
            <?php
    }

    public function crearExcell()
    {

    }
    
}    