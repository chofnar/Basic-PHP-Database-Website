<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Creeaza Medic</h1>
		<div style="text-align:center">
			<a href="tabela_pacienti.php">Tabela Pacienti</a>
            <a href="tabela_medici.php">Tabela Medici</a>
            <a href="tabela_consultatii.php">Tabela Consultatii</a>
        </div>
		<form action="dbCreateMedic.php" method="post" style="text-align:center">
			Nume*: <input required type="text" name="Nume"/> <br><br>
			Prenume*: <input required type="text" name="Prenume"/> <br><br>
			CNP: <input type="text" name="CNP"/> <br><br>
			Numar Telefon: <input type="text" name="Numar_Telefon"/> <br><br>
			Varsta*: <input required type="number" name="Varsta"/> <br><br>
			Sectie: <input type="text" name="Sectie"/> <br><br>
			Grad: <input type="text" name="Grad"/> <br><br>
			Numar Pager: <input type="text" name="Numar_Pager"/> <br><br>
			<input type="submit" name="Creeaza" value="Creeaza Medicul" />
		</form>
	</body>
</html>
