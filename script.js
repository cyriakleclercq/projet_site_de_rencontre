
var id = document.getElementById('id_comm').value;

var commentary = document.getElementById('commentaire');

var commSupp = document.getElementById('supp');

if (document.getElementById('rank_admin'))
{
    var verif = document.getElementById('rank_admin').innerHTML;

}

if (document.getElementById('rank_user'))
{
    var verif_user = document.getElementById('rank_user').innerHTML;

}

function ajaxRequest()
{

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            $('#commentaire > div, span, h4').remove();

            var objQuete = this.responseText;

        }

        let commentaire = JSON.parse(objQuete);
        console.log(commentaire);


        for (let i = 0; i< commentaire.length; i++)
        {

            let pseudo = document.createElement("div");
            pseudo.className = "pseudoComm";
            commentary.appendChild(pseudo);
            pseudo.innerHTML = commentaire[i].pseudo+" -"+commentaire[i].sexe;

            let div_comm = document.createElement("div");
            div_comm.className = "div_comm";
            commentary.appendChild(div_comm);

            let titre = document.createElement("h4");
            titre.className = "titleComm";
            div_comm.appendChild(titre);
            titre.innerHTML = commentaire[i].title;


            let comment = document.createElement("div");
            comment.className = "comment";
            div_comm.appendChild(comment);
            comment.innerHTML = commentaire[i].comment;

            let date = document.createElement("span");
            date.className = "dateComm";
            div_comm.appendChild(date);
            date.innerHTML = commentaire[i].date;

            if (verif)
            {

                let suppr = document.createElement("a");
                div_comm.appendChild(suppr);
                suppr.className = "supprComm";
                suppr.innerHTML = "supprimer";
                suppr.href = "../index.php?controller=admin&action=deleteComm&id_comment="+commentaire[i].id_comment+"&id_event="+commentaire[i].id_event;

                if (verif == Number(commentaire[i].id_user))
                {
                    let edit = document.createElement("a");
                    div_comm.appendChild(edit);
                    edit.className = "editComm";
                    edit.innerHTML = "editer";
                    edit.href = "../index.php?controller=user&action=editCommPage&id_event="+commentaire[i].id_event+"&id_comment="+commentaire[i].id_comment+"&titre="+commentaire[i].title+"&comment="+commentaire[i].comment;

                }

            }

            if (verif_user == Number(commentaire[i].id_user))
            {

                let suppr = document.createElement("a");
                div_comm.appendChild(suppr);
                suppr.className = "supprComm";
                suppr.innerHTML = "supprimer";
                suppr.href = "../index.php?controller=user&action=deleteComm&id_comment="+commentaire[i].id_comment+"&id_event="+commentaire[i].id_event;

                let edit = document.createElement("a");
                div_comm.appendChild(edit);
                edit.className = "editComm";
                edit.innerHTML = "editer";
                edit.href = "../index.php?controller=user&action=editCommPage&id_event="+commentaire[i].id_event+"&id_comment="+commentaire[i].id_comment+"&titre="+commentaire[i].title+"&comment="+commentaire[i].comment;
            }

        }

    };

    var titre = document.getElementById("titreComm").value;

    var comment = document.getElementById("comm").value;


    var RequestURL = "index.php?controller=ajax&id_event="+id+"&postTitle="+titre+"&postCommentaire="+comment;


    xhttp.open('GET', RequestURL,true) ;

    xhttp.send();
}

ajaxRequest();


document.getElementById('bt_comm').addEventListener("click", function () {

    ajaxRequest();
    document.getElementById('titreComm').value = "";
    document.getElementById("comm").value = "";

});



