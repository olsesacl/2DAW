<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        <form action="index.php" method="POST">
            Numero: <input type="text" name="num" value="" />
            <input type="submit" value="Enviar" />
        </form>
        <br />
        <?php
        $num = $_POST['num'];

        if (isset($num) && $num != '') {


            $message = "Tabla de multiplicar del $num<br />";

            for ($i = 1; $i <= 10; $i++) {
                $message .= "$i x $num = ".($i * $num)."<br />";
            }
            
            print $message;
        }
        ?>
    </body>
</html>
