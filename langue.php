<!Doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Site Web</title>
    <meta name="viewport" content="=device-, initial-scale=1">
    <meta name="description" lang="fr" content="DESCRIPTION DU SITE">
    <meta name="author" content="AUTEUR">
    <meta name="robots" content="index, follow">
    <!-- Icones -->
    <link rel="favicon-icon" href="img/favicon.png">
    <link rel="shortcut icon" href="img/favicon.ico">
    <!-- CSS -->
    <link rel="stylesheet" href="src/style.css">
    <!-- JS -->
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
</head>
<?php
if (isset($_GET['pays'])) {
    $pays = $_GET['pays'];
} elseif (isset($_COOKIE['pays'])) {
    $pays = $_COOKIE['pays'];
} else {
    $pays = 'fr';
}
$expiration = 365 * 24 * 3600;
setCookie("pays", $pays, time() + $expiration);
?>

<body>
    <nav>
        <div class="container">
            <h3>Choisir une langue:</h3>
            <ul>
                <li><a href="langue.php?pays=fr">French</a></li>
                <li><a href="langue.php?pays=en">English</a></li>
                <li><a href="langue.php?pays=it">Italy</a></li>
                <li><a href="langue.php?pays=es">Spain</a></li>
                <li><a href="langue.php">Retour</a></li>
            </ul>
        </div>
    </nav>
    <?php
    if (isset($_GET['pays'])) { // vérifie si l'argument "pays" est présent dans l'URL
        $pays = $_GET['pays']; // si c'est le cas, stock sa valeur dans la variable $pays
        echo '<h3>Vous avez sélectionné ' . $pays . '</h3>'; // affiche message personnalisé pour indiquer le pays sélectionné
    } else {
        echo '<h3>Aucun pays sélectionné</h3>'; // sinon affiche un message générique indiquant qu'aucun pays n'a été sélectionné
    }
    ?>

    <?php
    switch ($pays) {
        case 'fr':
            echo '<p>Bonjour, <br> Vous visiter actuellement le site en français <br>Effectivement, la sauvegarde du cookie permet de retenir la
langue avec laquelle vous naviguer sur le site pour vos prochaines visites. <br>A bientôt.</p>';
            break;
        case 'es':
            echo '<p>¡Hola <br>En este momento está visitando el sitio en español <br>De hecho, la cookie permite la copia de seguridad de
conservar el idioma que utilice el sitio para futuras visitas. <br>Pronto.</p>';
            break;
        case 'en':
            echo '<p>Hello <br>You are currently visiting the site in English <br>Indeed, the cookie allows the backup to retain the language that you
use the site for future visits. <br>Soon.</p>';
            break;
        case 'it':

            // Explications et décomposition du code
// 1ère condition IF :
// Cette condition permet de savoir si un code pays est défini.
// En gros : est-ce que l'internaute a cliqué sur l'un des liens pour afficher le site dans une langue particulière ?
// Si l'url contient un code pays, c'est donc qu'un lien a été cliqué, nous l'affectons à la variable $pays
// 2ème condition ELSEIF :
// Elseif = Sinon si, un cookie nommé "pays" existe sur l'ordinateur de l'internaute.
// Nous le récupérons et affectons la variable $pays avec.
// Cette condition s'exécutera uniquement si nous ne sommes pas rentrés dans le IF précédent et si l'internaute est déjà venu sur le site (sinon le cookie
// n'existerait pas).
// 3ème condition ELSE :
// Else = Sinon, dans le scénario où le if (pas de clic sur 1 lien de la part de l'internaute) et le elseif (pas de cookie) ne se déclenchent pas, le cas par
// défaut sera appliqué.
// Nous mettons le code pays "en" dans la variable $pays
// Ce cette manière, le site s'affichera par défaut en Anglais.
// Cette condition (par défaut) s'exécutera uniquement si nous ne sommes pas rentrés dans le IF, ni dans le ELSEIF précédent.
// Nous ressortirons forcément de cette série de conditions IF / ELSEIF / ELSE avec la variable $pays affectée par un code pays:
// Affichage de $pays :
// Si vous souhaitez avoir connaissance du code pays dans la variable $pays, rien ne vous empêche d'écrire la ligne ci-dessus (le temps des tests).
// Cela affichera le contenu de la variable $pays
// Création / Mise à jour du cookie :
// $expiration nous permet de conserver le calcul d'1 année en secondes (365 jours x 24 heures x 3600 vient de 60sec x 60min nombre de seconde
// dans 1 heure).
// setCookie nous permet de déposer le fichier cookie sur l'ordinateur de l'internaute.
// Argument 1 - Nom du cookie : pays
// Argument 2 - Valeur du cookie : "fr" ou "en" ou "it" ou "es"
// Argument 3 - Date d'expiration : dans 1 an à partir d'aujourd'hui
// Puisque ce code ne se trouve pas dans une condition, nous créerons (dans tous les cas) un cookie (sur l'ordinateur de l'internaute) avec le code pays
// contenu dans la variable $pays.
            echo '<p>Ciao <br>Si sta attualmente visitando il sito in Italiano <br>Infatti, il cookie consente il backup di mantenere la lingua che si
usa il sito per visite future. <br>Presto.</p>';
            break;
    }


    switch ($pays) {
        case 'fr':
            echo '<p>Bonjour, <br> Vous visiter actuellement le site en français <br>Effectivement, la sauvegarde du cookie permet de retenir la langue
avec laquelle vous naviguer sur le site pour vos prochaines visites. <br>A bientôt.</p>';
            break;
        case 'es':
            echo '<p>¡Hola <br>En este momento está visitando el sitio en español <br>De hecho, la cookie permite la copia de seguridad de conservar
el idioma que utilice el sitio para futuras visitas. <br>Pronto.</p>';
            break;
        case 'en':
            echo '<p>Hello <br>You are currently visiting the site in English <br>Indeed, the cookie allows the backup to retain the language that you use
the site for future visits. <br>Soon.</p>';
            break;
        case 'it':
            echo '<p>Ciao <br>Si sta attualmente visitando il sito in Italiano <br>Infatti, il cookie consente il backup di mantenere la lingua che si usa il
sito per visite future. <br>Presto.</p>';
            break;
    }
    ;

    ?>

</body>

</html>