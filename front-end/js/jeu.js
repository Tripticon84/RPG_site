// create campagne : 
async function show_plateau(){

    const response = await fetch('afficher_plateau.php');
    const data = await response.text() ;
    const plateaux = JSON.parse(data); 
    console.log(plateaux);
  
    let html = "<ul>";  
    for(let i = 0; i < plateaux.length; i++){
        console.log("nombre d'itération de la boucle");
        const plateau = plateaux[i]; // parcours du tableau
        html += `<li id="${i}">${plateau.plateau_nom}</li>`;
        html += `<button name="-" onclick="delete_plateau()">-</button>`;
        html += `<input type="text" name="plateau_nom${i}" id="plateau_nom${i}" placeholder="nom du plateau"></input>`;
        html += `<button name="gohere" onclick="gohere()">Aller ici</button>`;
  
    }
    html += "</ul>";
    
  
  
  
  
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
  
  async function gohere(){
  
    const response = await fetch('charger_plateau.php');
    const data = await response.text() ;
    const plateaux = JSON.parse(data); 
    console.log(plateaux);
  
  
  }
  


  // JEU 



  
  async  function afficher_creature_mj (){

    const response = await fetch('afficher_creature.php');
    const data = await response.text() ;
    const creatures = JSON.parse(data); 
    

    let html = "<ul>";
    for(i=0;i<creatures.length ; i++){
        const creature = creatures[i];
        html +=`Nom = ${creature.nom} <br>`;
        html +=` prenom = ${creature.prenom}<br>`;
        html +=` pv_max = ${creature.pv_max}<br>`;
        html +=` race = ${creature.race}<br>`;
        html +=` force = ${creature.force}<br>`;
        html +=` charisme = ${creature.charisme}<br><br>`;
        html +=` consitution = ${creature.consitution}<br>`;
        html +=` dexterite = ${creature.dexterite}<br>`;
        html +=` intelligence = ${creature.intelligence}<br>`;
        html +=` sagesse = ${creature.sagesse}<br>`;
        html +=` vitesse = ${creature.vitesse}<br>`;
        html +=` biographie = ${creature.biographie}`;

    }
    const section=document.getElementById("info_character");
    section.innerHTML= html;
    
  }
  

  async  function afficher_sorts_mj (){
    const response = await fetch('afficher_sorts.php');
    const data = await response.text() ;
    const sorts = JSON.parse(data); 
    

    let html = "<ul>";
    for(i=0;i<sorts.length ; i++){
        const sort = sorts[i];
        html += `Nom = ${sort.sort_nom} <br>`;
        html +=` Classe = ${sort.classe}<br>`;
        html +=` Distance = ${sort.distance}<br>`;
        html +=` Degats = ${sort.sort_degats}<br>`;
        html +=` Coldown = ${sort.temps_recharge}<br>`;
        html +=` Description = ${sort.sort_description}<br>`;
    }
    const section=document.getElementById("info_character");
    section.innerHTML= html;


  }

  async  function afficher_equipements_mj (){

    const response = await fetch('afficher_equipement.php');
    const data = await response.text() ;
    const objets = JSON.parse(data); 
    
    let html = "<ul>";
    for(i=0;i<objets.length ; i++){
        const objet = objets[i];
        html += `Nom = ${objet.obj_nom} <br>`;
        html +=` Categorie = ${objet.categorie}<br>`;
        html +=` Degats = ${objet.obj_degats}<br>`;
        html +=` Description = ${objet.obj_description}<br>`;

    }
    const section=document.getElementById("info_character");
    section.innerHTML= html;

    
  }


  async function synchronisation(){
  
}

  
async function actualiser(){
    // Se répète toutes les 3 seconde
    setInterval(synchronisation,1000);
}

  
