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
            <label>Tarjetas de Circulacion</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

        <form method="post" action="./tarjetas_circulacion.php" class="CueI">

            <Div class="linea"><label class="LabG">tipo de servicio</label>
            <input type="text" id="tipo_servicio" name="tipo_servicio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">numero de constancia de inscripcion</label>
            <input type="number" id="numero_constancia_inscripcion" name="numero_constancia_inscripcion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">servicio</label>
            <input type="text" id="servicio" name="servicio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">origen</label>
            <input type="text" id="origen" name="origen" class="FieG">
            </Div>
            
            <Div class="linea"><label class="LabG">folio</label>
            <input type="number" id="folio" name="folio" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">fecha de vencimiento</label>
            <input type="date" id="fecha_vencimiento" name="fecha_vencimiento" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">placa</label>
            <input type="text" id="placa" name="placa" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">cve vehicular</label>
            <input type="number" id="cve_vehicular" name="cve_vehicular" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">uso</label>
            <input type="text" id="uso" name="uso" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">operacion</label>
            <input type="text" id="operacion" name="operacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">fecha de operacion</label>
            <input type="date" id="fecha_operacion" name="fecha_operacion" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">oficina expendidora</label>
            <input type="number" id="oficina_expendidora" name="oficina_expendidora" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">movimiento</label>
            <input type="text" id="movimiento" name="movimiento" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">rfa</label>
            <input type="number" id="rfa" name="rfa" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del vehiculo</label>
            <input type="number" id="id_vehiculo" name="id_vehiculo" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">id del propietario</label>
            <input type="number" id="id_propietario" name="id_propietario" class="FieG">
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

    if(isset($_POST["tipo_servicio"])) {
        $query = "INSERT INTO tarjetas_circulacion SET";
        foreach ($_POST as $key => $value) {
            if ($key != "id" && $value) {
                $query .= " $key = '$value',";
            }
        }
        $query = rtrim($query, ",");
        $results = RunQuery($query);

        print("<br>$query");
        print("<br>Filas aftectadas: " . $results->affectedRows);
    }