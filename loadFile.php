
<?php
	//  Set the request body format to JSON
    header('Content-Type: application/json');
	
	// Declare an associative array and call it $json
	$json = array('success' => false, 'result' => 0);

    $result = array();

	// Check if the a file has been loaded
    if (isset($_POST['loadFiles']))
	{
		switch ($_POST['loadFiles'])
		{
			case 'yes':
				
				$dir = getcwd();
				$dir .= "/MyFiles/";
                $file = scandir($dir);
                
                unset($file[0], $file[1]);
                $file=array_values($file);
				
				$json['result'] = $file;
				$json['success'] = true;
				
				$result = $json;
				break;
				
			default:
               $json['success'] = false;

			   $json['result'] = 'Error loading the file';
			   
			   $result = $json;

               break;
		}	
		
	}
	
    echo json_encode($result);

?>