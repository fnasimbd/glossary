<?php
  # defines the database connection constants
  #
  define("DB_NAME", "test");
  define("DB_USER", "root");
  define("DB_PASS", "");

  # establishes database connection
  #
  $con = mysql_connect("localhost", DB_USER, DB_PASS);

  if(!$con)
  {
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db(DB_NAME, $con);
  
  # if operation is edit of an existing entry, $query is an UPDATE
  # otherwise $query is an INSERT
  #
  if($_POST['edit'] == "true"){
    $query = "UPDATE gl_entries SET content = '" . $_POST["content"] . "' WHERE title = '" . $_POST["title"] . "'";
  }
  else{
    $query = "INSERT INTO gl_entries (`title`, `content`) VALUES('" . $_POST["title"] . "', '" . $_POST["content"] . "')";
  }

  # performs $query to database
  #
  if(mysql_query($query)){
    header('Location: gl-view-entries.php?start=' . strtoupper($_POST["title"][0]) . '&edited=true&entry=' . $_POST["title"] . '#' . preg_replace( '/\s+/i' , '-' , strtolower($_POST["title"])));
  }
  else{
    header('Location: gl-view-entries.php?start=' . strtoupper($_POST["title"][0]) .'&edited=false&entry=' . $_POST["title"]);
  }
?>
