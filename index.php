<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Bonjour</h1>
    <?php
    echo "Voilà un morceau de PHP" . "<br>";
    echo __FILE__ . "<br>"; // C:\xampp\htdocs\php2\index.php
    echo date("d/m/Y") . "<br>"; // 02/05/2023
    echo date("D/M/Y") . "<br>"; // Tue/May/2023
    echo date("d/m/y") . "<br>"; // 02/05/23
    echo date("d M Y") . "<br>"; // 02 May 2023
    
    $pays = 'France';
    function affichagePays()
    {
        global $pays; // importe la variable pays de l'espace global
        echo $pays;
    }
    affichagePays();
    ?>
</body>

</html> -->

<?php require_once('inc/haut.inc.php'); ?>
<?php require_once('inc/menu.inc.php'); ?>
<section>
    <div class="container">
        <main>
            <h1>Accueil</h1>
            <hr>
            <!-- Titre et niveaux -->
            <h2>Titre niveau 2</h2>
            <p>Voici le texte de notre page d'accueil Voici le texte de notre page d'accueil Voici le texte de notre
                page d'accueil Voici le texte de
                notre page d'accueil Voici le texte de notre page d'accueil Voici le texte de notre page d'accueil
                Voici le texte de notre page d'accueil Voici le
                texte de notre page d'accueil Voici le texte de notre page d'accueil Voici le texte de notre page
                d'accueil Voici le texte de notre page d'accueil
                Voici le texte de notre page d'accueil Voici le texte de notre page d'accueil Voici le texte de
                notre page d'accueil Voici le texte de notre page
                d'accueil </p>
            <hr>
            <!-- Image Responsive -->
            <h2>Titre 3</h2>
            <p><img class="img-responsive" src="http://placehold.it/750x250" alt="explication PHP"></p>
            <hr>
        </main>
        <aside>
            <h2>Colonne</h2>
            <p>Voici la colonne de droite pour la page d'accueil Voici la colonne de droite pour la page d'accueil
                Voici la colonne de droite pour
                la page d'accueil Voici la colonne de droite pour la page d'accueil Voici la colonne de droite pour
                la page d'accueil Voici la colonne de droite
                pour la page d'accueil Voici la colonne de droite pour la page d'accueil Voici la colonne de droite
                pour la page d'accueil Voici la colonne de
                droite pour la page d'accueil Voici la colonne de droite pour la page d'accueil Voici la colonne de
                droite pour la page d'accueil Voici la
                colonne de droite pour la page d'accueil Voici la colonne de droite pour la page d'accueil Voici la
                colonne de droite pour la page d'accueil
                Voici la colonne de droite pour la page d'accueil </p>
        </aside>
        <div class="clear"></div>
        <?php
        $listePrenom = array("gregoire", "nathalie", "emilie", "françois", "georges");
        echo '<pre>';
        print_r($listePrenom);
        echo '</pre>';
        var_dump($listePrenom);

        $listePays[] = 'France';
        $listePays[] = 'Italie';
        $listePays[] = 'Espagne';
        $listePays[] = 'Angleterre';
        echo "<pre>";
        print_r($listePays[1]);
        echo $listePays[1];
        echo implode("<br>", $listePays);
        echo "</pre>";

        $couleur = array("j" => "jaune", "b" => "bleu", "v" => "vert");
        echo '<pre>';
        print_r($couleur);
        echo '</pre>';

        $listeFruit = array("fruit1" => "orange", "fruit2" => "pomme", "fruit3" => "fraise"); // déclaration array
        echo 'fruit1 : ' . $listeFruit['fruit1'] . '<br>'; // quotes dans les crochets
        echo "fruit1 : $listeFruit[fruit1] <br>"; // pas de quotes dans les crochets
        
        $tabMultidimensionnel = array(0 => array("prenom" => "Julien", "nom" => "Cottet"), 1 => array("prenom" => "Nicolas", "nom" => "Lafaye"));
        echo '<pre>';
        print_r($tabMultidimensionnel);
        echo '</pre>';

        echo '<pre>';
        print_r($GLOBALS);
        echo '</pre>';
        echo '<pre>';
        print_r($_ENV);
        echo '</pre>';
        echo '<pre>';
        print_r($_REQUEST);
        echo '</pre>'; ?>

        <form method="post" action="">
            <label for="ville">ville</label><br>
            <input type="text" name="ville" id="ville" placeholder="saisir 1 ville"><br><br>
            <label for="cp">code postal</label><br>
            <input type="text" name="cp" id="cp" placeholder="saisir 1 code postal"><br><br>
            <label for="adresse">adresse</label><br>
            <textarea name="adresse" id="adresse" placeholder="saisir 1 adresse"></textarea><br><br>
            <input type="submit">
        </form>

        <?php
        // echo 'ville : ' . $_POST['ville'] . '<br>';
        // echo 'cp : ' . $_POST['cp'] . '<br>';
        // echo 'adresse : ' . $_POST['adresse'] . '<br>';
        
        if (!empty($_POST)) {
            echo 'Recuperation des données saisies : <br>';
            echo 'ville : ' . $_POST['ville'] . '<br>';
            echo 'cp : ' . $_POST['cp'] . '<br>';
            echo 'adresse : ' . $_POST['adresse'] . '<br>';
        }

        echo '<pre>';
        print_r($_POST);
        echo '</pre>';

        $nomFichier = "inc/sauvegarde.txt";
        $fichier = file($nomFichier); // la fonction file() fait tout le travail, elle retourne chaque ligne d'un fichier à des indices différents d'un tableau array.
        print "<pre>";
        print_r($fichier);
        print "</pre>"; // Affichage du tableau Array dans sa structure.
        foreach ($fichier as $ligne) // Parcours du tableau Array pour un affichage plus conventionnel.
        {
            echo $ligne . "<br>";
        }
        echo '';
        echo implode("<br>", $fichier); // Affichage du tableau Array avec un passage à la ligne.
        
        mail("mailexpediteur@orange.fr", "Le sujet", "Le message", "mailenreceveur@orange.fr");
        ?>

        <!-- <form method="post" action="">
            <label for="destinataire">Destinataire</label><br>
            <input type="text" name="destinataire" id="destinataire" placeholder="destinataire"><br><br>
            <label for="expediteur">Expediteur</label><br>
            <input type="text" name="expediteur" id="expediteur" placeholder="expediteur"><br><br>
            <label for="sujet">Sujet</label><br>
            <input type="text" name="sujet" id="sujet" placeholder="sujet"><br><br>
            <label for="message">Message</label><br>
            <textarea name="message" placeholder="message"></textarea><br><br>
            <input type="submit" value="envoyer l'email">
        </form>

        <?php
        // if (!empty($_POST)) {
        //     // affichage des saisies pour être sur de les obtenir avant de les exploiter.
        //     echo "destinataire : $_POST[destinataire] <br>";
        //     echo "sujet : $_POST[sujet] <br>";
        //     echo "message : $_POST[message] <br>";
        //     echo "expediteur : $_POST[expediteur] <br>";
        //     // entête email
        //     $headers = 'MIME-Version: 1.0' . "\n";
        //     $headers .= 'Content-type: text/html; charset=ISO-8859-1' . "\n";
        //     $headers .= 'Reply-To: ' . $_POST['expediteur'] . "\n";
        //     $headers .= 'From: "' . ucfirst(substr($_POST['expediteur'], 0, strpos($_POST['expediteur'], '@'))) . '"<' . $_POST['expediteur'] . '>' . "\n";
        //     $headers .= 'Delivered-to: ' . $_POST['destinataire'] . "\n";
        //     mail($_POST['destinataire'], $_POST['sujet'], $_POST['message'], $headers);
        // }
        ?> -->
    </div>


</section>
<?php require_once('inc/bas.inc.php'); ?>