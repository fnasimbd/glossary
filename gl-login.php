<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "includes/styles/global.css">
    <title>Glossary Manager - Login</title>
  </head>
  
  <body bgcolor = "#B8B894">
    <table align = "center" width = "990" cellpadding = "15">
      <tr>
        <td colspan = "3">
          <h2 align = "center">Glossary Manager<br> Login</h2>
        </td>
      </tr>

      <tr>
        <td width = "40%"></td>

        <td bgcolor = "#D6D6C2">
          <form action = "gl-login-validate.php" method = "POST">
            <p class = "content-header">
			  <b>User name</b>
			  <input type = "text" name = "db_name" style = "font-size: 20; height: 40;" size = "23">
              <font style = "font-size: 17;color: #000000"><i>Your Glossary Manager user name.</i></font>
			</p>

            <p class = "content-header">
			  <b>Password</b>
			  <input type = "password" name = "db_pass" style = "font-size: 20; height: 40;" size = "23">
			  <font style = "font-size: 17;color: #000000"><i>Your Glossary Manager password.</i></font>
            </p>

            <p align = "center">
              <input type = "submit" value = "Login">
              <input type = "reset" value = "Reset">
            </p>
          </form>
        </td>
		
		<td width = "40%"></td>
      </tr>
    </table>
  <body>
</html>