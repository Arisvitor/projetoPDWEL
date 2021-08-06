<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\CustomerRequest;


class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *  @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('search')) {
            $search = $request->get('search');
            $clientes = Cliente::where('nome', 'like', "%{$search}%")
                ->orWhere('sobrenome', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%")
                ->orWhere('telefone', 'like', "%{$search}%")
                ->orWhere('endereco', 'like', "%{$search}%")
                ->paginate(10);

            $clientes->appends(['search' => $search]);
            return view('clientes.grid', compact('clientes', 'search'));
        } else {
            $clientes = Cliente::paginate(10);
            return view('cliente.grid', compact('cliente'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteRequest $request)
    {
        $cliente = Cliente::create($request->all());

        if ($customer) {

            Session::flash('success', "Registro #{$cliente->id}  salvo com êxito");
            return redirect()->route('clientes.index');
        }
        return redirect()->back()->withErrors(['error', "Registo não foi salvo."]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
            $cliente = Cliente::findOrFail($id);

        if ($cliente) {
            return view('cliente.form', compact('cliente'));
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteRequest $request, $id)
    {
        $cliente = Cliente::where('id', $id)->update($request->except('_token', '_method'));

        if ($cliente) {

            Session::flash('success', "Registro #{$id} atualizado com êxito");
            return redirect()->route('cliente.index');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$id} não foi encontrado"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cliente = Cliente::where('id', $id)->delete();

        if ($cliente) {
            Session::flash('success', "Registro #{$id} excluído com êxito");
            return redirect()->route('clientes.index');
        }
        return redirect()->back()->withErrors(['error', "Registo #{$id} não pode ser excluído"]);
    }
}
