<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Session;

class LoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testExample()
    {
    	Session::start();
	    $response = $this->call('POST', 'App/Http/Auth/LoginController@login', [
	        'email' => 'subtlenv@gmail.com',
	        'password' => 'qwerty',
	        '_token' => csrf_token(),
	    ]);

    	// $response = $this->call('GET','/login');

	    $this->assertEquals(200, $response->getStatusCode());
	    $this->assertEquals('auth.login', $response->original->name());
    }
}
