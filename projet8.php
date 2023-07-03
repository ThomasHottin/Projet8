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
<div class="hover-effect"> 
    <header>
        <br>
        <h1 class="panneau">Panneau d'administration</h1><br>
    </header>
    <section class="bodycontainer">
        <section class="boutons">
            <form method="POST">
                <br>
                <ul>
                    <li><a href="?page=accueil">Accueil<span class="underscore"></span></a></li>
                    <li><a href="?page=utilisateurs">Utilisateurs<span class="underscore"></span></a></li>
                    <li><a href="?page=parametres">Paramètres<span class="underscore"></span></a></li>
                    <?php
                    if (isset($_SESSION['données'])) {
                    ?>
                        <input type="submit" name="destroysession" value="Se déconnecter" class="deconnexion"><br>
                    <?php
                    } else {
                    ?>
                        <li><a href="?page=connexion">Connexion<span class="underscore"></span></a></li>
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
                header("refresh:1; ?page=accueil");
            ?>
                <p class="connexion">Vous êtes connecté</p>
            <?php
            } else {
                echo 'connexion échouée';
            }
        }

        if (isset($_SESSION['données'])) {
            $page = $_GET['page'];

            if ($page == 'accueil') {
            ?>
                <h1 class="bienvenue"><span class="word fade-in">Bienvenue!</span></h1>
            <?php
            }

            if ($page == 'utilisateurs') {
                echo '<h1 class="bienvenue"><span class="word fade-in">Vos informations utilisateurs</span></h1><br>';
                echo '<p class="user">Nom : ' . $_SESSION['données']['nom'] . '</p><br>';
                echo '<p class="user">Prénom : ' . $_SESSION['données']['prenom'] . '</p><br>';
                echo '<p class="user">Age : ' . $_SESSION['données']['age'] . '</p><br>';
                echo '<p class="user">Rôle : ' . $_SESSION['données']['role'] . '</p><br>';
            }

            if ($page == 'parametres') {
                echo '<h1 class="bienvenue"><span class="word fade-in">Modifications de vos paramètres</span></h1>';
                echo '<form method="POST">';
                echo 'Nom: <input class="parinput" type="text" name="nom" value="' . $_SESSION['données']['nom'] . '"><br>';
                echo 'Prénom: <input class="parinput" type="text" name="prenom" value="' . $_SESSION['données']['prenom'] . '"><br>';
                echo 'Age: <input class="parinput" type="text" name="age" value="' . $_SESSION['données']['age'] . '"><br>';
                echo 'Rôle: <input class="parinput" type="text" name="role" value="' . $_SESSION['données']['role'] . '"><br>';
                echo '<input class="parinput" type="submit" name="modifier" value="Modifier"><br>';
                echo '</form>';
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

            ?>
                <p class="alertsuccess">Vos paramètres ont été modifiés avec succès!</p>
            <?php
                header("refresh:1; ?page=utilisateurs");
            }
        } else { ?>
            <p class="error fade-in">Vous devez être connecté pour avoir accès à cette partie du site</p>
        <?php
        }

        if (isset($_POST['destroysession'])) {
            session_destroy();
            header("refresh:1; ?page=accueil");
            echo "<br>Vous êtes déconnecté";
        }
        ?>
    </section>
    </div>
    
</body>

</html>