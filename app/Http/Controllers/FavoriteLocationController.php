<?php

namespace App\Http\Controllers;

use App\Models\FavoriteLocation;
use App\Http\Requests\StoreFavoriteLocationRequest;
use App\Http\Requests\UpdateFavoriteLocationRequest;

class FavoriteLocationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('favoritelocations.index', [
            'favoritelocations' => auth()->user()->favoriteLocations()->get()->sortBy('name'),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('favoritelocations.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFavoriteLocationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFavoriteLocationRequest $request)
    {
        $validated = $request->validated();
FavoriteLocation::create($validated);
        return redirect(route('dashboard'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FavoriteLocation  $favoriteLocation
     * @return \Illuminate\Http\Response
     */
    public function show(FavoriteLocation $favoriteLocation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FavoriteLocation  $favoriteLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(FavoriteLocation $favoriteLocation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteLocationRequest  $request
     * @param  \App\Models\FavoriteLocation  $favoriteLocation
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteLocationRequest $request, FavoriteLocation $favoriteLocation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FavoriteLocation  $favoriteLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy(FavoriteLocation $favoritelocation)
    {
        $favoritelocation->delete();
        return redirect(route('favoritelocations.index'));
    }
}
