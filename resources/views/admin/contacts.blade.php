{{-- @php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout',
};
@endphp

@extends($layout)

@section('content')
<div style="margin-left: 22vw;" class="container">
    <h2>Contact Messages</h2>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Message</th>
                <th>Submitted At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->id }}</td>
                <td>{{ $contact->name }}</td>
                <td>{{ $contact->email }}</td>
                <td>{{ $contact->phoneno }}</td>
                <td>{{ $contact->message }}</td>
                <td>{{ $contact->created_at->format('d M Y, H:i') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection --}}
@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout',
};
@endphp
@extends($layout)

@section('content')
<div class="container" style="margin-left: 22vw; padding: 20px;">
    <div class="card shadow-sm">
        <div class="card-header bg-success text-white">
            <h2 class="mb-0">Contact Messages</h2>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover mb-0">
                    <thead class="bg-">
                        <tr>
                            <th class="py-3 px-4">S.N</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Phone</th>
                            <th class="py-3 px-4">Message</th>
                            <th class="py-3 px-4">Submitted At</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contacts as $key => $contact)
                        <tr>
                            <td class="py-3 px-4">{{ $key + 1 }}</td>
                            <td class="py-3 px-4">{{ $contact->name }}</td>
                            <td class="py-3 px-4">
                                <a href="mailto:{{ $contact->email }}" class="text-decoration-none">
                                    {{ $contact->email }}
                                </a>
                            </td>
                            <td class="py-3 px-4">{{ $contact->phoneno }}</td>
                            <td class="py-3 px-4">{{ Str::limit($contact->message, 50) }}</td>
                            {{-- <td class="py-3 px-4">{{ $contact->created_at->format('d M Y, H:i') }}</td> --}}
                            <td class="py-3 px-4">
                                {{ $contact->created_at->setTimezone('Asia/Kathmandu')->format('d M Y, H:i') }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .table {
        border-collapse: separate;
        border-spacing: 0;
    }

    .table th {
        font-weight: 600;
        border-bottom: 2px solid #dee2e6;
    }

    .table td {
        vertical-align: middle;
    }

    .table-hover tbody tr:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s;
    }

    .card {
        border: none;
        border-radius: 8px;
        overflow: hidden;
    }

    .card-header {
        padding: 1rem 1.5rem;
    }
</style>
@endsection