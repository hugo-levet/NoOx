var compJson;
ajaxGet("./../public/assets/js/parangon/skills.json", function(rep){
    compJson = JSON.parse(rep);
});

function trouverComp(compId) //TRANSLATE
{
    // updateBd();
    for(var i = 0; i < lesCompetences.length; ++i)
    {
        if(lesCompetences[i]['comp_id'] == compId)
        {
            return lesCompetences[i];
        }
    }
    return 0;
}

function trouverCompJson(compId) //TRANSLATE
{
    //trouver id dans json
    for(var i = 0; i < compJson.length; ++i)
    {
        if(compJson[i]['id'] == compId)
        {
            return compJson[i];
        }
    }
}

function openPopup(compId)
{
    console.log('ouverture id ' + compId);
    //selectionne les partie html a modifier
    var popup = document.getElementById('popup');
    var h2 = popup.getElementsByTagName("h2")[0];
    var lesronds = document.getElementById('lesronds');

    //les modifie
    /*var*/ currentComp = trouverComp(compId);

    var levelComp = currentComp['level'];

    /*var*/ currentCompJson = trouverCompJson(compId);

    h2.innerText = "Competence " + currentCompJson['name'];
    
    //crée les ronds
    createRond(currentCompJson);

    popup.style.display = "block";
}

function closePopup()
{
    console.log('fermeture');
    var popup = document.getElementById('popup');
    popup.style.display = "none";
}

function createRond(a_comp)
{
    console.log('creation ronds');
    var tabDeRonds = lesronds.getElementsByTagName("div");
    
    // updateBd();

    //crée les rond de la compétences
    var nombreRond = tabDeRonds.length;
    
    //suprimme tous les anciens rond
    for(var i = 0; i < nombreRond; ++i)
    {
        tabDeRonds[0].remove();
    }

    //crée les ronds en fonction du pattern
    for(var i = 0; i < a_comp['pattern'].length; ++i)
    {
        var unrond = document.createElement("div");
        unrond.classList.add("rond");

        switch (a_comp['pattern'][i])
        {
            case '1':
                unrond.classList.add("knowledge");
                break;
            case '2':
                unrond.classList.add("skill");
                break;
            case '3':
                unrond.classList.add("hermetic_capacity");
                break;
            default:
                unrond.classList.add("skill");
        }

        if(i < currentComp['level'])
        {
            unrond.classList.add("acquis");
        }

        lesronds.appendChild(unrond);
    }
}