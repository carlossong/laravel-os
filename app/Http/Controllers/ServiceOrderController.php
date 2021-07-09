<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\ServiceOrder;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServiceOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $serviceOrders = DB::table('service_orders')
            ->orderByRaw('id DESC')
            ->get();

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

        $os = ServiceOrder::create($request->all());
        $os->fill($request->all());
        $os->save();

        return redirect(route('os.index'));
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
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(ServiceOrder $serviceOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ServiceOrder  $serviceOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ServiceOrder $serviceOrder)
    {
        //
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
            $message = "User deleted successfully";
        } else {
            $success = true;
            $message = "User not found";
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
