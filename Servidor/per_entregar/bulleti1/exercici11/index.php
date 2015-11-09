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
            $i = 1;
            while ($i <= 10) {
                $message .= "$i x $num = ".($i * $num)."<br />";
                $i++;
            }
            
            print $message;
        }
        ?>
    </body>
</html>
