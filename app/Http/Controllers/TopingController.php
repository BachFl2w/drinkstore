<?php

namespace App\Http\Controllers;

use App\Topping;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class TopingController extends Controller
{
    protected $toppingModel;

    public function __construct(Role $toppingModel)
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
        return view('admin.topping_list');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->toppingModel->create([
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,
        ]);

        return response()->json(['success' => __('Store successfully !')]);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Topping::findOrFail($id);

        $this->toppingModel->update(
            [
                'name' => $request->name,
                'price' => $request->price,
                'quantity' => $request->quantity,
            ],
            $id
        );

        return response()->json(['success' => __('Update successfully !')]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Topping::findOrFail($id)->delete();

        return response()->json(['success' => __('Delete successfully !')]);
    }

    public function getDataJson()
    {
        $dataTopping = Topping::all();

        return $dataTopping;
    }
}
