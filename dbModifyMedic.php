<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Medic modificat cu succes!</h1>
		<div style="text-align:center">
			<a href="tabela_pacienti.php">Tabela Pacienti</a>
            <a href="tabela_medici.php">Tabela Medici</a>
            <a href="tabela_consultatii.php">Tabela Consultatii</a>
        </div>
		<?php
			$mysqli = new mysqli('localhost','apache24','1234','spital');

			// Check connection
			if (!$mysqli) {
				user_error("Unable to connect to database."); 
			}
			
			$sql = "UPDATE medici SET Nume = '".$_POST["Nume"]."', Prenume = '".$_POST["Prenume"]."', CNP='".$_POST["CNP"]."', Numar_Telefon='".$_POST["NumarTelefon"]."', Varsta='".$_POST["Varsta"]."', Sectie='".$_POST["Sectie"]."', Grad='".$_POST["Grad"]."', Numar_Pager='".$_POST["NumarPager"]."' WHERE idmedic=".$_POST["idmedic"].';';
			$result = $mysqli->query($sql);

			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>