<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;

class ApiTester extends TestCase
{
    protected $faker;

    protected $times = 1;

    protected function setUp(){
        $this->faker = Faker::create();
        putenv('DB_DEFAULT=sqlite_testing');
        parent::setUp();
        Artisan::call('migrate');
    }

    public function times($count){
        $this->times = $count;

        return $this;
    }
}
