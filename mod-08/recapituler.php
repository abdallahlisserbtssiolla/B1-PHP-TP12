<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SanayaBio - Recap</title>
    <link href="./style.css" rel="stylesheet">
</head>
<body>
    <h1>Récapitulatif du Formulaire de Contact</h1>
    <?php
    if(isset($_POST['civilite'])) {
        if($_POST['civilite'] == 'mr') {
            $client = 'Μ.';
        } elseif($_POST['civilite'] == 'mme') {
            $client = 'Mme.';
        } else {
            $client = ucfirst($_POST['civilite']);
        }
    } else {
        $client = '';
    }
    
    $errors = array();
    if (empty($_POST["nom"])) {
        $errors[] = "Nom";
    }
    if (empty($_POST["prenom"])) {
        $errors[] = "Prénom";
    }
    if (empty($_POST["tel"])) {
        $errors[] = "Numéro de téléphone";
    }
    if (empty($_POST["email"])) {
        $errors[] = "Adresse électronique";
    }

    if (!empty($errors)) {
        echo "<p class='error'>Les champs suivants sont obligatoires :</p>";
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li class='error'>$error</li>";
        }
        echo "</ul>";
    } else {
        echo "<p>Civilité: " . $client . "</p>";
        echo "<p>Nom: " . $_POST["nom"] . "</p>";
        echo "<p>Prénom: " . $_POST["prenom"] . "</p>";
        echo "<p>Numéro de téléphone: " . $_POST["tel"] . "</p>";
        echo "<p>Adresse électronique: " . $_POST["email"] . "</p>";
        echo "<p>Mode de réponse: " . $_POST["raison"] . "</p>";
        echo "<p>Sujet: " . ($_POST["objet"] ?? "") . "</p>";
        echo "<p>Message complémentaire: <br/>" . ($_POST["message"] ?? "") . "</p>";
    }
    ?>
</body>
</html>
