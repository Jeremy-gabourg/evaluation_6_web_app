<?php
echo'
<main class="text-success col">

    <h1 class="text-success text-center py-4 my-4">Modifier un pays</h1>

    <form id="addAdministrator" novalidate method="post" action="/controleurs/modify_country.php">

        <div class="container pt-4">
            <div class="form-floating mb-3 mt-4">
                <input type="text" class="form-control" id="floatingInput1" placeholder="Nom Français" name="frenchName" value="'.$country->getFrenchName().'">
                <label for="floatingInput1">Nom français</label>
                <div class="invalid-feedback">
                    Merci de rentrer un nom svp
                </div>
            </div>
            <div class="form-floating mt-4">
                <input type="text" class="form-control" id="floatingInput2" placeholder="Nom Anglais" name="englishName" value="'.$country->getEnglishName().'">
                <label for="floatingInput2">Nom Anglais</label>
                <div class="invalid-feedback">
                    Merci de rentrer un nom svp
                </div>
            </div>
            <div class="form-floating mt-5">
                <input type="number" class="form-control" id="floatingNumber" placeholder="Code" name="countryCode" value="'.$country->getCountryCode().'">
                <label for="floatingNumber">Code</label>
                <div class="invalid-feedback">
                    Merci de rentrer un code valide svp
                </div>
            </div>
            <div class="form-floating mt-5">
                <input type="text" class="form-control" id="floatingInput3" placeholder="Code Alpha 2 caractères" name="alphaCode2" value="'.$country->getAlpha2Code().'">
                <label for="floatingInput3">Code Alpha 2 caractères</label>
            </div>
            <div class="form-floating mt-5">
                <input type="text" class="form-control" id="floatingInput4" placeholder="Code Alpha 3 caractères" name="alphaCode3" value="'.$country->getAlpha3Code().'">
                <label for="floatingInput4">Code Alpha 3 caractères</label>
            </div>
            <div class="mt-4 text-center">
                <button class="btn btn-success btn-lg" type="submit">Enregistrer les modifications</button>
            </div>
        </div>

    </form>
';