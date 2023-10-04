<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Capturas;
use Illuminate\Http\Request;
use App\Traits\HttpResponses;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\V1\CapturaResource;

class CapturaController extends Controller
{
    use HttpResponses;
    
    public function index()
    {
        return CapturaResource::collection(Capturas::all());
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'loja' => 'required|max:100',
            'host' => 'required|max:100',
            'ip' => 'nullable',
            'down' => 'nullable',
            'up' => 'nullable',
            'datahora' => 'required'
        ]);

        if ($validator->fails()) {
            return $this->error('Dados inválidos', 422, $validator->errors());   
        }

        $created = Capturas::create($validator->validated());

        if ($created){
            return $this->response('Cadastrado com sucesso', 200, $created); 
        }

        return $this->error('Algo deu errado', 4200); 
    }

 
    public function show(string $id)
    {
        return new CapturaResource(Capturas::where('id', $id)->first());
    }

    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'loja' => 'max:100',
            'host' => 'nullable',
            'ip' => 'nullable',
            'down' => 'nullable',
            'up' => 'nullable',
            'datahora' => 'required'
        ]);

        if($validator->fails()){
            return $this->error('Falha na validação', 422, $validator->errors());
        }

        $validated = $validator->validated();

        $updated = Capturas::find($id)->update([
            'loja' => $validated['loja'],
            'host' => $validated['host'],
            'ip' => $validated['ip'],
            'down' => $validated['down'],
            'up' => $validated['up'],
            'datahora' => $validated['datahora']
        ]);

        if ($updated) {
            return $this->response('Atualizado', 200, $request->all());
        }

        return $this->error('Houve um erro e não foi possível atualizar', 400);
    }

}
