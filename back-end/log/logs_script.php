<?

require_once '../script.php';

header('Content-Type: application/json');
    $filePath = $_SERVER['DOCUMENT_ROOT'] . '/logs/' . $_GET['action'] . '.txt';
    $fileContents = file_get_contents($filePath);
    $lines = explode("\n", $fileContents);

    foreach ($lines as $line) {
        $result[] = explode(" - ", $line);
    }
    echo json_encode($result);

// function processLogFile($file)
// {
//     $filePath = $_SERVER['DOCUMENT_ROOT'] . '/logs/' . $file . '.txt';
//     $fileContents = file_get_contents($filePath);
//     $lines = explode("\n", $fileContents);

//     foreach ($lines as $line) {
//         $result[] = explode(" - ", $line);
//     }

//     return $result;
// }


    // return $result;

