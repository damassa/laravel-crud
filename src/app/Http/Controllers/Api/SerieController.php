<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SerieRequest;
use App\Models\Serie;
use Illuminate\Http\Request;
use \Exception;

class SerieController extends Controller
{
    public function index(Request $request)
    {
        $perPage = $request->query('per_page');
        $paginateSeries = Serie::paginate($perPage);
        $paginateSeries->appends([
            'per_page'=>$perPage
        ]);
        return response()->json($paginateSeries);
    }

    public function show($id)
    {
        try{
            return response()->json(Serie::findOrFail($id));
        }catch(\Exception $error){
            $message = [
                "error"=>"Serie id:$id not found.",
                "exception"=>$error->getMessage()
            ];
            $status = 404;
            return response()->json($message,$status);
        }
    }

    public function store(SerieRequest $request)
    {
        try{
            $newSerie = $request->all();
            $storedSerie = Serie::create($newSerie);
            return response()->json([
                'message'=>'Serie inserted.',
                'serie'=>$storedSerie
            ]);
        }catch(Exception $error){
            $message = [
                "Error:"=>"Error while inserting new serie.",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;//bad request
            return response()->json($message,$status);
        }
    }

    public function update(SerieRequest $request, int $id)
    {
        try{
            $data = $request->all();
            $updSerie = Serie::findOrFail($id);
            $updSerie->update($data);
            return response()->json([
                'message'=>'Serie updated.',
                'serie'=>$updSerie
            ]);
        }catch(Exception $error){
            $message = [
                "Error:"=>"Error while updating new serie.",
                "Exception:"=>$error->getMessage()
            ];
            $status = 401;
            return response()->json($message,$status);
        }
    }

    public function remove(int $id)
    {
        $status = 404;
        try {
            if (!Serie::findOrFail($id)->delete()) {
                $status = 500;
                throw new Exception("Error while deleting serie id:$id");
            }
            return response()->json([
                'message' => "Serie id:$id removed."
            ]);
        } catch (Exception $error) {
            $message = [
                "Erro:" => "Error while removing serie.",
                "Exception:" => $error->getMessage()
            ];
            return response()->json($message, $status);
        }
    }

}
