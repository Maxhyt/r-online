<?php
  session_start();
?>
<!DOCTYPE html>
<html style="height: 90%; max-height: 1080px">
  <head>
    <title>AUT Statistics R Online Project</title>
    <meta charset="utf-8">
    <meta name="description" content="An online R project for students and teachers, for all OS-es">
    <meta name="author" content="Duc Nguyen">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="commands.js"></script>
    <link rel="stylesheet" href="style.css"/>
  </head>
  <h2>
    AUT Online R Project
  </h2>
  <body>
    <table style="width: 100%">
      <tr>
        <th style="width: 35%">Console/Input</th>
        <th style="width: 65%">Output</th>
      </tr>
      <tr>
        <td>
          <button onclick="exec();">Execute</button>
          <button onclick="$('#console').val('');">Clear</button>
        </td>
        <td></td>
      </tr>
      <tr>
        <td style="width: 35%; height: 100%">
          <textarea onKeyUp="keyPress()" id="console"><?php if (isset($_SESSION["cmd"])) echo $_SESSION["cmd"]; ?></textarea>
        </td>
        <td style="width: 65%; height: 100%; border: 2px solid black">
          <div id="output"></div>
        </td>
      </tr>
    </table>
    <h6>
      &copy 2018 Created by Duc Nguyen @ AUT with the help of HTML, CSS, JavaScript, PHP, Codeanywhere, StackOverflow, Regexr and DuckDuckGo
    </h6>
  </body>
</html>
