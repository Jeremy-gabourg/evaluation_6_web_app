<?php
echo '
<main class="text-success col">

  <h1 class="text-success text-center py-4 my-4">Modifier un agent de terrain</h1>

  <form id="addFieldPerson" novalidate method="post" action="/controleurs/modify_field_person.php">

    <div class="container pt-4">
      <div class="row">
        <div class="col-12 col-md">
          <div class="form-floating mt-4">
            <input type="text" class="form-control" id="floatingInput1" placeholder="Prénom" name="firstName" value="'.$fieldPersonObject->getFirstName().'">
            <label for="floatingInput1">Prénom</label>
            <div class="invalid-feedback">
              Merci de rentrer un nom svp
            </div>
          </div>
        </div>
        <div class="col-12 col-md">
          <div class="form-floating mt-4">
            <input type="text" class="form-control" id="floatingInput2" placeholder="Nom" name="lastName" value="'.$fieldPersonObject->getLastName().'">
            <label for="floatingInput2">Nom</label>
            <div class="invalid-feedback">
              Merci de rentrer un prénom svp
            </div>
          </div>
        </div>
      </div>
      <div class="form-floating mt-5">
        <input type="date" class="form-control" id="floatingDate" placeholder="Date de naissance" name="birthDate" value="'.$fieldPersonObject->getBirthDate().'">
        <label for="floatingDate">Date de naissance</label>
        <div class="invalid-feedback">
          Merci de rentrer une date valide svp
        </div>
      </div>
      <div class="form-floating mt-5">
        <input type="text" class="form-control" id="floatingInput3" placeholder="Nom de code ou code d\'identification" name="codeNameOrIdentificationCode" value="'.$fieldPersonObject->getCodeNameOrIdentification().'">
        <label for="floatingInput3">Nom de code ou code d\'identification</label>
      </div>
      <div class="form-floating mt-5">
        <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="status">
            <option selected value="'.$fieldPersonObject->getStatus().'">'.$status->getName().'</option>
      ';
        $fieldPersonStatusObject = new FieldPersonStatus();
        $fieldPersonStatusObject->displaySelectStatusOptions();

echo '
        <div class="form-floating mt-5">
            <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="type">
                <option selected value="'.$fieldPersonObject->getType().'">'.$type->getName().'</option>
        ';
        $fieldPersonTypesObject = new FieldPersonType();
        $fieldPersonTypesObject->displaySelectTypesOptions();

echo '
        <div class="form-floating mt-5">
            <input class="form-control" list="datalistOptions" id="floatingDataList" placeholder="Taper pour rechercher..." name="placeOfBirth" value="'.$country->getFrenchName().'">
            <datalist id="datalistOptions">
        ';
        $countryObject = new Country();
        $countryObject->displayCountriesDatalist();

echo' 
      <div class="mt-4 text-center">
        <button class="btn btn-success btn-lg" type="submit">Enregistrer les modifications</button>
      </div>
    </div>

  </form>
';
