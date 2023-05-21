<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/MissionType.php');
        $missionTypeObject = new MissionType();
        $missionTypeId = $_POST['modifybutton'];
        $missionTypeObject->displaySelectedType($missionTypeId);
    }  elseif (isset($_SESSION['missionTypeId'])) {
        require_once (__DIR__.'/../modeles/MissionType.php');
        $missionTypeObject = new MissionType();
        // $missionTypeId = $_SESSION['missionTypeId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $missionTypeObject->modifyType($missionTypeId);
    } else {
        require_once (__DIR__.'/../vues/back_template.html');
        echo '
            <main class="col">
            <div class="alert alert-danger">Erreur d\'affichage</div>
            </main>
            </body>
            </html>                
                ';
    }
} else {
    header('Location: /index.php');
}