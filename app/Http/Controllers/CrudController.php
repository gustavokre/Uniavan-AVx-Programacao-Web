<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{

    public function select()
    {

        try 
        {
            $res = DB::table('pessoas')->get();
            return response()->json($res, 200);

        } catch (\Exception $e)
        {
          return response()->json(['msg' => $e], 500);
        }
 
    }

    public function inserir(Request $request)
    {
        try 
        {
            $r = $request->all();
            DB::table('pessoas')->insert(
                [
                    'nome' => $r['nome'],
                    'profissao' => $r['profissao'],
                    'idade' => $r['idade'],
                ]
            );

            return response('', 200);
        } catch (\Exception $e)
        {
            return response()->json(['msg' => $e], 500);
        }

    }

    public function update(Request $request)
    {
        try 
        {
            $r = $request->all();
            DB::table('pessoas')
            ->where("pessoa_id", $r['pessoa_id'])
            ->update(["nome" => $r['nome'], "profissao" => $r['profissao'], "idade" => $r['idade']]);

            return response('', 200);
        } catch (\Exception $e)
        {
            return response()->json(['msg' => $e], 500);
        }
    }

    public function deletar(Request $request)
    {
        try 
        {
            $r = $request->all();
            DB::table('pessoas')->where('pessoa_id', $r['pessoa_id'])->delete();
            return response('', 200);

        } catch (\Exception $e)
        {
            return response()->json(['msg' => $e], 500);
        }

    }
    
}
