<?php


// --------- Afficher du texte
echo 'Bonjour <br>'; // echo un poil plus rapide que print
print 'Nous sommes vendredi et il fait beau !';
// Bonjour
// Nous sommes vendredi et il fait beau !


// --------- Affichage de commentaires
// commentaire sur 1 ligne
/* commentaire
sur plusieurs
lignes */
# commentaire sur 1 ligne


// --------- Mélange de HTML et PHP
// Méthode 1
echo '<h1>Bonjour</h1>';
echo 'Nous sommes <strong>vendredi</strong> et il fait beau !<br>';
echo '<div class="mazone"> Je crée une zone html dans du php </div>';
?>
<!-- Méthode 2: Moins propre -->
<h1>
    <?php echo 'Bonjour'; ?>
</h1>
<?php echo 'Nous sommes'; ?> <strong>vendredi</strong>
<?php echo ' et il fait beau !'; ?> <br>
<div class="mazone">
    <?php echo 'Je crée une zone html dans du php'; ?>
</div>


<?php
// Variables
$prenom = "Fred"; // Déclaration variable
echo "<p>Bonjour $prenom</p>"; // Réutilisation
echo "<p>Comment va-tu $prenom ?</p>";
echo "<p>Voici tes informations de profil $prenom ...</p>";

// une variable est interchangeable et ce autant de fois qu'on le souhaite
$prenom = "Marie";
echo "<p>Voici tes informations de profil $prenom ...</p>"; // Voici tes informations de profil Marie ...


// Type variables
$variable1 = 127;
echo gettype($variable1) . "<br>"; // gettype() -> permet de voir le type d'une variable, ici integer

$variable2 = 1.5;
echo gettype($variable2) . "<br>"; // ici double

$variable3 = "une chaîne";
echo gettype($variable3) . "<br>"; // ici string

$variable4 = '127';
echo gettype($variable4) . "<br>"; // ici string

$variable5 = TRUE;
echo gettype($variable5) . "<br>"; // ici boolean

$variable6 = FALSE;
echo gettype($variable6) . "<br><br>"; // ici boolean


// Assignation par référence
$fruit1 = 'pomme'; // affecte la valeur 'pomme' à $fruit1
$fruit2 = 'banane'; // affecte la valeur 'banane' à $fruit2
echo "fruit1 : $fruit1 <br>"; // affiche : pomme
echo "fruit2 : $fruit2 <br>"; // affiche : banane
$fruit2 = &$fruit1; // passage de référence (assigne la référence de $fruit1 à $fruit2)
echo "fruit1 : $fruit1 <br>"; // affiche : pomme (référence 1)
echo "fruit2 : $fruit2 <br>"; // affiche : pomme (référence 1)
$fruit2 = 'fraise'; // modifie la valeur de $fruit2 (et de $fruit1 par repercution, même espace mémoire)
echo "fruit1 : $fruit1 <br>"; // affiche : fraise
echo "fruit2 : $fruit2 <br><br>"; // affiche : fraise
// Si nous changeons $fruit2, $fruit1 change en conséquence


// Asssiganation de valeur
$fruit1 = 'pomme'; // affecte la valeur 'pomme' à $fruit1
$fruit2 = 'banane'; // affecte la valeur 'banane' à $fruit2
echo "fruit1 : $fruit1 <br>"; // affiche : pomme
echo "fruit2 : $fruit2 <br>"; // affiche : banane
$fruit2 = $fruit1; // passage de valeur ($fruit2 contient maintenant "pomme")
echo "fruit1 : $fruit1 <br>"; // affiche : pomme (référence 1)
echo "fruit2 : $fruit2 <br>"; // affiche : pomme (référence 1)
$fruit2 = 'fraise'; // modifie la valeur de $fruit2 uniquement
echo "fruit1 : $fruit1 <br>"; // affiche : pomme
echo "fruit2 : $fruit2 <br><br>"; // affiche : fraise
// $fruit2 et $fruit1 ne sont pas liés, ils possèdent des références différentes et pointent vers des espaces mémoire différents.


// Constantes
define("CAPITALE", "Paris");
echo CAPITALE . "<br><br>"; // Paris

echo __FILE__ . "<br>"; // Affiche le chemin complet vers le fichier actuel: C:\xampp\htdocs\php2\entrainement\entrainement.php
echo __LINE__ . "<br><br>"; // Affiche le numéro de la ligne: 101


// Concaténation
$x = "bonjour "; // affectation de la valeur "bonjour" dans la variable $x.
$y = "tout le monde"; // affectation de la valeur "tout le monde" dans la variable $y.
echo $x . " " . $y . "<br>"; // point de concaténation que l'on peux traduire par "suivi de". : bonjour tout le monde
echo "$x $y <br>"; // même chose que la ligne d'au dessus, sans concaténation : bonjour tout le monde
echo "Hey ! " . $x . " " . $y; // concaténation de texte et de variables : Hey ! bonjour tout le monde
echo "<br>", "Hello ", $y, "<br><br>"; // concaténation avec l'utilisation d'une virgule (la virgule et le point de concaténation sont similaires) : Hello tout le monde

