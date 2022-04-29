<?php

//  Set content type to reading text
header('Content-type: text/javascript');

// Declare an associative array and call it $json
$json = array('success' => false, 'fileName' => 0, 'fileContents' => 0);
   

// Check if the a file name and its content has been set
if(isset($_POST['fileName'], $_POST['fileContents']))
{

    $fileName       =   $_POST['fileName'];    
    $fileContents   =   $_POST['fileContents'];
    
   // Check if the file name is provided and does not contain ONLY whitespaces
   if (empty($fileName) == true)
    {   
        $json['success'] = false;
    }
    // Otherwise, if file name is given and start with a whitespace, remove the whitespace 
   else 
   {    
        $fileName = ltrim($fileName); // Remove any whitespaces found at the beginning of the file name
        $json['success'] = true;
        $json['fileName'] =  $fileName;    
        $json['fileContents'] = $fileContents;
        
   }
}
// Otherwisw, No file name and/or contents are set
else
{
    $json['success'] = false;
}

//get current directory
$fileSaveLocation = getcwd();      
 //append MyFiles folder to current directory
$fileSaveLocation .= "/MyFiles/";  
//append fileName to Myfiles    
$fileSaveLocation .= $fileName;     

// Check iif user enters the file name ONLY without its extension, then append the file name to ".txt"
if(strlen($fileName) != 0)
{
    if (strpos($fileName, '.') !== false) 
    {
        $result= preg_split('.', $fileName, -1, PREG_SPLIT_NO_EMPTY); 
        $fileSaveLocation .= $result;
    }
    else 
    {
        $fileSaveLocation .= ".txt";
    }
}

      
// Print the array in JSON format
echo json_encode($json);
// Format and validate my JSON text
$json_data = json_encode($json);
// Check for the file in which the user wants to write and if the file doesn't exist, then create a new file
file_put_contents($fileSaveLocation, $fileContents);

?>


