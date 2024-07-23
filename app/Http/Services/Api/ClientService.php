<?php

namespace App\Http\Services\Api;

use App\Http\Resources\ClientResource;
use App\Models\Client;

final class ClientService
{

    public static function index($request){
        $perPage = $request->input('per_page', 10); //
        return ClientResource::collection(Client::paginate($perPage));
    }

    public static function store($request){
        $client = Client::create(
            $request->only(
                'name',
                'email',
                'address',
                'position',
                'income'
            )
        );

        return new ClientResource($client);
    }

    public static function show(Client $client){
        return new ClientResource($client);
    }

    public static function update($request, Client $client){
        $client->fill(
            $request->only(
                'name',
                'email',
                'address',
                'position',
                'income'
            )
        );

        $client->save();

        return new ClientResource($client);

    }

    public static function destroy(Client $client){
        $client->delete();

        return response('', 204);
    }
}