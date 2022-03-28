<?php

namespace App\Http\Controllers;

use App\Models\owner;
use App\Http\Requests\StoreownerRequest;
use App\Http\Requests\UpdateownerRequest;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
			return view('owner.index', [
					'owners' => owner::Paginate(5)
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owner.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\StoreownerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreownerRequest $request)
    {
			owner::create($request->validated());

			return redirect()->route('owners');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(owner $owner)
    {
			return view('owner.edit', [
					'owner' => $owner
			]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateownerRequest  $request
     * @param  \App\Models\owner  $owner
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateownerRequest $request, $id)
    {
			$owner = owner::find($id);
			$owner->name = $request->name;
			$owner->save();

			return redirect()->route('owners');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
			owner::findorfail($id)->delete();
			return redirect()->route('owners');
    }
}
