<!DOCTYPE html>
<html>
	<body>
		<h1 style="text-align:center">Creeaza Consultatie</h1>
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
		//select patients
		$sql = "SELECT idpacient,Nume,Prenume,Varsta,Alergii FROM pacienti;";
		$result = $mysqli->query($sql);

        if (!$result) {
            trigger_error('Invalid query: ' . $mysqli->error);
        }

		class PacientCons{
			
			public $idPacientCons;
			public $numePacientCons;
			public $prenumePacientCons;
			public $varstaPacientCons;
			public $alergiiPacientCons;
		}

		$pacienti = [];

		if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $currentPatient = new PacientCons();
                $currentPatient->idPacientCons = $row["idpacient"];
                $currentPatient->numePacientCons = $row["Nume"];
                $currentPatient->prenumePacientCons = $row["Prenume"];
                $currentPatient->varstaPacientCons = $row["Varsta"];
                $currentPatient->alergiiPacientCons = $row["Alergii"];
                array_push($pacienti,$currentPatient);
            }
        } else {
            echo "0 results";
        }

		//select medici
		$sql1 = "SELECT idmedic,Nume,Prenume,Sectie,Grad FROM medici;";
		$result1 = $mysqli->query($sql1);

        if (!$result1) {
            trigger_error('Invalid query: ' . $mysqli->error);
        }

		class MedicCons{
			
			public $idMedicCons;
			public $numeMedicCons;
			public $prenumeMedicCons;
			public $sectieMedicCons;
			public $gradMedicCons;
		}

		$medici = [];

		if ($result1->num_rows > 0) {
            // output data of each row
            while($row = $result1->fetch_assoc()) {
                $currentMedic = new MedicCons();
                $currentMedic->idMedicCons = $row["idmedic"];
                $currentMedic->numeMedicCons = $row["Nume"];
                $currentMedic->prenumeMedicCons = $row["Prenume"];
                $currentMedic->sectiaMedicCons = $row["Sectie"];
                $currentMedic->gradMedicCons = $row["Grad"];
                array_push($medici,$currentMedic);
            }
        } else {
            echo "0 results";
        }
		//html form
		$html = '</br><form action="dbCreateConsult.php" method="post" style="text-align:center">';
		//dropdown list pacienti
		$html .= 'Selecteaza Pacientul: <select name="pacienti">';
		foreach($pacienti as $value)
		{
			$html .= '<option value='.$value->idPacientCons.'>ID '.$value->idPacientCons.': '.$value->numePacientCons.', '.$value->prenumePacientCons.', '.$value->varstaPacientCons.', Allergies: '.$value->alergiiPacientCons.'</option>';
		}
		$html .= '</select></br></br>';
		//dropdown list medici
		$html .= 'Selecteaza Medicul: <select name="medici">';
		foreach($medici as $value)
		{
			$html .= '<option value='.$value->idMedicCons.'>ID '.$value->idMedicCons.': '.$value->numeMedicCons.', '.$value->prenumeMedicCons.', '.$value->sectiaMedicCons.', '.$value->gradMedicCons.'</option>';
		}
		$html .= '</select></br></br>';
		$html .= 'Data Consultatie*: <input required type="date" name="DataConsultatie"/> <br><br>';
		$html .= 'Diagnostic*: <input required type="text" name="Diagnostic"/> <br><br>';
		$html .= 'Tratament*: <input required type="text" name="Tratament"/> <br><br>';
		$html .= 'Reteta: <input type="text" name="Reteta"/> <br><br>';
		$html .= 'Alte Observatii: <input type="text" name="AlteObservatii"/> <br><br>';
		$html .= '<input type="submit" name="Creeaza" value="Creeaza Consultatia" />';
		$html .='</form>';
		echo $html;

		?>
	</body>
</html>
