<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SupplierRequest;
use App\Models\ModelSupplier;

class SupplierController extends Controller
{

    protected  $objSupplier;

    public function __construct(){
        $this->objSupplier = new ModelSupplier();
    }
    public function index()
    {
        $suppliers = $this->objSupplier->paginate(5);
        return view('suppliers',['suppliers' => $suppliers]);
    }
  
    public function create()
    {
        return view('newSupplier');
    }
  
    public function store(SupplierRequest $request)
    {
        if ($this->objSupplier->create([
            'nmFornecedor' => $request->nome,
            'cnpj' => $request->cnpj,
            'telefone'  => $request->telefone,
            'email' => $request->email
            ])){
                return redirect('adm/supplier');
            }
        /*
        $supplier = new Supplier;
        $supplier->nome = $request->nome;
        $supplier->cnpj = $request->cnjp;
        $supplier->telefone = $request->telefone;
        $supplier->email = $request->email;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('message', 'supplier created successfully!');
        */
    }
  
    public function show($id)
    {
        $sup = $this->objSupplier->where('cdFornecedor', $id)->first();
        return view('showSupplier', compact('sup'));
    }
  
    public function edit($id)
    {
        $sup = $this->objSupplier->where('cdFornecedor', $id)->first();
        //$suppliers = SupplierController::findOrFail($id);
        return view('newSupplier',compact('sup'));
    }
  
    public function update(SupplierRequest $request, $id)
    {
        if ($this->objSupplier->where('cdFornecedor', $id)->update([
            'nmFornecedor' => $request->nome,
            'cnpj' => $request->cnpj,
            'telefone'  => $request->telefone,
            'email' => $request->email
        ])){
            return redirect('adm/supplier');
        } 
       

        /*
        $supplier = SupplierController::findOrFail($id);
        $supplier->name        = $request->name;
        $supplier->description = $request->description;
        $supplier->quantity    = $request->quantity;
        $supplier->price       = $request->price;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('message', 'supplier updated successfully!');
        */
    }
  
    public function destroy($id)
    {

        $del = $this->objSupplier->where('cdFornecedor', $id)->delete();
        /*
        $supplier = SupplierController::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('alert-success','supplier hasbeen deleted!');
        */
    }
    
}
