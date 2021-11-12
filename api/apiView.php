<?php

    class apiView{
     
        public function response($data, $code=200){ //Convierte la información que recibe al formato JSON
            //Header que describe la respuesta
            header("Content-Type: application/json");
            //Header codigo de rta
            header("HTTP/1.1 " . $code . " " . $this->requestStatus($code));
            echo json_encode($data);
            
        }

        /* Devuelve el codigo asociado a un codigo de respuesta. 
         */

        private function requestStatus($code){
            $status = array(
                200 => "OK",
                404 => "Not found",
                500 => "Internal Server Error"
              );
              return (isset($status[$code]))? $status[$code] : $status[500];
            }

        
    }
?>