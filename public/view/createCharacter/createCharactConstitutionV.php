<?php
/*  
    title : creareCharactConstitutionV.php
    author : Audrey
    started-on : 19/12/2019

    brief : view create Charact 2nd page
*/

$listStyles = ['character/createCharacter.css'] ;
$listJS =['character/createChar.js'];
ob_start();

?>
<main>
    <div id="PageTitle">
        Création du personnage
    </div>
    <section id="constitution">

        <p class="partTitle"> Choissisez votre constitution :</p>
        <p class="choiceP">Vous pouvez en choisir jusqu’à 3</p>
        <form action="" method="post">
            <div class="line">
                <div id="Kapha">
                    <p>Kapha<p>

                    <input type="checkbox" name="constitutionRadio[]" value="1" id="KaphaInput">
                    <label for="KaphaInput">
                        <img src="../../../public/assets/other/kapha.PNG" alt="kapha" class="imageConstitution">
                    </label>

                    <p class="informationButton" data-toggle="nominformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>

                    <p class="caracItem">Caractéristiques : </p> 

                    <ul class="listCarac">
                        <li>
                            Sommeil lourd et prolongé
                        </li>
                        <li>
                            Lent et affable
                        </li>
                        <li>
                            Tendance à l’embonpoint, recherche du bien-être par la nourriture
                        </li>
                        <li>
                            Personnalité tranquille, détendue et peu encline à l’énervement
                        </li>
                        <li>
                            Digestion lente et appétit faible
                        </li>
                        <li>
                            Peau plutôt fraîche, douce, épaisse, pâle, grasse et yeux humides
                        </li>
                        <li>
                            Tolérant, affectueux
                        </li>
                        <li>
                            Lent à l’apprentissage et à la prise de décision mais bonne mémoire
                        </li>
                        <li>
                            Possessif et fier de lui
                        </li>
                        <li>
                            Démarche gracieuse et ondoyante
                        </li>
                        <li>Malus : Sonné</li>
                        <li>Bonus : Affamé</li>
                    </ul>

                </div>
                <div id="Pitta">
                    <p>Pitta</p>
                    <input type="checkbox" name="constitutionRadio[]" value="2" id="PittaInput">
                    <label for="PittaInput">
                        <img src="../../../public/assets/other/pitta.PNG" alt="Pitta"class="imageConstitution">
                    </label>

                    <p class="informationButton" data-toggle="nominformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>

                    <p class="caracItem">Caractéristiques : </p> 

                    <ul class="listCarac">
                        <li>
                            Amateur de défi
                        </li>
                        <li>
                            Intellect acéré
                        </li>
                        <li>
                            Appétit et soif intenses mais bonne digestion
                        </li>
                        <li>
                            Elocution précise et bien articulée
                        </li>
                        <li>
                            Irritable et colérique dans les conditions de stress
                        </li>
                        <li>
                            Vit mal le saut de repas et aime avoir une vie réglée
                        </li>
                        <li>
                            Peau plutôt claire ou colorée, souvent parsemée de taches de rousseur
                        </li>
                        <li>
                            Tempérament de meneur
                        </li>
                        <li>
                            Exigeant envers lui-même et les autres
                        </li>
                        <li>
                            Démarche décidée
                        </li>
                        <li>Malus : Assoifé</li>
                        <li>Bonus : Malade</li>
                    </ul>
                </div>
                <div id="Vata">
                    <p>Vata</p>
                    <input type="checkbox" name="constitutionRadio[]" value="3" id="VataInput">
                    <label for="VataInput">
                        <img src="../../../public/assets/other/vata.PNG" alt="vata" class="imageConstitution">
                    </label>
                    
                    <p class="informationButton" data-toggle="nominformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>

                    <p class="caracItem">Caractéristiques : </p> 
                    <ul class="listCarac">
                        <li>
                            Apprend rapidement mais oublie vite
                        </li>
                        <li>
                            Vif et enthousiast
                        </li>
                        <li>
                            S’inquiète facilement
                        </li>
                        <li>
                            Appétit et digestion irréguliers
                        </li>
                        <li>
                            Propension au sommeil léger et à l’insomnie
                        </li>
                        <li>
                            S’épuise facilement et rapidement
                        </li>
                        <li>
                            Imaginatif dilettante
                        </li>
                        <li>
                            Humeur changeante
                        </li>
                        <li>
                            Aime le changement et avoir une vie trépidante
                        </li>
                        <li>
                            Démarche vive
                        </li>
                        <li>Malus : Epuisé</li>
                        <li>Bonus : Désespéré</li>
                    </ul>
                </div>
            </div>
            <button id="arrow" type="submit">
                    <i class="fas fa-arrow-right arrowR"></i>
            </button>
        </form>
    </section>
</main>
<section id="informationsContainer" class="noToggle">
        <div id="topInformation">
            <p>
                Informations
            </p>
            <button id="closeButton">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div id="nominformation" class="noToggle">
            <table>
                <thead>
                    <tr>
                        <td></td>
                        <td>Kapha</td>
                        <td>Pitta</td>
                        <td>Vata</td>
                        <td>Kapha-Pitta</td>
                        <td>Kapha-Vata</td>
                        <td>Pitta-Vata</td>
                        <td>Kapha-Pitta-Vata</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>FORce</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>AGIlité</td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>DEXtérité</td>
                        <td></td>
                        <td></td>
                        <td>+2</td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>METabolisme</td>
                        <td></td>
                        <td>+2</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>ENDurance</td>
                        <td>+2</td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
    
                    </tr>
                    <tr>
                        <td>REFlexe</td>
                        <td></td>
                        <td></td>
                        <td>+2</td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>INStinc</td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>VOLonté</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>PERception</td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
        
                    </tr>
                    <tr>
                        <td>INGéniosité</td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>INTelligence</td>
                        <td></td>
                        <td>+2</td>
                        <td></td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>CHArisme</td>
                        <td>+2</td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>KARmique</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>Modification d'états</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ajouter 1 à une compétence nulle</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>Ajouter 1 à une compétence 1</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                        <td>+1</td>
                        <td>+1</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>MET/END/REF</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>INS/VOL/PER</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>+1</td>
                    </tr>
                    <tr>
                        <td>Trait de constitution</td>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>Stabilité mentale</td>
                        <td>Oeil Percant</td>
                        <td>Intuitif</td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </section>

<?php 
    $content = ob_get_clean();
    require(__DIR__.'/../template.php') 
?>