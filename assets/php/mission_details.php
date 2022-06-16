<?php
require_once (__DIR__.'/../templates/front_header.php');
?>
<main>
    <h1>Détails de la mission</h1>
    <?php
    if (!isset ($_GET['missionId'])) {
        echo 'Veuillez cliquer sur une mission svp';
    } else {
        require_once (__DIR__.'bdd_connexion.php');
        $statement = $pdo->prepare('SELECT * FROM missions WHERE id LIKE :id');
        $statement->bindParam('id', $_GET['missionId'], PDO::PARAM_INT);
        if ($statement->execute()) {
            while ($mission = $statement->fetch()) {
                $missionArray = json_decode(json_encode($mission), true);
                echo '
                <h2>'.$missionArray['title'].'</h2>
                ';
            }
        }
    }
    ?>
</main>
<?php
require_once (__DIR__.'/../templates/front_footer.php');
?>