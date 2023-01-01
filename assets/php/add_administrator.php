<?php
include_once ('../templates/back_template.php');
?>
        <main class="col">

            <h1 class="text-success text-center pb-4 mb-4">Ajouter un administrateur</h1>

            <div class="pt-4">
                <div class="form-floating mb-3 mt-4">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Nom">
                    <label for="floatingInput">Nom</label>
                </div>
                <div class="form-floating mt-4">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Prénom">
                    <label for="floatingPassword">Prénom</label>
                </div>
                <div class="mt-4 text-center">
                    <a class="btn btn-success btn-lg" href="#" role="button">Ajouter</a>
                </div>
            </div>

        </main>

    </div>

</body>

</html>