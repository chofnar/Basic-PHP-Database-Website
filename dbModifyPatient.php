<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Pacient modificat cu succes!</h1>
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
			
			$sql = "UPDATE pacienti SET Nume = '".$_POST["Nume"]."', Prenume = '".$_POST["Prenume"]."', Adresa='".$_POST["Adresa"]."', CNP='".$_POST["CNP"]."', Varsta='".$_POST["Varsta"]."', Numar_Telefon='".$_POST["NumarTelefon"]."', Alergii='".$_POST["Alergii"]."', Afectiuni_Cronice='".$_POST["AfectiuniCronice"]."' WHERE idpacient=".$_POST["idpacient"].';';
			$result = $mysqli->query($sql);

			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>