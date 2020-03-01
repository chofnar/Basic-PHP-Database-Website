<!DOCTYPE html>
<html>
    <head>
        <style>
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
                padding:15px;
                text-align:center;
                margin-left:auto;
                margin-right:auto;
            }
        </style>
    </head>
    <body>

        <h1 style="text-align:center">Tabela Pacienti
        </h1>
        <div style="text-align:center">
            <a href="tabela_medici.php">Tabela Medici</a>
            <a href="tabela_consultatii.php">Tabela Consultatii</a>
        </div>
        <?php
        $mysqli = new mysqli('localhost','apache24','1234','spital');

        // Check connection
        if (!$mysqli) {
            user_error("Unable to connect to database."); 
        }

        $sql = "SELECT idpacient,Nume,Prenume,CNP,Varsta,Adresa,Numar_Telefon,Alergii,Afectiuni_Cronice FROM pacienti";

        $result = $mysqli->query($sql);

        if (!$result) {
            trigger_error('Invalid query: ' . $mysqli->error);
        }

        class Pacient{
            public $idpacient;
            public $Nume;
            public $Prenume;
            public $CNP;
            public $Varsta;
            public $Adresa;
            public $Numar_Telefon;
            public $Alergii;
            public $Afectiuni_Cronice;
        }

        $pacienti = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $currentPatient = new Pacient();
                $currentPatient->idpacient = $row["idpacient"];
                $currentPatient->Nume = $row["Nume"];
                $currentPatient->Prenume = $row["Prenume"];
                $currentPatient->CNP = $row["CNP"];
                $currentPatient->Varsta = $row["Varsta"];
                $currentPatient->Adresa = $row["Adresa"];
                $currentPatient->Numar_Telefon = $row["Numar_Telefon"];
                $currentPatient->Alergii = $row["Alergii"];
                $currentPatient->Afectiuni_Cronice = $row["Afectiuni_Cronice"];
                array_push($pacienti,$currentPatient);
            }
        } else {
            echo "0 results";
        }
        //https://stackoverflow.com/questions/4746079/how-to-create-a-html-table-from-a-php-array
        function build_table($array){
            $html = '</br><form style="text-align:center" action="evaluateButton.php" method="post"><table>';
            //header
            $html .= '<tr>';
            //coloana pentru checkbox
            $html .= '<th>' . htmlspecialchars("Select") . '</th>';

            foreach($array[0] as $key=>$value){
                $html .= '<th>' . htmlspecialchars($key) . '</th>';
            }
            $html .= '</tr>';

            // data rows
            foreach( $array as $key=>$value){
                $html .= '<tr>';

                //adaug checkbox pe prima pozitie
                $html .= '<td><input type="checkbox" name="'. $value->idpacient . '"</td>';
                foreach($value as $key2=>$value2){
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</table>';
            $html .= '<input style="position:relative; top:10px; " type="submit" name="StergePacienti" value="Sterge Pacientii Selectati">';
            $html .= '<input style="position:relative; top:10px; left:20px" type="submit" name="ModificaPacient" value="Modifica Pacientul Selectat">';
            $html .= '<input style="position:relative; top:10px; left:40px" type="submit" name="CreeazaPacienti" value="Creeaza un nou Pacient" formaction="creeaza_pacient.php">';
            $html .= '</form>';
            return $html;
        }

        echo build_table($pacienti);
        ?> 
    </body>
</html>