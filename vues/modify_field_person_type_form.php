<main class="text-success col">

    <h1 class="text-success text-center py-4 my-4">Modifier un type de personnel de terrain</h1>

    <form id="modifyFieldPersonType" novalidate method="post" action="/controleurs/modify_field_person_type.php">

        <div class="container pt-4">
            <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput1" placeholder="Nom" name="name" value="<?php echo $type->getName() ?>">
                <label for="floatingInput1">Nom</label>
                <div class="invalid-feedback">
                    Merci de rentrer un nom svp
                </div>
            </div>

            <div class="mt-4 text-center">
                <button class="btn btn-success btn-lg" type="submit">Enregistrer les modifications</button>
            </div>
        </div>

    </form>