//
// FUNCTION NAME: $('#openFileNameID').click(function()
// 
// - This function is called when  the page DOM is ready to execute JavaScript code.
// - The file names are populated in the drop-down list on the server
//
$(document).ready(function ()
{
    $.ajax(
    {
        url: 'loadFile.php', // The file we want to reach with the Ajax call
        // Ajax request configuration:
        dataType: 'json', // The type of data expected back from the server
        type: 'post', // The type of request to make
        data: { loadFiles: 'yes' }, // The data to send to the server when performing the Ajax request
        success: function (data) // Success function to be called if the request succeeds.
        {
            if (data.success == true)
            {
                // Populate the drop-down list with all the file names that exist in MyFiles directory
                for (var i = 0; i < data.result.length; i++)
                {
                    $("#openFileNameID").append("<option value='" + data.result[i] + "'>" + data.result[i] + "</option");
                }
            }
        }

    });

    return false;
});


//
// FUNCTION NAME: $('#openFileNameID').click(function()
// 
// - This function is called when the file from the list is selected
// - The text file is loaded on the server
//


$('#openFileNameID').change(function ()
{
    // Serialize the values so we can use them in the URL query string when making an AJAX request.
    $(this).serialize();

    $.ajax(
    {
            url: 'openFile.php', // The file we want to reach with the Ajax call
            dataType: 'json',   // The type of data expected back from the server
            type: 'post',       // The type of request to make
            data: { openFileName: $('#openFileNameID').find(':selected').text() },     // The data to send to the server when performing the Ajax request
            success: function (data) // Success function to be called if the request succeeds.
            {
                if (data.success)
                {
                    // Set file name and uts contents
                    document.getElementById('fileNameInputID').value = data.fileName;
                    document.getElementById('fileContentsInputID').value = data.result;
                    // Inform the user 
                    document.getElementById('resultStatus').innerHTML = "File has been successfully loaded";

                }
                else
                {
                     // Inform the user 
                    document.getElementById('resultStatus').innerHTML = "OBS!!! File could't be loaded";
                }
            }
    });
    return false;

});

//
// FUNCTION NAME: $('#saveButton').click(function() 
// 
// - This function is called when the save button is clicked
// - The text file is saved on the server
//

$('#saveButton').click(function ()
{
   // Serialize the values so we can use them in the URL query string when making an AJAX request.
    $(this).serialize();

    $.ajax({
        url: 'saveFile.php', // The file we want to reach with the Ajax call
        dataType: 'json', // The type of data expected back from the server
        type: 'post', // The type of request to make
        data: { fileName: document.getElementById('fileNameInputID').value, fileContents: document.getElementById('fileContentsInputID').value }, // The data to send to the server when performing the Ajax request
        success: function (data) // Success function to be called if the request succeeds.
            {
                    if (data.success == true)
                    {
                        document.getElementById('resultStatus').innerHTML = "File has been successfully saved";
                    }
                    else 
                    {
                        document.getElementById('resultStatus').innerHTML = "OBS!!! File Name Is Mandatory";
                    }
                    if (!data.fileName.replace(/\s/g, '').length)
                    {
                        document.getElementById('resultStatus').innerHTML = "OBS!!! File Name CANNOT BE ONLY WHITE SPACES!";
                    }
            }
    });

    return false;

});


