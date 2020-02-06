<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;

class CreateStatusTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_an_authenticated_user_can_create_status(){
        //1. Given=>Teniendo un usuario autentificado
        $this->withoutExceptionHandling();

        $user=factory(User::class)->create();
        $this->actingAs($user);

        //2. When=>Cuando hace un post request a status
        $response=$this->post(route('statuses.store'),['body'=>'Mi primer status']);

        $response->assertJson([
            'body'=>'Mi primer status',
        ]);
        //3. Then=>Entonces veo un nuevo estado en la base de datos
        $this->assertDatabaseHas('statuses',[
            'user_id'=>$user->id,
            'body'=>'Mi primer status'
        ]);
    }
    public function testExample()
    {
        $this->assertTrue(true);
    }
}
