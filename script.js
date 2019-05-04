
var id = document.getElementById('id_comm').value;

var commentary = document.getElementById('commentaire');

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

            $('#commentaire > div').remove();
            $('#commentaire > span').remove();
            $('#commentaire > h4').remove();

            var objQuete = this.responseText;

        }

        let commentaire = JSON.parse(objQuete);
        console.log(commentaire);


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

            if (verif)
            {

                let suppr = document.createElement("a");
                a.appendChild(suppr);
                suppr.className = "supprComm";
                suppr.innerHTML = "supprimer";
                suppr.href = "../index.php?controller=admin&action=deleteComm&id_comment="+commentaire[i].id_comment+"&id_event="+commentaire[i].id_event;

                if (verif == Number(commentaire[i].id_user))
                {
                    let edit = document.createElement("a");
                    a.appendChild(edit);
                    edit.className = "editComm";
                    edit.innerHTML = "editer";
                    edit.href = "../index.php?controller=user&action=edit&id_event="+commentaire[i].id_event+"&id_comment="+commentaire[i].id_comment+"&comment="+commentaire[i].comment;

                }

            }

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

    var comment = document.getElementById("comm").value;


    var RequestURL = "index.php?controller=ajax&id_event="+id+"&postCommentaire="+comment;


    xhttp.open('GET', RequestURL,true) ;

    xhttp.send();
}

ajaxRequest();


document.getElementById('bt_comm').addEventListener("click", function () {

    ajaxRequest();

    document.getElementById("comm").value = "";

});



