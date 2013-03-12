<?php
  # defines the database connection constants
  #
  define("DB_NAME", "test");
  define("DB_USER", "root");
  define("DB_PASS", "");

  # establishes database connection
  #
  $con = mysql_connect("localhost", DB_USER, DB_PASS);

  if(!$con){
    die ('Could not connect '. mysql_error());
  }

  mysql_select_db(DB_NAME, $con);

  $query = "DELETE FROM gl_entries WHERE title = '" . $_GET['entry'] . "'";
  
  # performs $query to database
  #
  if(mysql_query($query)){
    header('Location: gl-view-entries.php?start=' . strtoupper($_GET['entry'][0]) . '&removed=true&entry=' . $_GET['entry']);
  }
  else{
    header('Location: gl-view-entries.php?start=' . strtoupper($_GET['entry'][0]) . 'removed=false&entry=' . $_GET['entry']);
  }
?>