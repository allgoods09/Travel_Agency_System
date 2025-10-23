<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        // Fetch all customers (you can paginate later if needed)
        $customers = Customer::paginate(10);

        // Pass to view
        return view('customers.index', compact('customers'));
    }
}
