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

    public function update(Request $request, $id)
{
    $request->validate([
        'booking_date' => 'required|date',
        'status' => 'required|string',
    ]);

    $booking = Booking::findOrFail($id);
    $booking->update([
        'booking_date' => $request->booking_date,
        'status' => $request->status,
    ]);

    return redirect()->route('bookings.index')->with('success', 'Booking updated successfully.');
}

public function destroy($id)
{
    $booking = Booking::findOrFail($id);
    $booking->delete();

    return redirect()->route('bookings.index')->with('success', 'Booking deleted successfully.');
}

}
