function formularioSubirArchivoIntegrin()
{
    // alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'integrin/integrin.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodySubirArchivo").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=formularioSubirArchivoIntegrin'
    );

}


function realizarCargaArchivoIntegrin()
{
    // alert('cargue'); 
    var inputFile = document.getElementById('imagen');

    if (inputFile.files.length > 0) {
        let formData = new FormData();
        formData.append("file", inputFile.files[0]); // En la posición 0; es decir, el primer elemento
        formData.append("opcion", 'cargarArchivo'); // En la posición 0; es decir, el primer elemento
        // fetch("cargues/cargues.php", {
        fetch("cargues/cargar_stickers_integrin.php", {
            method: 'POST',
            body: formData,
        })
            .then(respuesta => respuesta.text())
            .then(decodificado => {
                console.log(decodificado.archivo);
                document.getElementById("div_cargue_archivo").innerHTML = 'Cargue Realizado!!';
            });
    } else {
        alert("Selecciona un archivo de Integrin..");
    }
}

function listarClientes()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarClientes'
    );
}
function listarClienteFiltrado()
{
    //  alert('funcion javascript');
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarClienteFiltrado'
            +'&idCliente='+idCliente

    );
}
function listarClienteFiltradoDesdeClientes()
{
    //  alert('funcion javascript');
    var idCliente = document.getElementById('idCliente').value;
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("div_resultados_clientes").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=listarClienteFiltradoDesdeClientes'
            +'&idCliente='+idCliente

    );
}


function formuNuevoCliente()
{
    //  alert('funcion javascript');
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoCliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=formuNuevoCliente'
    );

}

function grabarCliente()
{
    //  alert('funcion javascript');
    var nombre = document.getElementById('nombre').value;
    var nit = document.getElementById('nit').value;
    var telefono = document.getElementById('telefono').value;
    var email = document.getElementById('email').value;
    var direccion = document.getElementById('direccion').value;
    var ciudad = document.getElementById('ciudad').value;
    var idTipoContribuyente = document.getElementById('idTipoContribuyente').value;
    var sede = document.getElementById('sede').value;
    const http=new XMLHttpRequest();
    const url = 'clientes/clientes.php';
    http.onreadystatechange = function(){

        if(this.readyState == 4 && this.status ==200){
               document.getElementById("modalBodyNuevoCliente").innerHTML  = this.responseText;
        }
    };
    http.open("POST",url);
    http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    http.send('opcion=grabarCliente'
    +'&nombre='+nombre
    +'&nit='+nit
    +'&telefono='+telefono
    +'&email='+email
    +'&direccion='+direccion
    +'&ciudad='+ciudad
    +'&idTipoContribuyente='+idTipoContribuyente
    +'&sede='+sede
    );

}





