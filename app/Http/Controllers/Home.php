<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;

class Home extends Controller {

    function index() {

        $data = [];
        return view('index')->with($data);
    }

    function get_dashoard1(Request $request) {

        $query_string = $request->input('query');

        if ($query_string == '') {
            $query_string = 'itisjoby';
        }
        $trap = new Trap;
        $data = $trap->orWhere(function ($query) use ($query_string) {
                    $query->orWhere('fraud_phoneno', 'like', '%' . $query_string . '%')
                    ->orWhere('fraud_email', 'like', '%' . $query_string . '%');
                })
                ->paginate(20);
        return view('search_scam', ['scams' => $data]);
    }

    function get_dashoard(Request $request) {

        $query_string = $request->input('query');

        if ($query_string == '') {
            $query_string = 'itisjoby';
        }


        $returnHTML = (string) view('dashboard')->with([]);
        echo json_encode(['status' => 1, 'html' => $returnHTML]);
        die;
    }

    function get_graph(Request $request) {

        $query_string = $request->input('query');

        if ($query_string == '') {
            $query_string = 'itisjoby';
        }

        $data = Expense::Where('status', "A")->get()->toArray();

        echo json_encode(['status' => 1, 'data' => $data]);
        die;
    }

    function add_expense_page() {
        $data       = [];
        $returnHTML = (string) view('add_expense_page')->with($data);

        echo json_encode(['status' => 1, 'html' => $returnHTML]);
        die;
    }

    public function saveExpense(Request $request) {
        // Validate the request...
        if ($request->description == '') {
            die(json_encode(['status' => 0, 'msg' => 'You must provide a short description']));
        }
        if ($request->amount == '') {
            die(json_encode(['status' => 0, 'msg' => 'Amount cannot be empty']));
        }

        $expense = new Expense;


        $expense->amount      = $request->amount;
        $expense->description = $request->description;
        if ($request->date_time !== '') {
            $expense->date = $request->date_time;
        }

        $expense->status = 'A';
        $expense->save();
        echo json_encode(['status' => 1, 'msg' => 'Thankyou! we saved your expense report in our database and will be publically available. ']);
        die;
    }

}
