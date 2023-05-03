<?php
$mysqli = new Mysqli("localhost", "root", "", "entreprise"); // nom du serveur, pseudo, mot de passe, nom de la base de données=entreprise

$mysqli = new Mysqli("localhost", "root", "", "entreprise");
echo '<pre>';
print_r($mysqli);
echo '</pre>';
echo '<pre>';
print_r(get_class_methods($mysqli));
echo '</pre>';

$mysqli = new Mysqli("localhost", "root", "", "entreprise");
//-----------------------------------------------------------------
echo '<pre>';
print_r($mysqli);
echo '</pre>';
echo '<pre>';
print_r(get_class_methods($mysqli));
echo '</pre>';
//-----------------------------------------------------------------
// $mysqli->query("mauvaise requete volontaire ........."); // Fatal error
echo $mysqli->error . '<br>';

$mysqli = new Mysqli("localhost", "root", "", "entreprise");
//-----------------------------------------------------------------
// Insertion :
$result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('Audrey', 'Dedieu', 'f',
'informatique', '2023-02-01', 3000)");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête INSERT<br>';



$mysqli = new mysqli("localhost", "root", "", "entreprise");

// Récupération des données :
$result = $mysqli->query("SELECT * FROM employes");

// Affichage des données :
/*
parcourt toutes les lignes de résultat tant qu'il y en a, 
et pour chaque ligne, 
on affiche les différentes informations en utilisant les clés du tableau associatif $row.
*/
while ($row = $result->fetch_assoc()) { // permet de récupérer chaque ligne de résultat sous la forme d'un tableau associatif contenant les noms des colonnes comme clés.
    echo "ID : " . $row["id_employes"] . "<br>";
    echo "Prénom : " . $row["prenom"] . "<br>";
    echo "Nom : " . $row["nom"] . "<br>";
    echo "Sexe : " . $row["sexe"] . "<br>";
    echo "Service : " . $row["service"] . "<br>";
    echo "Date d'embauche : " . $row["date_embauche"] . "<br>";
    echo "Salaire : " . $row["salaire"] . "<br>";
    echo "<hr>";
}

// // Libération de la mémoire :
// // Cela permet de libérer les ressources utilisées et d'optimiser les performances de votre application.
// $result->free(); //  libére la mémoire utilisée par le résultat de la requête
// $mysqli->close(); // ferme la connexion à la base de données 



$mysqli = new Mysqli("localhost", "root", "", "entreprise");
//-----------------------------------------------------------------
// Insertion (INSERT) :
$result = $mysqli->query("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('prenom', 'nom', 'm',
'informatique', '2015-07-30', 5000)");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête INSERT<br>';
//-----------------------------------------------------------------
// Modification (UPDATE) :
$result = $mysqli->query("UPDATE employes SET salaire = 2500 WHERE id_employes = 802");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête UPDATE<br>';



$mysqli = new mysqli("localhost", "root", "", "entreprise");

// Suppression des enregistrements avec les id_employes 994, 995 et 996 :
$mysqli->query("DELETE FROM employes WHERE id_employes IN (994, 995, 996)");

echo $mysqli->affected_rows . " enregistrement(s) affecté(s) par la requête DELETE<br>.";



//-----------------------------------------------------------------
// Suppression (DELETE) :
$result = $mysqli->query("DELETE FROM employes WHERE id_employes = 388");
echo $mysqli->affected_rows . ' enregistrement(s) affecté(s) par la requête DELETE<br>';



// Affichage (SELECT) :
$result = $mysqli->query("SELECT * FROM employes WHERE prenom='julien'");
$employe = $result->fetch_assoc();
echo "<pre>";
print_r($employe);
echo "</pre>";
echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";




//-----------------------------------------------------------------
// Affichage (SELECT) :
$result = $mysqli->query("SELECT * FROM employes");
while ($employe = $result->fetch_assoc())
    ;

