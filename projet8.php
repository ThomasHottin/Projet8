    <?php session_start(); ?>
    <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Formulaire</title>
</head>

<body>

    <header>
        <br>
        <h1>Panneau d'administration</h1><br>
    </header>
    <section class="bodycontainer">
        <section class="boutons">

            <br>
            <ul>
                <li><a href="?accueil">Accueil</a></li>
                <li><a href="?utilisateurs">Utilisateurs</a></li>
                <li><a href="?paramètres">Paramètres</a></li>
                <li><a href="?connexion">Connexion</a></li>
            </ul>
        </section><br><br><br>

        <section class="inputs">
            <form method="POST">
                <label for="identifiant">Identifiant</label><br><br>
                <input type="text" name="identifiant"><br><br>
                <label for="motdepasse">Mot de passe</label><br><br>
                <input type="password" name="motdepasse"><br><br><br>
                <input type="submit" name="seconnecter" value="Se connecter"><br>
            </form>
        </section>
    </section>

    <?php

if (isset($_POST['submit'])) {
    $_SESSION = [
        'data' => [
            'nom' => 'Hottin',
            'prenom' => 'Thomas',
            'age' => 29,
            'identifiant' => 'thomashottin',
            'motdepasse' => 'azerty123',
        ]
    ];
}

if (isset($_POST['seconnecter'])) {

    $identifiant = $_POST['identifiant'];
    $motdepasse = $_POST['motdepasse'];

}
//     if ($identifiant === $_SESSION['data']['identifiant'] && $motdepasse === $_SESSION['data']['motdepasse']) {
//         echo "Vous êtes connecté !";
//     } else {
//         echo "Identifiant ou mot de passe incorrect.";
//     }
// 

//     var_dump($_SESSION);
//     echo '<br>';
//     echo $_SESSION['data']['identifiant'];
//     echo $_SESSION['data']['motdepasse']


 ?>
   



</body>

</html>

