<!DOCTYPE html>
<html>
	<body>
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

		if(isset($_POST["StergePacienti"]))
		{
			foreach($_POST as $key=>$value)
			{
				//echo "POST parameter '$key' has '$value' "; 
				
				$sql = "DELETE FROM pacienti WHERE idpacient =" . $key . ";";
				$result = $mysqli->query($sql);
				if(!$result)
				{
					trigger_error('Invalid query: ' . $mysqli->error);
				}
				header("Location: tabela_pacienti.php");
				
			}
		}
		if(isset($_POST["ModificaPacient"]))
		{
			$checkCount=0;
			foreach($_POST as $key=>$value)
			{
				$checkCount = $checkCount+1;
			}
			if($checkCount==1)
			{
				$message = "Selecteaza ceva, mai intai.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			elseif($checkCount>2)
			{
				$message = "Selecteaza un singur pacient.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else
			{
				$toTransmit;
				foreach($_POST as $key=>$value)
				{
					if($key!="ModificaPacient")
					{
						$toTransmit=$key;
					}
				}
				echo $toTransmit;
				session_start();
				session_unset();
				$_SESSION["id"] = $toTransmit;
				header("Location: modifica_pacient.php");
			}

		}
		if(isset($_POST["StergeMedici"]))
		{
			foreach($_POST as $key=>$value)
			{
				//echo "POST parameter '$key' has '$value' "; 
				
				$sql = "DELETE FROM medici WHERE idmedic =" . $key . ";";
				$result = $mysqli->query($sql);
				if(!$result)
				{
					trigger_error('Invalid query: ' . $mysqli->error);
				}
				header("Location: tabela_medici.php");
				
			}

		}
		if(isset($_POST["ModificaMedic"]))
		{
			$checkCount=0;
			foreach($_POST as $key=>$value)
			{
				$checkCount = $checkCount+1;
			}
			if($checkCount==1)
			{
				$message = "Selecteaza ceva, mai intai.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			elseif($checkCount>2)
			{
				$message = "Selecteaza un singur medic.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else
			{
				$toTransmit;
				foreach($_POST as $key=>$value)
				{
					if($key!="ModificaMedic")
					{
						$toTransmit=$key;
					}
				}
				echo $toTransmit;
				session_start();
				session_unset();
				$_SESSION["id"] = $toTransmit;
				header("Location: modifica_medic.php");
			}

		}
		if(isset($_POST["StergeConsultatii"]))
		{
			foreach($_POST as $key=>$value)
			{
				//echo "POST parameter '$key' has '$value' "; 
				
				$sql = "DELETE FROM consultatie WHERE idconsultatie =" . $key . ";";
				$result = $mysqli->query($sql);
				if(!$result)
				{
					trigger_error('Invalid query: ' . $mysqli->error);
				}
				header("Location: tabela_consultatii.php");
			}

		}
		if(isset($_POST["ModificaConsultatie"]))
		{
			$checkCount=0;
			foreach($_POST as $key=>$value)
			{
				$checkCount = $checkCount+1;
			}
			if($checkCount==1)
			{
				$message = "Selecteaza ceva, mai intai.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			elseif($checkCount>2)
			{
				$message = "Selecteaza o singura consultatie.";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}
			else
			{
				$toTransmit;
				foreach($_POST as $key=>$value)
				{
					if($key!="ModificaConsultatie")
					{
						$toTransmit=$key;
					}
				}
				echo $toTransmit;
				session_start();
				session_unset();
				$_SESSION["id"] = $toTransmit;
				header("Location: modifica_consultatie.php");
			}
		}

		?>
	</body>
</html>