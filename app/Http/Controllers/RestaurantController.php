<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\StoreRestaurantRequest;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $restaurants = Restaurant::orderBy('name', 'asc')->get();

        return view('restaurants.index', compact('restaurants'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        return view("restaurants.create", compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRestaurantRequest $request)
    {
        //Se agrega el campo id que no trae por defecto el form
        $input = $request->all();
        $restaurant = new Restaurant();
        $restaurant->fill($input);
        $restaurant->user_id = Auth::id();
        $restaurant->save();
        $flash = 'Restaurante agregado exitosamente';
        return redirect(route('home'))->with($flash);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function show(Restaurant $restaurant)
    {
        return view('restaurants.show', compact('restaurant'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function edit(Restaurant $restaurant)
    {
        $categories = Category::orderBy('name', 'asc')->pluck('name', 'id');
        return view("restaurants.edit", compact('categories', 'restaurant'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(StoreRestaurantRequest $request, Restaurant $restaurant)
    {
        //tiene la misma validacion de campos que el create
        //Se agrega el campo id que no debe traer por defecto el form
        $input = $request->all();

        $restaurant->fill($input);
        $restaurant->user_id = Auth::id();
        $restaurant->save();
        Session::flash('success', 'Restaurante editado exitosamente');

        //Redirecciona a una ruta especifica
        //return redirect(route('home'));

        //Redirecciona a la ruta anterior
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        $restaurant->delete();
        Session::flash('success', 'Restaurante removido exitosamente');
        return redirect(route('home'));
    }

    public function showFrontPage()
    {

        $restaurants = Restaurant::orderBy('name', 'asc')->get();


        return view('front_page.index', compact('restaurants'));
    }
}
