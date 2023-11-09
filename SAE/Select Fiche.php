<!DOCTYPE HTML>
<html lang="fr">
<html>
    <head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/vnd.icon" href="apeaj.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Choisir fiche d'intervention</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                font-family: Arial, sans-serif;
                background-color: #f0f0f0;
                flex-direction: column;
                align-items: center;
                justify-content: flex-start;
                height: 100vh;
            }

            .top-bar {
                background-color: #bbdefb;
                display: flex;
                align-items: center;
                justify-content: space-between;
                width: 100%;
                height: 80px;
                border-bottom: 1px solid black;
            }
                .image {
                    width: 100px;
                    height: 100px;
                }
                .image1 {
                    width: 62px;
                    height: 62px;
                }

                .adm {
                    margin-right: 25px;
                    display: flex; 
                    align-items: center; 
                }
                .admTXT {
                    margin-left: 5px;
                }

            .container {
                width: 80%;
                max-width: 800px;
                margin: 100px auto;
                background-color: none;
                border: 1px solid black;
                text-align: center;
                padding: 20px;
                overflow: hidden;
            }

                .title {
                    display: flex;
                    justify-content: center;
                    align-items: center;
                    font-size: 20px;
                    margin-bottom: 40px;
                }
                .image2 {
                    margin-left: 10px;
                    width: 50px;
                    height: 50px;
                }

                .fInters {
                    display: inline-block;
                }
                    .fInter {
                        display: inline-block;
                        border: 1px solid black;
                        padding: 10px;
                        margin: 10px;
                        width: 125px;
                        height: 175px;
                    }

                    .fInter.static {
                        text-anchor: middle;
                    }
                    .fInter.selected {
                        border: 5px solid #72bb53;
                        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); 
                    }
                        .name {
                            font-weight: bolder;
                        }

                .buttonADD {
                    display: inline-block;
                    justify-content: center;
                    border: none;
                    background-color: none;
                    box-shadow: none;
                }
                #add {
                    background-color: none;
                    border-radius: 10px;
                    color: black; 
                    border: none; 
                    padding: 10px 20px;
                    cursor: pointer;
                }
        </style>
    </head>
    <body>
        <div class="top-bar">
            <a href="Accueil.html">
                <img class="image" src="home-icon.png">
            </a>
            <a class="adm" href="Connexion_admin.html"> 
                <img class="image1" src="logo.png">
                <h3 class="admTXT">Admin</h3>
            </a> 
        </div>

        <div class="container">
            <div class="title"> 
                <h4> Choisir une fiche d'intervention </h4>
                <img class="image2" src="assignment_icon.png"> 
            </div>
            
            <div class="fInters">
                <div class="fInter">
                    <p class="name">Plomberie</p>
                </div>
                <div class="fInter">
                    <p class="name">Finition</p>
                </div>
                <div class="fInter">
                    <p class="name">Serruerie</p>
                </div>
                <div class="fInter">
                    <div class="static">
                        <p class="name">Aménagement</p>
                    </div>
                </div>
                <div class="fInter">
                    <p class="name">Électricité</p>
                </div>
            </div>
            <div class="buttonADD">
                <a id="add"><img src="logo_plus.png" class="image"></a>
            </div>
        </div>
    </body>
    <script>
        const addButton = document.getElementById('add');

        let selectedPaper = null;

        function selectPaper(paper) {
            if (selectedPaper === paper) {
                deselectPaper();
            } else {
                if (selectedPaper) {
                    selectedPaper.classList.remove('selected');
                }
                paper.classList.add('selected');
                selectedPaper = paper;
                connectButton.style.display = 'block';
            }
        }

        function deselectPaper() {
            if (selectedPaper) {
                selectedPaper.classList.remove('selected');
                selectedPaper = null;
                connectButton.style.display = 'none';
            }
        }

        addButton.addEventListener('click', () => {
            if (selectedPaper) {
                //window.location.href = 'page_de_connexion.html';
            }
        });
    </script>
</html>