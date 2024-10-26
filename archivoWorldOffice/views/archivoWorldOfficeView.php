<?php
$raiz = dirname(dirname(dirname(__file__)));
require_once($raiz.'/archivoWorldOffice/models/ArchivoWorldOfficeModel.php'); 
// require_once($raiz.'/subtipos/models/SubtipoParteModel.php'); 
// require_once($raiz.'/marcas/models/MarcaModel.php'); 

class archivoWorldOfficeView
{
 protected $model; 
//  protected $tipoContriModel; 

 public function __construct()
 {
    $this->model= new ArchivoWorldOfficeModel(); 
    // $this->tipoContriModel= new TipoContribuyenteModel(); 
 }   
 

 public function worldOfficeMenu()
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
                  <a role="button" class="btn btn-primary"  href="generarExcell.php" target="_blank">Generar Archivo Excell</a>
                </div>
             

            </div>
          
            <div id="divResultadosTraductor" class="mt-3">
                <?php  
                    //  $this->mostrarInfoIntegrin();  
                        
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