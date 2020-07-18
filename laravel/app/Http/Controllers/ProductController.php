<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\ModelProduct;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $objProduct;
    
    public function __construct() {
        $this->objProduct = new ModelProduct();
    }

    public function index()
    {
        $products = $this->objProduct->paginate(5);
        return view('products', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newProduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($this->objProduct->create([
            'nmProduto'=>$request->nmProduto,
            'marca'=>$request->marca,
            'descricao'=>$request->descricao,
            'qtd'=>$request->qtd,
            'precoProduto'=>$request->precoProduto,
            'comissao'=>$request->comissao,
            'foto'=>$request->foto
        ])){
            return redirect('adm/product');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = $this->objProduct->where('cdProduto', $id)->first();
        return view ('showProduct', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $prod=$this->objProduct->where('cdProduto', $id)->first();
        return view('newProduct', compact('prod'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $this->objProduct->where('cdProduto', $id)->update([
            'nmProduto'=>$request->nmProduto,
            'marca'=>$request->marca,
            'descricao'=>$request->descricao,
            'qtd'=>$request->qtd,
            'precoProduto'=>$request->precoProduto,
            'comissao'=>$request->comissao,
            'foto'=>$request->foto
        ]);
        return redirect('adm/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objProduct->where('cdProduto', $id)->delete();
    }

    public function uploadPhoto($photo){
        $extensao = explode('.', $photo['name']);
        $extensao = end($extensao);
        $nomeArquivo = uniqid() . '.' . $extensao;
        move_uploaded_file($arquivo["tmp_name"],"fotos/" . $nomeArquivo);

        return $nomeArquivo;
    }
}
