<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\student;

class GuestOrderTest extends TestCase {

	use RefreshDatabase;

  public function testOrderCreation() {
		$response = $this->post('/order/create', [
			'id' => 1,
			'name' => 'user',
			'email' => 'user@gmail.com'
		]);
		//check user
		$this->assertDatabaseHas('students', [
			'name' => 'user',
			'email' => 'user@gmail.com'
		]);
		//check order creation
		$user = student::latest()->where('name', 'user')->where('email', 'user@gmail.com')->value('id');
		$this->assertDatabaseHas('orders', [
			'book_id' => 1,
			'student_id' => $user
		]);
  }
}
