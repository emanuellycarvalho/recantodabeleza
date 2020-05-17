<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\ModelProduct;

class ProductController extends Controller
{

    protected  $objProduct;

    public function __construct(){
        $this->objProduct = new ModelProduct();
    }
    public function index()
    {
        $products = $this->objProduct->paginate(10);
        return view('products', compact('products'));
    }

    public function create()
    {
        $etypes = $this->objProduct->all();
        return view('newProduct');
    }

    public function store(ProductRequest $request)
    {   
        $preco = str_replace(',', '.', $request->preco);
        if ($this->objProduct->create([
            'nmProduto' => $request->nome,
            'marca' => $request->marca,
            'descricao' => $request->desc ?? NULL,
            'qtd' => $request->qtd,
            'preco' => $preco,
            'comissao' => $request->comissao,
            'foto' => $foto
            ])){
                return redirect('adm/product');
            } 
    }

    public function show($id)
    {
        $emp = $this->objProduct->where('cdProduto', $id)->first();
        return view('showProduct', compact('emp'));
    }

    public function edit($id)
    {
        $emp = $this->objProduct->where('cdProduto', $id)->first();
        $etypes = $this->objProduct->all();
        return view('newProduct', compact('emp'));
    }
  
    public function update(ProductRequest $request, $id)
    {
        $preco = str_replace(',', '.', $request->preco);
        if ($this->objProduct->where('cdProduto', $id)->update([
            'nmProduto' => $request->nome,
            'marca' => $request->marca,
            'qtd' => $request->qtd,
            'preco' => $preco,
            'comissao' => $comissao,
            'foto' => $foto
        ])){
            return redirect('adm/product');
        }
    }
  
    public function destroy($id)
    {
        $del = $this->objProduct->where('cdProduto', $id)->delete();
    }
  
}
