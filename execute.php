<?php
if (isset($_POST["command"]))
{
  $descriptorspec = array(
     0 => array("pipe", "r"),  // stdin
     1 => array("pipe", "w"),  // stdout
     2 => array("pipe", "w"),  // stderr
  );
  
  file_put_contents("main.r", $_POST["command"]);
  $process = proc_open("Rscript main.r", $descriptorspec, $pipes, dirname(__FILE__), null);

  $stdout = stream_get_contents($pipes[1]);
  fclose($pipes[1]);

  $stderr = stream_get_contents($pipes[2]);
  fclose($pipes[2]);
  
  echo "<b><i>R project output</i></b><br><br>";

  $commands = explode("\n", $_POST["command"]);

  for ($i = 0; $i < sizeof($commands); ++$i)
  {
    echo "<b>> ".$commands[$i]."</b><br>";
  }

  echo nl2br(preg_replace("/_(\w('|-?))/","<u>$1</u>",$stdout).$stderr);
  
  preg_match_all("/^[a-z](.*?)(?= )/m", shell_exec("Rscript getDrawFunc.r"), $array);
  
  if (contains($_POST["command"], $array[0]) && empty($stderr))
  {
    echo '<iframe src="Rplots.pdf" style="width: 100%;height: 78vh;border: none;"></iframe>';
  }
}

function contains($string, Array $search) {
    $exp = '/'
        . implode('|', array_map('preg_quote', $search))
        . '/';
    return preg_match($exp, $string) ? true : false;
}
?>