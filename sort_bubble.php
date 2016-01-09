<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        function sort_bubble($array) {
              $salida = false;
              $aux_array = $array;
              while($salida==false) {
                  $salida = true;
                  for($i=0;$i<sizeof($array)-1;$i++) {
                      if ($aux_array[$i] > $aux_array[$i+1]) {
                          $menor = $aux_array[$i+1];
                          $maior = $aux_array[$i];
                          $aux_array[$i] = $menor;
                          $aux_array[$i+1] = $maior;
                          $salida = false;
                      }
                  }
              }
              return $aux_array;
        }
        
        function print_array($array) {
            echo "array: [";
            for($i=0;$i<sizeof($array);$i++) {
                if ($i == sizeof($array)-1) {
                    echo $array[$i];
                } else {
                    echo $array[$i].", ";
                }
            }
            echo "]<br/>";
        }
        
        $num_array = [5,4,1,8,12,2,5,76,23,4];
        print_array($num_array);
        echo "<br>aplicación da función de ordenación:<br/>";
        $num_array_ordenado = sort_bubble($num_array);
        print_array($num_array_ordenado);
        
        ?>
    </body>
</html>
