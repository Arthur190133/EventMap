<?php

class JWT{

    private $secret_key;

    public function getSecretKey():string
    {
        //RECUPERER TOKEN POUR VERIFIER SI PEUT UTILISER API
        $secret_file = str_replace("public", "", $_SERVER['DOCUMENT_ROOT']) . "config/secret.key";
        // Vérifie si le fichier de clé secrète existe déjà
        if (!file_exists($secret_file)) {
            // Si le fichier n'existe pas, crée une nouvelle clé secrète et l'enregistre dans le fichier
            $secret = base64_encode(random_bytes(32));
            file_put_contents($secret_file, $secret);
        } else {
            // Si le fichier existe déjà, récupère la clé secrète à partir du fichier
            $secret = file_get_contents($secret_file);
            
        }

        return $secret;
    }

    public function __Construct__(){
        $this->secret_key = $this->getSecretKey();
    }

    public function generate(array $header, array $payload, int $validity):string
    {


    if(/*$validity > 0*/ true){
        $now = new DateTime();
        $expiration = $now->getTimestamp() + $validity;
        $payload['iat'] = $now->getTimestamp();
        $payload['exp'] = $expiration;
     }

    $base64Header = base64_encode(json_encode($header));
    $base64Payload = base64_encode(json_encode($payload));

    $base64Header = str_replace(['+', '/', '='],['-', '_', ''],$base64Header);
    $base64Payload = str_replace(['+', '/', '='],['-', '_', ''],$base64Payload);

    $this->secret_key = base64_encode($this->secret_key);

    $signature = hash_hmac('sha256', $base64Header . '.' . $base64Payload, $this->secret_key, true);
    $base64Signature = base64_encode($signature);
    $signature = str_replace(['+', '/', '='],['-', '_', ''], $base64Signature);

    $jwt = $base64Header . '.' . $base64Payload . '.' . $signature;

    return $jwt;
    }

    public function check(string $token):bool
    {
        $header = $this->getHeader($token);
        $payload = $this->getPayload($token);

        $verifToken = $this->generate($header, $payload, 0);

        return $token !== $verifToken;
    }

     public function getHeader(string $token)
    {
        $array = explode('.', $token);

        $header = json_decode(base64_decode($array[0]), true);

        return $header;
    }

     public function getPayload(string $token)
    {
        $array = explode('.', $token);

        $payload = json_decode(base64_decode($array[1]), true);

        return $payload;
    }

    public function isExpired(string $token)
    {
        $payload = $this->getPayload($token);
        return $payload['exp'] < (new DateTime('+180 seconds'))->getTimestamp();
        //return true;
    }

    public function isValid($token){
        return preg_match('/^[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+\.[a-zA-Z0-9\-\_\=]+$/', $token) === 1;
    }

}

?>