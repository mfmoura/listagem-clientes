<?php

namespace Tests\Unit\Services\Api;

use App\Http\Services\Api\ClientService;
use App\Models\Client;
// use PHPUnit\Framework\TestCase;
use Tests\TestCase;
use Illuminate\Http\Request;
use App\Http\Requests\Api\ClientNewRequest;
use App\Http\Requests\Api\ClientUpdateRequest;

class ClientServiceTest extends TestCase
{
    public function test_index()
    {
        $result = ClientService::index(new Request([]));
        $this->assertIsObject($result);
    }

    public function test_store()
    {
        $result = ClientService::store(
            new ClientNewRequest(
                [
                    "name" => "Adalberto",
                    "email" => "teste@teste.com",
                    "address" => "Sesame Street, 52",
                    "position" => "Engineer",
                    "income" => 100.25
                ]
            )
        );

        $this->assertIsObject($result);
        return $result->id;
;
    }

    /**
     * @depends test_store
     */
    public function test_show($id)
    {
        $result = ClientService::show(Client::find($id));
        $this->assertIsObject($result);
    }

    /**
     * @depends test_store
     */
    public function test_update($id)
    {
        $result = ClientService::update(
            new ClientUpdateRequest(
                [
                    "name" => "Adalberto",
                    "email" => "teste@teste.com",
                    "address" => "Sesame Street, 52",
                    "position" => "Engineer",
                    "income" => 100.25
                ]
            ), 
            Client::find($id)
        );

        $this->assertIsObject($result);
    }

    /**
     * @depends test_store
     */
    public function test_destroy($id)
    {
        $result = ClientService::destroy(Client::find($id));
        $this->assertIsObject($result);
    }
}
