@extends('layouts.app')

@section('title', 'Travel Bohol - Packages')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-header">
            <h1 class="h3 mb-0">🎒 Packages List</h1>
        </div>
        <a href="#" class="btn btn-primary mb-3" onclick="openAddPackageModal()">Add Package</a>
    </div>

    @if($packages->isEmpty())
        <p>No packages found.</p>
    @else
        <div class="table-responsive">
            <table class="table table-bordered text-center align-middle">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Destination</th>
                        <th>Price</th>
                        <th>Duration (Days)</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($packages as $package)
                        <tr>
                            <td>{{ $package->id }}</td>
                            <td>{{ $package->name }}</td>
                            <td>{{ $package->destination }}</td>
                            <td>₱{{ number_format($package->price, 2) }}</td>
                            <td>{{ $package->duration_days }}</td>
                            <td>
                                <button 
                                    class="btn btn-sm btn-warning me-2"
                                    onclick="openEditModal({{ $package->id }}, '{{ $package->name }}', '{{ $package->destination }}', '{{ $package->price }}', '{{ $package->duration_days }}')">
                                    Edit
                                </button>

                                <form action="{{ route('packages.destroy', $package->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button 
                                        type="submit" 
                                        class="btn btn-sm btn-danger"
                                        onclick="return confirm('Are you sure you want to delete this package?')">
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
            {{ $packages->links() }}
        </div>
    @endif

    {{-- Edit Modal --}}
<div class="modal fade" id="editPackageModal" tabindex="-1" aria-labelledby="editPackageModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editPackageModalLabel">Edit Package</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form id="editPackageForm" method="POST">
                @csrf
                @method('PUT')

                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Destination</label>
                        <input type="text" name="destination" id="editDestination" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Package Price</label>
                        <input type="number" step="0.01" name="price" id="editPrice" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Duration Days</label>
                        <input type="number" name="duration_days" id="editDays" class="form-control" required>
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

<div class="modal fade" id="addPackageModal" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content rounded-4 shadow">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title">Add Package</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('packages.store') }}" method="POST">
        @csrf
        <div class="modal-body">
          <div class="mb-3">
            <label>Name</label>
            <input type="text" name="name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Destination</label>
            <input type="text" name="destination" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Price</label>
            <input type="number" step="0.01" name="price" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Duration Days</label>
            <input type="number" name="duration_days" class="form-control" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Add Package</button>
        </div>
      </form>
    </div>
  </div>
</div>

@php
    $packagesBaseUrl = url('packages');
@endphp

<script>
    const packagesBase = @json($packagesBaseUrl);

    function openEditModal(id, name, destination, price, days) {
        const modalEl = document.getElementById('editPackageModal');
        const modal = new bootstrap.Modal(modalEl);

        document.getElementById('editName').value = name ?? '';
        document.getElementById('editDestination').value = destination ?? '';
        document.getElementById('editPrice').value = price ?? '';
        document.getElementById('editDays').value = days ?? '';
        document.getElementById('editPackageForm').action = `${packagesBase}/${id}`;

        modal.show();
    }

    function openAddPackageModal() {
        const modal = new bootstrap.Modal(document.getElementById('addPackageModal'));
        modal.show();
    }
</script>


    {{-- Styling --}}
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
    </style>
@endsection
