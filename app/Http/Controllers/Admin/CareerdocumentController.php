<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateCareerdocument;
use App\Http\Requests\Admin\UpdateCareerdocument;
use App\Models\Careerdocument;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CareerdocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $careerdocuments = Careerdocument::orderBy('created_at', 'DESC')->get();
        return view('admin.careerdocument.index', compact('careerdocuments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.careerdocument.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateCareerdocument $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateCareerdocument $request)
    {
        $data = $request->all();

        $data['image'] = Careerdocument::uploadImage($request);

        if (Careerdocument::create($data)) {
            return redirect()->route('careerdocument.index')->with('message', "Carrer document created successfully");
        }
        return redirect()->route('careerdocument.index')->with('message', "Unable to create Career document");

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
        $careerdocument = Careerdocument::find($id);
        return view('admin.careerdocument.edit', compact('careerdocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateCareerdocument  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCareerdocument $request, $id)
    {
        $careerdocument = Careerdocument::find($id);

        $data = $request->all();
        $data['image'] = Careerdocument::updateImage($request, $careerdocument);

        if ($careerdocument->update($data)) {
            return redirect()->route('careerdocument.index')->with('message', "changed successfully!!!");
        }
        return redirect()->route('careerdocument.index')->with('message', "changed no successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Careerdocument::find($id)) {
            return redirect()->route('careerdocument.index')->with('message', "News not found");
        }

        $careerdocument = Careerdocument::find($id);

        if (File::exists(public_path() . $careerdocument->image)) {
            File::delete(public_path() . $careerdocument->image);
        }

        if ($careerdocument->delete()) {
            return redirect()->route('careerdocument.index')->with('message', "Career document deleted successfully");
        }

        return redirect()->route('careerdocument.index')->with('message', "Unable to delete Career document");
    }
}
