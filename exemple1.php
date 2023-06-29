<?php
session_start();

// Définir le tableau de valeurs
$valeurs = array(
    'input1' => 'Valeur 1',
    'input2' => 'Valeur 2',
    'input3' => 'Valeur 3'
);

if (isset($_POST['submit'])) {
    $_SESSION['selected_input'] = $_POST['input'];
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Affichage de valeurs</title>
</head>

<body>
    <h1>Affichage de valeurs</h1>

    <form method="POST">
        <input type="submit" name="submit" value="Afficher la valeur 1">
        <input type="hidden" name="input" value="input1">
    </form>

    <form method="POST">
        <input type="submit" name="submit" value="Afficher la valeur 2">
        <input type="hidden" name="input" value="input2">
    </form>

    <form method="POST">
        <input type="submit" name="submit" value="Afficher la valeur 3">
        <input type="hidden" name="input" value="input3">
    </form>

    <?php
    if (isset($_SESSION['selected_input'])) {
        $selectedInput = $_SESSION['selected_input'];

        if (array_key_exists($selectedInput, $valeurs)) {
            echo 'Vous avez sélectionné l\'input ' . $selectedInput . '. La valeur correspondante est : ' . $valeurs[$selectedInput];
        } else {
            echo 'Valeur non trouvée pour l\'input sélectionné.';
        }
    }
    ?>

</body>

</html>