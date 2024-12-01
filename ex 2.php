<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercice 2 PHP</title>
</head>
<body>
    <h1><u>Exercice 2 PHP</u></h1>

        <!-- Exercice 1 -->
    <?php
    $employees = [
        ["nom" => "Ali", "poste" => "Développeur", "salaire" => 10000],
        ["nom" => "Sara", "poste" => "Designer", "salaire" => 9500],
        ["nom" => "Youssef", "poste" => "Manager", "salaire" => 15000],
        ["nom" => "Fatima", "poste" => "Testeur", "salaire" => 4000],
        ["nom" => "Mohamed", "poste" => "DevOps", "salaire" => 8000],
    ];

    function calculerSalaireMoyen($employes) {
        $total = array_sum(array_column($employes, "salaire"));
        return $total / count($employes);
    }

    echo "<h2>1. Salaire moyen des employés</h2>";
    echo "Salaire moyen : " . calculerSalaireMoyen($employees) . " MAD<br><br>";

    //<!-- Exercice 2 -->
    if (isset($_POST['rechercher'])) {
        $nomRecherche = $_POST['nom'];
    
        $resultat = array_filter($employees, function($e) use ($nomRecherche) {
            return stripos($e["nom"], $nomRecherche) !== false; 
        });
    
        echo "<h2>2. Résultat de recherche</h2>";
    
        
        if (!empty($resultat)) {
            foreach ($resultat as $employee) {
                echo "Nom: " . htmlspecialchars($employee["nom"]) . "<br>";
                echo "Poste: " . htmlspecialchars($employee["poste"]) . "<br>";
                echo "Salaire: " . htmlspecialchars($employee["salaire"]) . "<br><br>";
            }
        } else {
            echo "Aucun employé trouvé pour le nom : " . htmlspecialchars($nomRecherche) . "<br>";
        }
    }
    

    
    ?>

    <form method="post">
    <h2>2. Résultat de recherche</h2>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <button type="submit" name="rechercher">Rechercher</button>
    </form>

    <!-- Exercice 3 -->
    <?php
    
    $utilisateurs = [
        ["email" => "test@gmail.com", "mot_de_passe" => "abc123"],
        ["email" => "mohamedaminetaoufik04@gmail.com", "mot_de_passe" => "Amine@2004"],
        ["email" => "amine@gmail.com", "mot_de_passe" => "123456789"],
    ];

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['mot_de_passe'];
        $found = false;

        foreach ($utilisateurs as $utilisateur) {
            if ($utilisateur['email'] === $email && $utilisateur['mot_de_passe'] === $password) {
                $found = true;
                break;
            }
        }

        echo "<h2>3. Résultat du formulaire de connexion</h2>";
        echo $found ? "Connexion réussie !" : "Échec de la connexion.";
    }
    ?>

    <form method="post">
        <h2>3. Formulaire de connexion</h2>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" name="mot_de_passe" id="mot_de_passe" required>
        <br>
        <button type="submit" name="login">Se connecter</button>
    </form>

    <!-- Exercice 4 -->
    <?php
    $panier = [
        ["nom" => "Telephone", "quantite" => 2, "prix" => 8000],
        ["nom" => "AirPods", "quantite" => 1, "prix" => 200],
        ["nom" => "TV", "quantite" => 3, "prix" => 9000],
    ];

    $totalPanier = array_reduce($panier, function ($total, $produit) {
        return $total + ($produit["quantite"] * $produit["prix"]);
    }, 0);

    echo "<h2>4. Total du panier</h2>";
    echo "Total : $totalPanier MAD<br><br>";

    //<!-- Exercice 5 -->
    $commentaires = [];
    if (isset($_POST['commenter'])) {
        $commentaires[] = ["texte" => $_POST['commentaire'], "timestamp" => date('Y-m-d H:i:s')];
        echo "<h2>5. Commentaires soumis</h2>";
        foreach ($commentaires as $commentaire) {
            echo "<p>{$commentaire['texte']} - {$commentaire['timestamp']}</p>";
        }
    }
    ?>

    <form method="post">
        <h2>5. Formulaire de commentaires</h2>
        <label for="commentaire">Commentaire :</label>
        <textarea name="commentaire" id="commentaire" required></textarea>
        <br>
        <button type="submit" name="commenter">Soumettre</button>
    </form>

    <!-- Exercice 6 -->
    <?php
    
    $villes = [
        ["ville" => "Casablanca", "temperature" => 25],
        ["ville" => "Marrakech", "temperature" => 38],
        ["ville" => "Rabat", "temperature" => 22],
    ];

    $villeMaxTemp = array_reduce($villes, function ($max, $ville) {
        return ($max["temperature"] ?? 0) > $ville["temperature"] ? $max : $ville;
    }, []);

    echo "<h2>6. Ville la plus chaude</h2>";
    echo "Ville : {$villeMaxTemp['ville']}, Température : {$villeMaxTemp['temperature']}°C<br><br>";
    ?>

