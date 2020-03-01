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

        <h1 style="text-align:center">Tabela Medici</h1>
        <div style="text-align:center">
            <a href="tabela_pacienti.php">Tabela Pacienti</a>
            <a href="tabela_consultatii.php">Tabela Consultatii</a>
        </div>
        <?php
        $mysqli = new mysqli('localhost','apache24','1234','spital');

        // Check connection
        if (!$mysqli) {
            user_error("Unable to connect to database."); 
        }

        $sql = "SELECT idmedic,Nume,Prenume,CNP,Numar_Telefon,Varsta,Sectie,Grad,Numar_Pager FROM medici";

        $result = $mysqli->query($sql);

        if (!$result) {
            trigger_error('Invalid query: ' . $mysqli->error);
        }

        class Medic{
            public $idmedic;
            public $Nume;
            public $Prenume;
            public $CNP;
            public $Numar_Telefon;
            public $Varsta;
            public $Sectie;
            public $Grad;
            public $Numar_Pager;
        }

        $medici = [];

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                $currentMedic = new Medic();
                $currentMedic->idmedic = $row["idmedic"];
                $currentMedic->Nume = $row["Nume"];
                $currentMedic->Prenume = $row["Prenume"];
                $currentMedic->CNP = $row["CNP"];
                $currentMedic->Numar_Telefon = $row["Numar_Telefon"];
                $currentMedic->Varsta = $row["Varsta"];
                $currentMedic->Sectie = $row["Sectie"];
                $currentMedic->Grad = $row["Grad"];
                $currentMedic->Numar_Pager = $row["Numar_Pager"];
                array_push($medici,$currentMedic);
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
                $html .= '<td><input type="checkbox" name="'. $value->idmedic . '"</td>';
                foreach($value as $key2=>$value2){
                    $html .= '<td>' . htmlspecialchars($value2) . '</td>';
                }
                $html .= '</tr>';
            }
            $html .= '</table>';
            $html .= '<input style="position:relative; top:10px; " type="submit" name="StergeMedici" value="Sterge Medicii Selectati">';
            $html .= '<input style="position:relative; top:10px; left:20px" type="submit" name="ModificaMedic" value="Modifica Medicul Selectat">';
            $html .= '<input style="position:relative; top:10px; left:40px" type="submit" name="CreeazaMedic" value="Creeaza un nou Medic" formaction="creeaza_medic.php">';
            $html .= '</form>';
            return $html;
        }

        echo build_table($medici);
        ?> 
    </body>
</html>