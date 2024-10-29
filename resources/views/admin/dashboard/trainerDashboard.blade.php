@extends('admin.layouts.trainerLayout')
@section('content')
<div class="content-wrapper">
    <!-- Content Header -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Gym Management Dashboard</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Stat boxes -->
            <div class="row">
                <!-- Gym Members -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Number of Gym Members</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Revenue -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-primary">
                        <div class="inner">
                            <h3>$24,500</h3>
                            <p>Total Revenue (This Month)</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-cash"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- New Registrations -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>44</h3>
                            <p>New Registrations</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- Active Subscriptions -->
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>200</h3>
                            <p>Active Subscriptions</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-card"></i>
                        </div>
                        <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>

            <!-- Row 2: Forms and Reports -->
            <div class="row">
                <!-- Member Registration Form -->
                <div class="col-lg-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Register New Member</h3>
                        </div>
                        <form action="" method="POST">
                            {{-- <form action="{{ route('members.store') }}" method="POST"> --}}
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="name">Member Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter name">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter email">
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                            placeholder="Enter phone">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Expense Summary (This Month)</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">
                                    <span class="badge badge-danger float-right">$1,200</span>
                                    Equipment Maintenance
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-danger float-right">$3,000</span>
                                    Trainer Salaries
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-danger float-right">$800</span>
                                    Utility Bills
                                </li>
                                <li class="list-group-item">
                                    <span class="badge badge-danger float-right">$400</span>
                                    Cleaning Services
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>




            </div>

            <!-- Announcement Notice Board -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Announcement Notice Board</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <!-- Example Notice -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Upcoming Gym Closure</h5>
                                    <p>
                                        Dear Members, please note that the gym will be closed for maintenance on
                                        <strong>October 10, 2024</strong>. We apologize for the inconvenience.
                                    </p>
                                </div>
                                <span class="badge badge-info badge-pill">New</span>
                            </li>

                            <!-- Example Notice -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>Yoga Workshop</h5>
                                    <p>
                                        We are hosting a Yoga Workshop on <strong>October 15, 2024</strong>.
                                        Join us for a free session to improve your flexibility and mindfulness.
                                        <a href="#">Read more...</a>
                                    </p>
                                </div>
                                <span class="badge badge-success badge-pill">Upcoming Event</span>
                            </li>

                            <!-- Example Notice -->
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>New Equipment Available</h5>
                                    <p>
                                        Exciting news! We have added new fitness equipment to our gym.
                                        Come and try out our brand-new machines, available starting <strong>October 1,
                                            2024</strong>.
                                    </p>
                                </div>
                                <span class="badge badge-warning badge-pill">Info</span>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- Membership Management -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Membership Management</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Member</th>
                                    <th>Membership Type</th>
                                    <th>Start Date</th>
                                    <th>Expiry Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Annual</td>
                                    <td>01 Jan 2024</td>
                                    <td>31 Dec 2024</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td><a href="#" class="btn btn-warning btn-sm">Renew</a></td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Monthly</td>
                                    <td>01 Sep 2024</td>
                                    <td>30 Sep 2024</td>
                                    <td><span class="badge badge-danger">Expired</span></td>
                                    <td><a href="#" class="btn btn-success btn-sm">Reactivate</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment History -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment History</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Member</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#INV-001</td>
                                    <td>John Doe</td>
                                    <td>01 Aug 2024</td>
                                    <td>$50</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View Invoice</a></td>
                                </tr>
                                <tr>
                                    <td>#INV-002</td>
                                    <td>Jane Smith</td>
                                    <td>05 Sep 2024</td>
                                    <td>$30</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View Invoice</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Payment History -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Payment History</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Invoice #</th>
                                    <th>Member</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#INV-001</td>
                                    <td>John Doe</td>
                                    <td>01 Aug 2024</td>
                                    <td>$50</td>
                                    <td><span class="badge badge-success">Paid</span></td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View Invoice</a></td>
                                </tr>
                                <tr>
                                    <td>#INV-002</td>
                                    <td>Jane Smith</td>
                                    <td>05 Sep 2024</td>
                                    <td>$30</td>
                                    <td><span class="badge badge-warning">Pending</span></td>
                                    <td><a href="#" class="btn btn-primary btn-sm">View Invoice</a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Class Schedule -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Class Schedule</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Class Name</th>
                                    <th>Trainer</th>
                                    <th>Time</th>
                                    <th>Capacity</th>
                                    <th>Registered</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Yoga</td>
                                    <td>John Doe</td>
                                    <td>Monday, 9 AM - 10 AM</td>
                                    <td>20</td>
                                    <td>15</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Zumba</td>
                                    <td>Jane Smith</td>
                                    <td>Wednesday, 6 PM - 7 PM</td>
                                    <td>25</td>
                                    <td>18</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Member Progress Tracker -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Member Progress Tracker</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Member Name</th>
                                    <th>Goal</th>
                                    <th>Progress</th>
                                    <th>Last Updated</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>Weight Loss</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 70%;">
                                                70%</div>
                                        </div>
                                    </td>
                                    <td>1 week ago</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>Muscle Gain</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-warning" role="progressbar" style="width: 50%;">
                                                50%</div>
                                        </div>
                                    </td>
                                    <td>3 days ago</td>
                                    <td>
                                        <a href="#" class="btn btn-info btn-sm">View Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <!-- Trainer Performance Overview -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Trainer Performance Overview</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Trainer Name</th>
                                    <th>Total Sessions</th>
                                    <th>Hours Worked</th>
                                    <th>Client Satisfaction</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>John Doe</td>
                                    <td>120</td>
                                    <td>200 hrs</td>
                                    <td>
                                        <span class="badge badge-success">95%</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Jane Smith</td>
                                    <td>100</td>
                                    <td>180 hrs</td>
                                    <td>
                                        <span class="badge badge-warning">85%</span>
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-sm">View Details</a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events/Promotions -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Upcoming Events & Promotions</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">Summer Yoga Retreat - 20% Off (June 20)</li>
                            <li class="list-group-item">Zumba Master Class - Free Entry for Members (July 1)</li>
                            <li class="list-group-item">Personal Training Discount - 10 Sessions for $400 (August)</li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Customer Feedback & Ratings -->
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Customer Feedback & Ratings</h3>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <strong>Class:</strong> Yoga <br>
                                <strong>Feedback:</strong> "Loved it! The trainer was amazing." <br>
                                <strong>Rating:</strong> <span class="badge badge-success">5/5</span>
                            </li>
                            <li class="list-group-item">
                                <strong>Class:</strong> Zumba <br>
                                <strong>Feedback:</strong> "It was energetic, but could use better music." <br>
                                <strong>Rating:</strong> <span class="badge badge-warning">4/5</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- Row 4: Logs and Activity Feed -->
            <div class="row">
                <!-- Recent Activity Logs -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Recent Activity Logs</h3>
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <li class="list-group-item">John Doe checked in at 10:45 AM</li>
                                <li class="list-group-item">Jane Smith registered for Yoga Class</li>
                                <li class="list-group-item">50 new members joined in the last month</li>
                                <li class="list-group-item">Revenue for the month crossed $24,500</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
