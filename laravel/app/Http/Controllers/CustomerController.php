<?php

namespace App\Http\Controllers;

use App\Models\ModelCustomer;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{

    protected $objCustomer;

    public function __construct() {
        $this->objCustomer = new ModelCustomer();
    }

    public function index()
    {
        $customers = $this->objCustomer->paginate(5);
        return view('customers', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('newCustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        $cepResponse = cep($request->cep);
        if ($cepResponse->isOk()){
            $data = $cepResponse->getCepModel();
            //return $data;
        } else {
            $errorCEP = "O CEP informado é inválido!";  
        }
        
        $dtNasc = NULL;

        if (isset($request->dtNasc)){
            $dtNasc = explode( '/' , $request->dtNasc);
            $dtNasc = $dtNasc[2] . '-' . $dtNasc[1] . '-' . $dtNasc[0];
        }
        //return $dtNasc;
        
        $data = $request->only('nmCliente', 'sexo', 'telefone', 'email', 'senha', 'rua', 'numero', 'complemento', 'bairro', 'cep', 'rg', 'cidade');
        $data['dtNasc']=$dtNasc;

        if($request->hasFile('foto') && $request->foto->isValid()) {
            $fotoPath = $request->foto->store('customerPhotos');
            $data['foto'] = $fotoPath;
        }

        $this->objCustomer->create($data);
        return redirect('adm/customer');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customers = $this->objCustomer->where('cdCliente', $id)->first();
        return view('showCustomer', compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cust = $this->objCustomer->where('cdCliente', $id)->first();
        return view('newCustomer', compact('cust'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        $cust=$this->objCustomer->where('cdCliente', $id); 
        $cepResponse = cep($request->cep);
        if ($cepResponse->isOk()){
            $data = $cepResponse->getCepModel();
            //return $data;
        } else {
            $errorCEP = "O CEP informado é inválido!";  
        }
        
        $dtNasc = NULL;

        if (isset($request->dtNasc)){
            $dtNasc = explode( '/' , $request->dtNasc);
            $dtNasc = $dtNasc[2] . '-' . $dtNasc[1] . '-' . $dtNasc[0];
        }
        //return $dtNasc;
        
        $data = $request->only('nmCliente', 'sexo', 'telefone', 'email', 'senha', 'rua', 'numero', 'complemento', 'bairro', 'cep', 'rg', 'cidade');
        $data['dtNasc']=$dtNasc;

        if($request->hasFile('foto') && $request->foto->isValid()) {
            $fotoPath = $request->foto->store('customerPhotos');
            $data['foto'] = $fotoPath;
        }

        $cust->update($data);        
        return redirect('adm/customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del = $this->objCustomer->where('cdCliente', $id)->delete();
    }
}
