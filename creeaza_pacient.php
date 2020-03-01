<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Creeaza Pacient</h1>
		<div style="text-align:center">
			<a href="tabela_pacienti.php">Tabela Pacienti</a>
            <a href="tabela_medici.php">Tabela Medici</a>
            <a href="tabela_consultatii.php">Tabela Consultatii</a>
        </div>
		<form action="dbCreatePatient.php" method="post" style="text-align:center">
			Nume*: <input required type="text" name="Nume"/> <br><br>
			Prenume*: <input required type="text" name="Prenume"/> <br><br>
			CNP: <input type="text" name="CNP"/> <br><br>
			Varsta*: <input required type="number" name="Varsta"/> <br><br>
			Adresa: <input type="text" name="Adresa"/> <br><br>
			Numar Telefon: <input type="text" name="Numar_Telefon"/> <br><br>
			Alergii: <input type="text" name="Alergii"/> <br><br>
			Afectiuni Cronice: <input type="text" name="Afectiuni_Cronice"/> <br><br>
			<input type="submit" name="Creeaza" value="Creeaza Pacientul" />
		</form>
	</body>
</html>
