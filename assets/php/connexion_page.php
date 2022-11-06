<?php
require_once (__DIR__ . '/../templates/front_header.php');
?>
<main>
    <h1 class="text-center mt-4 pb-4">Page de connexion</h1>

    <div class="mt-4 container-lg">
        <div class="form-floating has-validation mb-3">
            <input type="email" class="form-control" id="floatingInput" placeholder="Adresse email" required>
            <label for="floatingInput">Adresse email</label>
        </div>
        <div class="form-floating has-validation">
            <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" required>
            <label for="floatingPassword">Mot de passe</label>
        </div>
        <div class="mt-4 text-center">
            <button class="btn btn-success btn-lg" type="submit">Connexion</button>
        </div>
    </div>
</main>

<?php
require_once (__DIR__ . '/../templates/front_footer.php');
?>
