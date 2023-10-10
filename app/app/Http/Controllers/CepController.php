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
        // se $cep for nulo, significa que o registro com o ID especificado não foi encontrado.
        $cep = $this->model->where('cep',$id)->first();    
      
        //vai retornar tudo que estiver dentro da tabela
        if ($id === null) {
            //é necessario que o cep tenha hifen
            return response($this->model->all());
        }    
        if ($cep === null) {
           $this->store($id);
           return response('Cep inserido com sucesso');

        }    
        return response($cep);
    }
   

   


    public function create()
    {
        //
    }

 
    public function store($id){
        $postalCode= new ViaCep();
        $postalCode =$postalCode->getCep($id);
        try {           
            // $this->model->create($request->all());
            $this->model->create($postalCode);
            return response('Cep inserido com sucesso');
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
