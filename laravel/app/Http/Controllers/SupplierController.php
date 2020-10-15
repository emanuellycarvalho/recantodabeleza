<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FornecedorProduto;
use App\Models\ModelProduct;
use App\Http\Requests\SupplierRequest;
use App\Models\ModelSupplier;

class SupplierController extends Controller
{

    protected  $objSupplier;
    protected  $objProduct;
    protected  $fornecedorProduto;

    public function __construct(){
        $this->objSupplier = new ModelSupplier();
        $this->objProduct = new ModelProduct();
        $this->fornecedorProduto = new FornecedorProduto();
    }
    public function index()
    {
        $suppliers = $this->objSupplier->paginate(5);
        return view('suppliers',['suppliers' => $suppliers]);
    }
  
    public function create()
    {
        try{
            $products = $this->objProduct->all();
            return view('newSupplier')->with(compact('products'));
        }catch(Excepcion $e){
            abort(401, $e->getMessage());
        }
    }
  
    public function store(SupplierRequest $request)
    {
        try {
            $fornecedor = $this->objSupplier->create([
                'nmFornecedor' =>$request->nome,
                'cnpj' => $request->cnpj,
                'telefone'  => $request->telefone,
                'email' => $request->email
            ]);
            
            $produtos = $request->product_id;
            //dd($funcionarios);
            for($i = 0; $i < sizeof($produtos); $i++){
            $fornecedor->relProduct()->attach($produtos[$i]);
        }
        
        return redirect('adm/supplier');
        
        } catch (Exception $e){
            abort(401, $e->getMessage());
        }

    }
  
    public function show($id)
    {
        $sup = $this->objSupplier->where('cdFornecedor', $id)->first();
        
        $rel = $this->fornecedorProduto->where('cdFornecedor', $id)->get();
        $rel = $this->menageRelationship($rel);
        return view('showSupplier')->with(compact('sup'))
                                   ->with(compact('rel'));
    }
  
    public function edit($id)
    {
        $sup = $this->objSupplier->where('cdFornecedor', $id)->first();
        
        $rel = $this->fornecedorProduto->where('cdFornecedor', $id)->get();
        $rel = $this->menageRelationship($rel);

        $products = $this->objProduct->all();
        return view('newSupplier')->with(compact('sup'))
                                  ->with(compact('products'))
                                  ->with(compact('rel'));
    }
  
    public function update(SupplierRequest $request, $id)
    {
        try {
            $this->objSupplier->where('cdFornecedor', $id)->update([
                'nmFornecedor' => $request->nome,
                'cnpj' => $request->cnpj,
                'telefone'  => $request->telefone,
                'email' => $request->email
            ]);
            
            $produtos = $request->product_id;
            for($i = 0; $i < sizeof($produtos); $i++){
                $this->fornecedorProdutos->insert([
                    'cdFornecedor' => $id, 
                    'cdProduto' => $produtos[$i] 
                ]);
            }
        
            return redirect('adm/supplier');

            } catch (Exception $e){
                abort(401, $e->getMessage());
            }

    }
  
    public function destroy($id)
    {
        $del = $this->objSupplier->where('cdFornecedor', $id)->delete();
    }

    
    protected function menageRelationship($rel){
        if($rel != null){
            $return = [];
            foreach($rel as $r){
                $re = new \stdClass();
                $product = $this->objProduct->where('cdProduto', $r->cdProduto)->first();
                $re->cdProduto = $product->cdProduto;
                $re->nmProduto = $product->nmProduto;
    
                array_push($return, $re);
            }
            //dd($return);
            return $return;
        }  else {
            throw new \Exception('Desculpe, ocorreu um erro ao recuperar os funcionarios deste servico.');
        }
    }
    
    public function getCNPJs(){
        return $this->objSupplier->whereNotNull('cnpj')->get(); 
    }

    public function getEmails(){
        return $this->objSupplier->whereNotNull('email')->get(); 
    }
} 
