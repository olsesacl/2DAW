<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form name = "from1" method="POST" enctype="multipart/form-data" action="<?php echo site_url('Email_controllers/enviar'); ?>">
    Enviar a:<input type="text" name="to" value="" /><br/>
    Asunto:<input type="text" name="subject" value="" /><br/>
    Mensaje: <textarea name="message" rows="4" cols="20"></textarea><br/>
    Adjunto: <input type="file" name="adjunto" value="" />
    <input type="submit" value="Enviar" />
</form>