<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "includes/styles/global.css">
    <title>Install Glossary Manager</title>
  </head>
  
  <body bgcolor = "#B8B894">
    <table align = "center" width = "990" cellpadding = "15">
      <tr>
        <td colspan = "3">
          <h2 align = "center">Install Glossary<br> Manager</h2>
        </td>
      </tr>

      <tr>
        <td width = "25%"></td>

        <td bgcolor = "#D6D6C2">
          <form action = "gl-install-commit.php" method = "POST">
            <p class = "content-header">
              <b>Database name</b><br>
              <input type = "text" name = "db_name" size = "30"><br>
              <font style = "font-size: 17;color: #000000"><i>Make sure there exists a MySQL database with this name. Create one if there is none. GM uses this database to store all of your information.</i></font>
            </p>

            <p class = "content-header">
              <b>Database user name</b><br>
              <input type = "text" name = "db_user" size = "30"><br>
              <font style = "font-size: 17;color: #000000"><i>Enter the user name for the MySQL database.</i></font>
            </p>

            <p class = "content-header">
              <b>Database password</b><br>
              <input type = "password" name = "db_pass" size = "30"><br>
              <font style = "font-size: 17;color: #000000"><i>Enter the password for the MySQL database user.</i></font>
            </p>
			
            <p class = "content-header">
              <b><i>MathJax</i> path</b><br>
              <input type = "text" name = "math_path" size = "30"><br>
              <font style = "font-size: 17;color: #000000"><i>Enter the path to MathJax. MathJax is a mathematical text formatting tool for browsers, written in JavaScript.</i></font>
              <hr>
            </p>
			
            <p class = "content-header">
              <b>GM user name</b><br>
              <input type = "text" name = "gl_user"><br>
              <font style = "font-size: 17;color: #000000"><i>Enter the user name for Glossary Manager.</i></font>
            </p>

            <p class = "content-header">
              <b>GM password</b><br>
              <input type = "password" name = "gl_pass"><br>
              <font style = "font-size: 17;color: #000000"><i>Enter the password for Glossary Manager (at least 6 characters).</i></font>
            </p>

            <p>
              <input type = "submit" value = "Install">
              <input type = "reset" value = "Reset">
            </p>
          </form>
        </td>
		
        <td width = "25%"></td>
      </tr>
	  
      <tr>
        <td colspan = "3" height = "50"></td>
      </tr>
    </table>
  <body>
</html>