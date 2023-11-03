<?php
	header("Access-Control-Allow-Origin: *");
	header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
	header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept, Authorization");

	try {
      	$response = new stdClass();
		$response->success = true;
      	$response->message = "File successfully uploaded.";
      
      	$json_data = file_get_contents('php://input');
		$inputData = json_decode($json_data);
      
      	if (!isset($inputData->file) || !isset($inputData->fileName))
        	throw new Exception("Invalid file.");
      	
      	$data = $inputData->file;
      	list($type, $data) = explode(';', $data);
      	list(, $data)      = explode(',', $data);
      	$data = base64_decode($data);
      	file_put_contents("assets/" . $inputData->fileName, $data);
	} catch (Exception $e) {
   		$response->message = $e->getMessage();
	}
	$json = json_encode($response);
	echo $json;
?>