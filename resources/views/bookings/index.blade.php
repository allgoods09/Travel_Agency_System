@extends('layouts.app')

@section('title', 'Bookings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-header">
            <h1 class="h3 mb-0">📖 Booking List</h1>
        </div>
    </div>

    @if($bookings->isEmpty())
        <p>No bookings found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Customer Name</th>
                        <th>Package Name</th>
                        <th>Booking Date</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        @php
                            // Determine background color based on status
                            $statusColors = [
                                'cancelled' => 'bg-danger text-white',
                                'pending' => 'bg-warning text-dark',
                                'confirmed' => 'bg-success text-white',
                            ];

                            $statusClass = $statusColors[strtolower($booking->status)] ?? 'bg-secondary text-white';
                        @endphp

                        <tr>
                            <td>{{ $booking->id }}</td>
                            <td>{{ $booking->customer->name }}</td>
                            <td>{{ $booking->package->name }}</td>
                            <td>{{ $booking->booking_date }}</td>
                            <td class="{{ $statusClass }}">
                                {{ ucfirst($booking->status) }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            {{ $bookings->links() }}
        </div>
    @endif
@endsection
