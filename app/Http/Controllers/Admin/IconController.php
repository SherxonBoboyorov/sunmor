<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateIcon;
use App\Http\Requests\Admin\UpdateIcon;
use App\Models\Icon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class IconController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $icons = Icon::orderBy('created_at', 'DESC')->get();
        return view('admin.Icon.index', compact('icons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Icon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Request\Admin\CreateIcon  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateIcon $request)
    {
        $data = $request->all();
        $data['image'] = Icon::uploadImage($request);

        if (Icon::create($data)) {
            return redirect()->route('icon.index')->with('message', "Icon created successfully");
        }
        return redirect()->route('icon.index')->with('message', "unable to create icon");

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
        $icon = Icon::find($id);
        return view('admin.Icon.edit', compact('icon'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\Admin\UpdateIcon  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateIcon $request, $id)
    {
        $icon = Icon::find($id);

        $data = $request->all();
        $data['image'] = Icon::updateImage($request, $icon);

        if ($icon->update($data)) {
            return redirect()->route('icon.index')->with('message', 'changed successfully!!!');
        }
        return redirect()->route('icon.index')->with('message', 'changed no successfully!!!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!Icon::find($id)) {
            return redirect()->route('icon.index')->with('message', "Icon not found");
        }

        $icon = Icon::find($id);

        if (File::exists(public_path() . $icon->image)) {
            File::delete(public_path() . $icon->image);
        }

        if ($icon->delete()) {
            return redirect()->route('icon.index')->with('message', "Icon deleted successfully");
        }

        return redirect()->route('icon.index')->with('message', "Unable to delete Icon");
    }
}
