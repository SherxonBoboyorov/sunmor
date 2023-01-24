<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCompanynumber;
use App\Http\Requests\Admin\UpdateCompanynumber;
use App\Models\Companynumber;
use Illuminate\Http\Request;

class CompanynumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companynumbers = Companynumber::orderBy('created_at', 'DESC')->get();
        return view('admin.companynumber.index', compact('companynumbers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companynumber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCompany_number  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCompanynumber $request)
    {
        $data = $request->all();

        if (Companynumber::create($data)) {
            return redirect()->route('companynumber.index')->with('message', "Advantages created successfully");
        }
        return redirect()->route('companynumber.index')->with('message', "unable to created Advantages");
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
        $companynumber = Companynumber::find($id);
        return view('admin.companynumber.edit', compact('companynumber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCompanynumber  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCompanynumber $request, $id)
    {
        $companynumber = Companynumber::find($id);

        $data = $request->all();

        if ($companynumber->update($data)) {
            return redirect()->route('companynumber.index')->with('message', "changed successfully!!!");
        }
        return redirect()->route('companynumber.index')->with('message', "changed no successfully!!!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $companynumber = Companynumber::find($id);

        if ($companynumber->delete()) {
            return redirect()->route('companynumber.index')->with('message', "Advantages deleted successfully");
        }
        return redirect()->route('companynumber.index')->with('message', "Unable to delete Advantages");
    }
}
