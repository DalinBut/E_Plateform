<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\ApiController;
use App\Http\Requests\DetailRequest;
use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this -> authorize('viewAny', Detail::class);
        $detail = Detail::all();
        return $this->okWithData($detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $this->authorize('create', Detail::class);
        // return 'Hello';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DetailRequest $request)
    {
        $this->authorize('create', Detail::class);
        $validateData = $request->validated();
        // $detail = Detail::create($request->all());
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $validateData['image'] = "$image_name";
        }
        $detail = auth()->user()->details()->create($request->all());
        // $detail = auth()->user()->details->create($validateData);
        return $this->created([
            'detail' => $detail,
        ], 'Detail has been created successfully');
        // return $detail; 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        $this->authorize('view', Detail::class);
        // $details = auth()->user()->details()->find($detail);
        $detail->find($detail);
        return $detail;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(DetailRequest $request, Detail $detail)
    {
        // $this -> authorize('update', Detail::class);
        $this -> authorize('update', $detail);
        $validateData = $request->validated();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $image_name = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $image_name);
            $validateData['image'] = "$image_name";
        }
        $detail->update($validateData);
        return $this->updated($detail);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $this->authorize('delete', $detail);
        $detail->delete();
        return $this->deleted($detail);
    }
}
