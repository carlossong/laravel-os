<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="widget-box">
                        <div class="container">
                            <a href="{{ route('os.create') }}" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-green-100 transition-colors duration-150 bg-green-700 rounded-lg focus:shadow-outline hover:bg-green-800">Nova O.S</a>
                            <a href="#" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-blue-100 transition-colors duration-150 bg-blue-700 rounded-lg focus:shadow-outline hover:bg-blue-800">Cliente</a>
                            <a href="#" class="icon-plus inline-flex items-center h-8 px-4 m-2 text-sm text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">Serviço</a>
                            <div id='full_calendar_events' data-route-load-events="{{ route('routeLoadEvents') }}">

                            </div>
                        </div>

                        {{-- Scripts --}}
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

                        <script>
                            function routeEvents(route) {
                                return document.getElementById('full_calendar_events').dataset[route];
                            }
                        </script>

                        <script>
                            $(document).ready(function () {

                                var SITEURL = "{{ url('/') }}";

                                $.ajaxSetup({
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    }
                                });

                                var calendar = $('#full_calendar_events').fullCalendar({
                                    editable: true,
                                    navLinks: true,
                                    locale: 'pt-br',
                                    events: routeEvents('routeLoadEvents'),
                                    eventRender: function (event, element, view) {
                                        if (event.allDay === 'true') {
                                            event.allDay = true;
                                        } else {
                                            event.allDay = false;
                                        }
                                    },
                                    selectable: true,
                                    selectHelper: true,
                                    select: function (start, end, allDay) {
                                        var client_id = prompt('Event Name:');
                                        if (client_id) {
                                            var start = $.fullCalendar.formatDate(event_start, "Y-MM-DD HH:mm:ss");
                                            var end = $.fullCalendar.formatDate(event_end, "Y-MM-DD HH:mm:ss");
                                            $.ajax({
                                                url: SITEURL + "/calendar-crud-ajax",
                                                data: {
                                                    client_id: client_id,
                                                    start: start,
                                                    end: end,
                                                    type: 'create'
                                                },
                                                type: "POST",
                                                success: function (data) {
                                                    displayMessage("Event created.");

                                                    calendar.fullCalendar('renderEvent', {
                                                        id: data.id,
                                                        client_id: client_id,
                                                        start: start,
                                                        end: end,
                                                        allDay: allDay
                                                    }, true);
                                                    calendar.fullCalendar('unselect');
                                                }
                                            });
                                        }
                                    },
                                    eventDrop: function (event, delta) {
                                        var event_start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                                        var event_end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");

                                        $.ajax({
                                            url: SITEURL + '/calendar-crud-ajax',
                                            data: {
                                                title: event.event_name,
                                                start: event_start,
                                                end: event_end,
                                                id: event.id,
                                                type: 'edit'
                                            },
                                            type: "POST",
                                            success: function (response) {
                                                displayMessage("Event updated");
                                            }
                                        });
                                    },
                                    eventClick: function (event) {
                                        var eventDelete = confirm("Are you sure?");
                                        if (eventDelete) {
                                            $.ajax({
                                                type: "POST",
                                                url: SITEURL + '/calendar-crud-ajax',
                                                data: {
                                                    id: event.id,
                                                    type: 'delete'
                                                },
                                                success: function (response) {
                                                    calendar.fullCalendar('removeEvents', event.id);
                                                    displayMessage("Event removed");
                                                }
                                            });
                                        }
                                    }
                                });
                            });

                            function displayMessage(message) {
                                toastr.success(message, 'Event');
                            }

                        </script>


                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
