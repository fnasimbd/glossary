<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "includes/styles/global.css">
	
	<title>Glossary Manager Installation</title>
  </head>
  
  <body bgcolor = "#B8B894">
    <table width = "990" cellpadding = "15">
      <tr>
        <td width = "25%"></td>
		
        <td>
          <h2 align = "center">Glossary Manager<br> Installation</h2>
        </td>

        <td width = "25%"></td>
      </tr>

      <tr>
        <td width = "25%"></td>

        <td bgcolor = "#D6D6C2">
          <?php
            # query function
            #
            function perform_query($query, $msg){
              if(mysql_query($query)){
                echo "<p class = \"content\"><i>" . $msg . "</i> is created.</p>";
              }
              else{
                echo "<p class = \"content\">Could not create <i>" . $msg . ".</i></p>";
                exit;
              }
            }

            # establishes database connection
            #
            $con = mysql_connect("localhost", $_POST['db_user'], $_POST['db_pass']);

            if(!$con){
              die('Could not connect to database: ' . mysql_error());
            }

            mysql_select_db($_POST['db_name'], $con);

            # Creates user table
            #
            $query = "CREATE TABLE `gl_user` (`user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL, `user_pass` varchar(30) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL, `user_mail` varchar(60) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL, PRIMARY KEY (`user_name`) ) ENGINE=InnoDB DEFAULT CHARSET=latin1";

            perform_query($query, "user table");

            # Creates user account
            #
            $query = "INSERT INTO gl_user (`user_name`, `user_pass`, `user_mail`) VALUES('" . $_POST["user_name"] . "', '" . $_POST["user_pass"] . "', '" . $_POST["user_mail"] . "')";

            perform_query($query, "user account");

            # Creates entries table
            #
            $query = "CREATE TABLE `gl_entries` ( `title` varchar(100) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL, `content` varchar(2000) CHARACTER SET utf8 COLLATE utf8_roman_ci NOT NULL, `last_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (`title`)) ENGINE=InnoDB DEFAULT CHARSET=latin1";

            perform_query($query, "entries table");

            $file_names = array('gl-add-new-entry.php', 'gl-save-entry.php', 'gl-del-entry.php', 'gl-view-entries.php', 'gl-login-validate.php');

            # updates database constants in all files
            #
            foreach ($file_names as $file_name){
              $file_content = file_get_contents($file_name);
              $file_content = preg_replace('/db_name/', $_POST['db_name'], $file_content);
              $file_content = preg_replace('/db_user/', $_POST['db_user'], $file_content);
              $file_content = preg_replace('/db_pass/', $_POST['db_pass'], $file_content);
              file_put_contents($file_name, $file_content);

              echo "<p class = \"content\">Updated file: <i>" . $file_name . "</i></p>";
            }

            echo "<p class = \"content-header\"><b>You are done!</b></p>";
            echo "<p class = \"content-header\">Continue to <a href = \"index.php\">Home</a></p>";
          ?>
        </td>

        <td width = "25%"></td>
      </tr>
    </table>
  </body>
</html>