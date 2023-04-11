<?php
$_ENV['title'] = '<h1 class="text-success text-center py-4 my-4">Ajouter une planque</h1>';
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
            <input type="text" class="form-control" id="floatingInput1" placeholder="Adresse" name="address">
            <label for="floatingInput1">Adresse</label>
            <div class="invalid-feedback">
              Merci de rentrer une adresse svp
            </div>
          </div>
        </div>';
        <div class="form-floating mt-5">
            <input class="form-control" list="datalistOptions" id="floatingDataList" placeholder="Pays d\'implantation" name="country">
            <datalist id="datalistOptions">

<?php
$countryObject = new Country();
$countryObject->displayCountriesDatalist();
?>

    </div>
      <div class="form-floating mt-5">
            <select class="form-select" id="floatingSelect2" aria-label="Floating label select example" name="types">
                <option selected>Choisissez un type</option>

<?php
$safeHouseTypesObject = new safeHouseType();
$safeHouseTypesObject->displaySelectTypesOptions();
?>

        <div class="mt-4 text-center">
        <button class="btn btn-success btn-lg" type="submit">Ajouter</button>
      </div>
  </form>