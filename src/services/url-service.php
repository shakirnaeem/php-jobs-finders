<?php
    function removeDeleteAndRefreshPage(){
        $currentUri = $_SERVER['REQUEST_URI'];
        if(isset($_GET["delete"]))
            $currentUri = str_ireplace($currentUri[strpos($currentUri, "delete")-1] . "delete=" . $_GET["delete"], "", $currentUri);

        header("Location: ". $_ENV['HOST'] . $currentUri);
        exit;
    }
?>