<?php

namespace App\Http\Controllers\Package;
use App\Models\Role;
use App\Models\User;
use App\Models\Package;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Traits\HasRoles;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request )
    {
        // $data = package::all();
        // return view('manage.package.index')->with('data',$data);

        $dataQuery = package::query();
        $onSearch = false;
        if (request('search-text')) {
            $data = $dataQuery->where('name', 'Like', '%' . request('search-text') . '%')->paginate(6);
            $onSearch = true;
        } else {
            $data = $dataQuery->paginate(6);
        }
        
        return view('manage.package.index')->with([
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
        if(Gate::denies('add-packages')){
            abort(403);
        }
        return view('manage.package.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'weight' => 'required',
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_address' => 'required'
            
            
        ]);
        $data = new package;
        
        $data->name=$request->name; 

        $data->description=$request->description; 

        $data->weight=$request->weight; 

        $data->price=$request->price; 

        $data->customer_name=$request->customer_name; 

        $data->customer_phone=$request->customer_phone; 

        $data->customer_address=$request->customer_address; 

        $data->save();
        return redirect()->route('manage.package.index');
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
    public function edit(Request $request, $id)
    {
        if(Gate::denies('edit-packages')){
            abort(403);
        }

        $data = package::find($id);
        return view('manage.package.edit')->with('data',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request , $id)
    {
     
        $data=package::find($id); 

        $data->name = $request->name;

        $data->description = $request->description;

        $data->weight = $request->weight;

        $data->price = $request->price;

        $data->customer_name = $request->customer_name;

        $data->customer_phone = $request->customer_phone;

        $data->customer_address = $request->customer_address;
        
        $data->save();
        return redirect()->route('manage.package.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $data=package::find($id);
        $data->delete();
        return redirect()->route('manage.package.index');
    }
}
