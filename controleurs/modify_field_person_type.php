<?php
session_start();

if(isset($_SESSION['connected'])){

    if(isset($_POST['modifybutton'])){
        require_once (__DIR__.'/../modeles/FieldPersonType.php');
        $fieldPersonTypeObject = new FieldPersonType();
        $fieldPersonTypeId = $_POST['modifybutton'];
        $fieldPersonTypeObject->displaySelectedType($fieldPersonTypeId);
    }  elseif (isset($_SESSION['fieldPersontypeId'])) {
        require_once (__DIR__.'/../modeles/FieldPersonType.php');
        $fieldPersonTypeObject = new FieldPersonType();
        $fieldPersonTypeId = $_SESSION['fieldPersonTypeId'];
        require_once (__DIR__.'/../vues/back_template.html');
        $fieldPersonTypeObject->modifyType($fieldPersonTypeId);
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
