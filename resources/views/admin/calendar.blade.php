<!-- resources/views/calendar.blade.php -->
@php
$layout = match (Auth::user()->role) {
'Admin' => 'admin.layouts.adminLayout',
'Trainer' => 'admin.layouts.trainerLayout',
'Staff' => 'admin.layouts.staffLayout',
'Member' => 'admin.layouts.memberLayout',
default => 'layouts.memberLayout', // Optional fallback layout
};
@endphp

@extends($layout)


@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><b>Calendar</b></h1>
                    <h4>Dashboard/Calendar</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Calendar</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Modal to add event -->
<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventModalLabel">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="eventForm">
                    <div class="form-group">
                        <label for="event-title">Event Title</label>
                        <input type="text" class="form-control" id="event-title" required>
                    </div>
                    <div class="form-group">
                        <label for="start-date">Start Date</label>
                        <input type="datetime-local" class="form-control" id="start-date" required>
                    </div>
                    <div class="form-group">
                        <label for="end-date">End Date</label>
                        <input type="datetime-local" class="form-control" id="end-date">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="delete-event" class="btn btn-danger">Delete Event</button>
                <button type="button" id="save-event" class="btn btn-primary">Save Event</button>
            </div>
        </div>
    </div>
</div>

<!-- Scripts -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> <!-- Latest jQuery -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/fullcalendar@5.10.1/main.min.css" rel="stylesheet" />

<script>
    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            selectable: true,
            select: function (info) {
                $('#eventModal').modal('show');
                $('#start-date').val(info.startStr);
                $('#end-date').val(info.endStr);
            },
            events: '/fetch-events',
            editable: true,
            eventDrop: function (info) {
                updateEvent(info.event);
            }
        });

        calendar.render();

        $('#save-event').click(function () {
            var title = $('#event-title').val();
            var start = $('#start-date').val();
            var end = $('#end-date').val();

            if (title) {
                if (end && new Date(start) > new Date(end)) {
                    alert('End date must be greater than or equal to the start date.');
                    return;
                }
                $.ajax({
                    url: '/store-event',
                    type: 'POST',
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        calendar.addEvent({
                            id: response.id,
                            title: title,
                            start: start,
                            end: end
                        });
                        $('#eventModal').modal('hide');
                        $('#eventForm')[0].reset();
                    },
                    error: function (error) {
                        console.error('Error saving event:', error);
                        alert('Failed to save event. Please try again.');
                    }
                });
            } else {
                alert('Event title is required!');
            }
        });

        function updateEvent(event) {
            var id = event.id;
            var start = event.start.toISOString();
            var end = event.end ? event.end.toISOString() : start;

            $.ajax({
                url: '/update-event/' + id,
                type: 'PUT',
                data: {
                    start: start,
                    end: end,
                    _token: '{{ csrf_token() }}'
                },
                success: function (response) {
                    console.log('Event updated successfully');
                },
                error: function (error) {
                    console.error('Error updating event:', error);
                    alert('Failed to update event. Please try again.');
                }
            });
        }
    });
</script>
<script>
    $(document).ready(function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            selectable: true,
            select: function (info) {
                $('#eventModal').modal('show');
                $('#start-date').val(info.startStr);
                $('#end-date').val(info.endStr);
                $('#save-event').removeData('eventId'); // Clear the event ID
            },
            events: '/fetch-events',
            editable: true,
            eventClick: function (info) {
                $('#eventModal').modal('show');
                $('#event-title').val(info.event.title);
                $('#start-date').val(info.event.start.toISOString().slice(0, 16)); // Format for datetime-local
                $('#end-date').val(info.event.end ? info.event.end.toISOString().slice(0, 16) : '');

                // Store the event id to update or delete later
                $('#save-event').data('eventId', info.event.id);
            },
        });

        calendar.render();

        $('#save-event').click(function () {
            var eventId = $(this).data('eventId');
            var title = $('#event-title').val();
            var start = $('#start-date').val();
            var end = $('#end-date').val();

            if (title) {
                if (end && new Date(start) > new Date(end)) {
                    alert('End date must be greater than or equal to the start date.');
                    return;
                }
                var url = eventId ? '/update-event/' + eventId : '/store-event'; // Use appropriate URL
                var type = eventId ? 'PUT' : 'POST'; // Determine HTTP method

                $.ajax({
                    url: url,
                    type: type,
                    data: {
                        title: title,
                        start: start,
                        end: end,
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (!eventId) {
                            calendar.addEvent({
                                id: response.id,
                                title: title,
                                start: start,
                                end: end
                            });
                        } else {
                            // Update the event on the calendar
                            var eventToUpdate = calendar.getEventById(eventId);
                            eventToUpdate.setProp('title', title);
                            eventToUpdate.setStart(start);
                            eventToUpdate.setEnd(end);
                        }
                        $('#eventModal').modal('hide');
                        $('#eventForm')[0].reset();
                        $(this).removeData('eventId'); // Clear the stored event ID
                    },
                    error: function (error) {
                        console.error('Error saving event:', error);
                        alert('Failed to save event. Please try again.');
                    }
                });
            } else {
                alert('Event title is required!');
            }
        });

        // Handle delete event button click
        $('#delete-event').click(function () {
            var eventId = $('#save-event').data('eventId');
            if (eventId) {
                $.ajax({
                    url: '/delete-event/' + eventId,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function (response) {
                        if (response.success) {
                            var eventToDelete = calendar.getEventById(eventId);
                            eventToDelete.remove(); // Remove the event from the calendar
                            $('#eventModal').modal('hide');
                            $('#eventForm')[0].reset();
                            $('#save-event').removeData('eventId'); // Clear the stored event ID
                        }
                    },
                    error: function (error) {
                        console.error('Error deleting event:', error);
                        alert('Failed to delete event. Please try again.');
                    }
                });
            }
        });
    });
</script>

@endsection