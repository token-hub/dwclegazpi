<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Entities\User;

class UserUnitTest extends TestCase
{
	use RefreshDatabase;
	/** @test */
	public function add_user() {

		User::create([
			'username' => 'yey',
			'password' => 'asdasd',
		]);

		$this->assertCount(1, User::all());
	}
}
