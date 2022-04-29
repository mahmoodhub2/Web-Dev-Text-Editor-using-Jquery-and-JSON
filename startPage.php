<!-- This is the start page of an Online Text Editor that has all the required HTML elements. This text editor is very simple. It allows the user to edit a file on the server and save it. 
The user can also dump out a file content of their choosing and edit it and then save it.-->

<!DOCTYPE html>
<html lang="en">
    <head>
        <div>
            <h1>Online Text Editor</h1>
            <!-- CSS for the onlineTextEditor page -->
            <link rel="STYLESHEET" type="text/css" href="css/onlineTextEditor.css">
         </div>
    </head>
   
    <body style="background-image: url('image/best-text-editors.png'); height: 641px;">
        <TABLE border="0" width="80%">
              <TR>
                <!-- Select a list of files -->
                <TD width="38%" align="right"><p class="textTitle" >Choose a text file from drop-down list</p></TD>
                <TD width="2%">&nbsp;</TD>
                <TD width="38%" align="left">
                    <SELECT class="selectButton" required name="openFileName" id="openFileNameID">
                        <OPTION value="">Select File</OPTION>
                    </SELECT>
                </TD>
              </TR>
        </TABLE>
 
        <!-- File Name and its content-->
        <TABLE border="0" width="80%">
              <TR>
                  <!-- File Name input -->
                  <TD width="40%" align="right"><p class="textTitle" >File Name</p></TD>
                  <TD width="2%">&nbsp;</TD>
                  <TD width="38%" align="left"><input type="text" size="82" requried name="fileName" id="fileNameInputID"> </TD>
              </TR>
              <TR>
                  <!-- File Content input -->
                  <TD width="40%" align="right"><p class="textTitle" >Text Edit Area</p></TD>
                  <TD width="2%">&nbsp;</TD>
                  <TD width="38%" align="left"><textarea name="fileContents" required id="fileContentsInputID" rows="20" cols="80" value=""></textarea> </TD>
              </TR>
              <TR>
                  <!-- Save Button -->
                  <TD width="40%" align="right"></TD>
                  <TD width="2%">&nbsp;</TD>
                  <TD width="38%" align="left"><input type="submit" id="saveButton" class="selectButton" value="Save File"><br/><br/>
                    <div id="resultStatus" class="userFeedback"></div>  <!-- This div is used to provide userFeedback -->
                  </TD>
             </TR>
        </TABLE>
        
        <!--Embed to this page to load JQuery -->
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.0/jquery.min.js"></script>
        <!-- Point to an external JavaScript file where the script is written -->
        <script src="jQueryTextEditor.js"></script>

    </body>
</html>