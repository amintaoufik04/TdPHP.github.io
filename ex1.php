<!DOCTYPE html>
<html>
<head>
    <title>Exercice 1 PHP</title>
</head>
<body>
    <h1><u>Exercice 1 PHP</u></h1>

    <!-- Exercice 1 -->
    <h2>1. Tableau associatif étudiant</h2>
    <?php
    $etudiant = [
        'nom' => 'Taoufik',
        'prenom' => 'Mohamed Amine',
        'matricule' => '100122620'
    ];
    echo "Nom : " . $etudiant['nom'] . "<br>";
    echo "Prénom : " . $etudiant['prenom'] . "<br>";
    echo "Matricule : " . $etudiant['matricule'];
    ?>

    <!-- Exercice 2 -->
    <h2>2. Ajouter une clé note et modifier sa valeur</h2>
    <?php
    $etudiant['note'] = 15;
    $etudiant['note'] = 18; 
    echo "Nom : " . $etudiant['nom'] . "<br>";
    echo "Prénom : " . $etudiant['prenom'] . "<br>";
    echo "Matricule : " . $etudiant['matricule']. "<br>";
    echo "Note : " . $etudiant['note'];
    ?>

    <!-- Exercice 3 -->
    <h2>3. Parcourir un tableau associatif de produits</h2>
    <?php
    $produits = [
        'Television' => 6000,
        'Tabelette' => 9000,
        'Telephone' => 15000
    ];
    foreach ($produits as $nom_produit => $prix) {
        echo "$nom_produit coûte $prix DH<br>";
    }
    ?>

    <!-- Exercice 4 -->
    <h2>4. Moyenne des scores</h2>
    <?php
    $scores = [
        'Étudiant1' => 15,
        'Étudiant2' => 16,
        'Étudiant3' => 17,
        'Étudiant4' => 18,
        'Étudiant5' => 19
    ];
    $moyenne = array_sum($scores) / count($scores);
    echo "La note du premier etudiant : " . $scores['Étudiant1'] . "<br>";
    echo "La note du deuxieme etudiant : " . $scores['Étudiant2'] . "<br>";
    echo "La note du troisieme etudiant : " . $scores['Étudiant3']. "<br>";
    echo "La note du quatrieme etudiant : " . $scores['Étudiant4'] . "<br>";
    echo "La note du cinquieme etudiant : " . $scores['Étudiant5']. "<br>". "<br>";
    echo "La moyenne des scores est : $moyenne";
    ?>

    <!-- Exercice 5 -->
    <h2>5. Tri d'un tableau par population</h2>
    <?php
    $pays = [
        'Maroc' => 37000000,
        'France' => 67000000,
        'Espagne' => 47000000
    ];
    arsort($pays);
    foreach ($pays as $nom_pays => $population) {
        echo "$nom_pays  : $population habitants<br>";
    }
    ?>

    <!-- Exercice 6 -->
    <h2>6. Formulaire avec récupération via $_POST</h2>
    <form method="POST">
        Nom : <input type="text" name="nom"><br>
        Âge : <input type="text" name="age"><br>
        <button type="submit" name="fr">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['fr'])) {
        $nom = $_POST['nom'];
        $age = $_POST['age'];
        echo "Bienvenue $nom, vous avez $age ans !";
    }
    ?>  

    <!-- Exercice 7 -->
    <h2>7. Validation simple</h2>
    <form method="POST">
        Nom : <input type="text" name="nom"><br>
        Âge : <input type="text" name="age_validation"><br>
        <button type="submit" name="age">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['age'])) {
        $nom = $_POST['nom'];
        $age = $_POST['age_validation'];
        if (!is_numeric($age) || $age <= 0) {
            echo "L'âge doit être un entier supérieur à 0.";
        } else {
            echo "Bienvenue $nom vous avez $age ans !";
        }
    }
    ?>

    <!-- Exercice 8 -->
    <h2>8. Liste déroulante pour choisir une couleur</h2>
    <form method="POST">
        Choisissez une couleur :
        <select name="couleur">
            <option value="rouge">Rouge</option>
            <option value="vert">Vert</option>
            <option value="bleu">Bleu</option>
        </select>
        <button type="submit" name="color">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['color'])) {
        $couleur = $_POST['couleur'];
        echo "Votre couleur préférée est : $couleur";
    }
    ?>

    <!-- Exercice 9 -->
    <h2>9. Somme de deux nombres</h2>
    <form method="GET">
        Entrer le premier nombre  : <input type="text" name="premier_nbr"><br>
        Entrer le deuxieme nombre  : <input type="text" name="deuxieme_nbr"><br>
        <button type="submit" name="nbr">Calculer</button>
    </form>
    <?php
    if (isset($_GET['nbr'])) {
        $premier_nbr = $_GET['premier_nbr'];
        $deuxieme_nbr = $_GET['deuxieme_nbr'];
        echo "La somme est : " . ($premier_nbr + $deuxieme_nbr);
    }
    ?>

    <!-- Exercice 10 -->
    <h2>10. Type de compte avec message conditionnel</h2>
    <form method="POST">
        Type de compte :
        <select name="type">
            <option value="Administrateur">Administrateur</option>
            <option value="Utilisateur">Utilisateur</option>
        </select>
        <button type="submit" name="compte">Envoyer</button>
    </form>
    <?php
    if (isset($_POST['compte'])) {
        $type = $_POST['type'];
        if ($type == 'Administrateur') {
            echo "Bienvenue administrateur !";
        } else {
            echo "Bienvenue utilisateur simple !";
        }
    }
    ?>
</body>
</html>