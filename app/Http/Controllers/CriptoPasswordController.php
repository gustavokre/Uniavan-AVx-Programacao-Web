<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CriptoPasswordController extends Controller
{
    public function generateHash(Request $r)
    {
        try
        {
            $md5 = md5($r->password);
            $sha1 = sha1($r->password);
            return response()->json(["md5" => $md5, "sha1" => $sha1], 200);
                
        } catch(\Exception $e)
        {
            return response()->json(["erro" => $e->getMessage()], 500);
        }
    }
}
