<?php
function M3_asaasCustomers($dados){

		if($dados['gtw_sandbox'])
			$url_api = 'https://sandbox.asaas.com';
		else
			$url_api = 'https://www.asaas.com';

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
		curl_setopt($ch, CURLOPT_HEADER, FALSE);

		switch($dados['gtw_action']){
			case 'criar': //ou atualizar

				if($dados['gtw_id']) 
					$query = '/'.$dados['gtw_id']; 
				else
					$query = '';

				//Cria novo cliente
				curl_setopt($ch, CURLOPT_POST, TRUE);		
				curl_setopt($ch, CURLOPT_POSTFIELDS, "{
				\"name\": \"".$dados['nome']."\",
				\"email\": \"".$dados['email']."\",
				\"phone\": \"".$dados['telefone']."\",
				\"mobilePhone\": \"".$dados['celular']."\",
				\"cpfCnpj\": \"".$dados['cpf']."\",
				\"postalCode\": \"".$dados['cep']."\",
				\"address\": \"".$dados['logradouro']."\",
				\"addressNumber\": \"".$dados['numero']."\",
				\"complement\": \"".$dados['complemento']."\",
				\"province\": \"".$dados['bairro']."\",
				\"externalReference\": \"".$dados['user_id']."\",
				\"notificationDisabled\": false,
				\"additionalEmails\": \"contato@prevclube.com.br\",
				\"municipalInscription\": \"\",
				\"stateInscription\": \"\",
				\"observations\": \"".($dados['gtw_id']) ? "Criado": "Alterado"." via API em ".date('Y-m-d')."\"
				}");
				

			break;
			case 'recuperar':

				$query = '/'.$dados['gtw_id']; //Recupera Cliente único

			break;
			case 'listar':

				//[opções]:?name=&email=&cpfCnpj=&groupName=&externalReference=&offset=&limit= 
				$query = '?cpfCnpj='.$dados['cpf'].'&limit=1'; //Pesquisa Cliente por CPF

			break;
			case 'remover':

				$query = '/'.$dados['gtw_id'];
				curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");

			break;
			case 'restaurar':

				$query = '/'.$dados['gtw_id'];
				curl_setopt($ch, CURLOPT_POST, TRUE);	

			break;
		}
		
		curl_setopt($ch, CURLOPT_URL, $url_api."/api/v3/customers".$query);		
		
		curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		  "access_token: ".$dados['api_key']
		));
		
		$get_data = curl_exec($ch);
		curl_close($ch);				

		$response = json_decode($get_data);		
		
		return $response;
			
		
	}
