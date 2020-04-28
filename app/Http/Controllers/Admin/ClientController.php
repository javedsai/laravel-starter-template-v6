<?php

namespace App\Http\Controllers\Admin;

use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('admin.client.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,  [
            'client_name' => 'required|unique:clients|max:50',
        ]);

        $client = new Client();

        $client->client_name = $request->client_name;
        $client->contact_person = $request->contact_person;
        $client->contact_no = $request->contact_no;
        $client->address = $request->address;
        $client->save();

        return redirect(route('admin.client.index'))->with('successMsg', 'Client Added Successfully!!');
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
        $client = Client::find($id);
        return view('admin.client.edit', compact('client'));
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
        $this->validate($request,  [
            'client_name' => 'required|max:50|unique:clients,client_name,'.$id,
        ]);

        $client = Client::find($id);

        $client->client_name = $request->client_name;
        $client->contact_person = $request->contact_person;
        $client->contact_no = $request->contact_no;
        $client->address = $request->address;
        $client->save();

        return redirect(route('admin.client.index'))->with('successMsg', 'Client Updated Successfully!!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Client::find($id)->delete();
        return redirect(route('admin.client.index'))->with('successMsg', 'Client Deleted Successfully');
    }
}
