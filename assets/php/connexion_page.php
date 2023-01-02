<?php
require_once (__DIR__ . '/../templates/front_header.php');
?>
<main class="container-md">
    <h1 class="text-center mt-4 pb-4">Page de connexion</h1>

    <div class="mt-4">

        <form class="needs-validation" novalidate>
            <div class="form-floating has-validation mb-3">
                <input type="email" class="form-control" id="floatingInput" placeholder="Adresse email" required>
                <label for="floatingInput">Adresse email</label>
                <div class="invalid-feedback">
                    Merci de rentrer une adresse mail valide
                </div>
            </div>
            <div class="form-floating has-validation">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
                <label for="floatingPassword">Mot de passe</label>
            </div>
            <div class="text-center">
<!--                <button class="btn btn-success btn-lg mt-4"  type="submit">Connexion</button>-->
                <a class="btn btn-success btn-lg mt-4" href="/assets/php/add_administrator.php" role="button">Connexion</a>
            </div>
        </form>

    </div>
</main>

<?php
require_once (__DIR__ . '/../templates/front_footer.php');
?>
