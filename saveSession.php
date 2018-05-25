<?php
  session_start();
  if (isset($_POST["input"]))
  {
    $_SESSION["cmd"] = $_POST["input"];
  }
?>