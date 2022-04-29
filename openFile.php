
<?php

    //  Set the request body format to JSON
    header('Content-Type: application/json');
	
    // Declare an associative array and call it $json
	$json = array('success' => false, 'result' => 0, 'fileName' =>0);

    $result = array();

    // Check if the a file name has been set
    if (isset($_POST['openFileName']))
	{
        $fileNameToOpen = $_POST['openFileName'];
        $fileOpenLocation = getcwd();       //get current working directory
        $fileOpenLocation .= "/MyFiles/";   //append MyFiles folder to the end
        $fileOpenLocation .= $fileNameToOpen;     //append fileName from form      
 
        //get input JSON file contents
        $inputRawFile = file_get_contents($fileOpenLocation);
        $json['success'] = true;
        $json['result'] = $inputRawFile;
        $json['fileName'] = $fileNameToOpen;

        echo json_encode($json);
	}								
?>