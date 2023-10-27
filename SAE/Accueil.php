<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.icon" href="apeaj.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
        }

        .bandeau {
            background-color: #bbdefb;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 80px;
            border-bottom: 1px solid black;
        }

        .logo-and-admin {
            display: flex; /* Afficher les éléments en ligne */
            align-items: center; /* Aligner verticalement au centre */
        }

        .bandeau img {
            max-width: 60px;
            height: auto;
            margin-right: 20px;
        }

        .bandeau h1 {
            color: black;
            margin: 0;
        }

        .conteneur {
            width: 80%;
            max-width: 800px;
            margin: 100px auto;
            background-color: white;
            border: 1px solid black;
            text-align: center;
            padding: 20px;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
            overflow: hidden; /* Masque les éléments au-delà du conteneur */
        }

        .titre {
            font-size: 20px;
            margin-bottom: 20px;
        }

        .profils {
            display: flex;
            transition: transform 0.3s; /* Animation de transition fluide */
        }

        .profil {
            border: 1px solid black;
            padding: 10px;
            margin: 10px;
            flex: 0 0 calc(30% - 20px);
            text-align: center;
            cursor: pointer;
        }

        .profil.selected {
            border: 5px solid #72bb53;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
        }

        .profil img {
            max-width: 100px;
            height: auto;
        }

        .nom {
            font-weight: bold;
        }

        .prenom {
            font-style: italic;
        }

        .navigation {
            margin-top: 20px;
        }

        .fleche {
            cursor: pointer;
        }

        .button-container {
            display: flex;
            justify-content: center;
            margin-top: 10px; 
        }
        #connecter {
            background-color: #72bb53;
            border-radius: 10px;
            color: black; 
            border: none; 
            padding: 10px 20px;
            cursor: pointer;
        }

    </style>
