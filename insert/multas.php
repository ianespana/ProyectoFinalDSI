<html class="PriB">
    <head>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script>
            window.onload = function(){
                $.get("../navbar_admin.php", function(data){
                    $("#include").html(data);
                })
            }
        </script>
               <link rel="stylesheet" href="http://localhost/DSI31/proyecto_final/insert/Diseño.css">

    </head>
    <body>
        <div id="include"></div>
        <p class="TitG">
            <label>Multas</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./multas.php" class="CueI">
            
            <Div class="linea"><label class="LabG">folio</label>
            <input type="text" id="id" name="id" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">dia</label>
            <input type="number" id="dia" name="dia" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">mes</label>
            <input type="number" id="mes" name="mes" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">anio</label>
            <input type="number" id="anio" name="anio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">hora</label>
            <input type="time" id="hora" name="hora" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">reporte de seccion</label>
            <input type="text" id="reporte_seccion" name="reporte_seccion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">nombre de la via</label>
            <input type="text" id="nombre_via" name="nombre_via" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">kilometro</label>
            <input type="number" id="kilometro" name="kilometro" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">direccion o sentido</label>
            <input type="text" id="direccion_sentido" name="direccion_sentido" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">municipio</label>
            <input type="text" id="municipio" name="municipio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">referencia del lugar</label>
            <input type="text" id="referencia_lugar" name="referencia_lugar" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">articulo o fundamento</label>
            <input type="text" id="articulo_fundamento" name="articulo_fundamento" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">motivo</label>
            <input type="text" id="motivo" name="motivo" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">garantia retenida</label>
            <input type="text" id="garantia_retenida" name="garantia_retenida" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">convenio</label>
            <input type="text" id="convenio" name="convenio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">puesto a disposicion</label>
            <input type="checkbox" id="puesto_a_disposicion" name="puesto_a_disposicion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">calificacion boleta</label>
            <input type="text" id="calificacion_boleta" name="calificacion_boleta" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">deposito oficial</label>
            <input type="text" id="deposito_oficial" name="deposito_oficial" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">observaciones del personal operativo</label>
            <input type="text" id="observaciones_personal_operativo" name="observaciones_personal_operativo" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">observaciones del conductor</label>
            <input type="text" id="observaciones_conductor" name="observaciones_conductor" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">numero de parte del accidente</label>
            <input type="number" id="numero_parte_accidente" name="numero_parte_accidente" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del personal operativo</label>
            <input type="number" id="id_personal_operativo" name="id_personal_operativo" class="FieG">
            </Div>
            
            <Div class="linea"><label class="LabG">id de la tarjeta de circulacion</label>
            <input type="number" id="id_tarjeta_circulacion" name="id_tarjeta_circulacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id de la licencia</label>
            <input type="text" id="id_licencia" name="id_licencia" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del vehiculo</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo" class="FieG">
            </Div>
 
            <input type="submit" value="Aceptar" class="BotG">

            <Div class="Div2">
            </Div>
            
        </form>
        </Div>
    </body>
</html>

<?php
    include "../sql_lib.php";
    include "../utils.php";

    if(isset($_POST["id"])) {
        $results = InsertArray("multas", $_POST, []);
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }