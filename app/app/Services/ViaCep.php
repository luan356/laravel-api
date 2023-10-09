<?php

namespace App\Services;



class ViaCep{
    

    public function getCep($postalCode){

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://viacep.com.br/ws/{$postalCode}/json/");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Desativa a verificação SSL


    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        return 'Erro ao fazer a requisição: ' . curl_error($ch);
    } else {
        $data = json_decode($response, true);
        
        if (isset($data['erro'])) {
            return 'CEP não encontrado';
        } else {
            return $data;       
         
    }
}

curl_close($ch);
}
}

?>

