<?php
include_once ('../templates/back_template.php');
?>
        <main class="col">

            <h1 class="text-success text-center py-4 my-4">Ajouter un administrateur</h1>

            <form class="needs-validation" id="addAdministrator" novalidate>

                <div class="container pt-4">
                    <div class="form-floating has-validation mb-3 mt-4">
                        <input type="text" class="form-control" id="floatingInput" placeholder="Nom" name="lastName" id="lastName">
                        <label for="floatingInput">Nom</label>
                        <div class="invalid-feedback">
                            Merci de rentrer un nom svp
                        </div>
                    </div>
                    <div class="form-floating has-validation mt-4">
                        <input type="text" class="form-control" id="floatingPassword" placeholder="Prénom" name="firstName" id="firstName">
                        <label for="floatingInput">Prénom</label>
                        <div class="invalid-feedback">
                            Merci de rentrer un prénom svp
                        </div>
                    </div>
                    <div class="form-floating has-validation mt-5">
                        <input type="email" class="form-control" id="floatingPassword" placeholder="Adresse mail" name="email" id="email">
                        <label for="floatingEmail">Adresse mail</label>
                        <div class="invalid-feedback">
                            Merci de rentrer une adresse mail valide svp
                        </div>
                    </div>
                    <div class="form-floating has-validation mt-5">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Mot de passe" name="password" id="password">
                        <label for="floatingPassword">Mot de passe</label>
                    </div>
                    <div class="form-floating mt-4">
                        <input type="password" class="form-control" id="floatingPassword" placeholder="Confirmez le mot de passe" name="lastName" id="lastName">
                        <label for="floatingPassword">Confirmez le mot de passe</label>
                    </div>
                    <div class="mt-4 text-center">
                        <button class="btn btn-success btn-lg" type="submit">Ajouter</button>
                    </div>
                </div>

            </form>

        </main>

    </div>
</body>

</html>