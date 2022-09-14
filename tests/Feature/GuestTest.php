<?php

namespace Tests\Feature;

use App\Models\book;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use Database\Factories\BookFactory;

class GuestTest extends TestCase
{
	use RefreshDatabase;
    /**
     * Check if
     *
     * @return void
     */
    public function testMainPage()
    {
      $response = $this->get('/');
      $response->assertStatus(200);
    }

		public function testGuestBookView()
    {
      $response = $this->get('/view/1');
			$book = book::find(1);
			//check page loaded
      $response->assertStatus(200);
			//check includes right view
			$response->assertSeeInOrder(['ISBN', 'Jazyk']);
			//check database loaded correctly
			$response->assertSee([$book->isbn, $book->author, book::find(1)->auther->name], '---');
    }
}
