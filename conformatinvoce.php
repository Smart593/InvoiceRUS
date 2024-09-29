<?php 
  headerAdmin($data); 
?>

<main id="main" class="main">

    <div class="pagetitle">
        <h1>
            <?= $data['page_title']; ?>
        </h1>
    </div><!-- End Page Title -->

    <section class="section">
        <div>
            <table style="width: 100%;">
                <tr>
                    <td style="width: 70%;"></td>
                    <td style="width: 30%;">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="busqueda" name="busqueda" placeholder="busqueda" value="" required onkeyup = "loadData()">
                            <label for="busqueda">SEARCH</label>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        <div id="table_main">
        </div>
    </section>

    <div class="modal fade" id="modal_formato" name="modal_formato" tabindex="-1" role="dialog" data-bs-keyboard="false" data-bs-backdrop="static" aria-hidden="true">

        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header headerRegister">
                    <h5 class="modal-title" id="titleModal">Registro de Bancos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    </button>
                </div>

                <div class="modal-body">
                    <form class="row g-3" id="frmBank" name="frmBank" autocomplete="off" onsubmit="return false;">
                        <!-- campos ocultos -->
                        <input type="hidden" id="pk_i_bank" name="pk_i_bank" value="0">

                        <div class="col-12 mt-2">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="codigo_cliente" name="codigo_cliente" placeholder="codigo_cliente" value="" required>
                                <label for="codigo_cliente">CODIGO CLIENTE</label>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <div class="form-floating">
                                <select class="form-select" id="formato_use" name="formato_use" aria-label="Tipo Persona" required>
                                    <option value="null">------</option>
                                    <option value="en">Formato Ingles</option>
                                </select>
                                <label for="formato_use">FORMATO USAR</label>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button id="btnSaveFormat" class="btn btn-success type="button">
                                <i class="bx bx-save"></i><span id="btnText">Guardar</span>
                            </button>&nbsp;&nbsp;
                            <button class="btn btn-danger" type="button" data-bs-dismiss="modal">
                                <i class="bx bx-exit"></i>Cancelar
                            </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</main><!-- End #main -->

<?php 
  footerAdmin($data); 
?>

<script>
    /**
     * se ejecuta cuando se pide para asignar el formato
     */
    function asignarFormato(code_aux) {
        // Guarda el codigo del auxiliar
        $("#codigo_cliente").val(code_aux);

        // muestra la modal
        $("#modal_formato").modal('show');
    }

    /**
     * se guarda el formato 
     */
     function guardarFormato() {
        // valor a usar id usuario
        let codigo_cliente = $("#codigo_cliente").val();

        // codigo del formato
        let formato_use = $("#formato_use").val();

        // si el foirmato es null detiene la ejecucion
        if (formato_use == 'null') {
            alert("Formato no valido.");

            return false;
        }

        // consulta ajax a usar
        $.ajax({
            // la URL para la petición
            url : base_url + 'ConFormatInvoce/setFormat',

            // la información a enviar
            // (también es posible utilizar una cadena de datos)
            data : { 
                codigo_cliente: codigo_cliente,
                formato_use: formato_use
            },

            // especifica si será una petición POST o GET
            type : 'POST',

            // el tipo de información que se espera de respuesta
            dataType : 'json',

            // código a ejecutar si la petición es satisfactoria;
            // la respuesta es pasada como argumento a la función
            success : function(json) {
                // si el estatus es ok 
                if (json.status == "ok") {

                    // recarga la ventana
                    loadData();

                    // muestra la modal
                    $("#modal_formato").modal('hide');
                }

                // si es un error
                else{
                    Swal.fire('ERROR: ',json.msg,'error');
                }
            },

            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto de la petición en crudo y código de estatus de la petición
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },

            // // código a ejecutar sin importar si la petición falló o no
            // complete : function(xhr, status) {
            //     alert('Petición realizada');
            // }
        });
    }

    // ejecuta el evento cuandos se hace click
    $( "#btnSaveFormat" ).on( "click", guardarFormato );

    /**
     * carga la consulta
     */
    function loadData() {
        // valor a usar id usuario
        let busqueda = $("#busqueda").val();

        // consulta ajax a usar
        $.ajax({
            // la URL para la petición
            url : base_url + 'ConFormatInvoce/getClientes',

            // la información a enviar
            // (también es posible utilizar una cadena de datos)
            data : { 
                busqueda: busqueda,
            },

            // especifica si será una petición POST o GET
            type : 'POST',

            // el tipo de información que se espera de respuesta
            dataType : 'json',

            // código a ejecutar si la petición es satisfactoria;
            // la respuesta es pasada como argumento a la función
            success : function(json) {
                // si el estatus es ok 
                if (json.status == "ok") {

                    // carga la table
                    $("#table_main").html(json.table);
                    
                }

                // si es un error
                else{
                    Swal.fire('ERROR: ',json.msg,'error');
                }
            },

            // código a ejecutar si la petición falla;
            // son pasados como argumentos a la función
            // el objeto de la petición en crudo y código de estatus de la petición
            error : function(xhr, status) {
                alert('Disculpe, existió un problema');
            },

            // // código a ejecutar sin importar si la petición falló o no
            // complete : function(xhr, status) {
            //     alert('Petición realizada');
            // }
        });
    }

    // consulta los datos a usar
    loadData();
</script>