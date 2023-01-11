<?php
echo '
<main class="text-success col">

  <h1 class="text-success text-center py-4 my-4">Ajouter un agent de terrain</h1>

  <form id="addAdministrator" novalidate method="post" action="/controleurs/add_field_person.php">

    <div class="container pt-4">
      <div class="row">
        <div class="col-12 col-md">
          <div class="form-floating mt-4">
            <input type="text" class="form-control" id="floatingInput1" placeholder="Prénom" name="firstName">
            <label for="floatingInput1">Prénom</label>
            <div class="invalid-feedback">
              Merci de rentrer un nom svp
            </div>
          </div>
        </div>
        <div class="col-12 col-md">
          <div class="form-floating mt-4">
            <input type="text" class="form-control" id="floatingInput2" placeholder="Nom" name="lastName">
            <label for="floatingInput2">Nom</label>
            <div class="invalid-feedback">
              Merci de rentrer un prénom svp
            </div>
          </div>
        </div>
      </div>
      <div class="form-floating mt-5">
        <input type="date" class="form-control" id="floatingDate" placeholder="Date de naissance" name="birthDate">
        <label for="floatingDate">Date de naissance</label>
        <div class="invalid-feedback">
          Merci de rentrer une date valide svp
        </div>
      </div>
      <div class="form-floating mt-5">
        <input type="number" class="form-control" id="floatingNumber" placeholder="Nom de code ou code d\'identification" name="codeNameOrIdentificationCode">
        <label for="floatingNumber">Nom de code ou code d\'identification</label>
      </div>';

        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusObject->displaySelectStatusOptions();

        $fieldPersonTypesObject = new FieldPersonType();
        $fieldPersonTypesObject->displaySelectTypesOptions();

        $countryObject = new Country();
        $countryObject->displayCountriesDatalist();

echo' 
      <div class="mt-4 text-center">
        <button class="btn btn-success btn-lg" type="submit">Ajouter</button>
      </div>
    </div>

  </form>
';