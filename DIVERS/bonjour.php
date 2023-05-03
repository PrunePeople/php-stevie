<?php
session_start();
$_SESSION['pseudo'] = "Mathieu";
$_SESSION['mdp'] = "Balmont";

print_r($_SESSION);
unset($_SESSION['mdp']);


echo 'Bonjour ' . $_SESSION['pseudo'] . '<br>';

print_r($_SESSION);

session_destroy();

print_r($_SESSION);



session_start();
if ($_POST) {
    $_SESSION["pseudo"] =
        $_POST['pseudo'];
}
if (isset($_SESSION['pseudo'])) {
    echo "votre pseudo est: " . $_SESSION['pseudo'] . "<br>";
} else {
    echo '<form method="post"
action=""> <label for="pseudo">Pseudo:</
label><br>
<input type="text"
name="pseudo" value=""><br>
<input type="submit" value="envoi">
</form>';
}



// session_start();
echo 'Temps Actuel : ' . time() . '<br>';
print "<pre>";
print_r($_SESSION);
print "</pre>";
if (isset($_SESSION['temps'])) {
    if (time() > ($_SESSION['limite'] + $_SESSION['temps'])) {
        session_destroy();
        echo "déconnexion";
    } else {
        $_SESSION['temps'] = time();
        echo "connexion mise à jour";
    }
} else {
    echo "connexion";
    $_SESSION['limite'] = 20;
    $_SESSION['temps'] = time();
}