$prenom1 = "Bruno"; // Affectation de la valeur "Bruno" sur la variable : $prenom1
$prenom1 = "Claire"; // Affectation de la valeur "Claire" sur la variable : $prenom1. cela remplace Bruno par Claire.
echo $prenom1 . "<br>"; // Affiche : Claire
$prenom2 = "Nicolas"; // Affectation de la valeur "Nicolas" sur la variable : $prenom2
$prenom2 .= " Marie"; // Affectation de la valeur " Marie" sur la variable : $prenom2. Ajout SANS remplacement de la valeur précédente grâce à l'opérateur .=
echo $prenom2 . "<br><br>"; // Affiche : Nicolas Marie


// Guillemets et Quotes
$jour = 'aujourd\'hui'; // utilisation des quotes avec l'anti-slash pour éviter une erreur sur lapostrophe du mot : aujourd'hui.
$jour = "aujourd'hui"; // utilisation des guillemets
$texte = 'bonjour'; // utilisation des quotes
echo $texte . " tout le monde<br>"; // Concaténation d'une variable et de texte: bonjour tout le monde
echo "$texte tout le monde<br>"; // Affichage dans des guillemets, la variable est évaluée. Pas de concaténation : bonjour tout le monde
echo '$texte tout le monde<br><br>'; // Affichage dans des quotes, la variable n'est pas évaluée ! : $texte tout le monde


// Conditions
$a = 10;
$b = 5;
$c = 2;
?>

<img src="/src/if-elseif-else.jpg" alt="Image If Elseif Else">

<?php
if ($a > $b) // Si A est supérieur à B
{
    echo "A est bien supérieur à B <br>";
} else // Sinon ... A n'est pas supérieur à B
{
    echo "non, c'est B qui est supérieur à A <br>";
}

echo ($a == 10) ? "A est égal à 10<br>" : "A n'est pas égal à 10<br>"; // Contracté
?>

<img src="/src/if-elseif-else.jpg" alt="Image If Elseif Else">

<?php
if ($a > $b && $b > $c) // Si A est supérieur à B et que dans le même temps B est supérieur à C
{
    echo "A est supérieur à B, ET, B est supérieur à C <br>";
}

if ($a == 9 || $b > $c) // Si A contient 9 ou que B est supérieur à C
{
    echo "Au moins l'une des 2 conditions est bonne (ou peut-être les 2), sinon vous ne me verriez pas m'afficher ! <br>";
}

if ($a == 10 || $b > $c) // Si A contient 10 ou que B est supérieur à C
{
    echo "Au moins l'une des 2 conditions est bonne (ou peut-être les 2), sinon vous ne me veriez pas m'afficher ! <br>";
}

if ($a == 10 XOR $b == 6) // XOR : seulement l'une des 2 conditions doit être valide.
{
    echo 'Une seule des 2 conditions est bonne !<br>';
}
?>

<img src="/src/if.jpg" alt="Image If Elseif Else">

<?php
if ($a == 8) // le double égal (==) permet de vérifier une information à l'intérieur d'une variable
{
    echo "1 - A est égal à 8";
} elseif ($a != 10) // SinonSi A est différent de 10
{
    echo "2 - A est différent de 10";
} else // Sinon, c'est que je ne suis ni tombé dans le if, ni dans le elseif, je me trouve donc ici dans le else.
{
    echo "3 - tout le monde a faux A n'est pas égal a 8 et n'est pas différent de 10. Du coup c'est moi le else qui gagne !<br>";
}

$vara = 1;
$varb = "1";
if ($vara == $varb) {
    echo "il s'agit de la même valeur <br>";
}

$vara = 1;
$varb = 1;
if ($vara === $varb) {
    echo "il s'agit de la même valeur et du même type <br><br>";
}


