<!-- Prueba -->
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
            <label>Conductores</label>
        </p>

        <Div class="Div1">
            <Div class="Div2">
            </Div>

            <form method="post" action="./conductores.php" class="CueI">
                
            <Div class="linea"><label class="LabG">nombre</label>
            <input type="text" id="nombre" name="nombre" class="FieG">
            </Div>     

            <Div class="linea"><label class="LabG">apellido paterno</label>
            <input type="text" id="apellido_paterno" name="apellido_paterno" class="FieG">
            </Div>   

            <Div class="linea"><label class="LabG">apellido materno</label>
            <input type="text" id="apellido_materno" name="apellido_materno" class="FieG">
            </Div>    

            <Div class="linea"><label class="LabG">domicilio</label>
            <input type="text" id="domicilio" name="domicilio" class="FieG">
            </Div>  

            <Div class="linea"><label class="LabG">fecha nacimiento</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" class="FieG">
            </Div>  

            <Div class="linea"><label class="LabG">sexo</label>
            <input type="radio" id="hombre" name="sexo" value="hombre" class="FieG"><label for="hombre" class="FieG" hm="hhmm">Hombre</label>
            <input type="radio" id="mujer" name="sexo" value="mujer" class="FieG"><label for="mujer" class="FieG" hm="hhmm">Mujer</label>
            </Div>    

            <Div class="linea"><label class="LabG">firma</label>
            <input type="text" id="firma" name="firma" class="FieG">
            </Div>   

            <Div class="linea"><label class="LabG">numero de emergencia</label>
            <input type="number" id="num_emergencia" name="num_emergencia" class="FieG">
            </Div> 

            <Div class="linea"><label class="LabG">donador</label>
            <input type="checkbox" id="donador" name="donador" class="FieG" class="AfCh" EsCh="ChSty" >
            </Div>   

            <Div class="linea"><label class="LabG">antiguedad</label>
            <input type="date" id="antiguedad" name="antiguedad" class="FieG">
            </Div>

            <Div class="linea"><label class="LabG">grupo sanguineo</label>
            <select id="grupo_sanguineo" name="grupo_sanguineo" class="FieG">
                <option>A+</option>
                <option>A-</option>
                <option>B+</option>
                <option>B-</option>
                <option>AB+</option>
                <option>AB-</option>
                <option>O+</option>
                <option>O-</option>
            </select>
            </Div>

            <Div class="linea"><label class="LabG">restricciones</label>
            <input type="text" id="restricciones" name="restricciones" class="FieG">
            </Div>

            <input type="submit" value="Aceptar" class="BotG">

            <Div class="Div2">
            </Div>

        </form></Div>
    </body>
</html>

<?php
    include "../sql_lib.php";

    if(isset($_POST["nombre"])) {
        $query = "INSERT INTO conductores SET";
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