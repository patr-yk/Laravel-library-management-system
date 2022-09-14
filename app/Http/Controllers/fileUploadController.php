<?php

namespace App\Http\Controllers;

use \App\Models\book;
use \App\Models\auther;
use \App\Models\category;
use \App\Models\publisher;
use \App\Models\owner;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class fileUploadController extends Controller
{
    public function index() {
			return view('upload.upload');
		}
		public function store(Request $request) {

			$auther = new auther;
			$category = new category;
			$publisher = new publisher;


			$file = $request->file('uploaded_file');
			if ($file) {
				echo "uploading file";
				//dd(category::latest());
				$filename = $file->getClientOriginalName();
				$location = 'uploads'; //Created an "uploads" folder for that
				// Upload file
				$file->move($location, $filename);
				$filepath = public_path($location . "/" . $filename);

				$file = fopen($filepath, "r");
				$data = [];
				fgetcsv($file, 10000, ",");//přeskočení prvního řádku
				while (($filedata = fgetcsv($file, 10000, ",")) !== FALSE) {

					print_r($filedata);
					$book = new book;

					//ověření jedinečnosti podle isbn
					$count = $book->where('isbn', $filedata[9])->count();
					if ($count != 0) {
						continue;
					}
					//vytvoření záznamů v relačních tabulkách, získání id
					$category = new category;
					$category_id = strToKey($filedata[18], $category);
					$publisher = new publisher;
					$publisher_id = strToKey($filedata[2], $publisher);
					$auther = new auther;
					$auther_id = strToKey($filedata[1], $auther);
					$owner = new owner;
					$owner_id = strToKey($filedata[25], $owner);


					//vložení do databáze
					$book->name = $filedata[0];
					$book->category_id = $category_id;
					$book->publisher_id = publisher::where('name', $filedata[2])->latest()->value('id');
					$book->auther_id = auther::where('name', $filedata[1])->latest()->value('id');
					$book->isbn = $filedata[9];
					$book->releaseDate = date("Y", strtotime($filedata[3]."+1 year"));
					$book->format = $filedata[4];
					$book->pageNumber = $filedata[5];
					$book->language = $filedata[8];
					//$row['obalUrl'] = $filedata[0];
					//$row['obrazekUrl'] = $filedata[0];
					$book->resume = checkEmpty($filedata[15]);
					echo checkEmpty($filedata[15]);
					$book->place = checkEmpty($filedata[16]);
					$book->owner_id = owner::where('name', $filedata[25])->latest()->value('id');
					$book->comment = $filedata[24];
					$book->save();
				}
				//// TODO: doplnit odstranění souboru

				return redirect()->route('upload');
			} else {
			//no file was uploaded
			//throw new \Exception('No file was uploaded', Response::HTTP_BAD_REQUEST);
			return redirect()->route('upload');
		}
	}
}
function checkEmpty($hodnota) {
	if ($hodnota == "") {
		return NULL;
	}
	else {
		return($hodnota);
	}
}

function strToKey($value, $model) {
	//get id of foreign key
	if ($value == "") {
		$id = NULL;
	}
	else {
		if (is_null($model->where('name', $value)->latest()->value('id'))) {
			$model->name = $value;
			$model->save();
		}
		$id = $model->where('name', $value)->latest()->value('id');
	}
	return $id;
}
