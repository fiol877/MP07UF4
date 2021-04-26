<?php
session_start();
?>
<!DOCTYPE HTML>
<html>

<head>
    <meta charset="utf-8">
    <title>Guess My Number</title>
    <link rel="stylesheet" href="./style.css">
    <script src="js/my_functions.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body onload="showEstadistiques('Totes')">
    <h1 id="tituloForm">Guess My Number</h1>
    <!-- <button id="buttonRegistro" class="button">Registros de la tabla</button> -->
    <form id="formularioIndex" action="" method="POST">
        <h4>Primera modalidad: La máquina tratará de adivinar el número que has pensado</h4>
        <h4>Segunda modalidad: Tratarás de adivinar el número que ha pensado la máquina</h4>
        <label for="modalidad" class="label">Escoge la modalidad de juego:</label>
        <select id="modalidad" name="modalidad" size="1">
            <option disabled selected value> Selecciona una opción</option>
            <option value="primeraModalidad">Primera modalidad</option>
            <option value="segundaModalidad">Segunda modalidad</option>
        </select>
        <br />
        <br />
        <label for="posibilidad" class="label">Selecciona el nivel de dificultad:</label>
        <select id="posibilidad" name="posibilidad" size="1">
            <option value="10">Del 1 al 10</option>
            <option value="50">Del 1 al 50</option>
            <option value="100">Del 1 al 100</option>
        </select>
        <br />
        <br />
        <!-- <button type="submit" name="submit" class="button" id="buttonIndex">Seleccionar</button> -->
        <button type="submit" name="submit" class="button" id="buttonIndex">Seleccionar</button>
    </form>

    <form>
        <label>Modalitats:</label>
        <select class="dropdown-content" name="modalitats" onchange="showEstadistiques(this.value)">
            <option value="Totes">Totes</option>
            <option value="Huma">Huma</option>
            <option value="Maquina">Maquina</option>
        </select>
    </form>
    <br>
    <div id="taula_estadistiques_id"></div>
</body>

</html>

<script type="text/javascript">
    document.getElementById('modalidad').onchange = function() {
        var modalidad = document.getElementById('modalidad').value;
        document.getElementById('formularioIndex').action = modalidad + '.php';
    };

/*     document.getElementById("buttonRegistro").onclick = function() {
        location.href = "RegistroEstadistiques.php";
    }; */
</script>

