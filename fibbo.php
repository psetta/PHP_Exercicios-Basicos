<html>
	<head>
		<title>fibbonaci</title>
		<meta charset="UTF-8">
	</head>
	<body>
	
		<form method="get" action="">
			<p><b>Tamaño da sucesión de Fibbonacci:</b><p>
			<input type="text" name="cont"/><br/>
		</form>
		
		<?php
		
		if (isset($_GET['cont'])) {
			$cont = $_GET['cont'];
			if (!(is_numeric($cont)) | ($cont < 0)) {
				$cont = 0;
			}
		} else {
			$cont = 0;
		}
		
		echo "<b>Os ".$cont." primeiros números da sucesión de Fibbonacci:</b><br/><br/>";
		
		function fibbo($cont) {
			$array=[];
			$num = 1;
			$ant = $num;
			for($i=0;$i<$cont;$i++) {
				$array[$i] = $num;
				$num = $num+$ant;
				$ant = $num-$ant;
			}
			return $array;
		}
		
		$array_fibbo = fibbo($cont);
		
		echo "Array fibbonacci: <br/><br/>";
		echo "[";
		for($i=0;$i<sizeof($array_fibbo);$i++) {
			if ($i < sizeof($array_fibbo)-1) {
				echo $array_fibbo[$i].", ";
			} else {
				echo $array_fibbo[$i];
			}
		}
		echo "]";

		?>
	</body>
</html>
