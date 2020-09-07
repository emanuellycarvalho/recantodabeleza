<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProductRequest;
use App\Models\ModelProduct;
use Illuminate\Support\Facades\Storage;
use DB;

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
        $request['precoProduto'] = str_replace(',', '.', $request['precoProduto']);
        $request['precoProduto'] = str_replace(' ', '', $request['precoProduto']);

        $data = $request->only('nmProduto', 'marca', 'descricao', 'qtd', 'precoProduto', 'comissao');

        if($request->hasFile('foto') && $request->foto->isValid()) {
            $fotoPath = $request->foto->store('productPhotos');
            $data['foto'] = $fotoPath;
        }
        $this->objProduct->create($data);
        return redirect('adm/product');
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
        $prod=$this->objProduct->where('cdProduto', $id);
        
        $request['precoProduto'] = str_replace(',', '.', $request['precoProduto']);
        $request['precoProduto'] = str_replace(' ', '', $request['precoProduto']);
        // $foto=DB::table('TbProduto')->select('foto')->where('cdProduto', $id)->get();        
        $data = $request->only('nmProduto', 'marca', 'descricao', 'qtd', 'precoProduto', 'comissao');
        
        if($request->hasFile('foto') && $request->foto->isValid()) {   
            $fotoPath = $request->foto->store('productPhotos');
            $data['foto'] = $fotoPath;
        }

        $prod->update($data);
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

}
