<?php

namespace Tests\Functional;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Faker\Factory as Faker;

class ApiTester extends TestCase
{
    protected $faker;

    protected $times = 1;

    function __construct(){
        $this->faker = Faker::create();
    }

    protected function times($count){
        $this->times = $count;

        return $this;
    }
}
