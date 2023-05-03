<?php
try {
    $pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); // host = nom du serveur, dbname = nom de la db, pseudo = root, mdp, erreur mode activé pour faire apparaître d'éventuelles erreurs de requête SQL
    echo '<pre>';
    print_r($pdo);
    echo '</pre>';
    echo '<pre>';
    print_r(get_class_methods($pdo));
    echo '</pre>';

    // Insertion (INSERT) :
    $result = $pdo->exec("INSERT INTO employes (prenom, nom, sexe, service, date_embauche, salaire) VALUES ('prenom', 'nom', 'm', 'informatique', '2015-07-30', 5000)");
    echo $result . ' enregistrement(s) affecté(s) par la requête INSERT<br>';

    // Modification (UPDATE) :
    $result = $pdo->exec("UPDATE employes SET salaire = 2500 WHERE id_employes = 802");
    echo $result . ' enregistrement(s) affecté(s) par la requête UPDATE<br>';

    // Suppression (DELETE) :
    $result = $pdo->exec("DELETE FROM employes WHERE id_employes = 388");
    echo $result . ' enregistrement(s) affecté(s) par la requête DELETE<br>';

    // Affichage (SELECT) :
    $result = $pdo->query("SELECT * FROM employes WHERE prenom='julien'");
    $employe = $result->fetch(PDO::FETCH_ASSOC);
    echo "<pre>";
    print_r($employe);
    echo "</pre>";
    echo "Bonjour je suis $employe[prenom] $employe[nom] du service $employe[service]<br>";
} catch (PDOException $e) {
    echo 'Erreur de connexion : ' . $e->getMessage();
}




$pdo = new PDO('mysql:host=localhost;dbname=entreprise', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
$résultat = $pdo->query("SELECT * FROM employes");
echo "<table border=\"5\"> <tr>";
for ($i = 0; $i < $résultat->columnCount(); $i++) {
    $colonne = $résultat->getColumnMeta($i);
    echo '<th>' . $colonne['name'] . '</th>';
}
echo "</tr>";
while ($ligne = $résultat->fetch(PDO::FETCH_ASSOC)) {
    echo '<tr>';
    foreach ($ligne as $indice => $information) {
        echo '<td>' . $information . '</td>';
    }
    echo '</tr>';
}
echo '</table>';
?>