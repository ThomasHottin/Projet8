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
            <form method="POST">
                <br>
                <ul>
                    <li><a href="?page=accueil">Accueil</a></li>
                    <li><a href="?page=utilisateurs">Utilisateurs</a></li>
                    <li><a href="?page=parametres">Paramètres</a></li>
                    <?php
                    if (isset($_SESSION['données'])) {
                    ?>
                        <input type="submit" name="destroysession" value="Se déconnecter" style="border:none; background-color:white"><br>
                    <?php 
                    } else {
                    ?>
                        <li><a href="?page=connexion">Connexion</a></li>
                    <?php
                    }
                    ?>
                </ul>
            </form>
        </section><br><br><br>

        <?php

        if (isset($_SESSION['données'])) {
        ?>
            <form method="POST">
            </form>
        <?php
        } else {
        ?>
            <section class="inputs">
                <form method="POST">
                    <label for="identifiant">Identifiant</label><br><br>
                    <input type="text" name="identifiant"><br><br>
                    <label for="motdepasse">Mot de passe</label><br><br>
                    <input type="password" name="motdepasse"><br><br><br>
                    <input type="submit" name="seconnecter" value="Se connecter"><br>
                </form>
            </section>
        <?php
        }

        if (isset($_POST['seconnecter'])) {
            if ($_POST['identifiant'] == 'thomashottin' && $_POST['motdepasse'] == 'azerty123') {
                $_SESSION['données'] = [
                    'nom' => 'Hottin',
                    'prenom' => 'Thomas',
                    'age' => 29,
                    'role' => 'Apprentis'
                ];
                echo 'Vous êtes connecté';
            } else {
                echo 'connexion échouée';
            }
        }

        if (isset($_SESSION['données'])) {
            $page = $_GET['page'];

            if ($page == 'accueil') {
                echo '<h1>Bienvenue!</h1>';
            }

            if ($page == 'utilisateurs') {
                echo '<h1>Vos informations utilisateurs : </h1><br>';
                echo 'Nom : ' . $_SESSION['données']['nom'] . '<br>';
                echo 'Prénom : ' . $_SESSION['données']['prenom'] . '<br>';
                echo 'Age : ' . $_SESSION['données']['age'] . '<br>';
                echo 'Rôle : ' . $_SESSION['données']['role'] . '<br>';
            }

            if (isset($_POST['modifier'])) {
                $nouveauNom = $_POST['nom'];
                $nouveauPrenom = $_POST['prenom'];
                $nouvelAge = $_POST['age'];
                $nouveauRole = $_POST['role'];

                $_SESSION['données']['nom'] = $nouveauNom;
                $_SESSION['données']['prenom'] = $nouveauPrenom;
                $_SESSION['données']['age'] = $nouvelAge;
                $_SESSION['données']['role'] = $nouveauRole;

                echo 'Vos paramètres ont été modifiés avec succès!';
            }

            if ($page == 'parametres') {
                echo '<h1>Modification de vos paramètres : </h1><br>';
                echo '<form method="POST">';
                echo 'Nom: <input type="text" name="nom" value="' . $_SESSION['données']['nom'] . '"><br>';
                echo 'Prénom: <input type="text" name="prenom" value="' . $_SESSION['données']['prenom'] . '"><br>';
                echo 'Age: <input type="text" name="age" value="' . $_SESSION['données']['age'] . '"><br>';
                echo 'Rôle: <input type="text" name="role" value="' . $_SESSION['données']['role'] . '"><br>';
                echo '<input type="submit" name="modifier" value="Modifier"><br>';
                echo '</form>';
            }
        } else {
            echo '<br>Vous devez être connecté pour avoir accès à cette partie du site';
        }

        if (isset($_POST['destroysession'])) {
            session_destroy();
            echo "<br>Vous êtes déconnecté";
        }
        ?>
    </section>
</body>

</html>