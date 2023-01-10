<?php
echo '
<main class="text-success col">

  <h1 class="text-success text-center py-4 my-4">Ajouter un agent de terrain</h1>

  <form id="addAdministrator" novalidate method="post" action="/controleurs/add_person_field.php">

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
      </div>
      <div class="form-floating mt-5">
        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="status">';

        for ($status=1; $status <= $nbFieldPersonStatus; $status++) {
            echo '<option value="'.$fieldPersonStatus->getId().'">'.$fieldPersonStatus->getName().'</option>';
        }

        echo '
        </select>
        <label for="floatingSelect">Types</label>
      </div>
      <div class="form-floating mt-5">
        <select class="form-select" id="floatingSelect1" aria-label="Floating label select example" name="type">';

        for ($type=1; $type <= $nbFieldPersonTypes; $type++) {
            echo '<option value="'.$fieldPersonType->getId().'">'.$fieldPersonType->getName().'</option>';
        }

echo'   </select>
        <label for="floatingSelect">Types</label>
      </div>
      <div class="form-floating mt-5">
        <input class="form-control" list="datalistOptions" id="floatingDataList" placeholder="Type to search..." name="placeOfBirth">
        <datalist id="datalistOptions">
          <option value="San Francisco">
          <option value="New York">
          <option value="Seattle">
          <option value="Los Angeles">
          <option value="Chicago">
        </datalist>
        <label for="floatingDataList">Datalist example</label>
      </div>
      <div class="mt-4 text-center">
        <button class="btn btn-success btn-lg" type="submit">Ajouter</button>
      </div>
    </div>

  </form>
';