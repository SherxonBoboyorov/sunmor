<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCompanycarrer;
use App\Http\Requests\Admin\UpdateCompanycarrer;
use App\Models\Companycarrer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanycarrerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companycarrers = Companycarrer::orderBy('created_at', 'DESC')->get();
        return view('admin.companycarrer.index', compact('companycarrers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companycarrer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCompanycarrer  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanycarrer $request)
    {
        // $data = $request->all();
        // $data['image'] = Companycarrer::uploadImage($data);

        // if(Companycarrer::create($data)) {
        //      return redirect()->route('companycarrer.index')->with('message', "Carrer created successfully");
        // }
        // return redirect()->route('companycarrer.index')->with('message', "Unable to create Career");
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
        $companycarrer = Companycarrer::find($id);
        return view('admin.companycarrer.edit', compact('companycarrer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCompanycarrer  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanycarrer $request, $id)
    {
        $companycarrer = Companycarrer::find($id);

        $data = $request->all();
        $data['image'] = Companycarrer::updateImage($request, $companycarrer);

        if ($companycarrer->update($data)) {
            return redirect()->route('companycarrer.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('companycarrer.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // if (!Companycarrer::find($id)) {
        //     return redirect()->route('companycarrer.index')->with('message', "Carrer not found");
        // }

        // $companycarrer = Companycarrer::find($id);

        // if (File::exists(public_path() . $companycarrer->image)) {
        //     File::delete(public_path() . $companycarrer->image);
        // }

        // if ($companycarrer->delete()) {
        //     return redirect()->route('companycarrer.index')->with('message', "Career deleted successfully");
        // }

        // return redirect()->route('companycarrer.index')->with('message', "Career deleted successfully");
    }
}
