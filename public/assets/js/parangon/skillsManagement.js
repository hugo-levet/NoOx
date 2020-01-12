$(function(){
    console.log('jQuery est prêt !');
    
    //le rapport de  map pour l'image
    reduction = $('#spheringSkillsImg').width() / 1587;
    $('map').children('area').each(function(index){
        // divise la chaine de caractere des coordonnées en tableau
        tabCoords = $(this).attr('coords').split(',');

        // multiplie chaque coordonnées
        tabCoords.forEach(function(element, index){
            tabCoords[index] = Math.floor(element * reduction);
        });

        //applique les changements
        $(this).attr('coords', tabCoords.join(','));

    });

    $("#plus").click(function(){
        console.log('plus');
        console.log('currentComp[\'id\']' + currentCompJson['id']);
        $.ajax({
            url : urlAddSkill, // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP.
            data : 'comp_id=' + currentCompJson['id'],
            dataType : 'text',
            success : function(text, statut){
                console.log(text);
                if(text[0] != '/')
                {
                    console.log('text[2] ' + text[2]);
                    
                    updateBd();
                }
                else
                {
                    console.log('Cette compétence ne peut pas être ajouté.');
                }
                
            },
            error : function(resultat, statut, erreur){
                
            },

            complete : function(resultat, statut){

            }
        });
    });

    $("#moins").click(function(){
        console.log('moins');
        console.log('currentComp[\'id\']' + currentCompJson['id']);
        $.ajax({
            url : urlRemoveSkill, // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP.
            data : 'comp_id=' + currentCompJson['id'],
            dataType : 'text',
            success : function(text, statut){
                console.log(text);
                if(text[0] != '/')
                {
                    console.log('text[2] ' + text[2]);
                    updateBd();
                }
                else
                {
                    console.log('Cette compétence ne peut pas être enlevé.');
                }
                
            },
            error : function(resultat, statut, erreur){
                
            },

            complete : function(resultat, statut){

            }
        });
    });

    function updateBd()
    {
        $.ajax({
            url : urlUpdateDb, // La ressource ciblée
            type : 'POST', // Le type de la requête HTTP.
            dataType : 'json',
            success : function(text, statut){
                console.log(text);
                lesCompetences = text;
                if(typeof currentCompJson != 'undefined')
                {
                    currentComp = trouverComp(currentCompJson["id"]);
                    // currentComp['level'] = text[2];//TO AMELIORE
                    createRond(currentCompJson);
                }
            },
            error : function(resultat, statut, erreur){
                console.log('json : erreur' + erreur);    
            },
            complete : function(resultat, statut){
            
            }
        });
    }
    updateBd();
});