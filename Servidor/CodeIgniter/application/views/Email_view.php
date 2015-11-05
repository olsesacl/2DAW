<form name='form1' method="POST" action="<?php print site_url('Email_controllers/enviar') ?>">
    Enviar a:<input type="text" name="Enviara" value="" /><br>
    Asunto del mensaje:<input type="text" name="Asunto" value=""><br>
    Cuerpo del mensaje:<textarea name="Mensaje" rows="4" cols="20"></textarea><br>
    <input type="submit" value="Enviar">
</form>