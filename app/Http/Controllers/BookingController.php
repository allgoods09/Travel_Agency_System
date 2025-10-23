<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['package', 'customer'])->paginate(10);
        
        return view('bookings.index', compact('bookings'));
    }
}
