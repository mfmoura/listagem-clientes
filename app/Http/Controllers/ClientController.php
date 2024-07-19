<?php

namespace App\Http\Controllers;

use App\Http\Requests\Api\ClientNewRequest;
use App\Http\Requests\Api\ClientUpdateRequest;
use App\Models\Client;
use App\Http\Services\Api\ClientService;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        return ClientService::index($request);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClientNewRequest $request)
    {
        return ClientService::store($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        return ClientService::show($client);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ClientUpdateRequest $request, Client $client)
    {
        return ClientService::update($request, $client);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Client $client)
    {
        return ClientService::destroy($client);
    }
}
