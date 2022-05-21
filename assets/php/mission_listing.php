<?php
try {
    require_once '../../Class/Mission.php';
    require_once 'Connexion.php';
    $statement = $pdo->prepare('SELECT * FROM missions LIMIT :start, 5');
    $statement->bindValue('start', 5 * ($_GET['page'] - 1), PDO::PARAM_INT);
    $statement->setFetchMode(PDO::FETCH_CLASS, 'Mission');
    if ($statement->execute()) {
        while ($mission = $statement->fetch()) {
            echo $mission;
        }
    } else {
        $errorInfo = $statement->errorInfo();
        echo $errorInfo[2];
}
} catch (PDOException $e) {
    echo 'Une erreur s\'est produite lors de la communication avec la base';
}