// Switch
$monPays = 'France';
if ($monPays == 'Italie') {
    echo 'vous êtes Italien!<br>';
} elseif ($monPays == 'Espagne') {
    echo 'vous êtes Espagnol!<br>';
} elseif ($monPays == 'Angleterre') {
    echo 'vous êtes Anglais!<br>';
} elseif ($monPays == 'France') {
    echo 'vous êtes Français!<br>';
} elseif ($monPays == 'Suisse') {
    echo 'vous êtes Suisse!<br>';
} else {
    echo 'vous n\'avez pas une nationalité connu dans notre liste de possibilités<br>';
}
/*
S'il y a beaucoup de tests à réaliser, l'utilisation de IF, ELSEIF, ELSE va être assez contraignante et peu optimisée pour les performances
(temps d'exécution du serveur plus faible une fois le code mis en ligne avec des multi connexions).
Par conséquent, retenez que dans le cas d'un grand nombre de conditions à tester, il sera préférable d'utiliser la structure conditionnelle switch :
*/
$monPays = 'France';
switch ($monPays) {
    case 'Italie':
        echo 'vous êtes Italien!<br>';
        break;
    case 'Espagne':
        echo 'vous êtes Espagnol!<br>';
        break;
    case 'Angleterre':
        echo 'vous êtes Anglais!<br>';
        break;
    case 'France':
        echo 'vous êtes Français!<br><br>';
        break;
    case 'Suisse':
        echo 'vous êtes Suisse!<br>';
        break;
    default:
        echo 'vous n\'avez pas une nationalité connu dans notre liste de possibilités<br><br>';
        break;
}


// Différence entre if et elseif
$couleur = 'bleu';
if ($couleur == 'bleu') {
    echo 'votre couleur préférée est le bleu.<br>';
}
if ($couleur == 'orange') {
    echo 'votre couleur préférée est le orange.<br>';
}
if ($couleur == 'rose') {
    echo 'votre couleur préférée est le rose.<br>';
} else {
    echo 'nous n\'arrivons pas à determiner votre couleur préférée !!<br>';
}
/*
Et oui, vous ne vous trompez pas, le if de la couleur bleue est bien exécuté, mais aussi le else de fin.
Pourquoi ? Et bien c'est simple, l'interpréteur lit les instructions séquentiellement.
Ligne 4 : il voit que la couleur est bleu et rentre dans le IF.
Ligne 8 : la couleur n'est pas orange et ne rentre pas dans le IF.
Ligne 12 : la couleur n'est pas rose et ne rentre pas dans le IF.
Ligne 16 : Puisque la couleur n'était pas rose (cas juste au dessus), il rentre dans le ELSE (cas par défaut) car chaque else se réfère au IF qui le
précède !
*/

$couleur = 'bleu';
if ($couleur == 'bleu') {
    echo 'votre couleur préférée est le bleu.<br><br>';
} elseif ($couleur == 'orange') {
    echo 'votre couleur préférée est le orange.<br>';
} elseif ($couleur == 'rose') {
    echo 'votre couleur préférée est le rose.<br>';
} else {
    echo 'nous n\'arrivons pas à determiner votre couleur préférée !!<br>';
}
/*
Ligne 4 : il voit que la couleur est bleu et rentre dans le IF.
Ligne 8 : il ne cherche pas à rentrer dans un ELSEIF puisque le IF a été évalué comme étant positif (TRUE, vrai).
Ligne 12 : il ne cherche pas à rentrer dans un ELSEIF puisque le IF a été évalué comme étant positif (TRUE, vrai).
Ligne 16 : il ne cherche pas non plus à rentrer dans un ELSE puisque le IF a été évalué comme étant positif (TRUE, vrai).
*/


// Fonctions prédéfinies: date
echo 'Date : <br>';
echo date("d/m/Y") . "<br>"; // 02/05/2023
echo date("D/M/Y") . "<br>"; // Tue/May/2023
echo date("d/m/y") . "<br>"; // 02/05/23
echo date("d M Y") . "<br><br>"; // 02 May 2023


// Fonctions prédéfinies: afficher la taille d'une chaine
$phrase = 'Mettez une phrase différente ici à cet endroit!';
echo strlen($phrase) . "<br><br>"; // 49


// Fonctions prédéfinies: couper une chaine
$texte = "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has
survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.";
echo substr($texte, 0, 20) . "...<a href='\'\''> Lire la suite </a><br><br>"; // Lorem Ipsum is simpl... Lire la suite


// Fonctions prédéfinies: tester l'existance d'une variable
$pseudo = "joker";
if (isset($pseudo)) {
    echo 'la variable $pseudo existe!<br><br>';
} else {
    echo 'la variable $pseudo n\'existe PAS!<br>';
}

if (isset($pseudo2)) {
    echo 'la variable $pseudo2 existe!<br>';
} else {
    echo 'la variable $pseudo2 n\'existe PAS!<br>';
}


// Fonctions prédéfinies: tester le contenu d'une variable
$pseudo3 = "joker";
if (empty($pseudo3)) {
    echo 'la variable $pseudo3 est vide!<br>';
} else {
    echo 'la variable $pseudo3 n\'est pas vide (et est donc remplie).<br>';
}

$pseudo4 = "";
if (empty($pseudo4)) {
    echo 'la variable $pseudo4 est vide!<br>';
} else {
    echo 'la variable $pseudo4 n\'est pas vide (et est donc remplie)!<br>';
}

$pseudo5 = "joker";
if (!empty($pseudo5)) {
    echo 'la variable $pseudo5 n\'est pas vide (et est donc remplie)!<br>';
}