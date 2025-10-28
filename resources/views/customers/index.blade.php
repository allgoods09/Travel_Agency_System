@extends('layouts.app')

@section('title', 'Travel Bohol - Customers')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="page-header">
        <h1 class="h3 mb-0">🧍 Customer List</h1>
    </div>
    <button class="btn btn-primary" onclick="openAddModal()">Add Customer</button>
</div>

@if($customers->isEmpty())
    <p>No customers found.</p>
@else
    <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Contact Number</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($customers as $customer)
                    <tr>
                        <td>{{ $customer->id }}</td>
                        <td>{{ $customer->name }}</td>
                        <td>{{ $customer->contact_number }}</td>
                        <td>{{ $customer->email }}</td>
                        <td>
                            <button 
                                class="btn btn-sm btn-warning me-2"
                                onclick="openEditModal({{ $customer->id }}, '{{ $customer->name }}', '{{ $customer->contact_number }}', '{{ $customer->email }}')">
                                Edit
                            </button>

                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button 
                                    type="submit" 
                                    class="btn btn-sm btn-danger"
                                    onclick="return confirm('Are you sure you want to delete this customer?')">
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
        {{ $customers->links() }}
    </div>
@endif

<!-- Add Customer Modal -->
<div class="modal fade" id="addCustomerModal" tabindex="-1" aria-labelledby="addCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="addCustomerModalLabel">Add Customer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('customers.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Add Customer</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Customer Modal -->
<div class="modal fade" id="editCustomerModal" tabindex="-1" aria-labelledby="editCustomerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 shadow">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editCustomerModalLabel">Edit Customer</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editCustomerForm" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="editName" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" name="contact_number" id="editContact" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="editEmail" class="form-control" required>
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

<script>
    function openEditModal(id, name, contact, email) {
        const modal = new bootstrap.Modal(document.getElementById('editCustomerModal'));
        document.getElementById('editName').value = name;
        document.getElementById('editContact').value = contact;
        document.getElementById('editEmail').value = email;

        document.getElementById('editCustomerForm').action = `/customers/${id}`;
        modal.show();
    }

    function openAddModal() {
        const modal = new bootstrap.Modal(document.getElementById('addCustomerModal'));
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
</style>
@endsection
