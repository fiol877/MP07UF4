<!DOCTYPE html>
<html>

<head>
    <style>
        .center {
            margin-left: auto;
            margin-right: auto;
        }

        table {
            width: 75%;
            border-collapse: collapse;
        }

        table,
        td,
        th {
            border: 1px solid black;
            padding: 5px;
        }

        th {
            text-align: left;
        }
    </style>
</head>

<body>

    <?php
    include_once 'DB/DatabaseOOP.php';
    include_once 'DB/EstadistiquesRow.php';
    //include_once 'classes/EstadistiquesEditar.php';

    $opcio = $_GET['opcio'];
    $id = $_POST['idM'];

    $db = null;
    $result = null;
    try {
        $db = new DatabaseOOP("localhost", "root", "", "m07uf4");
        $db->connect();

        if ($opcio == "Editar") {
            $result = $db->selectPerId($id);

            while ($row = $result->fetch_assoc()) {
    ?>
                <table>
                    <tr>
                        <td class='celdas'>Modalitat</td>
                        <td class='celdas'>Nivell</td>
                        <td class='celdas'>Data</td>
                        <td class='celdas'>nº Intents</td>
                    </tr>

                    <tr>
                        <form method="post" id="">
                            <td class='celdas'>
                                <select id="modalidadE" name="modalidadE">
                                    <option disabled selected value> Selecciona una opción</option>
                                    <option value="Maquina">Primera modalidad</option>
                                    <option value="Huma">Segunda modalidad</option>
                                </select>
                            </td>
                            <td class='celdas'>
                                <select id="nivellE" name="nivellE">
                                    <option value="10">Del 1 al 10</option>
                                    <option value="50">Del 1 al 50</option>
                                    <option value="100">Del 1 al 100</option>
                                </select>
                            </td>
                            <td class='celdas'><input type='date' name='data_partida' id='data_partida' /></td>
                            <td class='celdas'><input type='number' name='intents' id='intents' /></td>
                            <td class='celdas'><input type="submit" value="enviar" onclick="editar(<?php echo $id ?>)"/></td>
                        </form>
                    </tr>
                </table>
    <?php
            }
        } else if ($opcio == "Eliminar") {
            $db->eliminarPerId($id);
            $result = $db->selectAll();
            echo DatabaseOOP::TABLE_START;
            foreach (new EstadistiquesRow(new RecursiveArrayIterator($row = $result->fetch_all(MYSQLI_ASSOC))) as $key => $row) {
                echo $row;
            }
        }
    } catch (Exception $error) {
        echo "connection failed: " . $error->getMessage();
    }
    echo DatabaseOOP::TABLE_END;
    ?>
</body>

</html>