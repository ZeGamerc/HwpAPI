<?php
if($_GET['domain'] != null) {
    if($_GET['valeur'] == "total") {
        $domain = $_GET['domain'];
        $filename = '/data/logs/proxy-host-' . $domain . '_access.log';

        if (file_exists($filename)) {
            $searchString = '200 - GET';
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $count = 0;

            foreach ($lines as $line) {
                if (strpos($line, $searchString) !== false) {
                    $count++;
                }
            }

            echo "{$count}";
        } else {
            echo "Le domaine $domain n'existe pas.";
        }
    }
    if($_GET['valeur'] == "block") {
        $domain = $_GET['domain'];
        $filename = '/data/logs/proxy-host-' . $domain . '_access.log';

        if (file_exists($filename)) {
            $searchString = '500 - GET';
            $lines = file($filename, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

            $count = 0;
            foreach ($lines as $line) {
                if (strpos($line, $searchString) !== false) {
                    $count++;
                }
            }

            echo "{$count}";
        } else {
            echo "Le domaine $domain n'existe pas.";
        }
    }
} else{
    echo "API is not use !";
}
?>
