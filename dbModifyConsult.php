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
			
			$sql = "UPDATE consultatie SET idpacient = '".$_POST["pacienti"]."', idmedic = '".$_POST["medici"]."', DataConsultatie='".$_POST["DataConsultatie"]."', Diagnostic='".$_POST["Diagnostic"]."', Tratament='".$_POST["Tratament"]."', Reteta='".$_POST["Reteta"]."', Alte_Observatii='".$_POST["AlteObservatii"]."' WHERE idconsultatie=".$_POST["idconsultatie"].";";
			$result = $mysqli->query($sql);

			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>