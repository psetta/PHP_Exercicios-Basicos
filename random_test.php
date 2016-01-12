<html>
	<head>
		<title>random</title>
		<meta charset="UTF-8">
		<style>
			.num {background-color:lightgray;}
			.porcentaxe {background-color:#F7E3AC;}
			.media {
					font-weight:bold;
					background-color:lightgreen;
					text-align:center; 
					}
			.encabezado {
						font-weight:bold;
						background-color:lightblue;
						}
		</style>
	</head>
	<body>
	
		<?php
		
		//comparación de rand e mt_rand
		
		$cont = 10000;
		$min = 1;
		$max = 10;
		
		$numeros = $max-$min;
		$media_ideal = 100/$numeros;
		
		$array_rand = [];
		$array_mt = [];
		
		$percs_rand = [];
		$percs_mt = [];

		for($i=0;$i<$cont;$i++) {

			$rand = rand($min,$max);
			if($array_rand[$rand] > 0) {
				$array_rand[$rand] = $array_rand[$rand] + 1;
			} else {
				$array_rand[$rand] = 1;
			}

			$mt = mt_rand($min,$max);
			if($array_mt[$mt] > 0) {
				$array_mt[$mt] = $array_mt[$mt] + 1;
			} else {
				$array_mt[$mt] = 1;
			}	
		
		}

		?>
		
		<h2>Cantidade de veces que sae cada número</h2>
		<table border=1px>
		<tr class='encabezado'>
		<td>Número</td>
		<td>Función (rand)</td>
		<td>Porcentaxe (rand)</td>
		<td>Función (mt_rand)</td>
		<td>Porcentaxe (mt_rand)</td>

		<?php

		for($i=$min;$i<=$max;$i++) {
			echo "<tr>";
			echo "<td class='num'>".$i."</td>";
			
			echo "<td>".$array_rand[$i]."</td>";
			$perc_rand = ($array_rand[$i]*100)/$cont;
			echo "<td class='porcentaxe'>".$perc_rand."%"."</td>";
			
			echo "<td>".$array_mt[$i]."</td>";
			$perc_mt = ($array_mt[$i]*100)/$cont;
			echo "<td class='porcentaxe'>".$perc_mt."%"."</td>";
		
		}
		
		?>
		
		</tr>
		</table>
	</body>
</html>
