<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.icon" href="apeaj.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apprenti</title>
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

        .apprenti-form {
            width: 300px;
            margin: 0 auto;
        }

        .apprenti-form label {
            display: block;
            margin-top: 10px;
        }

        .apprenti-form input[type="text"],
        .apprenti-form input[type="date"],
        .apprenti-form input[type="password"],
        .apprenti-form textarea,
        .apprenti-form select,
        .apprenti-form input[type="file"] {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .apprenti-form textarea {
            resize: none;
        }

        .apprenti-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }

        .apprenti-form input[type="submit"]:hover {
            background-color: #45a049;
        }

        .apprenti-form input[type="button"] {
            background-color: #e70f0f;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="bandeau">
        <a href="Accueil Admin.php">
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
    <form class="apprenti-form" enctype="multipart/form-data" method="POST" action="AJapprenti.php">
        <label for="photo">Photo de profil :</label>
        <input type="file" id="photo" name="photo">
        <br>
        <div id="preview"></div> <!-- Prévisualisation de l'image -->
        <br>
        <label for="nom">Nom :</label>
        <input type="text" id="nom" name="nom">
        <br>
        <label for "prenom">Prénom :</label>
        <input type="text" id="prenom" name="prenom">
        <br>
        <label for="date_naissance">Date de naissance :</label>
        <input type="date" id="date_naissance" name="date_naissance">
        <br>
        <label for="mot_de_passe">Mot de passe :</label>
        <input type="password" id="mot_de_passe" name="mot_de_passe">
        <br>
        <label for="confirmer_mot_de_passe">Confirmer le mot de passe :</label>
        <input type="password" id="confirmer_mot_de_passe" name="confirmer_mot_de_passe">
        <br>
        <label for="description_profil">Description du profil de l'apprenti (difficultés etc...) :</label>
        <textarea id="description_profil" name="description_profil" rows="4" cols="50"></textarea>
        <br>
        <label for="niveau_moyen">Niveau moyen de ses fiches d'intervention :</label>
        <select id="niveau_moyen" name="niveau_moyen">
            <option value="1">Niveau 1</option>
            <option value="2">Niveau 2</option>
            <option value="3">Niveau 3</option>
        </select>
        <br>

        <input type="submit" value="Créer le profil">
        <input type="button" class="annuler-button" value="Annuler" onclick="window.location.href='Accueil Admin.php'">
    </form>

    <div id="error-message" style="color: red;"></div>


    <script>
        const photoInput = document.getElementById('photo');
        const preview = document.getElementById('preview');

        photoInput.addEventListener('change', function() {
            const file = photoInput.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.style.maxWidth = '400px'; // Ajustez la taille de la prévisualisation selon vos besoins
                    preview.innerHTML = '';
                    preview.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
