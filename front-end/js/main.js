async function searchCampaigns() {
  const searchInput = document.getElementById("search");
  const s = searchInput.value;

  const sortInput = document.getElementById("sort");
  const sort = sortInput.value;

  const orderInput = document.getElementById("order");
  const order = orderInput.value;

  const res = await fetch(
    "workshop_search.php" + "?search=" + s + "&sort=" + sort + "&order=" + order
  );
  const data = await res.text();

  const campaigns = JSON.parse(data);

  let html = "";

  for (let i = 0; i < campaigns.length; i++) {
    const campaign = campaigns[i];
    html += '<div class="card" style="width: 18rem; height:fit-content">';
    html += `<img src="/image/campagnes/${campaign.logo}" class="card-img-top" alt="Image de couverture" style="height:11rem" />`;
    html += '<div class="card-body">';
    html += `<h5 class="card-title">${campaign.nom}</h5>`;
    html += `<h6 class="card-subtitle ms-2 text-secondary">${campaign.pseudo}</h6>`;
    html += `<p class="card-text overflow-auto" style="height: 6rem;">${campaign.description}</p>`;
    html += `<a href="workshop_create.php?create=${campaign.id_camp}" class="btn btn-primary">Créer une partie</a>`;
    html += "</div>";
    html += "</div>";
  }

  const div = document.getElementById("result");
  div.innerHTML = html;
}

async function ShowCampaign() {

  const res = await fetch("campagne_show.php");

  const data = await res.text();

  const campaigns = JSON.parse(data);

  let html = "";

  for (let i = 0; i < campaigns.length; i++) { //ne pas oublier de rendre les campagnes cliquables et mettre l'id de la partie dans a session
    const campaign = campaigns[i];
    html += '<div class="card" style="width: 18rem; height:fit-content">';
    html += `<img src="/image/campagnes/${campaign.logo}" class="card-img-top" alt="Image de couverture" style="height:11rem" />`;
    html += '<div class="card-body">';
    html += `<h5 class="card-title">${campaign.nom}</h5>`;
    html += `<h6 class="card-subtitle ms-2 text-secondary">${campaign.pseudo}</h6>`;
    html += `<p class="card-text overflow-auto" style="height: 6rem;">${campaign.description}</p>`;
    html += `<a href="workshop_create.php?create=${campaign.id_camp}" class="btn btn-primary">Reprendre une partie</a>`;
    html += "</div>";
    html += "</div>";
  }

  const div = document.getElementById("en_cours");
  div.innerHTML = html;

  
}







 async function showplayer() {

  const response = await fetch('liste_joueur.php');
  const data = await response.text() ;
  const joueurs = JSON.parse(data);
  limite_joueur = 0 ;
  limite_spectateur = 0 ;
  limite_mj = 0 ;


  for(i=0;i< joueurs.length ;i++){
    const joueur = joueurs[i] ; //parcours du tableau

  let html = "<ul>" ; 
  let html2 ="<ul>";
  let html3 ="<ul>";

  if(joueur.role === '0' ){

    html3 += ` <li> ${joueur.pseudo}</li> `
    html3+= "</ul>" ;
    limite_mj+=1;
      const liste_joueur = document.getElementById("liste_mj"); 
      liste_joueur.innerHTML = html3 ;

      const limite_player = document.getElementById("limite_mj"); 
      let balise_limite_mj=`${limite_mj}/1`
      limite_player.innerText = balise_limite_mj;

    
    
    }//fin du if

  
  if(joueur.role === '1'){
    limite_joueur += 1 ;
    html += ` <li> ${joueur.pseudo}</li> `
    html+= "</ul>" ;

  const liste_player = document.getElementById("liste_joueur"); 
  liste_joueur.innerHTML = html ; 

  const limite_player = document.getElementById("limite_joueur"); 
  let balise_limite_joueur=`${limite_joueur}/10`
  limite_player.innerText = balise_limite_joueur;
    }//fin du if

 

  if(joueur.role === '2' ){
    limite_spectateur += 1 ;
    html2 += ` <li> ${joueur.pseudo}</li> `
    html2 += "</ul>" ;
  const litste_spec = document.getElementById("liste_spec"); 
  liste_spec.innerHTML = html2 ; 

  const limite_spec = document.getElementById("limite_spec"); 
  let balise_limite_spec=`${limite_spectateur}/10`
  limite_spec.innerText = balise_limite_spec;

}//fin du if

  }//fin du for




}

async function player() {

  const exec = await fetch('lobby_player.php');
  const liste_joueur = document.getElementById("liste_joueur"); 
  liste_joueur.innerHTML = "" ;
  showplayer();
  
 
 }

async function spec() {

  const exec = await fetch('lobby_spec.php');  
  const spec = document.getElementById("liste_spec"); 
  spec.innerHTML = "" ;
  showplayer();
  
 }



async function mj() {

  const exec = await fetch('lobby_mj.php');
  const mj = document.getElementById("liste_mj"); 
  mj.innerHTML = "" ;
  showplayer();
  
}
 
 

 
async function attendre(){
// Se répète toutes les 3 seconde
setInterval(showplayer,1000);
console.log("2s");

}




// create campagne : 
async function show_plateau(){

  const response = await fetch('afficher_plateau.php');
  const data = await response.text() ;
  const plateaux = JSON.parse(data); 
  console.log(plateaux);

  let html = "<ul>" ;  
  for(i=0; i < plateaux.length ;i++){
    const plateau = plateaux[i] ; //parcours du tableau
    html+= `<li id="${i}"> ${plateau.plateau_nom} <li>`
}
const map=document.getElementById("map_campagne");
map.innerHTML= html;

}


async function create_plateau(){

const response = await fetch('create_plateau.php');

console.log("campagne créer");

show_plateau();

}


async function delete_plateau(){
console.log("campagne deleted");
}