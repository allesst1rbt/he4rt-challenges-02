<?php 
    require "Connect.php";
    require "Services.php";
    require "Features.php";
    $acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

	if($acao =='register') {
		try {
			$Feature = new Features();
			$Feature->__set('Feature', $_POST['feature']);
			$Feature->__set('DevHours', $_POST['devHours']);
			$Feature->__set('TestHours', $_POST['testHours']);
			$connection =new Connection();
			$Service = new Services($connection, $Feature);
			$Service->Register();
			header('Location: index.php?sucess=1');
		} catch (\Throwable $th) {
			header('Location: index.php?erro=1');
		}
      
    }
    elseif($acao == 'read'){
		$Features = new Features();
		$connection = new Connection();
		$Service = new Services($connection, $Features);
      	$Features = $Service->read();
        
    }
    elseif($acao == 'Download'){
		$Feature = new Features();
		$connection = new Connection();
		$Service = new Services($connection, $Feature);
		$Feature = $Service->readToFile();	
		$fp = fopen('arquivos\features.json', 'w');
		fwrite($fp, json_encode($Feature,JSON_PRETTY_PRINT));
		fclose($fp);
		header('Content-type: application/json');
		header('Content-disposition: attachment; filename=features.json');
		readfile('arquivos\features.json');
    }
    elseif($acao == 'Upload'){
		try {
			
			
			if ($_FILES['json']['type']=='application/json') {
				
				move_uploaded_file($_FILES['json']['tmp_name'], "arquivos/".basename($_FILES["json"]['name']));
				$json = file_get_contents("arquivos/".basename($_FILES["json"]['name']));
				$data = json_decode($json, TRUE);
				$Feature = new Features();
				$connection = new Connection();
				$Service = new Services($connection, $Feature);
				$Feature = $Service->DeleteAll();
				foreach ($data as $key => $value) {
					
					if (isset($value['Feature']) && isset($value['DevHours']) && isset($value['TestHours'])) {
						$Feature = new Features();
						$Feature->__set('Feature', $value['Feature']);
						$Feature->__set('DevHours', $value['DevHours']);
						$Feature->__set('TestHours', $value['TestHours']);
						$connection =new Connection();
						$Service = new Services($connection, $Feature);
						$Service->Register();
					}
					
				}
				
			
			
			}else {
				header('Location: index.php?erro=4');
			}
			header('Location: index.php?sucess=3');
			
		} catch (\Throwable $th) {
			header('Location: index.php?erro=4');
		}
		
		
        
    }
	elseif ($acao == 'Delete') {
		try {
			$Feature = new Features();
			$Feature->__set('Id',$_GET['id']);
			$connection = new Connection();
			$Service = new Services($connection, $Feature);
			$Service->delete();
			header('Location: index.php?sucess=2');
			
		} catch (\Throwable $th) {
			header('Location: index.php?erro=2');
		}
	
	}
?>