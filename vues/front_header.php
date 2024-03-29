<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>KGB : Comité pour la sécurité de l'état</title>
    <link rel="stylesheet"href="/vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script src="/vendor/twbs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <meta name="viewport", content="width=device-width, initial-scale=1">
    <meta name="description", content="Bienvenue sur le site internet du KGB. Entrez,
    récupérez votre mission et accomplissez la! Une fois la preuve du travail réalisé fournie, un virement vous sera fait
    dans les 48H">
</head>

<body class="bg-dark text-success">

    <header class="bg-black p-1 container-fluid d-flex rounded-bottom">
        <a class="flex-grow-1 p-1 text-decoration-none text-success" href="/index.php">
            <img src="/assets/files/Emblema_KGB.svg" alt="Logo du KGB" height="60">
            <span class="fw-bold d-none d-md-inline-flex ps-1">Comité pour la sécurité de l'Etat</span>
            <span class="fw-bold d-inline-flex d-md-none">KGB</span>
        </a>
        <span class="p-1 my-auto fw-bold align-self-end">
        <?php
        if(!isset($_SESSION['connected'])){
            echo '
                    <a role="button" class="btn btn-success d-none d-md-inline-flex" href="/controleurs/connexion_page.php">
                        Connexion
                    </a>
                    <a role="button" class="text-reset text-success d-inline-flex d-md-none" href="/controleurs/connexion_page.php">
                        <svg xmlns="http://www.w3.org/2000/svg" width="35px" height="35px" fill="currentColor" class="bi bi-file-lock2" viewBox="0 0 16 16">
                          <path d="M8 5a1 1 0 0 1 1 1v1H7V6a1 1 0 0 1 1-1zm2 2.076V6a2 2 0 1 0-4 0v1.076c-.54.166-1 .597-1 1.224v2.4c0 .816.781 1.3 1.5 1.3h3c.719 0 1.5-.484 1.5-1.3V8.3c0-.627-.46-1.058-1-1.224z"/>
                          <path d="M4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4zm0 1h8a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1z"/>
                        </svg>
                    </a>
                </span>
            ';
        } else {
            echo '
                <div class="dropdown d-inline-flex">
                  <button class="btn btn-outline-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                      <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                      <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                    </svg>
                    <span class="d-none d-md-inline-flex fw-bold ps-1">Bienvenu '.$_SESSION['firstName'].'</span>
                    <span class="d-inline-flex d-md-none fw-bold">'.$_SESSION['firstName'].'</span>
                  </button>
                  <ul class="dropdown-menu bg-black">
                    <li><a class="dropdown-item text-success" href="/controleurs/profile.php">Mon profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-success" href="/controleurs/deconnexion_script.php">Se déconnecter</a></li>
                  </ul>
                </div>
            ';
        }
        ?>
    </header>
