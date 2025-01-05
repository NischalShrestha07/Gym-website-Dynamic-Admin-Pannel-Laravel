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
@section('customCss')
<link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
@endsection

@section('content')
{{-- <div class="content-wrapper"> --}}
    <div class="row" style="margin-left: 10vw">
        <div class="col-md-10 grid-margin " style="margin-top: 5vh; margin-left: 10vw">
            <div class="card">
                <div class="card-body">
                    <h3 class="font-weight-bold text-danger">WELCOME TO ROYAL POWER GYM'S FAMILY</h3>
                    <span> Royal Power Gym Nepal, your local fitness center in Biratnagar! We are the first
                        international franchise gym of Nepal opened in 2022, with world-class facilities, premium
                        gym equipment and expert trainers. Our commitment is to help you achieve your fitness goals.
                        At Royal Power Gym Nepal, we understand that fitness is not one-size-fits-all. That’s why we
                        offer a wide range of fitness classes designed from high-intensity interval training to
                        yoga, ashtanga yoga. We also hold hygiene and sanitation in the highest regard, ensuring
                        immaculate surroundings to safeguard your health and wellness. Plus, with our exclusive free
                        international pass, you gain access to any Royal Power Gym worldwide.
                    </span><br>
                    <a href="/contact" class="m-2 btn btn-success h1">Contact Us</a>
                </div>
            </div>
        </div>

        <div class="main-panel" style="margin-left: -6vw">
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg">
                            <div class="card-people mt-auto">
                                <img src="{{ asset('Dashboard/images/dashboard/people.svg') }}" alt="people">
                                <div class="weather-info">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-tale">
                                    <div class="card-body">
                                        <p class="mb-4">Today’s Bookings</p>
                                        <p class="fs-30 mb-2">4006</p>
                                        <p>10.00% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent">
                                <div class="card card-dark-blue">
                                    <div class="card-body">
                                        <p class="mb-4">Total Bookings</p>
                                        <p class="fs-30 mb-2">61344</p>
                                        <p>22.00% (30 days)</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">ROYAL POWER GYM GYM'S DETAILS</p>
                                <p class="font-weight-500">The total number of sessions within the date range. It is
                                    the period
                                    time a
                                    user is actively engaged with your website, page or app, etc</p>
                                <div class="d-flex flex-wrap mb-5">
                                    <div class="mr-5 mt-3">
                                        <p class="text-muted">Order value</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">12.3k</h3>
                                    </div>
                                    <div class="mr-5 mt-3">
                                        <p class="text-muted">Orders</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">14k</h3>
                                    </div>
                                    <div class="mr-5 mt-3">
                                        <p class="text-muted">Users</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">71.56%</h3>
                                    </div>
                                    <div class="mt-3">
                                        <p class="text-muted">Downloads</p>
                                        <h3 class="text-primary fs-30 font-weight-medium">34040</h3>
                                    </div>
                                </div>
                                <canvas id="order-chart"></canvas>
                            </div>
                        </div>
                    </div>
                    <!-- Card Layout -->
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card shadow-sm border-radius-lg">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center">
                                    <p class="card-title font-weight-bold text-dark mb-0">Royal Power Gym Report</p>
                                    <a href="#" data-toggle="modal" data-target="#reportModal"
                                        class="text-primary font-weight-semibold d-flex align-items-center">
                                        <i class="fas fa-arrow-right mr-2"></i> View All
                                    </a>
                                </div>
                                <p class="text-muted mt-2">Total number of gym sessions in the selected date range,
                                    helping you track user
                                    engagement.</p>

                                <!-- Key Statistics -->
                                <div class="d-flex justify-content-between mt-3">
                                    <div class="text-center">
                                        <p class="text-muted mb-1">Total Sessions</p>
                                        <h5 class="font-weight-bold text-dark">345</h5>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-muted mb-1">Average Duration</p>
                                        <h5 class="font-weight-bold text-dark">45 min</h5>
                                    </div>
                                    <div class="text-center">
                                        <p class="text-muted mb-1">Active Users</p>
                                        <h5 class="font-weight-bold text-dark">120</h5>
                                    </div>
                                </div>

                                <!-- Chart -->
                                <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                <canvas id="sales-chart"></canvas>
                            </div>
                        </div>
                    </div>

                    <!-- Modal for Detailed Report -->
                    <div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="reportModalLabel">Detailed Gym Report</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h5>Sessions Overview</h5>
                                    <p>Total number of gym sessions during the selected period, including active and
                                        passive users.</p>

                                    <div class="row mt-3">
                                        <div class="col-md-6">
                                            <h6>Total Sessions</h6>
                                            <p class="text-muted">The total number of gym sessions that occurred in the
                                                given date range.
                                            </p>
                                        </div>
                                        <div class="col-md-6">
                                            <h6>Active Users</h6>
                                            <p class="text-muted">Number of users who actively participated in sessions
                                                during the period.
                                            </p>
                                        </div>
                                    </div>

                                    <h5 class="mt-4">Session Duration Analysis</h5>
                                    <p class="text-muted">Average session duration per user during the selected time
                                        frame.</p>
                                    <canvas id="detailed-session-chart"></canvas>

                                    <h5 class="mt-4">Additional Insights</h5>
                                    <ul>
                                        <li>Total new registrations during the period.</li>
                                        <li>Most popular time slots for sessions.</li>
                                        <li>User engagement trends over the course of the month.</li>
                                    </ul>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Workout Schedule</p>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Class</th>
                                                <th>Time</th>
                                                <th>Instructor</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Yoga</td>
                                                <td>6:00 AM</td>
                                                <td>Jane Doe</td>
                                            </tr>
                                            <tr>
                                                <td>HIIT</td>
                                                <td>7:00 AM</td>
                                                <td>John Smith</td>
                                            </tr>
                                            <tr>
                                                <td>Zumba</td>
                                                <td>8:00 AM</td>
                                                <td>Mary Johnson</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Class Booking</p>
                                <form>
                                    <div class="form-group">
                                        <label for="class-type">Class Type</label>
                                        <select id="class-type" class="form-control">
                                            <option value="yoga">Yoga</option>
                                            <option value="hiit">HIIT</option>
                                            <option value="zumba">Zumba</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" id="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <select id="time" class="form-control">
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary">Book Class</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Personal Trainer Booking</p>
                                <form>
                                    <div class="form-group">
                                        <label for="trainer">Trainer</label>
                                        <select id="trainer" class="form-control">
                                            <option value="jane-doe">Jane Doe</option>
                                            <option value="john-smith">John Smith</option>
                                            <option value="mary-johnson">Mary Johnson</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="date">Date</label>
                                        <input type="date" id="date" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="time">Time</label>
                                        <select id="time" class="form-control">
                                            <option value="6:00 AM">6:00 AM</option>
                                            <option value="7:00 AM">7:00 AM</option>
                                            <option value="8:00 AM">8:00 AM</option>
                                        </select>
                                    </div>
                                    <button class="btn btn-primary">Book Trainer</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <p class="card-title">Membership Plans</p>
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <thead>
                                            <tr>
                                                <th>Plan</th>
                                                <th>Price</th>
                                                <th>Description</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Basic</td>
                                                <td>$20/month</td>
                                                <td>Access to gym facilities</td>
                                            </tr>
                                            <tr>
                                                <td>Premium</td>
                                                <td>$50/month</td>
                                                <td>Access to gym facilities, personal training, and nutrition
                                                    planning</td>
                                            </tr>
                                            <tr>
                                                <td>Elite</td>
                                                <td>$100/month</td>
                                                <td>Access to gym facilities, personal training, nutrition planning,
                                                    and
                                                    priority access to classes</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card position-relative">
                            <div class="card-body">
                                <h4 class="card-title">Trainer Overview</h4>
                                <div class="table-responsive">
                                    <table class="table table-borderless report-table">
                                        <tr>
                                            <th>Trainer</th>
                                            <th>Classes Today</th>
                                            <th>Availability</th>
                                            <th>Contact</th>
                                        </tr>
                                        <tr>
                                            <td>John Doe</td>
                                            <td>5</td>
                                            <td><span class="badge badge-success">Available</span></td>
                                            <td>john.doe@example.com</td>
                                        </tr>
                                        <tr>
                                            <td>Jane Smith</td>
                                            <td>3</td>
                                            <td><span class="badge badge-warning">Busy</span></td>
                                            <td>jane.smith@example.com</td>
                                        </tr>
                                        <!-- Add more trainers as needed -->
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card position-relative">
                            <div class="card-body">
                                <h4 class="card-title">Membership Plans</h4>
                                <a href="#" class="btn btn-primary mb-3">Add New Plan</a>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Plan Name</th>
                                                <th>Duration</th>
                                                <th>Price</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>Basic Membership</td>
                                                <td>1 Month</td>
                                                <td>$30</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Premium Membership</td>
                                                <td>6 Months</td>
                                                <td>$150</td>
                                                <td>
                                                    <a href="#" class="btn btn-sm btn-info">Edit</a>
                                                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                            <!-- Add more membership plans as needed -->
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>

@endsection

@section('customJs')
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        $("#EmployeeTable").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#EmployeeTable_wrapper .col-md-6:eq(0)');
    });
</script>
@endsection