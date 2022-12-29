<main class="container-fluid mt-5">
    <h1 class="text-center mb-4">Liste des Missions</h1>
    <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
            <thead>
            <th scope="col">#</th>
            <th scope="col">Titre</th>
            <th scope="col" class="d-none d-md-block">Nom de code</th>
            <th scope="col">Status</th>
            <th scope="col">Détails</th>
            </thead>
            <tbody>
            <?php
            try {
                require_once (__DIR__.'/../../Class/Mission.php');
                require_once (__DIR__.'/bdd_connexion.php');
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

                        require_once (__DIR__.'/../../Class/MissionStatus.php');

                        $statementBis = $pdo->prepare('SELECT * FROM mission_status WHERE id LIKE ?');
                        $statementBis->bindParam(1, $statusId, PDO::PARAM_INT);
                        if ($statementBis->execute()){
                            $statusName = $statementBis->fetch();
                            echo '<tr>
                                    <th scope="row">'.$missions['id'].'</th>
                                    <td>'.$missions['title'].'</td>
                                    <td  class="d-none d-md-block">'.$missions['code_name'].'</td>
                                    <td>'.$statusName['name'].'</td>
                                    <td>
                                        <a role="button" class="text-success" href="./assets/php/mission_details.php?missionId='.$missions['id'].'">
                                          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16">
                                              <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                              <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                          </svg>
                                        </a>
                                    </td>
                                </tr>';
                        }
                    };
                } else {
                    $errorInfo = $statement->errorInfo();
                    echo $errorInfo[2];
                }
            } catch (PDOException $e) {
                echo 'Une erreur s\'est produite lors de la communication avec la base';
            }
            ?>
            </tbody>
        </table>
    </div>
</main>
