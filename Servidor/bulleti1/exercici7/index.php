<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $x = 5;
        $y = 4;
        parimpar($x);
        parimpar($y);
        
        function parimpar($x){
            
            print "$x es un numero ";
            if($x%2 == 0){
                print "par.";
            } else {
                print "impar.";
            }
            print "<br />";
        }
        ?>
    </body>
</html>
