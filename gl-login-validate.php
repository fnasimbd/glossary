<?php
  session_start();

  # redirects to gl-dashboard.php if a user is already logged in
  #
  if(isset($_SESSION['id'])){
    header("Location: gl-dashboard.php");
	exit;
  }

  # defines the database connection constants
  #
  define("DB_NAME", "db_name");
  define("DB_USER", "db_user");
  define("DB_PASS", "db_pass");

  # establishes database connection
  #
  $con = mysql_connect("localhost", DB_USER, DB_PASS);

  if(!$con){
    die('Could not connect: ' . mysql_error());
  }

  mysql_select_db(DB_NAME, $con);

  $query = "SELECT * FROM `gl_user` WHERE `user_name` = '" . $_POST['user_name'] . "'";
  $result = mysql_query($query);

  # checks if user_name and user_pass match
  #
  while($row = mysql_fetch_array($result)){
    if($row['user_pass'] != $_POST['user_pass']){
      # incorrect password
      #
      header("Location: gl-login.php?error=pass");
      exit;
    }

    # login successful
    #
    $_SESSION['id'] = $_POST['id'];
    header("Location: gl-dashboard.php");
    exit;
  }

  # invalid user name
  #
  header("Location: gl-login.php?error=name");
  exit;
?>