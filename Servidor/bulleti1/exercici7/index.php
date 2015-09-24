<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        print "<form action='index.php' method='POST'>
            Numero a comprobar:<input type='text' name='num' value='".$_POST['num']."'/>  
                 <input type='submit' value='Enviar'>
        </form>
        <br />";
        
        if(!empty($_POST['num'])){
            parimpar($_POST['num']);
        }
        
        
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
