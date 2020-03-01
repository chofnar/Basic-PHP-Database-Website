<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Pacient creat cu succes!</h1>
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
			
			$sql = "INSERT INTO pacienti(Nume, Prenume, Adresa, CNP, Varsta, Numar_Telefon, Alergii, Afectiuni_Cronice) values ('" . $_POST["Nume"] . "','". $_POST["Prenume"] . "','". $_POST["Adresa"] . "','". $_POST["CNP"] . "','". $_POST["Varsta"] . "','". $_POST["Numar_Telefon"] . "','" . $_POST["Alergii"] . "','" . $_POST["Afectiuni_Cronice"] . "'); ";
			$result = $mysqli->query($sql);

			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>