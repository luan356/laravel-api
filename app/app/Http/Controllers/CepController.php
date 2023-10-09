<?php

namespace App\Http\Controllers;

use App\Models\Cep;
use App\Services\ViaCep;
use Illuminate\Http\Request;

class CepController extends Controller{

    protected $model;
    public function __construct(Cep $cep){
        $this->model =$cep;
    }
   
    public function index($id=null){
        $postalCode= new ViaCep();
        $dd =$postalCode->getCep($id);
        // $cep = $this->model->find($dd['cep']);    
        
        //vai retornar tudo que estiver dentro da tabela
        if ($id === null) {
            return response($this->model->all());
        }    
        $cep = $this->model->find($dd['cep']);    
         // se $cep for nulo, significa que o registro com o ID especificado não foi encontrado.
        if ($cep === null) {
            return response('id não encontrado', 404); 
        }    
        return response($cep);
    }
   

   


    public function create()
    {
        //
    }

 
    public function store(Request $request){
        try {           
            $this->model->create($request->all());
            return response('postalCode inserido com sucesso');
        } catch (\Throwable $th) {
            throw $th;
        }
    }

   


    public function edit(string $id){
        //
        $cep =$this->model->find($id);
        if(!$cep){
            return response('PostalCode nao Localizado na tabela');
        }
        return response($cep);
    }


    public function update(Request $request, string $id){
        //
        $cep= $this->model->find($id);
        if(!$cep){
            return response('PostalCode nao Localizado na tabela');
        }
        try {
            $dados =$request->all();
            $cep->fill($dados)->save();
        } catch (\Throwable $th) {
            throw $th;
        }
    }


    public function destroy(string $id){
        $cep= $this->model->find($id);
        if(!$cep){
            return response('PostalCode nao Localizado na tabela');
        }
        try {
            $cep->delete();
            return response('PostalCode excluido da tabela');
        } catch (\Throwable $th) {
            throw $th;
        }

    }
}
