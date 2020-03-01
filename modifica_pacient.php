<!DOCTYPE html>
<html>
	<body>
		<?php
			$id=-1;
			session_start();
			$aux = $_SESSION;
			session_unset();

			foreach($aux as $key=>$value)
			{
				$id=$value;
			}

			if($id==-1)
			{
				user_error("Could not retrieve patient ID");
			}

			$mysqli = new mysqli('localhost','apache24','1234','spital');
			// Check connection
			if (!$mysqli) {
				user_error("Unable to connect to database."); 
			}

			$sql = "SELECT * FROM pacienti WHERE idpacient = '$id';";

			$result = $mysqli->query($sql);
			if(!$result)
			{
				trigger_error('Invalid query: ' . $mysqli->error);
			}

			$row = mysqli_fetch_array($result);

			//print_r($row);

			//formez form-ul 
			$html = '<h1 style="text-align:center">Modifica Pacient</h1>';
			$html .= '<form action="dbModifyPatient.php" method="post" style="text-align:center">';
			$html .= 'ID Pacient (needitabil):<input readonly type="text" name="idpacient" value="'.$id.'" /> <br><br>';
			$html .= 'Nume*: <input required type="text" name="Nume" value="'. $row["Nume"] . '" /> <br><br>';
			$html .= 'Prenume*: <input required type="text" name="Prenume" value="'. $row["Prenume"] . '" /> <br><br>';
			$html .= 'CNP: <input  type="text" name="CNP" value="'. $row["CNP"] . '" /> <br><br>';
			$html .= 'Varsta*: <input required type="number" name="Varsta" value="'. $row["Varsta"] . '" /> <br><br>';
			$html .= 'Adresa: <input  type="text" name="Adresa" value="'. $row["Adresa"] . '" /> <br><br>';
			$html .= 'Numar Telefon: <input  type="text" name="NumarTelefon" value="'. $row["Numar_Telefon"] . '" /> <br><br>';
			$html .= 'Alergii: <input  type="text" name="Alergii" value="'. $row["Alergii"] . '" /> <br><br>';
			$html .= 'Afectiuni Cronice: <input  type="text" name="AfectiuniCronice" value="'. $row["Afectiuni_Cronice"] . '" /> <br><br>';
			$html .= '<input type="submit" name="Modifica" value="Modifica Pacientul" /></form>"';

			echo $html;
		?>
	</body>
</html>
