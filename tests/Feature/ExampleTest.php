<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\User;
use App\Models\Tweet;
class ExampleTest extends TestCase
{
    use RefreshDatabase;

    public function test_setUp(): void
    {
        dd(env('APP_ENV'), env('DB_DATABASE'), env('DB_CONNECTION'));
    }
}
