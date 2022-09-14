<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

use App\Models\book;
use App\Models\auther;
use App\Models\category;
use App\Models\publisher;
use App\Models\User;
use App\Models\owner;

class BookTest extends TestCase
{
	use RefreshDatabase, WithoutMiddleware;

		public function testBookIndexLoadsTable() {
			$user = User::find(1);
			book::create([
				'name' => 'book',
				'isbn' => '123',
				'category_id' => 1,
				'auther_id' => 1,
				'publisher_id' => 1
			]);

			$auther = auther::latest()->first()->name;
			$category = category::latest()->first()->name;
			$publisher = publisher::latest()->first()->name;

			$response = $this->actingAs($user)->get('/books');
			$response->assertStatus(200);
			$response->assertSee(['book', '123', $auther, $publisher, $category]);
		}

		public function testBookViewLoadsProperly() {
			$book = book::create([
				'name' => 'book',
				'isbn' => '123',
				'category_id' => 1,
				'auther_id' => 1,
				'publisher_id' => 1,
				'releaseDate' => '2010',
				'format' => 'paperback',
				'pageNumber' => '50',
				'language' => 'cze',
				'resume' => 'gut',
				'place' => 'some place',
				'owner_id' => 1,
				'comment' => 'some comment'
			]);
			$user = User::find(1);
			$response = $this->actingAs($user)->get('/book/view/'.$book->id);
			$response->assertStatus(200);
			$response->assertSee(['book', '123', $book->auther->name, $book->publisher->name, $book->category->name, '2010', 'paperback', '50', 'cze', 'gut', 'some place', owner::find(1)->name, 'some comment']);
		}

    public function testBookCreation() {
			$response = $this->post('/book/create', [
				'name' => 'ahoy-hoy',
				'isbn' => '1521354645963',
				'category_id' => 1,
				'auther_id' => 1,
				'publisher_id' => 1
			]);
			$response->assertRedirect();

			$this->assertDatabaseHas('books', [
				'name' => 'ahoy-hoy',
				'isbn' => '1521354645963',
				'category_id' => 1,
				'auther_id' => 1,
				'publisher_id' => 1
			]);
    }

		/*public function testBookEditing() {
			$response = $this->post('/book/');
		}*/


		//public function testBookDelete() {}
}
