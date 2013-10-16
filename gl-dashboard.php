<?php
  session_start();

  if(!isset($_SESSION["id"]))
  {
    header("Location: index.php");
    exit;
  }
?>

<html>
  <head>
    <link rel = "stylesheet" type = "text/css" href = "includes/styles/global.css">
    <title>Dashboard</title>
  </head>

  <body bgcolor = "#B8B894">
    <?php include "gl-top-menu.php"; ?>
  
    <table width = "990">
      <tr>
      </tr>

      <tr>
        <td width = "20%"></td>

        <td><p class = "header" align = "center"><b>Glossary</b></p></td>

        <td width = "20%"></td>
      </tr>

      <tr>
        <td width = "20%"></td>

        <td>
        </td>

        <td width = "20%"></td>
      </tr>

      <tr>
        <td colspan = "3">
          <?php include 'gl-footer.php';?>
        </td>
      </tr>
    </table>
  </body>
</html>
