
<div>
    <div id="calendar" class="mx-auto  md:w-8/12 sm:w-11/12 h-screen dark:text-white dark:bg-gray-900 overflow-x-hidden"></div>

    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.5/index.global.min.js"></script>
    <script>

        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                events: @json($appointments),
                locale: 'es'
            });
            calendar.render();
        });

    </script>
</div>
