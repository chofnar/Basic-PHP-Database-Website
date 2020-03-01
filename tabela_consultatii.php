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

        <h1 style="text-align:center">Tabela Consultatii</h1>
        <div style="text-align:center">
            <a href="tabela_pacienti.php">Tabela Pacienti</a>
            <a href="tabela_medici.php">Tabela Medici</a>
        </div>
        <?php
        $mysqli = new mysqli('localhost','apache24','1234','spital');

        // Check connection
        if (!$mysqli) {
            user_error("Unable to connect to database."); 
        }

        $sql = "SELECT idconsultatie,idmedic,idpacient,DataConsultatie,Diagnostic,Tratament,Reteta,Alte_Observatii FROM consultatie";

        $result = $mysqli->query($sql);

        if (!$result) {
            trigger_error('Invalid query: ' . $mysqli->error);
        }

        class Consultatie{
            public $idconsultatie;
            public $idmedic;
            public $DateMedic="";
            public $idpacient;
            public $DatePacient="";
            public $DataConsultatie;
            public $Diagnostic;
            public $Tratament;
            public $Reteta;
            public $AlteObservatii;
        }

        $consultatii = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $currentConsult = new Consultatie();
                $currentConsult->idconsultatie = $row["idconsultatie"];
                $currentConsult->idmedic = $row["idmedic"];
                //query for date medic
                $sqlmedic = "SELECT Nume,Prenume,Sectie,Grad FROM medici WHERE idmedic = ".$row["idmedic"].";";
                $resultmedic = $mysqli->query($sqlmedic);
                if (!$resultmedic) {
                    trigger_error('Invalid query: ' . $mysqli->error);
                }
                while($rowmedic = $resultmedic->fetch_assoc()){
                    $currentConsult->DateMedic .= $rowmedic["Nume"].", ";
                    $currentConsult->DateMedic .= $rowmedic["Prenume"]." - ";
                    $currentConsult->DateMedic .= $rowmedic["Sectie"].", ";
                    $currentConsult->DateMedic .= $rowmedic["Grad"];
                }
                //
                $currentConsult->idpacient = $row["idpacient"];
                //query for date pacient
                $sqlpacient = "SELECT Nume,Prenume,Varsta,Alergii FROM pacienti WHERE idpacient = ".$row["idpacient"].";";
                $resultpacient = $mysqli->query($sqlpacient);
                if (!$resultpacient) {
                    trigger_error('Invalid query: ' . $mysqli->error);
                }
                while($rowpacient = $resultpacient->fetch_assoc()){
                    $currentConsult->DatePacient .= $rowpacient["Nume"].", ";
                    $currentConsult->DatePacient .= $rowpacient["Prenume"].", ";
                    $currentConsult->DatePacient .= $rowpacient["Varsta"].", Allergic to: ";
                    $currentConsult->DatePacient .= $rowpacient["Alergii"];
                }
                //
                $currentConsult->DataConsultatie = $row["DataConsultatie"];
                $currentConsult->Diagnostic = $row["Diagnostic"];
                $currentConsult->Tratament = $row["Tratament"];
                $currentConsult->Reteta = $row["Reteta"];
                $currentConsult->AlteObservatii = $row["Alte_Observatii"];
                array_push($consultatii,$currentConsult);
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
                $html .= '<td><input type="checkbox" name="'. $value->idconsultatie . '"</td>';
                foreach($value as $key2=>$value2){
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</table>';
            $html .= '<input style="position:relative; top:10px; " type="submit" name="StergeConsultatii" value="Sterge Consultatiile Selectate">';
            $html .= '<input style="position:relative; top:10px; left:20px" type="submit" name="ModificaConsultatie" value="Modifica Consultatia Selectata">';
            $html .= '<input style="position:relative; top:10px; left:40px" type="submit" name="CreeazaConsultatie" value="Creeaza o noua Consultatie" formaction="creeaza_consultatie.php">';
            $html .= '</form>';
            return $html;
        }

        echo build_table($consultatii);
        ?> 
    </body>
</html>