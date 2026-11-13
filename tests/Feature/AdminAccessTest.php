<?php

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(RefreshDatabase::class);

test('admin root sends visitors to login', function () {
    $this->get('/admin')->assertRedirect('/admin/login');
});

test('admin can sign in with valid credentials', function () {
    $admin = User::factory()->create([
        'email' => 'admin@example.test',
        'password' => Hash::make('valid-password'),
    ]);

    $this->post(route('login.attempt'), [
        'email' => 'admin@example.test',
        'password' => 'valid-password',
    ])->assertRedirect(route('admin.orders'));

    $this->assertAuthenticatedAs($admin);
});

test('public footer links to admin login', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee(route('login'), false)
        ->assertSee('Login Admin');
});

test('signed-in admin sees their profile on the orders page', function () {
    $admin = User::factory()->create([
        'name' => 'Studio Admin',
        'email' => 'admin@example.test',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.orders'))
        ->assertOk()
        ->assertSee('Studio Admin')
        ->assertSee('admin@example.test');
});
