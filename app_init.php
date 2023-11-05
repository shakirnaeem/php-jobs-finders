<?php
    $env = parse_ini_file('.env');
    if(isset($env) && count($env) > 0){
        $keys = array_keys($env);
        foreach($keys as $key){
            $_ENV[$key] = $env[$key];
        }
    }

    $currentProtocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https://' : 'http://';
    $_ENV["ROOT_URL"] = $currentProtocol .$_SERVER['HTTP_HOST'] . $_ENV["SUB_DIR"];
    $_ENV["HOST"] = $currentProtocol .$_SERVER['HTTP_HOST'];
?>