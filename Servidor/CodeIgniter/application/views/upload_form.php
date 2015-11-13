<htrml>
    <head>
    </head>
    <body>
		<?php
		print $error;

        print form_open_multipart('Upload_controller/do_upload'); ?>
            <input type="file" name="userfile" />
            <input type="submit" name="submit" value="upload" />

        </form>
    </body>
</htrml>