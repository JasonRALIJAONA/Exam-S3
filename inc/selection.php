<?php
include ('fonctions.php');
function selectionInTable($table , $condition){
    $co = mySQLconnection();
    if($condition === null){ $condition = "1=1";}
    $query = "SELECT * FROM $table WHERE ".$condition;

    $resultats = $co->query($query);
    $liste = array();

    if ($resultats) {
        $columns = array();
        for ($i = 0; $i < $resultats->columnCount(); $i++) {
            $column = $resultats->getColumnMeta($i);
            $columns[] = $column['name'];
        }

        while ($row = $resultats->fetch(PDO::FETCH_ASSOC)) {
            $item = array();
            foreach ($columns as $column) {
                $item[$column] = $row[$column];
            }
            $liste[] = $item;
        }

        $resultats->closeCursor();
    }
    return $liste;
}


$table = $_GET['table'];
$condition = null;

if ( isset($_GET['condition']))
{
    $condition = $_GET['condition'];
}
$achats = selectionInTable($table, $condition);

echo json_encode($achats);
?>