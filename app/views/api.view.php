<?php

class ApiView {

    public function response($data, $status = 200) {
        header("Content-Type: application/json");
        header("HTTP/1.1 " . $status . " " . $this->_requestStatus($status));
        
        // convierte los datos a un formato json
        echo json_encode($data);
    }

    // codigos de respuesta
    private function _requestStatus($code){
        $status = array(
          200 => "OK",  //Successful Responses
          201 => "Created", //Successful Responses
          400 => "Bad request",  // Client Error Responses (400-499)
          404 => "Not found", // Client Error Responses (400-499)
          500 => "Internal Server Error" // Server Error Responses (500-599)
        );
        return (isset($status[$code])) ? $status[$code] : $status[500];
      }
  
}