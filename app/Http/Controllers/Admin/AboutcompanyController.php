<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateAboutcompany;
use App\Http\Requests\Admin\UpdateAboutcompany;
use App\Models\Aboutcompany;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutcompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aboutcompanies = Aboutcompany::orderBy('created_at', 'DESC')->get();
        return view('admin.aboutcompany.index', compact('aboutcompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.aboutcompany.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\Admin\CreateAboutcompany  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAboutcompany $request)
    {
        $data = $request->all();
        $data['image'] = Aboutcompany::uploadImage($request);

        if (Aboutcompany::create($data)) {
            return redirect()->route('aboutcompany.index')->with('message', "About created successfully");
        }
        return redirect()->route('aboutcompany.index')->with('message', "unable to create about");
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
        $aboutcompany = Aboutcompany::find($id);
        return view('admin.aboutcompany.edit', compact('aboutcompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateAboutcompany  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAboutcompany $request, $id)
    {
        $aboutcompany = Aboutcompany::find($id);

        $data = $request->all();
        $data['image'] = Aboutcompany::updateImage($request, $aboutcompany);

        if ($aboutcompany->update($data)) {
            return redirect()->route('aboutcompany.index')->with('message', 'changed successfully!!!');
        }

        return redirect()->route('aboutcompany.index')->with('message', 'changed no successfully!!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Aboutcompany::find($id)) {
            return redirect()->route('aboutcompany.index')->with('message', "About not found");
        }

        $aboutcompany = Aboutcompany::find($id);

        if (File::exists(public_path() . $aboutcompany->image)) {
            File::delete(public_path() . $aboutcompany->image);
        }

        if ($aboutcompany->delete()) {
            return redirect()->route('aboutcompany.index')->with('message', "About deleted successfully");
        }

        return redirect()->route('Aboutcompany.index')->with('message', "Unable to delete About");
    }

}
