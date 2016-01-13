<html>
	<head>
		<title>random test</title>
		<meta charset="UTF-8">
		<style>
			.num {background-color:lightgray;}
			.func {
					font-weight:bold;
					background-color:lightgreen;
					text-align:center; 
					}
			.encabezado {
						font-weight:bold;
						background-color:lightblue;
						}
			.total {
					font-weight:bold;
					background-color:#EFDDF7;
					}
		</style>
	</head>
	<body>
	
		<form method="post" action="">
			<b>Cantidade de números posibles: </b><br/>
				<input type="text" name="nums"/><br/>
			<b>Número de chamadas as funcións random: </b><br/>
				<input type="text" name="cont"/><br/>
			<br/>
			<button type="submit" name="action">Procesar</button>
		</form>
		<hr/>
	
		<?php
		
		//comparación de rand e mt_rand
		
		if (isset($_POST['cont']) && isset($_POST['nums'])) {
			$cont = $_POST['cont'];
			$cant_num = $_POST['nums'];
			if (is_numeric($cont) && is_numeric($cant_num)
				&& ($cont > 0) && ($cant_num > 0)) {
					
				$correcto = true;
				
				echo "Cantidade de números posibles: ".$cant_num."<br/>";
				echo "Chamadas as funcións random: ".$cont."<br/><br/>";
				
				$min = 1;
				$max = $cant_num;
				
				$numeros = ($max-$min)+1;
				$media_ideal = 100/$numeros;
				
				$array_rand = [];
				$array_mt = [];
				
				$devs_rand = [];
				$desv_mt = [];

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
			}
		}
			
		?>
		
		
		<table border=1px>
		
		<tr class='func'>
		<td></td>
		<td colspan='3'>rand</td>
		<td colspan='3'>mt_rand</td>
		</tr>
		
		<tr class='encabezado'>
		<td>Número</td>
		<td>Cantidade</td>
		<td>Porcentaxe</td>
		<td>Desviación</td>
		<td>Cantidade</td>
		<td>Porcentaxe</td>
		<td>Desviación</td>

		<?php
		
		$total_des_rand = 0;
		$total_des_mt = 0;

		if ($correcto) {
		
			for($i=$min;$i<=$max;$i++) {
				echo "<tr>";
				echo "<td class='num'>".$i."</td>";
				
				echo "<td>".$array_rand[$i]."</td>";
				$perc_rand = round(($array_rand[$i]*100)/$cont,3);
				$alpha = min(($perc_rand-$media_ideal)/10,0.8);
				echo "<td style='background-color:rgba(255,230,20,".$alpha.");'>".$perc_rand."%"."</td>";
				$desv_rand = round(abs($media_ideal-$perc_rand),3);
				$alpha = min($desv_rand/(20/$numeros),0.8);
				echo "<td style='background-color:rgba(255,230,230,".$alpha.");'>".$desv_rand."</td>";
				$devs_rand[$i] = $desv_rand;
				$total_des_rand += $desv_rand;
				
				echo "<td>".$array_mt[$i]."</td>";
				$perc_mt = round(($array_mt[$i]*100)/$cont,3);
				$alpha = min(($perc_mt-$media_ideal)/10,0.8);
				echo "<td style='background-color:rgba(255,230,20,".$alpha.");'>".$perc_mt."%"."</td>";
				$desv_mt = round(abs($media_ideal-$perc_mt),3);
				$alpha = min($desv_rand/(20/$numeros),0.8);
				echo "<td style='background-color:rgba(255,230,230,".$alpha.");'>".$desv_mt."</td>";
				$devs_mt[$i] = $desv_mt;
				$total_des_mt += $desv_mt;
			
			}
		}
		
		?>
		
		</tr>
		
		<tr class='total'>
		
		<?php
		
		echo "<td></td>";
		echo "<td colspan='2'>MEDIA</td>";
		echo "<td>".($total_des_rand/$numeros)."</td>";
		echo "<td colspan='2'>MEDIA</td>";
		echo "<td>".($total_des_mt/$numeros)."</td>";
		
		?>
		
		</tr>
		</table>
	</body>
</html>
