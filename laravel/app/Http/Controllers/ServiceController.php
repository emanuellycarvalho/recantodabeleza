<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelService;

class ServiceController extends Controller
{
    protected $objService;

    public function __construct() {
        $this->objService = new ModelService();
    }

    
    public function index()    {
        $services = $this->objService->paginate(10);
        return view('services', compact('services'));
    }

    
    public function create()
    {
        return view('newService');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($this->objService->create([
            'descricao'=>$request->descricao,
            'valorServico'=>$request->valorServico,
            'comissao'=>$request->comissao
        ])){
            return redirect('adm/service');
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
        $services = $this->objService->where('cdServico', $id)->first();
        return view('showService', compact('services'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $svc = $this->objService->where('cdServico', $id)->first();
        return view('newService', compact('svc'));
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
        $this->objService->where('cdServico', $id)->update([
                'descricao'=>$request->descricao,
                'valorServico'=>$request->valorServico,
                'comissao'=>$request->comissao
        ]);
        return redirect('adm/service');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=$this->objService->where('cdServico', $id)->delete();
    }
}
