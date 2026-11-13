<?php

test('the application returns a successful response', function () {
    $response = $this->get('/');

    $response->assertStatus(200);
});

test('the home page loads the hero illustration from the current host', function () {
    $this->get('/')
        ->assertOk()
        ->assertSee('src="/images/violet.svg"', false);
});
