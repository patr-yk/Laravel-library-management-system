<?php

namespace App\Http\Controllers;

use App\Models\book;
use App\Http\Requests\StorebookRequest;
use App\Http\Requests\UpdatebookRequest;
use App\Models\auther;
use App\Models\category;
use App\Models\publisher;
use App\Models\owner;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('book.index', [
            'books' => book::Paginate(5)
        ]);
    }


		/**
     * Display a listing of the books for users not logged in.
     *
     * @return \Illuminate\Http\Response
     */
		public function guest_index() {
			return view('guests.book_list', [
					'books' => book::Paginate(5)
			]);
		}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.create',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
						'owners' => owner::latest()->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorebookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorebookRequest $request)
    {
        book::create($request->validated() + [
            'status' => 'Y'
        ]);
        return redirect()->route('books');
    }


		/**
     * Show card of the book.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function view(book $book)
    {
        return view('book.view',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
						'owners' => owner::latest()->get(),
            'book' => $book
        ]);
    }

		public function guest_view(book $book)
    {
        return view('guests.book_view',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
						'owners' => owner::latest()->get(),
            'book' => $book
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(book $book)
    {
        return view('book.edit',[
            'authors' => auther::latest()->get(),
            'publishers' => publisher::latest()->get(),
            'categories' => category::latest()->get(),
						'owners' => owner::latest()->get(),
            'book' => $book
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatebookRequest  $request
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatebookRequest $request, $id)
    {
        $book = book::find($id);
        $book->name = $request->name;
				$book->isbn = $request->isbn;
        $book->auther_id = $request->author_id;
        $book->category_id = $request->category_id;
        $book->publisher_id = $request->publisher_id;

				$book->pageNumber = $request->page_number;
				$book->releaseDate = $request->release_date;
				$book->comment = $request->comment;
				$book->resume = $request->resume;
				$book->place = $request->place;
				$book->owner_id = $request->owner_id;

        $book->save();
        return redirect()->route('books');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        book::find($id)->delete();
        return redirect()->route('books');
    }
}
