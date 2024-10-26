<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/traductor/models/TraductorModel.php'); 
// require_once($raiz.'/subtipos/models/SubtipoParteModel.php'); 
// require_once($raiz.'/marcas/models/MarcaModel.php'); 

class traductorView
{
 protected $model; 
//  protected $tipoContriModel; 

 public function __construct()
 {
    $this->model= new TraductorModel(); 
    // $this->tipoContriModel= new TipoContribuyenteModel(); 
 }   
 

 public function traductorMenu()
    {
        ?>
        <div  style="padding:5px;">
            <!-- <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div>
            <div class="col-lg-2"></div> -->
            <div  class="row" id="botones" class="mt-3 " >
                <!-- <div class="col-lg-2">
                    <button type="button" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalNuevoHardware"
                    class="btn btn-primary " 
                    onclick="formuNuevoHardware()"
                    >
                    Nuevo Hardware
                    </button>
                </div> -->
                <div class="col-lg-2">
                    <button type="button" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalSubirArchivo"
                    class="btn btn-primary  float-right" 
                    onclick="formularioSubirArchivo()"
                    >
                        Subir Archivo
                    </button>
                </div>
             

            </div>
          
            <div id="divResultadosTraductor" class="mt-3">
                <?php  
                     $this->mostrarInfoTraductor();  
                        
                ?>
                </div>
                
                
                
                <?php  
            // $this->modalInventario();  
            // $this->modalInventarioMostrar();  
            $this->modalSubirArchivo();  
            // $this->modalHardwareMostrar();  
            // $this->modalAgregarRam();  
            // $this->modalNuevoHardware();  
            // $this->modalDividirRam();  
            // $this->modalFiltros();  
            ?>

            
            
        </div>
        <?php
    }



 public function mostrarInfoTraductor()
 {
    $reglas = $this->model->traerRegistrostraductor();
    echo '<table class="table table-striped">';
        echo '<tr>'; 
        echo '<th>Tipo Nota Contable</th>';
        echo '<th>Codigo_c</th>';
        echo '<th>nconcep</th>';
        echo '<th>cuentasWorldOffice</th>';
        echo '<th>cuentaSecundariaWorldOffice</th>';
        echo '<th>naturaleza</th>';
        echo '<th>Nombre_de_la_empresa</th>';
        echo '<th>periodo.</th>';
        echo '<th>documentoNumero.</th>';
        echo '<th>fechaFin	.</th>';
        echo '<th>nota1.</th>';
        echo '<th>documento.</th>';
        echo '<th>tipoDocumento.</th>';
        echo '<th>cedulaCarga.</th>';
        echo '<th>nit.</th>';
        echo '<th>sucursal.</th>';
        echo '<th>nota2.</th>';
        echo '<th>cuenta total</th>';
        echo '</tr>';
        foreach($reglas as $regla)
        {
            // $tipoCont =  $this->tipoContriModel->traerTipoId($cliente['idTipoContribuyente']);
            echo '<tr>'; 
            echo '<td>'.$regla['tipoNotaContable'].'</td>'; 
            echo '<td>'.$regla['codigo_c'].'</td>'; 
            echo '<td>'.$regla['nconcep'].'</td>'; 
            echo '<td>'.$regla['cuentasWorldOffice'].'</td>'; 
            echo '<td>'.$regla['cuentaSecundariaWorldOffice'].'</td>'; 
            echo '<td>'.$regla['naturaleza'].'</td>'; 
            echo '<td>'.$regla['empresa'].'</td>'; 
            echo '<td>'.$regla['periodo'].'</td>'; 
            echo '<td>'.$regla['documentoNumero'].'</td>'; 
            echo '<td>'.$regla['fechaFin'].'</td>'; 
            echo '<td>'.$regla['nota1'].'</td>'; 
            echo '<td>'.$regla['documento'].'</td>'; 
            echo '<td>'.$regla['tipoDocumento'].'</td>'; 
            echo '<td>'.$regla['cedulaCarga'].'</td>'; 
            echo '<td>'.$regla['nit'].'</td>'; 
            echo '<td>'.$regla['sucursal'].'</td>'; 
            echo '<td>'.$regla['nota2'].'</td>'; 
            echo '<td>'.$regla['cuentaTotal'].'</td>'; 
            echo '</tr>';
        }
    echo '</table>';   
 }

 public function modalSubirArchivo()
 {
     ?>
         <!-- Modal -->
         <div class="modal fade" id="modalSubirArchivo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Subir Archivo</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" id="modalBodySubirArchivo">
                 
             </div>
             <div class="modal-footer">
                 <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="traductor();" >Cerrar</button>
                 <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="realizarCargaArchivo();" >SubirArchivo</button>
             </div>
             </div>
         </div>
         </div>

     <?php
 }

 public function formularioSubirArchivo()
 {
     // echo 'subir archivo '; 
     ?>
     <div id="div_cargue_archivo">
             <input name="imagen" id="imagen" type="file">
             <br><br><br><br>
             <!-- <button onclick="procesarformu();" >Procesar</button> -->
             <br><br>
             <!-- <button id="btnEnviar">Enviar!!</button> -->
             <!-- </form> -->
             <div id="div_muestre_resultado"></div>
             <span id="demo"></span>
     </div>
     
     <?php

 }













 public function modalNuevoCliente()
 {
     ?>
         <!-- Modal -->
         <div class="modal fade" id="modalNuevoCliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
         <div class="modal-dialog">
             <div class="modal-content">
             <div class="modal-header">
                 <h1 class="modal-title fs-5" id="exampleModalLabel">Info Cliente</h1>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
             </div>
             <div class="modal-body" id="modalBodyNuevoCliente">
                 
             </div>
             <div class="modal-footer">
                 <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="listarClientes();" >Cerrar</button>
                 <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="grabarCliente();" >Grabar Cliente</button>
             </div>
             </div>
         </div>
         </div>

     <?php
 }


 public function formuNuevoCliente()
 {
   
     ?>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Nombre/Razon Social:</label>
                   <input class ="form-control" type="text" id="nombre">          
             </div>
             <div class="col-md-6">
                 <label for="">Nit:</label>
                   <input class ="form-control" type="text" id="nit">          
             </div>
     </div>

     <div class="row">
             <div class="col-md-6">
                 <label for="">Telefono/Celular:</label>
                   <input class ="form-control" type="text" id="telefono">          
             </div>
             <div class="col-md-6">
                 <label for="">Correo:</label>
                   <input class ="form-control" type="text" id="email">          
             </div>
     </div>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Direccion:</label>
                   <input class ="form-control" type="text" id="direccion">          
             </div>
             <div class="col-md-6">
                 <label for="">Ciudad:</label>
                   <input class ="form-control" type="text" id="ciudad">          
             </div>
     </div>
     <div class="row">
             <div class="col-md-6">
                 <label for="">Tipo Contribuyente:</label>
                 <select id="idTipoContribuyente" class ="form-control">
                     <option value ="">Seleccione...</option>
                     <?php
                        //   $tipoContribuyentes =  $this->tipoContriModel->traerTipoContribuyente();
                         foreach($tipoContribuyentes as $tipoContribuyente)
                         {
                             echo '<option value ="'.$tipoContribuyente['id'].'" >'.$tipoContribuyente['descripcion'].'</option>';
                         }
                     ?>

                 </select>   
                   <!-- <input class ="form-control" type="text" id="id">           -->
             </div>
             <div class="col-md-6">
                 <label for="">Sede:</label>
                   <input class ="form-control" type="text" id="sede">          
             </div>


            
     </div>

     <?php
 }

}