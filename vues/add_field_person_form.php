<?php
$_ENV['title'] = '  <h1 class="text-success text-center py-4 my-4">Ajouter un agent de terrain</h1>';

echo '
<main class="text-success col">';

    echo $_ENV['title'];

echo '
  <form id="addFieldPerson" novalidate method="post" action="/controleurs/add_field_person.php">

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
        <input type="text" class="form-control" id="floatingInput3" placeholder="Nom de code ou code d\'identification" name="codeNameOrIdentificationCode">
        <label for="floatingInput3">Nom de code ou code d\'identification</label>
      </div>
      <div class="form-floating mt-5">
        <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="status">
           <option selected>Choisissez un statut</option>
      ';
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusObject->displaySelectStatusOptions();

        echo '
        <div class="form-floating mt-5">
            <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="types">
                <option selected>Choisissez un type</option>
        ';
        $fieldPersonTypesObject = new FieldPersonType();
        $fieldPersonTypesObject->displaySelectTypesOptions();

        echo '
        <div class="form-floating mt-5">
            <input class="form-control" list="datalistOptions" id="floatingDataList" placeholder="Pays de naissance" name="placeOfBirth">
            <datalist id="datalistOptions">
        ';
        $countryObject = new Country();
        $countryObject->displayCountriesDatalist();

echo' 
      <div class="mt-4 text-center">
        <button class="btn btn-success btn-lg" type="submit">Ajouter</button>
      </div>
    </div>

  </form>
';