<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mon profil</title>
    <link rel="stylesheet" href="../../vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="../../vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
    <meta name="viewport", content="width=device-width, initial-scale=1"
    <meta name="viewport", content="height=device-height, initial-scale=1"
</head>

<body class="bg-dark container-fluid">

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="aie" viewBox="0 0 16 16">
            <title>AIE</title>
            <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z"/>
        </symbol>
        <symbol id="spy" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="m4.736 1.968-.892 3.269-.014.058C2.113 5.568 1 6.006 1 6.5 1 7.328 4.134 8 8 8s7-.672 7-1.5c0-.494-1.113-.932-2.83-1.205a1.032 1.032 0 0 0-.014-.058l-.892-3.27c-.146-.533-.698-.849-1.239-.734C9.411 1.363 8.62 1.5 8 1.5c-.62 0-1.411-.136-2.025-.267-.541-.115-1.093.2-1.239.735Zm.015 3.867a.25.25 0 0 1 .274-.224c.9.092 1.91.143 2.975.143a29.58 29.58 0 0 0 2.975-.143.25.25 0 0 1 .05.498c-.918.093-1.944.145-3.025.145s-2.107-.052-3.025-.145a.25.25 0 0 1-.224-.274ZM3.5 10h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Zm-1.5.5c0-.175.03-.344.085-.5H2a.5.5 0 0 1 0-1h3.5a1.5 1.5 0 0 1 1.488 1.312 3.5 3.5 0 0 1 2.024 0A1.5 1.5 0 0 1 10.5 9H14a.5.5 0 0 1 0 1h-.085c.055.156.085.325.085.5v1a2.5 2.5 0 0 1-5 0v-.14l-.21-.07a2.5 2.5 0 0 0-1.58 0l-.21.07v.14a2.5 2.5 0 0 1-5 0v-1Zm8.5-.5h2a.5.5 0 0 1 .5.5v1a1.5 1.5 0 0 1-3 0v-1a.5.5 0 0 1 .5-.5Z"/>
        </symbol>
        <symbol id="administrators" viewBox="0 0 16 16">
            <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7Zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm-5.784 6A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216ZM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5Z"/>
        </symbol>
        <symbol id="missions" viewBox="0 0 16 16">
            <path d="M14.5 3a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-13a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h13zm-13-1A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-13z"/>
            <path d="M7 5.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 1 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0zM7 9.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5zm-1.496-.854a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0l-.5-.5a.5.5 0 0 1 .708-.708l.146.147 1.146-1.147a.5.5 0 0 1 .708 0z"/>
        </symbol>
        <symbol id="countries" viewBox="0 0 16 16">
            <path d="M14.778.085A.5.5 0 0 1 15 .5V8a.5.5 0 0 1-.314.464L14.5 8l.186.464-.003.001-.006.003-.023.009a12.435 12.435 0 0 1-.397.15c-.264.095-.631.223-1.047.35-.816.252-1.879.523-2.71.523-.847 0-1.548-.28-2.158-.525l-.028-.01C7.68 8.71 7.14 8.5 6.5 8.5c-.7 0-1.638.23-2.437.477A19.626 19.626 0 0 0 3 9.342V15.5a.5.5 0 0 1-1 0V.5a.5.5 0 0 1 1 0v.282c.226-.079.496-.17.79-.26C4.606.272 5.67 0 6.5 0c.84 0 1.524.277 2.121.519l.043.018C9.286.788 9.828 1 10.5 1c.7 0 1.638-.23 2.437-.477a19.587 19.587 0 0 0 1.349-.476l.019-.007.004-.002h.001"/>
        </symbol>
        <symbol id="specialities" viewBox="0 0 16 16">
            <path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.27 3.27a.997.997 0 0 0 1.414 0l1.586-1.586a.997.997 0 0 0 0-1.414l-3.27-3.27a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0Zm9.646 10.646a.5.5 0 0 1 .708 0l2.914 2.915a.5.5 0 0 1-.707.707l-2.915-2.914a.5.5 0 0 1 0-.708ZM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11Z"/>
        </symbol>
        <symbol id="safehouses" viewBox="0 0 16 16">
            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L8 2.207l6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z"/>
            <path d="m8 3.293 4.712 4.712A4.5 4.5 0 0 0 8.758 15H3.5A1.5 1.5 0 0 1 2 13.5V9.293l6-6Z"/>
            <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm1.679-4.493-1.335 2.226a.75.75 0 0 1-1.174.144l-.774-.773a.5.5 0 0 1 .708-.707l.547.547 1.17-1.951a.5.5 0 1 1 .858.514Z"/>
        </symbol>
    </svg>

    <div class="row single-row">

        <nav class="col-3 bg-black back-navbar">

            <div class="d-flex flex-column flex-shrink-0 p-3">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-success text-decoration-none">
                    <svg class="bi pe-none me-2 nav-icon" width="40" height="32"><use xlink:href="#aie"/></svg>
                    <span class="fs-5">Agence Internationale d'Espionnage </span>
                </a>
                <hr>
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#administrators"/></svg>
                            Administrateurs
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#missions"/></svg>
                            Missions
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter/modifier</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Types</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Statuts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#countries"/></svg>
                            Pays
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter/modifier</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#spy"/></svg>
                            Personnels de terrain
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter/modifier</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Types</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Statuts</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#safehouses"/></svg>
                            Planques
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter/modifier</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Types</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <ul href="#" class="nav-link text-success" aria-current="page">
                            <svg class="bi pe-none me-2 nav-icon" width="20" height="20"><use xlink:href="#specialities"/></svg>
                            Spécialités
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Liste</a></li>
                                <li class="ms-5"><a href="#" class="link-success text-decoration-none">Ajouter/modifier</a></li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-success text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2">
                        <strong>mdo</strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Sign out</a></li>
                    </ul>
                </div>
            </div>

        </nav>
