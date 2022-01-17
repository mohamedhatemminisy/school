<?php

namespace Tests\Unit;

use App\Models\Admin;
use Tests\TestCase;

class AdminTest extends TestCase
{
    /**
     * Here I can test admin login form url
     *
     * @return void
     */
    public function test_login_form()
    {
        $response = $this->get('/admin/login');
        $response->assertStatus(200);
    }
    /**
     * Test admin login function 
     *
     * @return void
     */
    public function test_admin_login()
    {
        $response = $this->post('/admin/login', [
            'email' => 'admin@gmail.com',
            'password' => '12345678'
        ]);
        $response->assertRedirect('/admin');
    }
    /**
     * Here I can make sure that 
     * no more than one user has 
     * the same email
     *
     * @return void
     */
    public function test_user_duplicate()
    {
        $admin1 = Admin::make([
            'email' => 'ali@gmail.com'
        ]);

        $admin2 = Admin::make([
            'email' => 'saleh@gmail.com'
        ]);
        $this->assertTrue($admin1->email != $admin2->email);
    }
}
