<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/SafeHouseType.php');
        $safeHouseTypeObject = new SafeHouseType();
        $safeHouseTypeId = $_POST['modifybutton'];
        $safeHouseTypeObject->displaySelectedType($safeHouseTypeId);
    }  elseif (isset($_SESSION['safeHousetypeId'])) {
        require_once (__DIR__.'/../modeles/SafeHouseType.php');
        $safeHouseTypeObject = new SafeHouseType();
        $safeHouseTypeId = $_SESSION['safeHousetypeId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $safeHouseTypeObject->modifyType($safeHouseTypeId);
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