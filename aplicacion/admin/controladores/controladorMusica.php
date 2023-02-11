<?php


    class controladorMusica {


        public static function mostrarLogin(){

            VistaLogin::mostrarLogin();
        }

        public static function texto(){        


            VistaApiMusica::render();

        }

        public static function login($email, $password){
           
            require_once('vendor/autoload.php');

        try{
            $client = new \GuzzleHttp\Client();

            //Vendría del textare

            $response = $client->request('POST', 'http://nodeapi:3000/api/login', [
                'body' => '{"email": "'.$email.'", "password": "' . $password . '"}',
                'headers' => [
                    'Authorization' => 'Bearer',
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ],
            ]);

            $respuesta = $response->getBody();

            $respuestaJSON = json_decode($respuesta, true);

            $token = $respuestaJSON['token'];

            $_SESSION["token"] = $token;


            echo "<script>window.location='enrutador.php?accion=mostrarCancion'</script>";
            

        }catch(Exception $e){
            echo "<script>window.location='enrutador.php?accion=inicio'</script>";
        
        }

            
        }

        public static function puntuar($puntuacion, $id){

            require_once('vendor/autoload.php');

        
            $client = new \GuzzleHttp\Client();

            //Vendría del textare

            $response = $client->request('PUT', 'http://nodeapi:3000/api/songs/up/'.$id.'', [
                'body' => '{"puntuacion": "'.$puntuacion.'"}',
                'headers' => [
                    'Authorization' => $_SESSION['token'],
                    'accept' => 'application/json',
                    'content-type' => 'application/json',
                ],
            ]);


            echo "<script>window.location='enrutador.php?accion=mostrarCancion'</script>";
                  
        }

        public static function topRated(){
            VistaTopRated::render();
        }
        
        
    }