// Query
// Nous selectionnons tous les employés.
// Nous obtenons les enregistrements demandés dans la variable $result prévue pour récupérer le retour de la requête SQL.
// $result
// Nous avons prévu une variable $result juste avant la requête pour obtenir un retour.
// Par défaut, le retour de la requête SQL crée un nouvel objet, issu de la classe MYSQLI_RESULT
// Dans le cas d'une erreur de requete SQL, $result contiendra : (boolean) false
// Dans le cas d'une bonne requete SQL, $result contiendra : (object) MYSQLI_RESULT Si la requête est bonne, vous obtiendrez un autre objet issu d'une
// autre classe (MYSQLI_RESULT) !
// While
// while est une boucle permettant d'effectuer une répétition.
// Pourquoi effectuer une répétition ?
// Parce que nous avons plusieurs lignes d'enregistrements à récupérer. Il est donc nécessaire de répéter le traitement fetch_assoc() afin de rendre le résultat
// exploitable sous forme d'array.
// La boucle While permet d'afficher chaque ligne de la table (tant que l'on possède des enregistrements, on les affiche).
// Informations
// votre requete sort plusieurs résultats ? : une boucle !
// votre requete ne doit sortir qu'un seul et unique résultat ? : Pas de boucle !
// votre requete ne sort qu'un seul résultat à l'instant T mais peut potentiellement en sortir plusieurs plus tard ? : une boucle !
// fetch_assoc
// Le résultat (ressource) sous forme d'objet MYSQLI_RESULT n'est pas exploitable en l'état.
// Pour accèder aux données que nous avons selectionnées précédemment, nous avons besoin d'utiliser la méthode (fonction) fetch_assoc() de la classe
// MYSQLI_RESULT ($result->fetch_assoc()). La méthode fetch_assoc() permet de rendre un résultat exploitable sous forme de tableau ARRAY associatif.
// Avec la présence de la boucle while, nous obtiendrons un nouveau tableau ARRAY dans la variable $employe, à chaque tour de boucle.
// /!\ Il y aura pas un tableau ARRAY avec tous les enregistrements à l'intérieur mais bien un nouveau tableau ARRAY par enregistrement, un array par
// employé !
// $employe
// $employe est donc un tableau ARRAY associatif (associatif = avec des clés nominatives).
// Nous pouvons donc afficher notre tableau ARRAY par l'intermédiaire d'un print_r ou d'un echo
// num_rows permet d'observer le nombre d'enregistrements récupérés et affichés par une requête.
// résultat
// Array
// (
// [id_employes] => 7350
// [prenom] => jean-pierre
// [nom] => laborde
// [sexe] => m
// [service] => direction
// [date_embauche] => 1999-12-09
// [salaire] => 5000
// )
// Bonjour je suis jean-pierre laborde du service direction
// {
// echo "<pre>"; print_r($employe); echo "</pre>";
// echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]";
// }
// echo $result->num_rows . ' enregistrement(s) récupéré(s) par la requête SELECT'<br>;


//-----------------------------------------------------------------
// Affichage (SELECT) :
$result = $mysqli->query("SELECT * FROM employes");
while ($employe = $result->fetch_assoc()) {
    echo "<pre>";
    print_r($employe);
    echo "</pre>";
    echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service] <br>";
}
echo "$result->num_rows enregistrement(s) récupéré(s) par la requête SELECT'<br>";



$mysqli = new Mysqli("localhost", "root", "", "entreprise");
$résultat = $mysqli->query("SELECT * FROM employes");
echo '<table border="5"> <tr>';
while ($colonne = $résultat->fetch_field()) {
    echo '<th>' . $colonne->name . '</th>';
}
echo "</tr>";
while ($ligne = $résultat->fetch_assoc()) {
    echo '<tr>';
    foreach ($ligne as $indice => $information) {
        echo '<td>' . $information . '</td>';
    }
    echo '</tr>';
}
echo '</table>';



?>