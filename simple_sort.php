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
              while($salida==false) {
                  $salida = true;
                  for($i=0;$i<sizeof($array)-1;$i++) {
                      if ($array[$i] > $array[$i+1]) {
                          $menor = $array[$i+1];
                          $maior = $array[$i];
                          $array[$i] = $menor;
                          $array[$i+1] = $maior;
                          $salida = false;
                      }
                  }
              }
              return $array;
        }
        
        function sort_other($array) {
            $array_ordenado = [];
            for($i=0;$i<sizeof($array);$i++) {
                $cont = 0;
                for($z=0;$z<sizeof($array);$z++) {
                    if ($array[$i] > $array[$z]) {
                        $cont += 1;
                    }
                }
                while ($array_ordenado[$cont] === $array[$i]) {
                    $cont += 1;
                }
                $array_ordenado[$cont] = $array[$i];
            }
            return $array_ordenado;
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
        
        function rand_array($size,$min,$max) {
            $array_aleatorio = [];
            for($i=0;$i<$size;$i++) {
                $array_aleatorio[$i] = rand($min,$max);
            }
            return $array_aleatorio;
        }
        
        
        $num_array = rand_array(1000,0,1000);
        print_array($num_array);
        
        echo "<br> - Aplicación da función de ordenación bubble:<br/>";
        $time_pre = microtime(true);
        $num_array_ordenado_1 = sort_bubble($num_array);
        print_array($num_array_ordenado_1);
        $time_post = microtime(true);
        echo "Tempo de execución: ".($time_post-$time_pre)." s";
        
        echo "<br/><br/>----------------------------<br/>";
        
        echo "<br> - Aplicación da segunda función de ordenación:<br/>";
        $time_pre = microtime(true);
        $num_array_ordenado_2 = sort_other($num_array);
        print_array($num_array_ordenado_2);
        $time_post = microtime(true);
        echo "Tempo de execución: ".($time_post-$time_pre)." s";
        
        
        ?>
    </body>
</html>
