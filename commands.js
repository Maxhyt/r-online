function exec()
{
  $.ajax({
    method: "POST",
    url: "execute.php",
    data: { command: $("#console").val() }
  }).done(function(msg) {
    $("#output").html(msg);
  });
}

function keyPress()
{
  $.ajax({
    method: "POST",
    url: "saveSession.php",
    data: { input: $("#console").val() }
  });
}