<!-- Exercice 7 -->
    <?php
    echo "<h2>7. Lecture des produits depuis CSV</h2>";
    $csvProduits = [
        ["nom" => "AirPods", "prix" => 200, "quantite" => 2],
        ["nom" => "TV", "prix" => 9000, "quantite" => 3],
        ["nom" => "Telephone", "prix" => 8000, "quantite" => 1],
    ];
    echo "<table border='1'><tr><th>Nom</th><th>Prix</th><th>Quantité</th></tr>";
    foreach ($csvProduits as $produit) {
        echo "<tr><td>{$produit['nom']}</td><td>{$produit['prix']}</td><td>{$produit['quantite']}</td></tr>";
    }
    echo "</table>";
    ?>

    <!-- Exercice 8 -->
    <?php

$produits = [
    ["nom" => "Telephone", "prix" => 8000],
    ["nom" => "AirPods", "prix" => 200],
    ["nom" => "TV", "prix" => 9000],
];

if (isset($_POST['produits_selectionnes'])) {
    $produitsSelectionnes = $_POST['produits_selectionnes'];
    $prixTotal = 0;

    echo "<h2>8. Produits sélectionnés</h2>";
    echo "<ul>";
    foreach ($produitsSelectionnes as $id) {
        $produit = $produits[$id];
        $prixTotal += $produit['prix'];
        echo "<li>{$produit['nom']} - {$produit['prix']} MAD</li>";
    }
    echo "</ul>";
    echo "Prix total : $prixTotal MAD<br>";
}
?>

<form method="post">
<h2>8. Produits sélectionnés</h2>
    <?php foreach ($produits as $index => $produit) : ?>
        <label>
            <input type="checkbox" name="produits_selectionnes[]" value="<?= $index ?>">
            <?= $produit['nom'] ?> - <?= $produit['prix'] ?> MAD
        </label><br>
    <?php endforeach; ?>
    <button type="submit">Afficher le total</button>
</form>

<!-- Exercice 9 -->
    <?php
    echo "<h2>9. Moyennes des étudiants</h2>";
    $etudiants = [
        ["nom" => "Mohamed", "notes" => [15, 17, 16]],
        ["nom" => "Sara", "notes" => [18, 19, 20]],
    ];
    foreach ($etudiants as $etudiant) {
        $moyenne = array_sum($etudiant['notes']) / count($etudiant['notes']);
        echo "Étudiant : {$etudiant['nom']},  Sa moyenne est: $moyenne<br>";
    }
?>

<!-- Exercice 10 -->
<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['users'])) {
    $_SESSION['users'] = [
        ["id" => 1, "nom" => "Admin", "role" => "admin"],
        ["id" => 2, "nom" => "Utilisateur", "role" => "user"],
    ];
}

if (isset($_POST['ajouter'])) {
    $nouvelId = count($_SESSION['users']) + 1;
    $nouveauNom = htmlspecialchars($_POST['nom']);
    $nouveauRole = htmlspecialchars($_POST['role']);
    $_SESSION['users'][] = ["id" => $nouvelId, "nom" => $nouveauNom, "role" => $nouveauRole];
}

if (isset($_POST['supprimer'])) {
    $idASupprimer = intval($_POST['id']);
    $_SESSION['users'] = array_filter($_SESSION['users'], fn($user) => $user['id'] !== $idASupprimer);
}

if (isset($_POST['modifier'])) {
    $idAModifier = intval($_POST['id']);
    foreach ($_SESSION['users'] as &$user) {
        if ($user['id'] === $idAModifier) {
            $user['nom'] = htmlspecialchars($_POST['nom']);
            $user['role'] = htmlspecialchars($_POST['role']);
            break;
        }
    }
}
?>

<h2>10. Gestion des utilisateurs</h2>


<form method="post">
    <h3>Ajouter un utilisateur</h3>
    <label for="nom">Nom :</label>
    <input type="text" name="nom" id="nom" required>
    <br>
    <label for="role">Rôle :</label>
    <select name="role" id="role">
        <option value="admin">Admin</option>
        <option value="user">User</option>
    </select>
    <br>
    <button type="submit" name="ajouter">Ajouter</button>
</form>

<h3>Liste des utilisateurs</h3>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Rôle</th>
        <th>Actions</th>
    </tr>
    <?php foreach ($_SESSION['users'] as $user) : ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['role'] ?></td>
            <td>
                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <button type="submit" name="supprimer">Supprimer</button>
                </form>

                <form method="post" style="display:inline;">
                    <input type="hidden" name="id" value="<?= $user['id'] ?>">
                    <input type="text" name="nom" value="<?= $user['nom'] ?>" required>
                    <select name="role">
                        <option value="admin" <?= $user['role'] === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="user" <?= $user['role'] === 'user' ? 'selected' : '' ?>>User</option>
                    </select>
                    <button type="submit" name="modifier">Modifier</button>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

