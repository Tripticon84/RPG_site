<?
require_once '../script.php';

function captchaList() {

    $bdd = PDOConnect();

    $q = 'SELECT id_captcha,question,reponse FROM captcha';

    $req = $bdd->prepare($q);

    $req->execute();

    $liste_captcha = $req->fetchAll();

    return $liste_captcha;
}

function captchaDelete($id) {

    $bdd = PDOConnect();

    $q = 'DELETE FROM captcha WHERE id_captcha = :id';

    $req = $bdd->prepare($q);

    $req->execute([
        'id' => $id,
    ]);
}

function captchaAdd($question, $reponse) {

    $bdd = PDOConnect();

    $q = 'INSERT INTO captcha (question, reponse) VALUES (:question, :reponse)';

    $req = $bdd->prepare($q);

    $req->execute([
        'question' => $question,
        'reponse' => $reponse,
    ]);
}


// Si l'action est 'delete' et que l'id est défini > supprimer le captcha
if (isset($_GET['action']) && $_GET['action'] == 'delete' && isset($_GET['id'])) {
    captchaDelete($_GET['id']);
    header('location:index.php' . '?' . 'success=Captcha supprimé');
}

// Si l'action est 'add' et que la question et la réponse sont définies > ajouter le captcha
if (isset($_GET['action']) && $_GET['action'] == 'add' && isset($_GET['question']) && isset($_GET['reponse'])) {
    captchaAdd($_GET['question'], $_GET['reponse']);
    header('location:index.php' . '?' . 'success=Captcha ajouté');
}