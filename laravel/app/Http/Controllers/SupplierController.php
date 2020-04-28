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
        $suppliers = $this->objSupplier->all()->sortBy('cdFornecedor');
        return view('suppliers',['suppliers' => $suppliers]);
    }
  
    public function create()
    {
        return view('newSupplier');
    }
  
    public function store(SupplierRequest $request)
    {
        if ($this->objSupplier->create([
            'nmFornecedor' => $request->nmFornecedor,
            'cnpj' => $request->cnpj,
            'telefone'  => $request->telefone,
            'email' => $request->email
            ])){
                return redirect('adm/supplier');
            }
        /*
        $supplier = new Supplier;
        $supplier->nmFornecedor = $request->nmFornecedor;
        $supplier->cnpj = $request->cnjp;
        $supplier->telefone = $request->telefone;
        $supplier->email = $request->email;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('message', 'supplier created successfully!');
        */
    }
  
    public function show($id)
    {
        //
    }
  
    public function edit($id)
    {
        $supplier = supplier::findOrFail($id);
        return view('suppliers.edit',compact('supplier'));
    }
  
    public function update(SupplierRequest $request, $id)
    {
        $supplier = supplier::findOrFail($id);
        $supplier->name        = $request->name;
        $supplier->description = $request->description;
        $supplier->quantity    = $request->quantity;
        $supplier->price       = $request->price;
        $supplier->save();
        return redirect()->route('suppliers.index')->with('message', 'supplier updated successfully!');
    }
  
    public function destroy($id)
    {
        $supplier = supplier::findOrFail($id);
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('alert-success','supplier hasbeen deleted!');
    }
    
}
