<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class LoginTest extends DuskTestCase
{
    /**
     * Test login view when change language.
     *
     * @return void
     */
    public function test_log_in_view_when_change_language()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit(env('APP_URL') . '/login')
                ->assertSee('Login')
                ->assertSee('Register')
                ->assertSeeIn('form', 'E-Mail Address')
                ->assertSeeIn('form', 'Password')
                ->assertSeeIn('form', 'Remember Me')
                ->assertSeeIn('form', 'Login')
                ->click('.lang')
                ->assertSee('EN')
                ->assertSee('VI')
                ->click('#vi')
                ->assertPathIs('/login')
                ->assertSeeIn('form', 'Địa chỉ Email')
                ->assertSeeIn('form', 'Mật khẩu')
                ->assertSeeIn('form', 'Nhớ tôi trên thiết bị')
                ->assertSeeIn('form', 'Đăng nhập')
                ->click('.lang')
                ->assertSee('EN')
                ->assertSee('VI')
                ->click('#en')
                ->assertPathIs('/login');
        });
    }

    /**
     * Test login failed.
     *
     * @return void
     */
    public function test_login_failed()
    {
        $this->browse(function (Browser $browser){
            $browser->visit(env('APP_URL') . '/login')
                ->type('email', 'demo@guitarshop.com')
                ->type('password', '1234567890')
                ->press('.login-btn')
                ->assertPathIs('/login');
        });
    }

    /**
     * Test login successfully with Admin account and User account.
     *
     * @return void
     */
    public function test_login_successfully()
    {

        $this->browse(function ($admin, $user){
            //Login with Admin account
            $admin->visit(env('APP_URL') . '/login')
                ->type('email', 'hduong1207.uet@gmail.com')
                ->type('password', '12071998')
                ->press('.login-btn')
                ->assertPathIs('/home');

            //Login with User account
            $user->visit(env('APP_URL') . '/login')
                ->type('email', 'bach98@gmail.com')
                ->type('password', '31071998')
                ->press('.login-btn')
                ->assertPathIs('/');
        });
    }
}
