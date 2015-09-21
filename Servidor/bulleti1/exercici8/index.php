<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        $x = 1;
        $y = 2;
        
        print "\$x = $x; \$y = $y <br />";
        check($x, $y);
        
        $x2 = 3;
        $y = 2;
        
        print "\$x2 = $x2; \$y = $y <br />";
        check($x2, $y);
        
        function check($x, $y){
            if(($x + $y) > ($x * $y)){
                print "la suma es mayor que el producto";
            } else {
                print "el producto es mayor que la suma";
            }
            print "<br />";
        }
        ?>
    </body>
</html>
