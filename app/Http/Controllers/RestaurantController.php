<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
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

        /* $validated = $request->validate([
            'name' => 'required|string|min:5|max:50',
            'description' => 'required|min:10',
            'city' => 'required|min:5|max:30',
            'phone' => 'required|alpha_dash|min:5|max:10',
            'category_id' => 'required|exists:categories,id',
            'delivery' => [
                'required',
                Rule::in(['y','n'])
            ],
        ]); */

        
        $input = $request->all();
        //intento de agregar el user id antes
        //$input += [ "user_id" => ''.Auth::id() ];
        //dd($input);
        //Restaurant::create($input);

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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Restaurant $restaurant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Restaurant  $restaurant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Restaurant $restaurant)
    {
        //
    }

    public function showFrontPage()
    {

        $restaurants = Restaurant::orderBy('name', 'asc')->get();


        return view('front_page.index', compact('restaurants'));
    }
}
