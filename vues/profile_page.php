<main class="text-success col">
    <h1 class="my-4 text-center">Mon profil</h1>
    <form id="modifyMyProfile" novalidate method="post" action="/controleurs/profile.php">
        <div class="container pt-4">
            <div class="row">
                <div class="col-12 col-md">
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="floatingInput1" placeholder="Prénom" name="firstName" value="<?php echo $administrator->getFirstName() ?>">
                        <label for="floatingInput1">Prénom</label>
                        <div class="invalid-feedback">
                            Merci de rentrer un nom svp
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md">
                    <div class="form-floating mt-4">
                        <input type="text" class="form-control" id="floatingInput2" placeholder="Nom" name="lastName" value="<?php echo $administrator->getLastName() ?>">
                        <label for="floatingInput2">Nom</label>
                        <div class="invalid-feedback">
                            Merci de rentrer un prénom svp
                        </div>
                    </div>
                </div>
            </div>
            <div class="form-floating mt-5">
                <input type="email" class="form-control" id="floatingEmail" placeholder="Adresse mail" name="email" value="<?php echo $administrator->getEmail() ?>">
                <label for="floatingEmail">Adresse mail</label>
                <div class="invalid-feedback">
                    Merci de rentrer une adresse mail valide svp
                </div>
            </div>
            <div class="form-floating mt-5">
                <input type="password" class="form-control" id="floatingPassword1" placeholder="Mot de passe" name="password" value="<?php echo $administrator->getPassword() ?>">
                <label for="floatingPassword1">Mot de passe</label>
            </div>
            <div class="mt-4 text-center">
                <button class="btn btn-success btn-lg" type="submit">Enregistrer les modifications</button>
            </div>
        </div>

    </form>    
