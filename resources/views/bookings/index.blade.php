@extends('layouts.app')

@section('title', 'Travel Bohol - Bookings')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-header">
            <h1 class="h3 mb-0">📖 Booking List</h1>
        </div>
        <a href="#" class="btn btn-primary mb-3" onclick="openAddBookingModal()">Add Booking</a>
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
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookings as $booking)
                        @php
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
                            <td>
                                <button 
                                    class="btn btn-sm btn-warning me-2"
                                    onclick="openEditModal({{ $booking->id }}, '{{ $booking->booking_date }}', '{{ $booking->status }}')">
                                    Edit
                                </button>

                                <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this booking?')">
                                        Delete
                                    </button>
                                </form>
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

    <!-- Edit Booking Modal -->
    <div class="modal fade" id="editBookingModal" tabindex="-1" aria-labelledby="editBookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editBookingModalLabel">Edit Booking</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="editBookingForm" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Booking Date</label>
                            <input type="date" name="booking_date" id="editBookingDate" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <select name="status" id="editStatus" class="form-select" required>
                                <option value="pending">Pending</option>
                                <option value="confirmed">Confirmed</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add Booking Modal -->
<div class="modal fade" id="addBookingModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Booking</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('bookings.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label>Customer ID</label>
            <input type="number" name="customer_id" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Package ID</label>
            <input type="number" name="package_id" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Booking Date</label>
            <input type="date" name="booking_date" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
              <option value="pending">Pending</option>
              <option value="confirmed">Confirmed</option>
              <option value="cancelled">Cancelled</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Booking</button>
        </div>
      </form>
    </div>
  </div>
</div>

    <script>
        function openEditModal(id, bookingDate, status) {
            const modal = new bootstrap.Modal(document.getElementById('editBookingModal'));
            document.getElementById('editBookingDate').value = bookingDate;

            const statusSelect = document.getElementById('editStatus');

            // Automatically select the current status
            Array.from(statusSelect.options).forEach(option => {
                option.selected = option.value.toLowerCase() === status.toLowerCase();
            });

            // Update form action dynamically
            document.getElementById('editBookingForm').action = `/bookings/${id}`;

            modal.show();
        }

        function openAddBookingModal() {
            const modal = new bootstrap.Modal(document.getElementById('addBookingModal'));
            modal.show();
        }

    </script>

    <style>
        .btn-warning {
            background-color: #ffc107;
            border: none;
            color: #212529;
            transition: all 0.3s ease;
        }
        .btn-warning:hover {
            background-color: #e0a800;
            transform: scale(1.05);
        }
        .btn-danger {
            transition: all 0.3s ease;
        }
        .btn-danger:hover {
            transform: scale(1.05);
        }
        .modal-content {
            border-radius: 1rem;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        /* keep colored cell readable */
        td.bg-warning, td.bg-success, td.bg-danger {
            font-weight: 600;
            letter-spacing: 0.5px;
        }
    </style>
@endsection
