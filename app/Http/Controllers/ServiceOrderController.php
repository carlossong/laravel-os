<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceOrders = ServiceOrder::all();

        return view('order.index',[
            'serviceOrders' => $serviceOrders
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $technical = User::all();

        return view('order.create', [
            'technical' => $technical
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = [
            'client_id' => 'required',
            'responsible_id' => 'required',
        ];
        $request->validate($roles);

        $os = ServiceOrder::create($request->all());
        $os->fill($request->all());
        $os->save();

        return redirect(route('order.index'))->with('success', 'Ordem de Serviço Adicionado com Sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ServiceOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrder $order)
    {
        $client = $order->client()->first();
        $technical = User::all();
        return view('order.edit', [
            'serviceOrder' => $order,
            'technical' => $technical,
            'client' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceOrder  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrder $order)
    {
        ServiceOrder::findOrFail($order->id)->update($request->all());
        return redirect(route('order.index'))->with('success', 'Ordem de Serviço Atualizada com Sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOrder $serviceOrder)
    {
        //
    }

    public function delete($id)
    {
        $delete = ServiceOrder::destroy($id);

        // check data deleted or not
        if ($delete == 1) {
            $success = true;
            $message = "Ordem de Serviço Removida";
        } else {
            $success = true;
            $message = "Não foi Possível Apagar O.S";
        }

        //  return response
        return response()->json([
            'success' => $success,
            'message' => $message,
        ]);
    }

    /*
   AJAX request
   */
    public function searchClient(Request $request){

        $search = $request->search;

        if($search == ''){
            $client_id = Client::orderby('name','asc')->select('id','name')->limit(5)->get();
        }else{
            $client_id = Client::orderby('name','asc')->select('id','name')->where('name', 'like', '%' .$search . '%')->limit(5)->get();
        }

        $response = array();
        foreach($client_id as $employee){
            $response[] = array("value"=>$employee->id,"label"=>$employee->name);
        }

        return response()->json($response);
    }
}
