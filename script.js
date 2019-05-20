
// récupère la valeur de l'id_comm

var id = document.getElementById('id_comm').value;

var commentary = document.getElementById('commentaire');

// vérifie la connexion de l'admin

if (document.getElementById('rank_admin'))
{
    var verif = document.getElementById('rank_admin').innerHTML;

}

// vérifie la connexion de l'utilisateur

if (document.getElementById('rank_user'))
{
    var verif_user = document.getElementById('rank_user').innerHTML;

}

function ajaxRequest()
{

    // récupère les données http

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        // s'assure de l'envoie de la requête

        if (this.readyState == 4 && this.status == 200) {

            // supprime les éléments créé via la requête pour éviter les doublons

            $('#commentaire > div').remove();
            $('#commentaire > span').remove();
            $('#commentaire > h4').remove();


            // récupère les données

            var objQuete = this.responseText;

        }

        // parse les données pour une récupération en objet

        let commentaire = JSON.parse(objQuete);

        // crée les éléments html comportant la valeur des données

        for (let i = 0; i< commentaire.length; i++)
        {

            let pseudo = document.createElement("div");
            pseudo.className = "pseudoComm";
            commentary.appendChild(pseudo);
            pseudo.innerHTML = commentaire[i].pseudo+" -"+commentaire[i].sexe+ " "+commentaire[i].age+" ans";

            let div_comm = document.createElement("div");
            div_comm.className = "div_comm";
            commentary.appendChild(div_comm);

            let comment = document.createElement("div");
            comment.className = "comment";
            div_comm.appendChild(comment);
            comment.innerHTML = commentaire[i].comment;

            let date = document.createElement("span");
            date.className = "dateComm";
            div_comm.appendChild(date);
            date.innerHTML = commentaire[i].date;

            let a = document.createElement("div");
            a.className = "friend aComm";
            div_comm.appendChild(a);

            // si admin

            if (verif)
            {

                // permet de suprimer tous les commentaires

                let suppr = document.createElement("a");
                a.appendChild(suppr);
                suppr.className = "supprComm";
                suppr.innerHTML = "supprimer";
                suppr.href = "../index.php?controller=admin&action=deleteComm&id_comment="+commentaire[i].id_comment+"&id_event="+commentaire[i].id_event;

                // édite uniquement les commentaires de l'admin

                if (verif == Number(commentaire[i].id_user))
                {
                    let edit = document.createElement("a");
                    a.appendChild(edit);
                    edit.className = "editComm";
                    edit.innerHTML = "editer";
                    edit.href = "../index.php?controller=user&action=edit&id_event="+commentaire[i].id_event+"&id_comment="+commentaire[i].id_comment+"&comment="+commentaire[i].comment;

                }

            }

            // vérifie les commentaires de l'utilisateur pour lui permettre de les supprimer et de les éditer

            if (verif_user == Number(commentaire[i].id_user))
            {

                let suppr = document.createElement("a");
                a.appendChild(suppr);
                suppr.className = "supprComm";
                suppr.innerHTML = "supprimer";
                suppr.href = "../index.php?controller=user&action=deleteComm&id_comment="+commentaire[i].id_comment+"&id_event="+commentaire[i].id_event;

                let edit = document.createElement("a");
                a.appendChild(edit);
                edit.className = "editComm";
                edit.innerHTML = "editer";
                edit.href = "../index.php?controller=user&action=edit&id_event="+commentaire[i].id_event+"&id_comment="+commentaire[i].id_comment+"&comment="+commentaire[i].comment;
            }

        }

    };

    // récupère le commentaire de l'utilisateur

    var comment = document.getElementById("comm").value;

    // envoie de la requête url contenant l'id de l'évènement et le commentaire de l'utilisateur

    var RequestURL = "index.php?controller=ajax&id_event="+id+"&postCommentaire="+comment;

    // défini la method d'envoie, le fait que ce soit bien en asynchrone et donc sans rechargement de page

    xhttp.open('GET', RequestURL,true) ;

    // envoi des données au server

    xhttp.send();
}

ajaxRequest();

// refait une requête ajax à la soumission du formulaire

document.getElementById('bt_comm').addEventListener("click", function () {

    ajaxRequest();

    // vide le champ

    document.getElementById("comm").value = "";

});



