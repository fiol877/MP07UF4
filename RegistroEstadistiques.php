<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registros tabla estadistiques</title>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script type="text/javascript">

        function windowCredits() {
            window.open("./credits.txt","","height=200,width=400,scrollbars=no");
        }
        windowCredits();
        </script>
    </head>
    <body>
        <?php
        session_start();
        include_once 'DB/EstadistiquesRow.php';
        include_once 'DB/DatabaseOOP.php';

        $credits = fopen("credits.txt", "w+") or die("Unable to open file!");
        $txtName = "Nombre: Bernat Fiol Carmona\n";
        $txtEmail = "Email: fiol877@hotmail.com\n";
        $txtDate = "Fecha de hoy: ".date("F d Y H:i:s", filemtime("credits.txt"));
        fwrite($credits, $txtName);
        fwrite($credits, $txtEmail);
        fwrite($credits, $txtDate);
        //print_r(file_get_contents("credits.txt"));          
        fclose($credits);
        
        $db = null;
        try {
            $db = new DatabaseOOP("localhost", "root", "", "m07uf4");
            $db->connect();
            echo "<h2>Registro de la tabla 'estadístiques'</h2>";
            echo DatabaseOOP::TABLE_START;
            $stmt = $db->selectAll();
            foreach (new EstadistiquesRow(new RecursiveArrayIterator($row = $stmt->fetch_all(MYSQLI_ASSOC))) as $key => $row) {
                echo $row;
            }
        } catch (Exception $error) {
            echo "connection failed: " . $error->getMessage();
        }
        DatabaseOOP::TABLE_END
        ?>

    </body>
</html>
