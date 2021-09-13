<?php

namespace App\Http\Controllers\Vehicle;

use App\Models\Role;
use App\Models\User;
use App\Models\Package;
use App\Models\Vehicle;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Traits\HasRoles;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $vehicleQuery = vehicle::query();
        $onSearch = false;
        if (request('search-text')) {
            $data = $vehicleQuery->where('vehicle_number', 'Like', '%' . request('search-text') . '%')->paginate(6);
            $onSearch = true;
        } else {
            $data = $vehicleQuery->paginate(6);
        }

        // $data = vehicle::all();
        return view('manage.vehicle.index')->with([
            'data' => $data,
            'isEmpty' => $data->isEmpty(), 
            'onSearch' => $onSearch
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Gate::denies('add-vehicles')){
            abort(403);
        }

        return view ('manage.vehicle.create')->with(['data' => Type::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new vehicle;
        
        $data->vehicle_number=$request->vehicle_number; 

        $data->model=$request->model; 

        $data->milage=$request->milage;
        
        $data->type=$request->type;

        $data->save();
        return redirect()->route('manage.vehicle.index');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        if(Gate::denies('delete-vehicles')){
            abort(403);
        }

        $data=vehicle::find($id);
        $data->delete();
        return redirect()->route('manage.vehicle.index');
    }
}
