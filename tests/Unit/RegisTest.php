<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class RegisTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $user = User::create([
            'name' => 'user_test',
            'email' => 'test@gmail.com',
            'password' => 'test1234',
            'roles' => 'user',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'user_test',
            'email' => 'test@gmail.com',
            'password' => 'test1234',
            'roles' => 'user',
        ]);

        User::findOrFail($user->id)->update([
            'name' => 'user_test_2',
            'email' => 'test2@gmail.com',
            'password' => 'test1234',
            'roles' => 'user',
        ]);

        $this->assertDatabaseHas('users', [
            'name' => 'user_test_2',
            'email' => 'test2@gmail.com',
            'password' => 'test1234',
            'roles' => 'user',
        ]);

        User::destroy($user->id);

        $this->assertDatabaseMissing('users', [
            'name' => 'user_test_2',
            'email' => 'test2@gmail.com',
            'password' => 'test1234',
            'roles' => 'user',
        ]);
    }
}
