
var id = document.getElementById('id_comm').value;

var commentary = document.getElementById('commentaire');

var titre = document.getElementById("titreComm").value;

console.log(titre);

var comment = document.getElementById("comm").value;

function ajaxRequest()
{

    var xhttp = new XMLHttpRequest();

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var objQuete = this.responseText;

        }

        let commentaire = JSON.parse(objQuete);
        console.log(commentaire);

        for (let i = 0; i< commentaire.length; i++)
        {
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

        }

    };

    var RequestURL = "index.php?controller=ajax&id_event="+id+"&postTitle="+titre+"&postCommentaire="+comment;


    xhttp.open('GET', RequestURL,true) ;

    xhttp.send();
}

window.onload = function (){

ajaxRequest();

};

