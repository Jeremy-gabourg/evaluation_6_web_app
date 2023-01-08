<?php
echo '
<main class="text-success col">
    <h1 class="my-4 text-center">Mon profil</h1>
    <form>
        <ul>
            <li>Prénom : '.$_SESSION['firstName'].'</li>
            <li>Nom : '.$_SESSION['lastName'].'</li>
            <li>Adresse mail : '.$_SESSION['email'].'</li>
            <li>Mot de passe : '.$_SESSION['password'].'</li>
        </ul>
    </form>
    
</main>
';





