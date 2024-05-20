<!DOCTYPE html>
<?php include '../front-end/includes/head.php'; 
?>

<?php
for ($i = 0; $i < 3; $i++) {
    echo '<body>';
        '<h2>Les 3 dernières campagnes</h2>';
        '<div class="card" style="width: 18rem; height:fit-content">';
            '<img src="/image/campagnes/'. $campagnes[$i]['logo'] . '.png" class="card-img-top" alt="Image de couverture" style="height:11rem" />';
            '<div class="card-body">';
                '<h5 class="card-title">' . $campagnes[$i]['nom'] . '</h5>';
                '<h6 class="card-subtitle ms-2 text-secondary">' . $campagnes[$i]['pseudo'] .'</h6>';
                '<p class="card-text overflow-auto" style="height: 6rem;">' . $campagnes[$i]['description'] . '</p>';
            '</div>';
        '</div>';
    }
    '</body>';
    '</html>';