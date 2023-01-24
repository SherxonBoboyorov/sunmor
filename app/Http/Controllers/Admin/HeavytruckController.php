<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateHeavytruck;
use App\Http\Requests\Admin\UpdateHeavytruck;
use App\Models\Heavytruck;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class HeavytruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heavytrucks = Heavytruck::orderBy('created_at', 'DESC')->get();
        return view('admin.heavytruck.index', compact('heavytrucks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.heavytruck.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateHeavytruck  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateHeavytruck $request)
    {
        $data = $request->all();
        $data['image'] = Heavytruck::uploadImage($request);
        $data['slug_en'] = Str::slug($request->truck_name_en, '-', 'en');
        $data['slug_es'] = Str::slug($request->truck_name_es, '-', 'es');

        if (Heavytruck::create($data)) {
            return redirect()->route('heavytruck.index')->with('message', "Trucks created successfully");
        }
        return redirect()->route('heavytruck.index')->with('message', "unable to created Truck");
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
        $heavytruck = Heavytruck::find($id);
        return view('admin.heavytruck.edit', compact('heavytruck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateHeavytruck  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHeavytruck $request, $id)
    {
        $heavytruck = Heavytruck::find($id);

        $data = $request->all();
        $data['image'] = Heavytruck::updateImage($request, $heavytruck);
        $data['slug_en'] = Str::slug($request->truck_name_en, '-', 'en');
        $data['slug_es'] = Str::slug($request->truck_name_es, '-', 'es');

        if ($heavytruck->update($data)) {
            return redirect()->route('heavytruck.index')->with('message', "changed successfully!!!");
        }
        return redirect()->route('heavytruck.index')->with('message', "changed no successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Heavytruck::find($id)) {
            return redirect()->route('heavytruck.index')->with('message', "Truck not found");
        }

        $heavytruck = Heavytruck::find($id);

        if (File::exists(public_path() . $heavytruck->image)) {
            File::delete(public_path() . $heavytruck->image);
        }

        if ($heavytruck->delete()) {
            return redirect()->route('heavytruck.index')->with('message', "Truck deleted successfully");
        }

        return redirect()->route('heavytruck.index')->with('message', "Unable to delete Truck");
    }
}
