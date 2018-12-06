<?php

namespace App\Http\Controllers;

use App\Topping;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class ToppingController extends Controller
{
    protected $toppingModel;

    public function __construct(Topping $toppingModel)
    {
        // set the model
        $this->toppingModel = new Repository($toppingModel);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $toppings = $this->toppingModel->all();

        return view('admin.topping_list', compact('toppings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.topping_create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->toppingModel->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return redirect()->route('admin.topping.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $topping = $this->toppingModel->show($id);

        return view('admin.topping_update', compact('topping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->toppingModel->update([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ], $id);

        return redirect()->route('admin.topping.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->toppingModel->delete($id);

        return redirect()->route('admin.topping.index');
    }
}
