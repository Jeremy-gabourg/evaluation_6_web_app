<main class="text-success col">

  <h1 class="text-success text-center py-4 my-4">Ajouter une Spécialité</h1>

  <form id="addSpeciality" novalidate method="post" action="/controleurs/modify_speciality.php">

    <div class="container pt-4">
      <div class="form-floating mb-3 mt-4">
        <input type="text" class="form-control" id="floatingInput1" placeholder="Nom" name="name" value="<?php echo $speciality->getName() ?>">
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