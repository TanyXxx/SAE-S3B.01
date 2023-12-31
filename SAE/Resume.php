<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.icon" href="apeaj.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résumé du Profil</title>
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

    <h1>Résumé du Profil</h1>
    <h2>Photo de Profil :</h2>
    <img id="photo" src="" alt="Photo de profil">
    <h2>Nom :</h2>
    <p id="nom"></p>
    <h2>Prénom :</h2>
    <p id="prenom"></p>
    <h2>Date de Naissance :</h2>
    <p id="date-naissance"></p>
    <h2>Description du Profil :</h2>
    <p id="description-profil"></p>
    <h2>Niveau moyen de ses fiches d'intervention :</h2>
    <p id="niveau-moyen"></p>

    <script>
        const urlParams = new URLSearchParams(window.location.search);

        const photoFileName = urlParams.get('photo');
        if (photoFileName) {
            const photoElement = document.getElementById('photo');
            photoElement.src = `path/to/photo/directory/${photoFileName}`;
        }

        document.getElementById('nom').textContent = urlParams.get('nom');
        document.getElementById('prenom').textContent = urlParams.get('prenom');
        document.getElementById('date-naissance').textContent = urlParams.get('date-naissance');
        document.getElementById('description-profil').textContent = urlParams.get('description-profil');
        document.getElementById('niveau-moyen').textContent = urlParams.get('niveau-moyen');
    </script>
</body>
</html>
