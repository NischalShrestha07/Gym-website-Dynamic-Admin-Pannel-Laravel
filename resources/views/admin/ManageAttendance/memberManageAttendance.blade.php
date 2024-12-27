@extends('admin.layouts.memberLayout')

@section('content')
<div style="margin-left: 20vw;" class="container mt-4">
    <h2 class="mb-4">Attendance (Admin)</h2>

    <div>
        @if (session('success'))
        <div class="alert alert-success text-white bg-success alert-dismissible custom-alert fade-in" role="alert">
            <strong>Success!</strong> {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-danger text-white bg-danger alert-dismissible custom-alert fade-in" role="alert">
            <strong>Error!</strong> {{ session('error') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
    </div>
    <div class="table-responsive mb-4">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>EMPLOYEE</th>
                    @for ($i = 1; $i <= 31; $i++) <th>{{ $i }}</th>
                        @endfor
                </tr>
            </thead>
            <tbody>
                @foreach($employees as $employee)
                <tr>
                    <td>{{ $employee->name }}</td>
                    @for ($i = 1; $i <= 31; $i++) @php // Create a date for each day
                        $date=\Carbon\Carbon::createFromDate(null, null, $i)->format('Y-m-d');
                        // Find attendance for that date
                        $attendance = $employee->attendances->where('date', $date)->first();
                        @endphp
                        <td>
                            @if ($attendance)
                            @if ($attendance->status == 'full_day_present')
                            <span class="text-success" title="Full Day Present">✔</span>
                            @elseif ($attendance->status == 'half_day_present')
                            <span class="text-warning" title="Half Day Present">⛭</span>
                            @else
                            <span class="text-danger" title="Absent">✖</span>
                            @endif
                            @else
                            <span class="text-muted" title="No Attendance Recorded">-</span>
                            @endif
                        </td>
                        @endfor
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Legend for attendance status -->
    <div class="mb-4">
        <h5>Attendance Status Legend:</h5>
        <ul class="list-unstyled">
            <li><span class="text-success">✔</span> - Full Day Present</li>
            <li><span class="text-warning">⛭</span> - Half Day Present</li>
            <li><span class="text-danger">✖</span> - Absent</li>
            <li><span class="text-muted">-</span> - No Attendance Recorded</li>
        </ul>
    </div>

    <!-- Add/Edit Attendance Modal -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#attendanceModal">
        Edit Attendance
    </button>

    <div class="modal fade" id="attendanceModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Update Attendance</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('attendance.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="employee_id">Employee</label>
                            <select name="employee_id" class="form-control" required>
                                <option value="" disabled selected>Select Employee</option>
                                @foreach($employees as $employee)
                                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" name="date" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Attendance Status</label>
                            <select name="status" class="form-control" required>
                                <option value="full_day_present">Full Day Present</option>
                                <option value="half_day_present">Half Day Present</option>
                                <option value="absent">Absent</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection