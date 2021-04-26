<!DOCTYPE html>
<html>

<body>

    <?php
    include_once 'DB/DatabaseOOP.php';
    include_once 'DB/EstadistiquesRow.php';

    //$modalitat = intval($_GET['modalitat']);
    $modalitat = $_GET['modalitat'];

    $db = null;
    $result = null;
    try {
        $db = new DatabaseOOP("localhost", "root", "", "m07uf4");
        $db->connect();
        switch ($modalitat) {
            case "Totes":
                $result = $db->selectAll();
                break;
            case "Huma":
                $result = $db->selectByModalitat("Huma");
                break;
            case "Maquina":
                $result = $db->selectByModalitat("Maquina");
                break;
            default:
                $result = $db->selectAll();
                break;
        }

        echo DatabaseOOP::TABLE_START;
        foreach (new EstadistiquesRow(new RecursiveArrayIterator($row = $result->fetch_all(MYSQLI_ASSOC))) as $key => $row) {
            echo $row;
        }
    } catch (Exception $error) {
        echo "connection failed: " . $error->getMessage();
    }
    echo DatabaseOOP::TABLE_END;
    ?>
</body>

</html>