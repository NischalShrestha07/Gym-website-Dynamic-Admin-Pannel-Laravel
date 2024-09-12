<x-adminheader />
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
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

            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">
                        <div class="col-md-12 grid-margin">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card tale-bg">
                                <div class="card-people mt-auto">
                                    <img src="Dashboard/images/dashboard/people.svg" alt="people">
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
                        <div class="col-md-6 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <p class="card-title">ROYAL POWER GYM GYM'S'S Report</p>
                                        <a href="#" class="text-info">View all</a>
                                    </div>
                                    <p class="font-weight-500">The total number of sessions within the date range. It is
                                        the period
                                        time a
                                        user is actively engaged with your website, page or app, etc</p>
                                    <div id="sales-legend" class="chartjs-legend mt-4 mb-2"></div>
                                    <canvas id="sales-chart"></canvas>
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



                    <div class="row">
                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card position-relative">
                                <div class="card-body">
                                    <h4 class="card-title">Class Schedule</h4>
                                    <div id="class-schedule-calendar"></div> <!-- Use a calendar plugin for display -->
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-7 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title mb-0">Top Products</p>
                                    <div class="table-responsive">
                                        <table class="table table-striped table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Search Engine Marketing</td>
                                                    <td class="font-weight-bold">$362</td>
                                                    <td>21 Sep 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Search Engine Optimization</td>
                                                    <td class="font-weight-bold">$116</td>
                                                    <td>13 Jun 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Display Advertising</td>
                                                    <td class="font-weight-bold">$551</td>
                                                    <td>28 Sep 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Pay Per Click Advertising</td>
                                                    <td class="font-weight-bold">$523</td>
                                                    <td>30 Jun 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>E-Mail Marketing</td>
                                                    <td class="font-weight-bold">$781</td>
                                                    <td>01 Nov 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-danger">Cancelled</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Referral Marketing</td>
                                                    <td class="font-weight-bold">$283</td>
                                                    <td>20 Mar 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-warning">Pending</div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Social media marketing</td>
                                                    <td class="font-weight-bold">$897</td>
                                                    <td>26 Oct 2018</td>
                                                    <td class="font-weight-medium">
                                                        <div class="badge badge-success">Completed</div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">To Do Lists</h4>
                                    <div class="list-wrapper pt-2">
                                        <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Meeting with Urban Team
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked>
                                                        Duplicate a project for new customer
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Project meeting with CEO
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li class="completed">
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox" checked>
                                                        Follow up of team zilla
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                            <li>
                                                <div class="form-check form-check-flat">
                                                    <label class="form-check-label">
                                                        <input class="checkbox" type="checkbox">
                                                        Level up for Antony
                                                    </label>
                                                </div>
                                                <i class="remove ti-close"></i>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="add-items d-flex mb-0 mt-2">
                                        <input type="text" class="form-control todo-list-input"
                                            placeholder="Add new task">
                                        <button
                                            class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i
                                                class="icon-circle-plus"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 stretch-card grid-margin">
                            <div class="card">
                                <div class="card-body">
                                    <p class="card-title mb-0">Projects</p>
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <thead>
                                                <tr>
                                                    <th class="pl-0  pb-2 border-bottom">Places</th>
                                                    <th class="border-bottom pb-2">Orders</th>
                                                    <th class="border-bottom pb-2">Users</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td class="pl-0">Kentucky</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">65</span>(2.15%)</p>
                                                    </td>
                                                    <td class="text-muted">65</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">Ohio</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">54</span>(3.25%)</p>
                                                    </td>
                                                    <td class="text-muted">51</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">Nevada</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">22</span>(2.22%)</p>
                                                    </td>
                                                    <td class="text-muted">32</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">North Carolina</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">46</span>(3.27%)</p>
                                                    </td>
                                                    <td class="text-muted">15</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">Montana</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">17</span>(1.25%)</p>
                                                    </td>
                                                    <td class="text-muted">25</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0">Nevada</td>
                                                    <td>
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">52</span>(3.11%)</p>
                                                    </td>
                                                    <td class="text-muted">71</td>
                                                </tr>
                                                <tr>
                                                    <td class="pl-0 pb-0">Louisiana</td>
                                                    <td class="pb-0">
                                                        <p class="mb-0"><span
                                                                class="font-weight-bold mr-2">25</span>(1.32%)</p>
                                                    </td>
                                                    <td class="pb-0">14</td>
                                                </tr>
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

    <x-adminfooter />