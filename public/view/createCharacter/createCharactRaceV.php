<?php
/*  
    title : creareCharact.php
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
        <section id="Race">
            <p class="partTitle">
                Choissisez votre race :
            </p>
            <p class="informationButton" id="raceToggler" data-toggle="raceInformation">
                <i class="fas fa-info-circle informationIcon" ></i>
            </p>

            <form action="" method="post">
            <label for="generisLine" class="raceLabel">Generis</label>
            <div class="line">
                <div id="rogue" class="raceItem">
                        <input type="radio" name="raceRadio" id="rogueInput" value="rogue">
                    <label for="rogueInput">
                        <img src="../../../public/assets/other/rogue.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="rogueInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="rogueHistory">
                        <i class="fas fa-book historyIcon" ></i>
                    </p>
                </div>
                <div id="valonien" class="raceItem">
                    <input type="radio" name="raceRadio" id="valonienInput" value="valonien">
                    <label for="valonienInput">
                        <img src="../../../public/assets/other/valonien.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="valonienInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="valonienBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
                <div id="limien" class="raceItem">
                    <input type="radio" name="raceRadio" id="limienInput" value="limien">
                    <label for="limienInput">
                        <img src="../../../public/assets/other/limien.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="limienInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="limienBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
                <div id="chrysaor" class="raceItem">
                    <input type="radio" name="raceRadio" value="chrysaor" id="chrysaorInput">
                    <label for="chrysaorInput">
                        <img src="../../../public/assets/other/chrysaor.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="chrysaorInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="chrysaorBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
            </div>
            <label for="bioLine" class="raceLabel">Bio</label>
            <div class="line" id="bioLine">
                <div id="incube" class="raceItem">
                    <input type="radio" name="raceRadio" value="incube" id="incubeInput">
                    <label for="incubeInput">
                        <img src="../../../public/assets/other/incube.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="incubeInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="incubeBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
                <div id="mentis" class="raceItem">
                    <input type="radio" name="raceRadio" value="mentis" id="mentisInput">
                    <label for="mentisInput">
                        <img src="../../../public/assets/other/mentis.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="mentisInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="mentisBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
                <div id="lictarien" class="raceItem">
                    <input type="radio" name="raceRadio" value="lictarien" id="lictarienInput">
                    <label for="lictarienInput">
                        <img src="../../../public/assets/other/lictarien.PNG" alt="" class="imageRace">
                    </label>
                    <p class="informationButton" data-toggle="lictarienInformation">
                        <i class="fas fa-info-circle informationIcon"></i>
                    </p>
                    <p class="informationButton" data-toggle="lictarienBook">
                        <i class="fas fa-book historyIcon"></i>
                    </p>
                </div>
                <button id="arrow" type="submit">
                    <i class="fas fa-arrow-right arrowR"></i>
               </button>
            </form>
            </div>
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
            <div id="raceInformation" class="noToggle">
                <p>
                    Généralités : Toutes les races, à l’exception des humains, sont issues des cryans,
                    <br> 
                    nouveau humains qui ont montré une étonnante capacité à résister aux températures extrêmes.
                    <br>
                    Issus des premières expérimentations eugéniques, ils furent la première race pendant l’ère
                    <br> 
                    de l’eugénisme et s’accommodent très bien au froid.
                    <br>
                    Les generis, « races pures », souvent transhumanisés, vivent en très grand majorité dans les cités.
                    <br>
                    Les bios, « races dégénérées ou mutantes », particulièrement résistante aux variations de
                    <br>
                    température, vivent en dehors des cités, ou en tant que xenos (ressortissant, non cityen, parias)
                    <br>
                    dans les cités
                </p>
        
            </div>
            <div id="rogueHistory" class="noToggle">
                <p>
                        Les rogues mesurent en moyenne 1,95 mètre et pèsent environ 115 kilos. Ils possèdent des oreilles
                        arrondies, 32 dents, ils sont bipèdes et possèdent deux bras. Ils ressemblent beaucoup à des
                        humains, mais possèdent une musculature beaucoup plus développée. Leur espérance de vie est
                        de 10 ans. Ils sont omnivores et ont une couleur de peau pouvant être jaunâtre, noire, marron,
                        blanche ou encore rougeâtre. Ils possèdent deux cœurs.
                        Description
                        Ils possèdent une incroyable coordination des mouvements, ainsi qu’une perception,
                        principalement visuelle, hors du commun. Il est très rare de rencontrer des rogues non
                        transhumanisés.
                        Ils vivent en casernes ou forteresses. Le seul contact qu’ils ont avec la population solarienne ou du
                        monde de NoOx est conflictuelle, excepté avec les limiens et les chrysaors. Ils nourrissent une
                        haine envers les licatariens.
                </p>
            </div>
            <div id = "rogueInformation" class="noToggle">
        
                <ul>
                    <li>
                            Domaines : Combat, Social 
                    </li>
                    <li>
                            Modificateurs raciaux : AGI + 1, DEX + 1, ING – 1, PER + 1, VOL + 1.
                    </li>
                    <li>
                            TAI : 3
                    </li>
                    <li>
                        Traits généraux : Résistance au sommeil, Volonté inébranlable, Haine (licatariens)
                    </li>
                    <li>
                        Traits raciaux : Cœur de bœuf, Meneur d’hommes, Nyctalopie
                    </li>
                    <li>
                        Traits de déviance : Impulsif
                    </li>
                    <li>
                        Carrières : probe (Garde solarienne et sécurité extérieure du dôme - SED), officier, juge exécutif,
                        Garde prétorienne, protection de missionnaires, protection de site d’exploitation
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Combat : 2
                            </li>
                            <li>
                                Social : 1
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies : thermopolium de probes, compétitions sauvages, bras de fer, personnalisation d’implants,
                        iceball solarien
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                    armure probe 
                            </li>
                            <li>
                                arme de poing
                            </li>
                            <li>
                                fusil d'assaut
                            </li>
                            <li>
                                lecteur biométrique
                            </li>
                            <li>
                                grenade flash x2
                            </li>
                            <li>
                                grenade à fragmentation x2
                            </li>
                            <li>
                                grenade incendiaire x2
                            </li>
                        </ul>
                    </li>
                    <li>
                        Divers :  jusqu’à 5 PC à d’offerts en implant à la création
                    </li>
                </ul>
        
            </div>
            <div id="valonienBook" class="noToggle">
                <p>
                        Les valoniens mesurent en moyenne 1,75 mètre et pèsent environ 65 kilos. Ils possèdent des
                        oreilles arrondies ou pointues, 32 dents, ils sont bipèdes et possèdent deux bras. Leur espérance de
                        vie est de 110 ans mais certains valoniens sont probablement capables de vivre plus de 200 ou
                        300 ans. Ils sont omnivores et ont une couleur de peau pouvant être jaunâtre, noire, marron,
                        blanche ou encore rougeâtre.
                        Description
                        Ils possèdent un charisme et une intelligence hors du commun. Leurs positions dans les sociétés
                        generis, fréquemment élevées, provoquent aussi bien de fréquentes convoitises, des antipathies ou
                        un profond respect : dans tous les cas, ils ne laissent pas indifférents sans qu’ils aient pour autant
                        une attitude hautaine : ils assurent leur rôle avec zèle, en faisant rarement la limite entre travail et
                        loisir, mais sans condescendance.
                        Ils ont des facilités à apprendre et à se souvenir. A l’exception des diplomates et des reporters qui
                        sont amenés à être au contact des bios, ils ne sortent jamais de Solaris. Ils ont accès aux meilleurs
                        soins, qui leur permettent de vivre presque infiniment, grâce notamment à de fréquentes
                        substitutions d’organes ou implants. Cependant, ils n’ont pas la valeur de l’argent car ils n’en ont
                        pas l’usage.
                        Les valoniens sont considérés comme la voix de l’ORACLE.
                </p>
            </div>
            <div id="valonienInformation" class="noToggle">
                <ul>
                    <li>
                            Domaines : Social, Sciences  
                    </li>
                    <li>
                            Modificateurs raciaux : CHA + 2, INT + 1
                    </li>
                    <li>
                            TAI : 3
                    </li>
                    <li>
                        Traits généraux : Orateur
                    </li>
                    <li>
                        Traits raciaux : Savant, Position privilégiée
                    </li>
                    <li>
                        Traits de déviance : aucun
                    </li>
                    <li>
                        Carrières : Administrateur, Juge, Commerçant, Artiste de spectacle, Archiviste, Médecin,
                        Journaliste, Reporter, Linguiste, Diplomate, Investigateur. 
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Social : 2
                            </li>
                            <li>
                                Sciences : 1
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies :  vernissages, arts et cultures, colloques, bains et cures thermales d’eau douce
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                vêtements chics 
                            </li>
                            <li>
                                cyber-assistant
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        Divers :  Les haut-valoniens, ceux qui ont le mieux réussi de leur race, représentent environ 10% de la
                        population valonienne, et vivent en grande villas individuelles, et collectionnent le plus souvent,
                        dans le secret le plus total, des artefacts interdits.
                        Les valoniens de classe moyenne représentent environ 50% de la population valonnienne, ceux de
                        classe basse, environ 40%.
                    </li>
                </ul>
        
            </div>
            <div id="limienBook" class="noToggle">
                <p>
                        Les limiens mesurent en moyenne 1,10 mètre et pèsent environ 28 kilos, ce qui leur donne une
                        apparence très fine. Ils possèdent des oreilles arrondies ou pointues, 32 dents, ils sont bipèdes et
                        possèdent deux bras. Leurs bras et mains sont très allongés ; chaque doigt possède cinq phalanges
                        et leurs articulations ont trois axes directeurs. Leur espérance de vie est de 12 ans. Ils sont
                        omnivores et ont une couleur de peau pouvant être bleuâtre, violet, jaunâtre, noire, marron, blanche
                        ou encore rougeâtre.
                        Description
                        Ils semblent posséder un incroyable esprit technique ainsi qu’une dextérité hors du commun. Ils
                        étaient les mécaniciens, les techniciens, les ingénieurs et les réparateurs en tout genre pendant l’ère
                        de l’eugénisme, postes qu’ils occupent encore fréquemment aujourd’hui, en plus d’investigateurs et
                        pilotes.
                        Ils composent, avec les chrysaors, de l’essentiel des « petites mains », même si celles des chrysaors
                        sont grandes et grosses, et que celles des limiens sont fines et longues… Ils s’entendent
                        particulièrement bien avec ces derniers. De par leur bonne humeur, leur sens de l’humour très fin
                        et leurs activités aussi diverses que tentaculaires, ils sont bien intégrés dans la société et bénéficient
                        d’une bonne aura sociale. Cependant, ils présentent aussi un caractère très affirmé et sont très geeks.
                </p>
            </div>
            <div id="limienInformation" class="noToggle">
                <ul>
                    <li>
                            Domaines : Tech, Soutien  
                    </li>
                    <li>
                            Modificateurs raciaux :FOR – 1, DEX + 2, END – 2, CHA + 1, INT + 1, ING + 2
                    </li>
                    <li>
                            TAI : 2
                    </li>
                    <li>
                        Traits généraux : Sens de l’humour, Contorsionniste
                    </li>
                    <li>
                        Traits raciaux : Doigt de fée, Esprit logique
                    </li>
                    <li>
                        Traits de déviance : luxure
                    </li>
                    <li>
                        Carrières : Tech, Hacker, Pilote, Ingénieur, Eleveur d’enfants, Biotechnicien, Agent d’entretien,
                        Agent de maintenance, Artiste musical, Mécanicien, Archéologue, Fille de joie 
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Tech : 2
                            </li>
                            <li>
                                Soutien : 1
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies :   hackathons, combat de drônes, ateliers bidouilles, musique, parties fines
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                exosquelette limien
                            </li>
                            <li>
                                tenue de tech
                            </li>
                            <li>
                                trousse de tech (2)
                            </li>
                            <li>
                                multi-laser de précision
                            </li>
                            <li>
                                accès à un electro-labs
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="chrysaorBook" class="noToggle">
                <p>
                        Les Chrysaors mesurent en moyenne 2,45 mètre et pèsent environ 168 kilos. Ils possèdent des
                        oreilles arrondies, 26 dents souvent anarchiques, ils sont bipèdes et possèdent deux bras Leur
                        espérance de vie est de 12 ans. Ils sont carnivores ou omnivores et ont une couleur de peau pouvant
                        être rougeâtre, verte ou encore verdâtre : coloration probablement due à une allergie au très forte
                        plomb.
                        Description
                        Ils sont le plus souvent manutentionnaires et ouvriers devant accomplir des tâches souvent ingrates
                        ou extrêmes. Ils semblent posséder une incroyable force et endurance, ainsi qu’un fort métabolisme
                        dû, en partie, à leur condition de vie très dure. Leur apparence est relativement repoussante : leur
                        peau est très souvent recouverte de pustules ou de traits grossiers, et leur crane est parcouru de
                        lignes de protubérances osseuses. Leurs anches sont très saillantes, et leurs avant-bras sont
                        segmentés en deux ensembles musculaires, celui le plus proche de la main pouvant se contracter
                        très rapidement pour produire une puissance très importante. Leur queue leur sert aussi bien de
                        main supplémentaire, d’outil et de support au sol.
                        Contre toutes apparences, ils sont fiers, délicats et susceptibles, et peuvent être blessés lorsqu’on les
                        attaque sur le physique. Il est rare de ne pas voir un chrysaor tatoué, élément central de leur culture,
                        tout comme la cuisine, les arts délicats mal réalisés (mais dont ils sont très fiers) et la mauvaise foi !
                </p>
            </div>
            <div id="chrysaorInformation" class="noToggle">
                <ul>
                    <li>
                            Domaines : Nature, Soutien  
                    </li>
                    <li>
                            Modificateurs raciaux : FOR + 2, MET + 1, END + 1, CHA – 1
                    </li>
                    <li>
                            TAI : 4
                    </li>
                    <li>
                        Traits généraux : Résistance au froid, Guérison rapide, Bête de somme
                    </li>
                    <li>
                        Traits raciaux :  Queue massive, Bras vérins, Bassin saillant, Nyctalopie
                    </li>
                    <li>
                        Traits de déviance : aucun
                    </li>
                    <li>
                        Carrières :  Ouvrier, Armurier, Manutentionnaire, Pilote, Artilleur, Logisticien (monteur de camps),
                        Mineur. 
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Soutien : 2
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies :   cuisine, artisanat, tatouage, repas conviviaux
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                foreur
                            </li>
                            <li>
                                    tenue de manutentionnaire 
                            </li>
                            <li>
                                sac à dos
                            </li>
                            <li>
                                boite à outils (2) 
                            </li>
                            <li>
                                câbles de fixations
                            </li>
                            <li>
                                    caisse de mécano (2)
                            </li>
                            <li>
                                accès à un atelier collectif
                            </li>
                            
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="incubeBook" class="noToggle">
                <p>
                        Les incubes ne sont pas une race à proprement parlé, mais sont plutôt un ensemble d’échecs
                        d’expériences génétiques viables. Ils servaient officieusement l’état comme combattants ou cobayes
                        pendant l’ère de l’eugénisme. Ils sont considérés comme la première race issue de l’eugénisme, mais
                        il u a autant d’incubes différents qu’il y a d’incubes ! Leurs représentants mesurent en moyenne
                        1,65 mètre (fréquemment 1,85 mètre lorsqu’ils ont le dos droit) et pèsent environ 70 kilos. Ils
                        possèdent le plus souvent des oreilles arrondies, 36 dents, sont bipèdes et possèdent deux bras.
                        Leur espérance de vie est de 8 ans. Ils sont principalement carnivores et ont une couleur de peau
                        (lorsqu’ils en ont) pouvant être jaunâtre, noire, marron, blanche ou encore rougeâtre.
                        Description
                        Ils semblent posséder une incroyable coordination des mouvements et une psyché souvent malade
                        mais leur procurant une volonté hors du commun et des pouvoirs psychiques.
                        Le plus souvent, les incubes naissent en tant qu’individus d’autres races generis ou bios, mais mutent
                        pour la première fois au bout de deux ou trois ans, de manières plus ou moins invasives, ce qui
                        peut leur valoir le nom de dégênérés. Ils ont une tendance à vouer un culte aux dieux, y compris
                        hérétiques. Les incubes peuvent être extrêmes, en bien comme en mal, ce qui fait que certains sont
                        mieux intégrés que d’autres dans la société, ou dans les réseaux de résistance. Ils sont parmi les
                        races les plus maltraitées, voire torturées, ce qui peut les mener à la révolte ou même au fanatisme
                </p>
            </div>
            <div id="incubeInformation" class="noToggle">
                <ul>
                    <li>
                        Domaines : Psychurgie, au choix  
                    </li>
                    <li>
                        Modificateurs raciaux : spéciaux, à la carte, voir ci-dessous.
                        <ul>
                            <li>
                                +1 : 5 PC.
                            </li>
                            <li>
                                +2 : 12 PC.
                            </li>
                            <li>
                                -1 : +2 PC.
                            </li>
                            <li>
                                -2 : +6 PC
                            </li>
                        </ul> 
                    </li>
                    <li>
                        TAI : 2-4
                        <ul>
                            <li>
                                2 : +10 PC
                            </li>
                            <li>
                                3 : 0 PC
                            </li>
                            <li>
                                4 : 10 PC
                            </li>
                            
                        </ul>
                    </li>
                    <li>
                        Traits généraux : illuminé
                    </li>
                    <li>
                        Traits raciaux :  un au choix : Clairvoyance génomique ou Réseaux de résistants.
                    </li>
                    <li>
                        Traits de déviance : aucun
                    </li>
                    <li>
                        Carrières :   carrières de races intégrées en cas d’incube intégré, Cultiste, Prêcheur, Mafieux, Résistant,
                        Ouvrier, Esclave, Chair à canon. 
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Psychurgie : 1
                            </li>
                            <li>
                                Au choix : 1
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies :  parcours de cryptes, marché noir (vol, récupération, recel, etc.), prêcher, loisirs grégaires,
                        collectionner (artefacts ou divers).
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                haillon
                            </li>
                            <li>
                                    détecteur de nanites 
                            </li>
                        </ul>
                    </li>
                    <li>
                        Divers : droit à six PC en traits de mutations à la création, et peuvent choisir des traits de mutations
                        durant le jeu. Egalement, ils ont obligation de prendre quatre points de traits de déviance.
                        Les incubes se découpent en cinq grands groupes sociaux :
                        <ul>
                            <li>
                                Intégrés (imposture) 
                            </li>
                            <li>
                                Ouvriers de basses besognes et esclaves 
                            </li>
                            <li>
                                Cultistes et missionnaires 
                            </li>
                            <li>
                                Résistants 
                            </li>
                            <li>
                                Sectateurs fanatiques 
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div id="mentisBook" class="noToggle">
                <p>
                        Les mentis mesurent en moyenne 1,75 mètre et pèsent environ 65 kilos. Ils possèdent des oreilles
                        arrondies ou pointues, 32 dents, ils sont bipèdes et possèdent deux bras. Leur espérance de vie est
                        de 20 ans. Ils sont omnivores et ont une couleur de peau pouvant être jaunâtre, noire, marron,
                        blanche ou encore rougeâtre, bien qu’elle soit presque toujours blanche.
                        Description
                        Ils ont montrés d’étonnantes capacités psychiques. Ils furent répertoriés initialement comme étant
                        un peuple pacifique de pécheurs et de chasseurs. Ils semblent vouer un amour irrationnel pour la
                        nature, et leur origine n’est pas clairement établie.
                        Ils ont montré une étonnante capacité à résister aux températures extrêmes, encore plus que toutes
                        les autres races bios. Etrangement, ils ne semblent pas avoir de déperdition de chaleur, il est presque
                        impossible de les distinguer avec une vision thermographique. Ils n’ont pas de sudation, et résistent
                        donc très mal à de hautes températures.
                        D’apparences toujours calmes et sages, ils sont pacifiques, pratiquent le zen et sont en quête
                        d’apaiser les fluctuations du mental par des activités non-affligeantes : peu d’éléments ont prises
                        sur eux, ils recherchent le détachement, et ne s’intéressent pas à la vie generis en général (les
                        possessions, la politique, l’économie, la technologie, etc.). Ils viennent à Solaris afin d’accomplir des
                        rites initiatiques ainsi que partager et transmettre les savoirs. Ils s’intéressent à tout, aiment peser
                        chaque mot et apprendre des connaissances diverses, notamment linguistiques, et vivre toutes les
                        expériences. Traditionnellement, après leurs rites initiatiques, les mentis fondent des familles
                        nombreuses.
                        Ils sont relativement bien accueillis et bien traités à Solaris (ce qui est exceptionnel pour des bios),
                        notamment car la plupart ont des carrières de prodiges ou d’enseignants et que les samanas, qui ne
                        vivent que de dons, sont respectés mais aussi souvent sous-estimés. Il participe à l’éducation et à la
                        formation des « jeunes » et aux missions humanitaires locales.
                </p>
            </div>
            <div id="mentisInformation" class="noToggle">
                <ul>
                    <li>
                        Domaines : Psychurgie, Sciences  
                    </li>
                    <li>
                        Modificateurs raciaux : CHA + 1, INT + 2, ING - 1, PER - 1, VOL + 2
                    </li>
                    <li>
                        TAI : 3
                    </li>
                    <li>
                        Traits généraux : Pacifiste, Paroles de sagesse, Méditation
                    </li>
                    <li>
                        Traits raciaux : Immunité au froid, Psyker né.
                    </li>
                    <li>
                        Traits de déviance : aucun
                    </li>
                    <li>
                        Carrières :  Shaman, Prodige, Samana, Sage, Yogi, Enseignant, Missionnaire, Médiateur
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Psychurgie : 1
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies :   yoga, contemplation, jardin de glace (zen), apprentissage et découverte
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                bâton de pèlerin
                            </li>
                            <li>
                                besace
                            </li>
                            <li>
                                encens
                            </li>
                            <li>
                                bol chantant
                            </li>
                            <li>
                                outils de sculpture sur glace
                            </li>
                        </ul>
                    </li>
                    <li>
                        Divers : ne peut pas prendre de traits de déviance à la création
                    </li>
                </ul>
        
            </div>
            <div id="lictarienBook" class="noToggle"> 
                <p>
                    Les lictariens mesurent en moyenne 1,80 mètre et pèsent environ 70 kilos. Ils possèdent des oreilles
                    pointues, 32 dents, ils sont bipèdes et possèdent quatre membres. Leurs deux yeux ont une
                    mobilité indépendante. Leur espérance de vie est de 100 ans. Ils sont omnivores et ont une couleur
                    de peau pouvant être blanchâtre (rarement) ou verdâtre. Les lictariens sont hermaphrodites.
                    Description
                    Ils semblent posséder une incroyable coordination des mouvements, une grande vitesse et agilité,
                    une perception et une précision hors du commun et un métabolisme très développé leur
                    permettant souvent une régénérescence rapide des tissus et une guérison quasi instantanée. Leur
                    peau leur offre un camouflage actif. Ils disposent de deux lames dorsales qu’ils peuvent utiliser pour
                    se déplacer ou combattre. Ces attributs exceptionnels en font de redoutables adversaires au corps
                    à corps. Leur premier représentant répertorié par fut Lictar.
                    Quelque part plus ou moins à mi-chemin entre l’humain, l’insecte et le lézard, ils répugnent la
                    plupart des generis et parlent un dialecte qui sont les seuls à pouvoir utiliser mais que les linguistes
                    arrive à décrypter (il leur est d’ailleurs également impossible de parler une langue humaine, mais
                    ils apprennent à les comprendre aux contacts des populations generis). Ils semblent pouvoir
                    communiquer entre eux, jusqu’à d’incroyables distances, grâce à une télépathie lictarienne ou une
                    empathie animale surdéveloppée et une conscience de ruche. Ils ont deux modes
                    comportementaux relativement antagonistes et exclusifs, nidification et chasse : gare à bien savoir
                    distinguer dans lequel ils évoluent lorsqu’on les rencontre afin de ne pas être pris pour une proie
                    et pour pouvoir délecter le meilleur met naturel du monde de NoOx à défaut du plus redoutable
                    des poisons. Certains connaisseurs fortunés vont même jusqu’à tourmenter un lictarien l’instant
                    précédent immédiatement la dégustation de son miel afin que ce dernier contienne quelques
                    gouttes toxiques qui lui donne une saveur incomparable et le goût du danger !
                    A Solaris, ils sont réduits à l’esclavage dans les serres de plantations, d’oxygénation et celles de
                    culture des implants, où ils sont encadrés, pour ne pas dire parqués, par les probes rogues au nom
                    de l’ORACLE ; ne s’arrêtant que pour se rendre dans leurs cocons juchés dans les serres. Ils
                    entretiennent, en revanche, des liens étroits avec les +incubes (en leur fournissant notamment
                    fréquemment les incubes en début de mutation avant que le législateur n’essaye de les asservir ou
                    de les exterminer)
                </p>
            </div>
            <div id="lictarienInformation" class="noToggle">
                <ul>
                    <li>
                        Domaines : Combat, Nature  
                    </li>
                    <li>
                        Modificateurs raciaux :  AGI + 2, MET + 2, REF + 1, CHA - 2, INT - 1, ING - 1, PER + 1, INS
                        + 1.
                    </li>
                    <li>
                        TAI : 3
                    </li>
                    <li>
                        Traits généraux : Inculte 
                    </li>
                    <li>
                        Traits raciaux : Dard, Camouflage optique, Empathie animale, Régénération
                    </li>
                    <li>
                        Traits de déviance : aucun
                    </li>
                    <li>
                        Carrières :  Cultivateur, Osmoseur, Couveur, Shaman
                    </li>
                    <li>
                        Accréditation :
                        <ul>
                            <li>
                                Nature : 2
                            </li>
                        </ul>
                    </li>
                    <li>
                        Hobbies : chants tribaux, rucher, mandala en terres meubles, tracés de runes shamaniques,
                        sculptures sur bois
                    </li>
                    <li>
                        Equipements
                        <ul>
                            <li>
                                sacoche
                            </li>
                            <li>
                                nécessaire de culture
                            </li>
                            <li>
                                poches de venin pleines
                            </li>
                            <li>
                                collier d'asservissement lictarien
                            </li>
                            <li>
                                matériel de gravure/sculpture
                            </li>
                        </ul>
                    </li>
                    <li>
                        Divers :  possède les connaissances lictarien, zoologie et biologie à la création.
                        Les lictariens ont deux modes de fonctionnements :
                        <ul>
                            <li>
                                Nidification : dards et griffes rétractées, leurs défenses naturelles au repos, ils ont alors un
                                véritable instinct de ruche et produit des sécrétions (des matériaux de construction
                                biologiques et un miel très nourrissant, fin et prisé, notamment par les haut-valoniens) 
                            </li>
                            <li>         
                                chasse : .mode offensif par excellence avec carapace chitineuse pleinement exposée et
                                attributs de traque déployés, y compris des traits de camouflage ; leur soif de chasseur est
                                alors insatiable, tuant plus de proies que nécessaire pour se nourrir dans un plaisir ludique. ;
                                leur instinct de prédateur prenant alors le dessus et ils leur permettant de sécréter des
                                toxines mortelles
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </section>
    
 <?php
    $content=ob_get_clean();
    require(__DIR__.'/../template.php')
 ?>
