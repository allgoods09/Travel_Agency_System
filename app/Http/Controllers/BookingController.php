<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Customer;
use App\Models\Package;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 10; // your pagination limit
        $bookings = Booking::orderBy('id', 'asc')->paginate($perPage);

        // If the current page has no rows, redirect to previous page (if not page 1)
        if ($bookings->isEmpty() && $request->page > 1) {
            $prevPage = $request->page - 1;
            return redirect()->route('bookings.index', ['page' => $prevPage]);
        }

        return view('bookings.index', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => [
                'required',
                'integer',
                Rule::exists('customers', 'id')->where(function ($query) {
                    $query->whereNotNull('id'); // optional, just ensures row exists
                }),
            ],
            'package_id' => [
                'required',
                'integer',
                Rule::exists('packages', 'id')->where(function ($query) {
                    $query->whereNotNull('id');
                }),
            ],
            'booking_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create($request->only(['customer_id', 'package_id', 'booking_date', 'status']));

        return redirect()->back()->with('success', 'Booking added successfully!');
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'booking_date' => 'required|date',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($request->only(['booking_date', 'status']));

        return redirect()->back()->with('success', 'Booking updated successfully!');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->back()->with('success', 'Booking deleted successfully!');
    }
}
