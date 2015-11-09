<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $num1 = $_POST['num1'];
        $num2 = $_POST['num2'];

        print "<form action='index.php' method='POST'>
            Numero_1: <input type='text' name='num1' value='$num1'/> 
            Numero_2: <input type='text' name='num2' value='$num2'/>
                 <input type='submit' value='Enviar'>
        </form>
        <br />";

        if (!empty($num1) && !empty($num2)) {

            print "Numero_1 = $num1; Numero_2 = $num2 <br />";
            check($num1, $num2);
        } else {
            print "Rellena los dos numeros";
        }

        function check($x, $y) {
            if (($x + $y) > ($x * $y)) {
                print "la suma es mayor que el producto";
            } else {
                print "el producto es mayor que la suma";
            }
            print "<br />";
        }
            ?>
    </body>
</html>
