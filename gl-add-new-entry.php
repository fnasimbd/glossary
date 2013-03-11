<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "includes/styles/global.css">

    <script type = "text/javascript">
      function submitForm(){
        var title = document.getElementById("title").value;

        if(title.length == 0){
          alert("You must enter a title for the entry.");
          return;
        }
		
        title = title.substr(0, 1).toUpperCase() + title.substr(1, title.length - 1);
        document.getElementById("title").value = title;

        document.forms["entry"].submit();
      }

      function goback(to){
        if(to.length == 0){
          window.location = "gl-view-entries.php?start=A";
        }
        else{
          window.location = "gl-view-entries.php?start=" + to.charAt(0).toUpperCase() + "#" + to;
        }
      }
    </script>

    <title>Add new glossary entry</title>
  </head>

  <body bgcolor = "#B8B894">  
    <table width = "990">
      <tr>
        <td width = "15%"></td>

        <td>
          <p class = "header" align = "center">
            <b>Add New<br/>Glossary Entry</b>
          </p>

          <form id = "entry" name = "entry" action = "gl-save-entry.php" method = "post">
            <p class = "content">Title <input type = "text" id = "title" name = "title" size = "57" value = "<?php if(isset($_GET['edit']) && isset($_GET['entry']) && $_GET['edit'] == true ) echo $_GET['entry']; ?>" style = "background: #D6D6C2;"></p>
            <textarea name = "content" rows = "15" cols = "72"><?php
              if(isset($_GET['edit']) && isset($_GET['entry']) && $_GET['edit'] == true){

                # defines the database connection constants
                #
                define("DB_NAME", "db_name");
                define("DB_USER", "db_user");
                define("DB_PASS", "db_pass");

                # establishes database connection
                #
                $con = mysql_connect("localhost", DB_USER, DB_PASS);

                if(!$con){
                  die ('Could not connect' . mysql_error());
                }

                mysql_select_db(DB_NAME, $con);

                # fetches the 'content' of $_GET['entry']
                #
                $query = "SELECT content FROM glossary_entries WHERE title = '" . $_GET['entry']. "'";
                $result = mysql_query($query) or die (mysql_error());
                $row = mysql_fetch_array($result);

                echo $row['content'];
              }
			  ?></textarea> <br>
            <input type = "hidden" name = "edit" value = <?php if(isset($_GET['edit'])) echo "\"" . $_GET['edit'] . "\""; else echo "\"false\""; ?> >
            <input type = "button" value = "Save Entry" onclick = "submitForm();">
            <input type = "reset" value = "Reset Form">
            <input type = "button" onclick = "goback('<?php if(isset($_GET['entry'])) echo preg_replace('/\s+/i', '-', strtolower($_GET['entry'])); else echo ""; ?>');" value = "Cancel">
          </form>
        </td>

        <td width = "25%">
          <p>Use <i>Markdown</i> formatting. Examples:</p>
          <pre>*bold*<font face = "PT Serif" size = "3"> = <b>bold</b></font><br>_italic_<font face = "PT Serif" size = "3"> = <i>italic</i></font><br>[link](address "Alternate text") <font face = "PT Serif" size = "3">= <a class = "small" href = "address">link</a></font></pre>

          <p>For cross references use all lowercase and replace whitespaces with hyphens(-).</p>
        </td>
      </tr>

      <tr>
        <td colspan = "3">
          <?php include 'gl-footer.php';?>
        </td>
      </tr>
    </table>
  </body>
<html>