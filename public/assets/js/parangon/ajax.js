function ajaxGet(url, callback)
{
    // Création d'une requête HTTP
    var req = new XMLHttpRequest();
    // Requête HTTP GET asynchrone vers le fichier langages.txt publié localement
    req.open("GET", url, true);
    //une fois charge execute
    req.addEventListener("load", function()
    {
        if(req.status >= 200 && req.status < 400)
        {
            // Affiche la réponse reçue pour la requête
            callback(req.responseText);
        }
        else
        {
            console.error(req.status + " " + req.statusText + " " + url);
        }
    });
    //si erreur
    req.addEventListener("error", function()
    {
        console.error("Erreur réseau avec l'url " + url);
    });
    // Envoi de la requête
    req.send(null);
}