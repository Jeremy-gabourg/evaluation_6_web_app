<?php
session_start();

if(isset($_SESSION['connected'])) {
    require_once(__DIR__ . '/../modeles/Administrator.php');
    $administratorObject = new Administrator();
    $administratorId = $_SESSION['administratorId'];

    if($_SERVER['REQUEST_METHOD'] !== 'POST') {
        $administratorObject->displayMyProfile($administratorId);
        echo '
                </main>
                </body>
                </html>';
    } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($_POST['firstName'] !== "" && $_POST['lastName'] !== "" && $_POST['email'] !== "" && $_POST['password'] !== "") {
            $administratorObject->modifyProfile($administratorId);
        } else {
            $administratorObject->displayMyProfile($administratorId);
            echo '
        <div class="alert alert-danger mt-4" role="alert">
          Merci de ne laisser aucun champs vide svp !
        </div>
        </main>
        </body>
        </html>';
        }
    }

    } else {
        header('Location: /index.php');
    }