<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.icon" href="apeaj.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil Admin</title>
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

        .bandeau img {
            max-width: 60px;
            height: auto;
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

        .ajouter {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        .ajouter img {
            max-width: 80px;
            height: auto;
        }

        .ajouter p {
            margin-left: 10px;
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

        #profil_apprenti {
            background-color: #72bb53;
            border-radius: 10px;
            color: black; 
            border: none; 
            padding: 10px 20px;
            cursor: pointer;
        }

        .centered {
            display: flex;
            align-items: center;
            justify-content: center;
        }

    </style>
</head>
<body>
    <div class="bandeau">
        <a href="Accueil.php">
            <img src="accueil.png" alt="Accueil" style="float: left;">
        </a>
        <div class="bandeau centered">
            <img src="logo.png" alt="Votre Image">
            <h1 style="margin-left: 10px;">Admin</h1>
        </div>
        <a href="https://docs.google.com/document/d/1cM7t6f-XGID3lx3FNxVUTaXQoAhsjzOmj6h0Pt1NRiM/edit?usp=sharing">
            <img src="aide.png" alt="aide" style="cursor: pointer; margin-left: auto;"> 
        </a>
    </div>
    
    <div class="conteneur">
            <div class="profils" id="carousel">
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 1">
                    <p class="nom">Nom 1</p>
                    <p class="prenom">Prénom 1</p>
                </div>
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 2">
                    <p class="nom">Nom 2</p>
                    <p class="prenom">Prénom 2</p>
                </div>
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 3">
                    <p class="nom">Nom 3</p>
                    <p class="prenom">Prénom 3</p>
                </div>
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 4">
                    <p class="nom">Nom 4</p>
                    <p class="prenom">Prénom 4</p> 
                </div>
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 5">
                    <p class="nom">Nom 5</p>
                    <p class="prenom">Prénom 5</p>
                </div>
                <div class="profil">
                    <img src="icone_profil.png" alt="Profil 6">
                    <p class="nom">Nom 6</p>
                    <p class="prenom">Prénom 6</p>
                </div>
            </div>

        <div class="button-container">
            <button id="profil_apprenti" style="display: none;">Voir son profil</button>
        </div>

        <div class="navigation">
            <img class="fleche" id="prev" src="fleche_gauche.png" alt="Précédent" style="max-width: 30px; margin-right: 10px;">
            <img class "fleche" id="next" src="fleche_droite.png" alt="Suivant" style="max-width: 30px; margin-left: 10px;">
        </div>    
    </div>
    <!-- Ajout de l'image cliquable et du texte "Ajouter un apprenti" -->
    <div class="ajouter">
        <a href="Ajout Apprenti.php">
            <img src="logo_plus.png" alt="Ajouter un apprenti" style="cursor: pointer;">
        </a>
        <p>Ajouter un apprenti</p>
    </div>
    <script>
        const carousel = document.getElementById('carousel');
        const prevButton = document.getElementById('prev');
        const nextButton = document.getElementById('next');
        const connectButton = document.getElementById('profil_apprenti');

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
                window.location.href = 'profil_apprenti.php';
            }
        });
    </script>
</body>
</html>