</div>

<!-- Add your JavaScript for Charts -->
<script>
    var ctx = document.getElementById('revenueChart').getContext('2d');
        var revenueChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['January', 'February', 'March', 'April', 'May'],
                datasets: [{
                    label: 'Revenue',
                    data: [12000, 15000, 10000, 17000, 22000],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });

        var attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        var attendanceChart = new Chart(attendanceCtx, {
            type: 'bar',
            data: {
                labels: ['Week 1', 'Week 2', 'Week 3', 'Week 4'],
                datasets: [{
                    label: 'Attendance',
                    data: [50, 60, 40, 80],
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });

        var satisfactionCtx = document.getElementById('satisfactionChart').getContext('2d');
        var satisfactionChart = new Chart(satisfactionCtx, {
            type: 'pie',
            data: {
                labels: ['Satisfied', 'Neutral', 'Unsatisfied'],
                datasets: [{
                    data: [75, 15, 10],
                    backgroundColor: ['#4caf50', '#ffeb3b', '#f44336']
                }]
            }
        });
</script>
<script>
    var ctx = document.getElementById('revenueBreakdownChart').getContext('2d');
    var revenueBreakdownChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Memberships', 'Personal Training', 'Classes', 'Supplements'],
            datasets: [{
                data: [5000, 3000, 2000, 1000],
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56', '#4BC0C0']
            }]
        }
    });
</script>
@endsection