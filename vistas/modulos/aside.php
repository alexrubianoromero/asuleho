    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"  >ACUEDUCTO</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
       

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">
                
                <?php 
                    if($_SESSION['nivel']>5)
                    {
                    ?>
                 
                    <?php
                    }
                    ?>
                    <?php  
                    if($_SESSION['nivel']==7 ) 
                    {
                        // if() {
                    ?>           
                       
                    <?php 
                        // } 
                    } 
                    
                    ?>


                    <?php 
                    if($_SESSION['nivel']>5  )
                    {
                    ?>
                  
                    <?php
                    }
                    ?>
                    
                    <?php 
                    if($_SESSION['nivel']>4)
                    {
                    ?>
                    <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link" onclick="traductor();">
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <p>
                                Traductor
                            </p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                  
                    <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link" onclick="integrin();">
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <p>
                                Cargue Integrin
                            </p>
                        </a>
                    </li>
               

                     <?php 
                    if($_SESSION['nivel']>5)
                    {
                    ?>
                    <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link" onclick="archivoWorldOffice();">
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <p>
                                Generar Archivo WordOffice
                            </p>
                        </a>
                    </li>
                    <?php
                    }
                    ?>

                     <li class="nav-item">
                        <a style="cursor:pointer;" class="nav-link" onclick="cambiarClave();">
                                <!-- <i class="nav-icon fas fa-th"></i> -->
                                <p>
                                    Cambiar Clave
                                </p>
                            </a>
                    </li>

              
                     
                    <li class="nav-item">
                    <a style="cursor:pointer;" class="nav-link" onclick="salir();">
                            <!-- <i class="nav-icon fas fa-th"></i> -->
                            <p>
                                Salir
                            </p>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <script>
        $(".nav-link").on('click',function(){
            $(".nav-link").removeClass('active');
            $(this).addClass('active');
        })
    </script>