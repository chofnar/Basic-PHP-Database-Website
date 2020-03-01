<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Medic creat cu succes!</h1>
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
			
			$sql = "INSERT INTO medici(Nume, Prenume, CNP, Numar_Telefon, Varsta, Sectie, Grad, Numar_Pager) values ('" . $_POST["Nume"] . "','". $_POST["Prenume"] . "','". $_POST["CNP"] . "','". $_POST["Numar_Telefon"] . "','". $_POST["Varsta"] . "','". $_POST["Sectie"] . "','" . $_POST["Grad"] . "','" . $_POST["Numar_Pager"] . "'); ";
			$result = $mysqli->query($sql);

			if (!$result) {
				trigger_error('Invalid query: ' . $mysqli->error);
			}
		?>
	</body>
</html>