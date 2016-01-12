<html>
	<head>
		<title>exercicio 1</title>
		<meta charset="UTF-8">
	</head>
	<body>
	
		<form method="post" action="">
			<b>Número 1: </b><input type="text" name="num1"/><br/>
			<b>Número 2: </b><input type="text" name="num2"/><br/>
			<br/>
			<button type="submit" name="action">Procesar</button>
		</form>
		
		<hr/>
		
		<?php
		
		if (isset($_POST['num1']) && isset($_POST['num2'])) {
			$var1 = $_POST['num1'];
			$var2 = $_POST['num2'];
			if ((is_numeric($var1)) && (is_numeric($var2))) {
				echo "Número 1"." = "."<b>".$var1."</b>";
				echo "<br/>";
				echo "Número 2"." = "."<b>".$var2."</b>";
				echo "<br/><br/>";
				echo "A SUMA dos números é igual a <b>".($var1+$var2)."</b><br/>";
				echo "A RESTA dos números é igual a <b>".($var1-$var2)."</b><br/>";
				echo "<br/>";
				echo "O CADRADO de ".$var1." é igual a <b>".pow($var1,2)."</b><br/>";
				echo "O CADRADO de ".$var2." é igual a <b>".pow($var2,2)."</b><br/>";
				echo "<br/>";
				echo "A RAÍZ CADRADA de ".$var1." é igual a <b>".sqrt($var1)."</b><br/>";
				echo "A RAÍZ CADRADA de ".$var2." é igual a <b>".sqrt($var2)."</b><br/>";
			}
		}
		
		?>
	</body>
</html>
