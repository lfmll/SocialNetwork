<?php

namespace Tests\Browser;

use App\User;
use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class LoginTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @test
     * @return void
     */
    public function registered_users_can_login()
    {
        factory(User::class)->create(['email'=>'lfmll@gmail.com']);
        $this->browse(function (Browser $browser) {
            $browser->visit('/login')
                    ->type('email','lfmll@gmail.com')
                    ->type('password','secret')
                    ->press('#login-btn')
                    
                    ->assertAuthenticated()
                    ;
        });
    }
}
