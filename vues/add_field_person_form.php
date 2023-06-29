<?php
$_ENV['title'] = '  <h1 class="text-success text-center py-4 my-4">Ajouter un agent de terrain</h1>';
?>

<main class="text-success col">

<?php
echo $_ENV['title'];
?>

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

<?php
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusObject->displaySelectStatusOptions();
?>

        <div class="form-floating mt-5">
            <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="types">
                <option selected>Choisissez un type</option>

<?php
        $fieldPersonTypesObject = new FieldPersonType();
        $fieldPersonTypesObject->displaySelectTypesOptions();
?>

        <div class="form-floating mt-5">
            <input class="form-control" list="datalistOptions" id="floatingDataList" placeholder="Pays de naissance" name="placeOfBirth">
            <datalist id="datalistOptions">

<?php
        $countryObject = new Country();
        $countryObject->displayCountriesDatalist();
?>

    <div class="mt-4 text-center">
        <button class="btn btn-secondary" id="add_speciality">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-square" viewBox="0 0 16 16">
              <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
              <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
            </svg>
            <span class="ps-1">Ajouter une spécialité</span>
        </button>
      </div>
    </div>

      <div class="my-5 text-center">
        <button class="btn btn-success btn-lg" type="submit">Enregistrer le nouvel agent</button>
      </div>
    </div>

  </form>