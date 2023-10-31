<?php

use CustomErrorPage\Classes\UpdateSettings;
use CustomErrorPage\Exceptions\InvalidDataException;
use CustomErrorPage\Exceptions\MissingDataException;
use CustomErrorPage\Exceptions\SqlErrorException;

require_once '../../../../wp-load.php';
require_once __DIR__.'/../vendor/autoload.php';

$input = file_get_contents("php://input");
$post = json_decode($input,true);

$response = [
    'done' => false,
    'message' => ''
];

try{
    $update_settings = new UpdateSettings($GLOBALS['wpdb'],$post);
    $response = [
        'done' => true,
        'message' => 'Le impostazioni sono state aggiornate'
    ];
}catch(MissingDataException $e){
    http_response_code(400);
    $response = [
        'done' => false,
        'message' => 'Inserisci tutti i dati richiesti per continuare'
    ];
}catch(InvalidDataException $e){
    http_response_code(400);
    $response = [
        'done' => false,
        'message' => 'I dati inseriti non sono validi'
    ];
}catch(SqlErrorException $e){
    http_response_code(500);
    $response = [
        'done' => false,
        'message' => 'Errore durante l\' aggiornamento dei dati'
    ];
}catch(Exception $e){
    http_response_code(500);
    $response = [
        'done' => false,
        'message' => 'Errore sconosciuto'
    ];
}

echo json_encode($response,JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
?>