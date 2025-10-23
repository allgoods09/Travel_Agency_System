@extends('layouts.app')

@section('title', 'Packages')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div class="page-header">
            <h1 class="h3 mb-0">🎒 Packages List</h1>
        </div>
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
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-3 d-flex justify-content-center">
            {{ $packages->links() }}
        </div>
    @endif
@endsection
