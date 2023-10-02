<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Logs;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\LogResource;

class LogController extends Controller
{
    use HttpResponses;

    public function index()
    {
        return LogResource::collection(Logs::all());
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loja' => 'max:100',
            'host' => 'max:100',
            'ip' => 'nullable',
            'down' => 'nullable',
            'up' => 'nullable',
            'datahora' => 'required',
            'marca' => 'nullable'
        ]);

        if ($validator->fails()) {
            return $this->error('Dados invalidos', 422, $validator->errors());   
        }

        $created = Logs::create($validator->validated());

        if ($created){
            return $this->response('Cadastrado com sucesso', 200, $created); 
        }

        return $this->error('Algo deu errado', 4200); 
    }

    public function show(string $id)
    {
        return new LogResource(Logs::where('id', $id)->first());
    }


    // public function update(Request $request, string $id)
    // {
    //     $validator = Validator::make($request->all(), [
    //         'loja' => 'required|max:100',
    //         'host' => 'required|max:100',
    //         'ip' => 'nullable',
    //         'down' => 'nullable',
    //         'up' => 'nullable',
    //         'datahora' => 'required'
    //     ]);

    //     if($validator->fails()){
    //         return $this->error('Falha na validação', 422, $validator->errors());
    //     }

    //     $validated = $validator->validated();

    //     $updated = Logs::find($id)->update([
    //         'loja' => $validated['loja'],
    //         'host' => $validated['host'],
    //         'ip' => $validated['ip'],
    //         'down' => $validated['down'],
    //         'up' => $validated['up'],
    //         'datahora' => $validated['datahora']
    //     ]);

    //     if ($updated) {
    //         return $this->response('Atualizado', 200, $request->all());
    //     }

    //     return $this->error('Houve um erro e não foi possível atualizar', 400);
    // }

}
