
            spheringSkillsImg = document.getElementById('spheringSkillsImg');
            spheringSkillsImg.width = window.innerWidth;
            
        function changeCoordsArea()
        {
            //modifier chaque coordonnée de la map de l'image
            
            //recuperer les coords en json
            var request = new XMLHttpRequest();
            request.open('GET', requestURL);
            request.responseType = 'json';
            request.send();
            request.onload = function() {
                areaJson = request.response;

                resolution = spheringSkillsImg.width / 1587;
                //for tous les area
                for(var i = 0; i < document.getElementsByName('image-map')[0].children.length-1; i++)
                {
                    aArea = document.getElementsByName('image-map')[0].children[i];
                    //on prend se qui correspond en json
                    aAreaJson = areaJson[i];

                    coords = aAreaJson['coords'].split(',');
                    //on y multiplie par la resolution
                    coords.forEach(function(element, index){
                        coords[index] = Math.floor(element * resolution);
                    });
                    //on y remet dans coords
                    aArea.coords = coords.join(',');
                }
            }
        }

        function zoom()
        {
            console.log('zoom');
            spheringSkillsImg.width *= 1.16666;

            //modifier chaque coordonnée de la map de l'image
            changeCoordsArea();
        }

        function zoomOut()
        {
            console.log('zoomOut');
            spheringSkillsImg.width *= 0.85714775513;

            if(spheringSkillsImg.width < window.innerWidth)
            {
                spheringSkillsImg.width = window.innerWidth;
                //modifier chaque coordonnée de la map de l'image
                changeCoordsArea();
            }
            else
            {
                //modifier chaque coordonnée de la map de l'image en mettant ceux de l'image de base TODO
                changeCoordsArea();
            }
        }