<!DOCTYPE HTML>
<html>
<head>
    <title>Ajout d'un apprenti</title>
</head>
<body>
    <h1>Ajout d'un apprenti</h1>
    <div class="container">
    <?php
        $server = 'localhost';
        $db = 'carnet_adresses';
        $login = "etu";
        $mdp = "\$iutinfo";

        try {
            $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
            $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Récupération des données du formulaire HTML
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $date_naissance = $_POST['date_naissance'];
            $mot_de_passe = $_POST['mot_de_passe'];
            $confirmer_mot_de_passe = $_POST['confirmer_mot_de_passe'];
            $description_profil = $_POST['description_profil'];
            $niveau_moyen = $_POST['niveau_moyen'];

            // Validation des champs
            if (empty($nom) || empty($prenom) || empty($date_naissance) || empty($mot_de_passe) || empty($confirmer_mot_de_passe) || empty($description_profil)) {
                echo "Tous les champs sont obligatoires. Veuillez remplir tous les champs.";
                echo '<input type="button" class="annuler-button" value="Retour" onclick="history.back()"></input>';

            } elseif ($mot_de_passe !== $confirmer_mot_de_passe) {
                echo "Les mots de passe ne correspondent pas. Veuillez les saisir a nouveau.";
                echo '<input type="button" class="annuler-button" value="Retour" onclick="history.back()"></input>';
            } else {
                $sql = "INSERT INTO apprenti (nom, prenom, date_naissance, mot_de_passe, description_profil, niveau_moyen) VALUES (?, ?, ?, ?, ?, ?)";
                $stmt = $linkpdo->prepare($sql);

                if ($stmt == false) {
                    die("Erreur prepare");
                }

                $test = $stmt->execute([$nom, $prenom, $date_naissance, $mot_de_passe, $description_profil, $niveau_moyen]);

                if ($test == false) {
                    $stmt->debugDumpParams();
                    die("Erreur Execute");
                }

                // Vérification de l'insertion
                if ($stmt->rowCount() > 0) {
                    echo "L'apprenti a ete ajoute avec succes. <br>";
                    echo '<a href="Accueil Admin.php">Accueil</a>';
                } else {
                    echo "Une erreur s'est produite lors de l'ajout de l'apprenti.";
                }
            }

            $linkpdo = null;
        } catch (PDOException $e) {
            die('Erreur : ' . $e->getMessage());
        }
    ?>
    </div>
</body>
</html>