</head>
<body>
    <?php
            try {
                // Votre connexion PDO à la base de données
                $server = 'localhost';
                $db = 'carnet_adresses';
                $login = "etu";
                $mdp = "\$iutinfo";
                
                $linkpdo = new PDO("mysql:host=$server;dbname=$db", $login, $mdp);
                $linkpdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                
                // Requête SQL pour récupérer l'ID 1 de la table "apprenti"
                $sql = "SELECT * FROM apprenti WHERE id = 1";
                
                // Exécution de la requête
                $result = $linkpdo->query($sql);
                
                // Récupération du résultat
                $row = $result->fetch(PDO::FETCH_ASSOC);
                
                if ($row) {
                    // L'ID 1 de la table "apprenti" a été trouvé
                    $id = $row['id'];
                } else {
                    // L'ID 1 de la table "apprenti" n'a pas été trouvé
                    echo "L'ID 1 de la table 'apprenti' n'a pas été trouvé.";
                }

                 // Requête SQL pour récupérer le nom correspondant à l'ID 1 de la table "apprenti"
                $id = 1; // ID que vous souhaitez récupérer
                $sql = "SELECT nom, prenom FROM apprenti WHERE id = :id";
                $stmt = $linkpdo->prepare($sql);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
    
                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                $nom = $row['nom'];
                $prenom = $row['prenom'];
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
            }
            

    ?>

    <div class="bandeau">
        <a href="Accueil.php">
            <img src="accueil.png" alt="Accueil" style="float: left;">
        </a>
        <div class="bandeau centered">
            <a class="logo-and-admin" href="Accueil Admin.php">
                <img src="logo.png" alt="Votre Image">
                <h1>Admin</h1>
            </a>
        </div>
    </div>

    </div>
    <div class="conteneur">
        <div class="titre">Sélectionner un profil<img src="son.png" alt="Lire le nom" onclick="lireTexte('Sélectionner un profil')" style="width: 20px; margin: 5px;"></div>
        <div class="profils" id="carousel">
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom"><?php echo $nom; ?><img src="son.png" alt="Lire le nom" onclick="lireTexte('<?php echo $nom; ?>')" style="width: 20px; margin: 5px"></p>
                <p class="nom"><?php echo $prenom; ?><img src="son.png" alt="Lire le nom" onclick="lireTexte('<?php echo $prenom; ?>')" style="width: 20px; margin: 5px"></p>
            </div>
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom">Nom 2 <img src="son.png" alt="Lire le nom" onclick="lireTexte('Nom 2')" style="width: 20px;"></p>
                <p class="prenom">Prénom 2 <img src="son.png" alt="Lire le prénom" onclick="lireTexte('Prénom 2')" style="width: 20px;"></p>
            </div>
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom">Nom 3 <img src="son.png" alt="Lire le nom" onclick="lireTexte('Nom 3')" style="width: 20px;"></p>
                <p class="prenom">Prénom 3 <img src="son.png" alt="Lire le prénom" onclick="lireTexte('Prénom 3')" style="width: 20px;"></p>
            </div>
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom">Nom 4 <img src="son.png" alt="Lire le nom" onclick="lireTexte('Nom 4')" style="width: 20px;"></p>
                <p class="prenom">Prénom 4 <img src="son.png" alt="Lire le prénom" onclick="lireTexte('Prénom 4')" style="width: 20px;"></p>
            </div>
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom">Nom 5 <img src="son.png" alt="Lire le nom" onclick="lireTexte('Nom 5')" style="width: 20px;"></p>
                <p class="prenom">Prénom 5 <img src="son.png" alt="Lire le prénom" onclick="lireTexte('Prénom 5')" style="width: 20px;"></p>
            </div>
            <div class="profil">
                <img src="icone_profil.png" alt="Profil 1">
                <p class="nom">Nom 6 <img src="son.png" alt="Lire le nom" onclick="lireTexte('Nom 6')" style="width: 20px;"></p>
                <p class="prenom">Prénom 6 <img src="son.png" alt="Lire le prénom" onclick="lireTexte('Prénom 6')" style="width: 20px;"></p>
            </div>
        </div>
        
        <div class="button-container">
            <button id="connecter" style="display: none;">Se connecter</button>
        </div>

        <div class="navigation">
            <img class="fleche" id="prev" src="fleche_gauche.png" alt="Précédent" style="max-width: 30px; margin-right: 10px;">
            <img class="fleche" id="next" src="fleche_droite.png" alt="Suivant" style="max-width: 30px; margin-left: 10px;">
        </div>        
                
    </div>
    <script>
        const carousel = document.getElementById('carousel');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const connectButton = document.getElementById('connecter');

        let currentPosition = 0;
        const itemWidth = 33.33;
        const itemsInView = 3;
        const maxPosition = -itemWidth * (6 - itemsInView);

        let selectedProfile = null;

        function moveCarousel(direction) {
            if (direction === 'next' && currentPosition > maxPosition) {
                currentPosition -= itemWidth;
            } else if (direction === 'prev' && currentPosition < 0) {
                currentPosition += itemWidth;
            }

            carousel.style.transform = `translateX(${currentPosition}%)`;

            if (selectedProfile) {
                deselectProfile();
            }
        }

        function selectProfile(profile) {
            if (selectedProfile === profile) {
                deselectProfile();
            } else {
                if (selectedProfile) {
                    selectedProfile.classList.remove('selected');
                }
                profile.classList.add('selected');
                selectedProfile = profile;
                connectButton.style.display = 'block';
            }
        }

        function deselectProfile() {
            if (selectedProfile) {
                selectedProfile.classList.remove('selected');
                selectedProfile = null;
                connectButton.style.display = 'none';
            }
        }

        prevButton.addEventListener('click', () => {
            moveCarousel('prev');
        });

        nextButton.addEventListener('click', () => {
            moveCarousel('next');
        });

        carousel.addEventListener('click', (event) => {
            const profile = event.target.closest('.profil');
            if (profile) {
                selectProfile(profile);
            }
        });

        connectButton.addEventListener('click', () => {
            if (selectedProfile) {
                window.location.href = 'page_de_connexion.php';
            }
        });

        function lireTexte(texte) {
            const syntheseVocale = window.speechSynthesis;
            const message = new SpeechSynthesisUtterance(texte);
            syntheseVocale.speak(message);
        }

    </script>
    
</body>
</html>
