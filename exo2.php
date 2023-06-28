<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <form method="POST">
        <label for="identifiant">Email</label>
        <input type="text" name="identifiant">
        <label for="nom">Nom</label>
        <input type="text" name="nom">
        <label for="prenom">Prénom</label>
        <input type="text" name="prenom">
        <label for="age">Age</label>
        <input type="number" name="age">
        <input type="submit" name="envoyer" value="Transmettre">
    </form>

<?php
    if (isset($_POST['envoyer']) && !empty($_POST['identifiant']) && !empty($_POST['nom'])  && !empty($_POST['prenom']) && !empty($_POST['age']) ){
        echo $_POST['identifiant'] . ' ' . $_POST['nom'] . ' ' . $_POST['prenom'] . ' ' . $_POST['age'];
    }
    else {
        echo "Tous les champs n'ont pas été rempli";
    }

// si j'appuie sur le bouton submit, alors j'affiche les informations
// if isset post submit
// echo info

?>

</body>
</html>







<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="
    
    input identifiant email
    input nom 
    input prénom 
    input age
    input submit -> afficher identifiants nom prénom age"
    ></form>
    <?php


// </body>
// </html>

// <!DOCTYPE html>
// <html lang="en">
// <head>
//     <meta charset="UTF-8">
//     <meta name="viewport" content="width=device-width, initial-scale=1.0">
//     <link rel="stylesheet" href="style.css">
//     <title>Document</title>
// </head>
// <body>
//     form, label, input

//     $_get -> récupérer/recevoir l'information
//     $_post -> envoyer l'information
// <form method="POST"></form>
// <?php
// if (isset($_POST['submit'])) {
//     echo $_POST['identifiant']
// }
// ?>
// si j'appuie sur le bouton 'submit', le post envoie l'information 'identifiant'
// </body>
// </html>

session_start(); => permet l'utilisation de $_SESSION
session_destroy(); => vide le $_SESSION
$_SESSION => tableau qui permet la sauvegarde des données temporaires pendant une session





























