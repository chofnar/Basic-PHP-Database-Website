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
				user_error("Could not retrieve medic ID");
			}

			$mysqli = new mysqli('localhost','apache24','1234','spital');
			// Check connection
			if (!$mysqli) {
				user_error("Unable to connect to database."); 
			}

			$sql = "SELECT * FROM medici WHERE idmedic = '$id';";

			$result = $mysqli->query($sql);
			if(!$result)
			{
				trigger_error('Invalid query: ' . $mysqli->error);
			}

			$row = mysqli_fetch_array($result);

			//print_r($row);

			//formez form-ul 
			$html = '<h1 style="text-align:center">Modifica Medic</h1>';
			$html .= '<form action="dbModifyMedic.php" method="post" style="text-align:center">';
			$html .= 'ID Medic (needitabil):<input readonly type="text" name="idmedic" value="'.$id.'" /> <br><br>';
			$html .= 'Nume*: <input required type="text" name="Nume" value="'. $row["Nume"] . '" /> <br><br>';
			$html .= 'Prenume*: <input required type="text" name="Prenume" value="'. $row["Prenume"] . '" /> <br><br>';
			$html .= 'CNP: <input  type="text" name="CNP" value="'. $row["CNP"] . '" /> <br><br>';
			$html .= 'Numar Telefon: <input  type="text" name="NumarTelefon" value="'. $row["Numar_Telefon"] . '" /> <br><br>';
			$html .= 'Varsta*: <input required type="number" name="Varsta" value="'. $row["Varsta"] . '" /> <br><br>';
			$html .= 'Sectie: <input  type="text" name="Sectie" value="'. $row["Sectie"] . '" /> <br><br>';
			$html .= 'Grad: <input  type="text" name="Grad" value="'. $row["Grad"] . '" /> <br><br>';
			$html .= 'Numar Pager: <input  type="text" name="NumarPager" value="'. $row["Numar_Pager"] . '" /> <br><br>';
			$html .= '<input type="submit" name="Modifica" value="Modifica Medicul" /></form>"';

			echo $html;
		?>
	</body>
</html>
