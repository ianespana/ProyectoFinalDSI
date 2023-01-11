<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://localhost/DSI31/control_vehicular/navbar.css">
    </head>
    <body>
        <div class="navbar">
            <div class="dropdown">
                <button class="dropbtn">Conductores
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/conductores.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="conductores">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Licencias
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/licencias.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="licencias">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Multas
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/multas.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="multas">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Oficiales
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/oficiales.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="oficiales">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Propietarios
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/propietarios.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="propietarios">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Tarjetas de Circulacion
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/tarjetas_circulacion.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="tarjetas_circulacion">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Vehiculos
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/vehiculos.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="vehiculos">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Verificiaciones
                    <i class="fa fa-caret-down"></i>
                </button>
                <div class="dropdown-content">
                    <form method="post" action="http://localhost/DSI31/control_vehicular/insert/verificaciones.php">
                        <input type="submit" class="button" value="Insert">
                    </form>
                    <form method="post" action="http://localhost/DSI31/control_vehicular/select_a.php">
                        <input type="hidden" name="table" value="verificaciones">
                        <input type="submit" class="button" value="Select/Update/Delete">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
