<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Consultatie creata cu succes!</h1>
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
			
			$sql = "INSERT INTO consultatie(idpacient, idmedic, DataConsultatie, Diagnostic, Tratament, Reteta, Alte_Observatii) values ('" . $_POST["pacienti"] . "','". $_POST["medici"] . "','". $_POST["DataConsultatie"] . "','". $_POST["Diagnostic"] . "','". $_POST["Tratament"] . "','". $_POST["Reteta"] . "','" . $_POST["AlteObservatii"] . "'); ";
			$result = $mysqli->query($sql);
			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>