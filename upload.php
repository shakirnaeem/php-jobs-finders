<?php
    $client = new MongoDB\Client('mongodb+srv://subhankhan:Khan1990Subhan@cluster0-3tpsk.mongodb.net/jobz-finders-db');
    $collection = $client->jobs;
    print_r($collection);
?>