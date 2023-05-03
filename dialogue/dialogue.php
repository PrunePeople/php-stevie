<?php
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue'); // connexion base de données

if ($_POST) {
    echo "pseudo posté: $_POST[pseudo] <br>";
    echo "message posté: $_POST[message] <br>";
    $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())")
        or DIE($mysqli->error);
    echo '<div class="validation">Votre message a bien été enregistré.</div>';
} // Fatal error si message contient: ' Et envoie possible si message vide
?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="message">Message</label><br>
    <textarea id="message" name="message" cols="50" rows="7"></textarea><br>
    <input type="submit" value="Envoyer le message">
</form>


<?php
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');
if ($_POST) {
    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);
    if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())")
            or DIE($mysqli->error);
        echo '<div class="validation">Votre message a bien été enregistré.</div>';
    } else {
        echo '<div class="erreur">Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire.</div>';
    }
}

//---------------------------------------------------------------------------------------------
// Partie affichage des commentaires
// $résultat = $mysqli->query("SELECT * FROM commentaire");
// while ($commentaire = $résultat->fetch_assoc()) {
//     echo '<div class="message">';
//     echo '<div class="titre">Par: ' . $commentaire['pseudo'] . ', ' . $commentaire['date_enregistrement'] . '</div>';
//     echo '<div class="contenu">' . $commentaire['message'] . '</div>';
//     echo '</div>';
// } 
//---------------------------------------------------------------------------------------------
// Partie formulaire d'envoi de commentaire

//---------------------------------------------------------------------------------------------
// Partie affichage des commentaires
$résultat = $mysqli->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr,
DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");
echo '<h2>' . $résultat->num_rows . ' commentaire(s)</h2>';
while ($commentaire = $résultat->fetch_assoc()) {
    echo '<div class="message">';
    echo '<div class="titre">Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
    echo '<div class="contenu">' . $commentaire['message'] . '</div>';
    echo '</div>';
} //---------------------------------------------------------------------------------------------
?>

<form method="post" action="">
    <label for="pseudo">Pseudo</label><br>
    <input type="text" id="pseudo" name="pseudo"><br>
    <label for="message">Message</label><br>
    <textarea id="message" name="message" cols="50" rows="7"></textarea><br>
    <input type="submit" value="Envoyer le message">
</form>







<?php
// Partie connexion à la BDD et initialisation
$mysqli = new Mysqli('localhost', 'root', '', 'dialogue');
$contenu = '';
//---------------------------------------------------------------------------------------------
// Partie enregistrement
if ($_POST) {
    $_POST['pseudo'] = addslashes($_POST['pseudo']);
    $_POST['message'] = addslashes($_POST['message']);
    if (!empty($_POST['pseudo']) && !empty($_POST['message'])) {
        $mysqli->query("INSERT INTO commentaire (pseudo, message, date_enregistrement) VALUES ('$_POST[pseudo]', '$_POST[message]', NOW())")
            or DIE($mysqli->error);
        $contenu .= '<div class="validation">Votre message a bien été enregistré.</div>';
    } else {
        $contenu .= '<div class="erreur">Afin de déposer un commentaire, veuillez svp remplir tous les champs du formulaire.</div>';
    }
} //---------------------------------------------------------------------------------------------
// Partie affichage des commentaires
$résultat = $mysqli->query("SELECT pseudo, message, DATE_FORMAT(date_enregistrement, '%d/%m/%Y') AS datefr,
DATE_FORMAT(date_enregistrement, '%H:%i:%s') AS heurefr FROM commentaire ORDER BY date_enregistrement DESC");
$contenu .= '<h2>' . $résultat->num_rows . ' commentaire(s)';
while ($commentaire = $résultat->fetch_assoc()) {
    $contenu .= '<div class="message">';
    $contenu .= '<div class="titre">Par: ' . $commentaire['pseudo'] . ', le ' . $commentaire['datefr'] . ' à ' . $commentaire['heurefr'] . '</div>';
    $contenu .= '<div class="contenu">' . $commentaire['message'] . '</div>';
    $contenu .= '</div>';
} //---------------------------------------------------------------------------------------------
// Partie formulaire d'envoi de commentaire
?>
<!Doctype html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="commentaire">
        <?php echo $contenu; ?>
    </div>
    <form method="post" action="">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo" maxlength="20" pattern="[a-zA-Z0-9.-_]+"
            title="caractère autorisés : a-zA-Z0-9.-_"><br>
        <label for="message">Message</label><br>
        <textarea id="message" name="message" cols="50" rows="7"></textarea><br>
        <input type="submit" value="Envoyer le message">
    </form>
</body>

</html>