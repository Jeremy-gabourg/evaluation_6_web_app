<?php
try {
    require_once 'C:/xampp/apps/international_spy_agency/Class/Mission.php';
    require_once 'bdd_connexion.php';
    $statement = $pdo->prepare('SELECT * FROM missions LIMIT :start, 5');
    if (!isset($_GET['page'])){
        $_GET['page']=1;
    }
        $statement->bindValue('start', 5 * ($_GET['page'] - 1), PDO::PARAM_INT);
//        $statement->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Mission');
        if ($statement->execute()) {
            while($missions = $statement->fetch()){
                $mission = json_decode(json_encode($missions), true);
                $statusId = $mission['status'];
                require_once 'C:/xampp/apps/international_spy_agency/Class/MissionStatus.php';
                $statementBis = $pdo->prepare('SELECT * FROM mission_status WHERE id LIKE ?');
                $statementBis->bindParam(1, $statusId, PDO::PARAM_INT);
                if ($statementBis->execute()){
                    $statusName = $statementBis->fetch();
                    echo'<tr><th scope="row">'.$missions['id'].'</th><td>'.$missions['title'].'</td><td>'.$missions['code_name'].'</td><td>'.$statusName['name'].'</td><td></td></tr>';
                }
            };
        } else {
            $errorInfo = $statement->errorInfo();
            echo $errorInfo[2];
        }
} catch (PDOException $e) {
    echo 'Une erreur s\'est produite lors de la communication avec la base';
}