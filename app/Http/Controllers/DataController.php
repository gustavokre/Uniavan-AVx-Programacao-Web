<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;

class DataController extends Controller
{
    public function getData(Request $r)
    {

        try
        {
            date_default_timezone_set('America/Sao_Paulo');

            $data = date("d-m-Y H:i:s");  
            $re = '/([0-9]{2})-([0-9]{2})-([0-9]{4}).(([0-9]{2}:?){3})/';
            preg_match_all($re, $data, $matches, PREG_SET_ORDER, 0);
    
            foreach ($matches as $res){
                $dia = $res[1];
                $mes = $res[2];
                $ano = $res[3];
                $horario = $res[4];
            }
    
            return response()->json(
                [
                    "dia" => $dia,
                    "mes" => $mes,
                    "ano" => $ano,
                    "horario" => $horario
                ]
                , 200);
                
        } catch(Exception $e)
        {
            return response()->json(["erro" => $e->getMessage()], 500);
        }

    }
}
