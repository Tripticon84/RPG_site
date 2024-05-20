<?php $title = 'campagne';
include('../script.php');
include('../includes/head.php'); 
include('../includes/header.php'); 

 

NotConnect();
// Connexion à la BDD
$db = PDOConnect();

?>

<body>

<main class="mt-4"> 
<div class="container">

<div class="col d-flex my-2 mx-2 justify-content-end">
        <a name="create" id="buttonCreate" class="btn btn-primary bi bi-plus-circle" href="../workshop/index.php" role="button"> Créer une partie</a>
    
</div>

    <div class="d-flex col mx-2 my-2 justify-content-end">
    <form method="post" action="verif_code.php">
        <input type="text"  id="code" name="code" placeholder="Ajout par code ex : JX95D"></input>
        <button type="submit" class="btn btn-secondary">+</button>
    </form>

    </div>



    <section>
    
    <div class="d-flex flex-column my-4 mx-auto bg-body-secondary bg-opacity-75 p-3 rounded-4 login-window">
                <h2 class="text-center my-3">Campagne en cours</h2>
                <p>En cours</p>
                <div class="mb-3" id="en_cours">
                    
                </div>
                

                <hr> <!-- ligne de séparation !-->

                <h2 class="my-3 text-center">Brouillon</h2>

                <div id="brouillon">
                <p>Brouillon</p>
                </div>

    </div> 
            
    </section>
    </div>
    </main>

    
</body>

<?php include('../includes/footer.php');?>