<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/integrin/models/IntegrinModel.php'); 
// require_once($raiz.'/subtipos/models/SubtipoParteModel.php'); 
// require_once($raiz.'/marcas/models/MarcaModel.php'); 

class integrinView
{
 protected $model; 
//  protected $tipoContriModel; 

 public function __construct()
 {
    $this->model= new IntegrinModel(); 
    // $this->tipoContriModel= new TipoContribuyenteModel(); 
 }   
 

 public function integrinMenu()
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
                    onclick="formularioSubirArchivoIntegrin()"
                    >
                        Subir Archivo
                    </button>
                </div>
             

            </div>
          
            <div id="divResultadosTraductor" class="mt-3">
                <?php  
                     $this->mostrarInfoIntegrin();  
                        
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



 public function mostrarInfoIntegrin()
 {
    $registros = $this->model->traerRegistrosIntegrin();
    echo '<table class="table table-striped">';
        echo '<tr>'; 
        echo '<th>codpredio</th>';
        echo '<th>nombre</th>';
        echo '<th>uso</th>';
        echo '<th>estrato</th>';
        echo '<th>servicio</th>';
        echo '<th>nservicio</th>';
        echo '<th>codigo_c</th>';
        echo '<th>nconcep</th>';
        echo '<th>ult_0</th>';
        echo '<th>ult_1</th>';
        echo '<th>ult_2</th>';
        echo '<th>ult_3</th>';
        echo '<th>ult_4</th>';
        echo '<th>ult_5</th>';
        echo '<th>ult_6</th>';
        echo '<th>ult_7</th>';
        echo '<th>ult_8</th>';
        echo '<th>int_t</th>';
        echo '<th>ult_t</th>';
        echo '</tr>';
        foreach($registros as $registro)
        {
            // $tipoCont =  $this->tipoContriModel->traerTipoId($cliente['idTipoContribuyente']);
            echo '<tr>'; 
            echo '<td>'.$registro['codpredio'].'</td>'; 
            echo '<td>'.$registro['nombre'].'</td>'; 
            echo '<td>'.$registro['uso'].'</td>'; 
            echo '<td>'.$registro['estrato'].'</td>'; 
            echo '<td>'.$registro['servicio'].'</td>'; 
            echo '<td>'.$registro['nservicio'].'</td>'; 
            echo '<td>'.$registro['codigo_c'].'</td>'; 
            echo '<td>'.$registro['nconcep'].'</td>'; 
            echo '<td>'.$registro['ult_0'].'</td>'; 
            echo '<td>'.$registro['ult_1'].'</td>'; 
            echo '<td>'.$registro['ult_2'].'</td>'; 
            echo '<td>'.$registro['ult_3'].'</td>'; 
            echo '<td>'.$registro['ult_4'].'</td>'; 
            echo '<td>'.$registro['ult_5'].'</td>'; 
            echo '<td>'.$registro['ult_6'].'</td>'; 
            echo '<td>'.$registro['ult_7'].'</td>'; 
            echo '<td>'.$registro['ult_8'].'</td>'; 
            echo '<td>'.$registro['int_t'].'</td>'; 
            echo '<td>'.$registro['ult_t'].'</td>'; 
           
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
                 <button  type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="integrin();" >Cerrar</button>
                 <button  type="button" class="btn btn-primary"  id="btnEnviar"  onclick="realizarCargaArchivoIntegrin();" >SubirArchivo</button>
             </div>
             </div>
         </div>
         </div>

     <?php
 }

 public function formularioSubirArchivoIntegrin()
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