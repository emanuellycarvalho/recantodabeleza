<?php

namespace App\Http\Controllers;

use App\Models\ModelCustomer;
use Illuminate\Http\CustomerRequest;

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
        if($this->objNome->create([
            'cdCliente'=>$request->cdCliente,
            'nmCliente'=>$request->nmCliente,
            'sexo'=>$request->sexo,
            'telefone'=>$request->telefone,
            'dtNasc'=>$request->dtNasc,
            'email'=>$request->email,
            'senha'=>$request->senha,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'bairro'=>$request->bairro,
            'cep'=>$request->cep,
            'rg'=>$request->rg,
            'cidade'=>$request->cidade,
            'foto'=>$request->foto
        ])) {
            return view('customers');
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
        $cust = $this->objCustomer->where('cdCliente', $id)->first();
        return view('showCustomer', compact('cust'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cust = $this->objNome1->where('cust', $id)->first();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->objNome->where('cdCliente', $id)->update([
            'cdCliente'=>$request->cdCliente,
            'nmCliente'=>$request->nmCliente,
            'sexo'=>$request->sexo,
            'telefone'=>$request->telefone,
            'dtNasc'=>$request->dtNasc,
            'email'=>$request->email,
            'senha'=>$request->senha,
            'rua'=>$request->rua,
            'numero'=>$request->numero,
            'complemento'=>$request->complemento,
            'bairro'=>$request->bairro,
            'cep'=>$request->cep,
            'rg'=>$request->rg,
            'cidade'=>$request->cidade,
            'foto'=>$request->foto
        ]);

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
