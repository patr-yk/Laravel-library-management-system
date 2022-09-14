<?php

namespace App\Http\Controllers;
use App\Models\book;
use App\Models\book_issue;
use App\Models\student;
use App\Models\order;
use App\Models\settings;
use Illuminate\Http\Request;
use App\Http\Requests\StoreorderRequest;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

			//dd(student::latest()->get());
			return view('order.index', [
					'orders' => order::Paginate(5)
			]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(book $book)
    {
        return view('guests.book_order', ['book' => $book]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreorderRequest $request)
    {
				//check if student exists
				$client = student::where('name', $request->name)->where('email', $request->email)->value('id');
				if (!$client) {
					//create new row for student if there is not match
					student::create(['name'=>$request->name, 'email'=>$request->email]);
					$client = student::where('name', $request->name)->where('email', $request->email)->value('id');
				}
				//// TODO: store note
				order::create(['student_id'=>$client, 'book_id'=>$request->id]);

				// TODO: send email to student and to admin of database
				//adress of database admin should be stored in settings table or env file

				return redirect()->route('index');

				//store book id, student id and optional note into order table
    }

		public function accept($id) {
			//create new book issue from order
			$order = order::where('id', $id);
			if (book::where('id', $order->value('book_id'))->value('status') != 'Y') {
				return view('info', [
					'message' => 'Kniha je momentálně zapůjčena.',
					'redirect' => 'orders'
				]);
			}
			$issue_date = date('Y-m-d');
			$return_date = date('Y-m-d', strtotime("+" . (settings::latest()->first()->return_days) . " days"));
			$data = book_issue::create([
					'student_id' => $order->value('student_id'),
					'book_id' => $order->value('book_id'),
					'issue_date' => $issue_date,
					'return_date' => $return_date,
					'issue_status' => 'N'
			]);
			$data->save();
			$book = book::find($order->value('book_id'));
			$book->status = 'N';
			$book->save();

			order::where('id', $id)->delete();

			// TODO: send email to student informing about accepting his order

			return redirect('book-issue/orders');

		}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(order $order, $id)
    {
			order::find($id)->delete();
			return redirect()->route('orders');
    }
}
