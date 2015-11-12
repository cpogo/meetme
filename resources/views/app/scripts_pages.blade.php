		<!-- jQuery 2.1.4 -->
		<script src="{{ asset('plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
		<!-- Bootstrap 3.3.5 -->
		<script src="{{ asset('js/bootstrap.min.js') }}"></script>
		<!-- Select2 -->
		<script src="{{ asset('plugins/select2/select2.full.min.js') }}"></script>
		<!-- InputMask -->
		<script src="{{ asset('plugins/input-mask/jquery.inputmask.js') }}"></script>
		<script src="{{ asset('plugins/input-mask/jquery.inputmask.date.extensions.js') }}"></script>
		<script src="{{ asset('plugins/input-mask/jquery.inputmask.extensions.js') }}"></script>
		<!-- date-range-picker -->
{{--		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}
		<script src="{{ asset('plugins/momentjs/moment-2.10.2.min.js') }}"></script>
		<script src="{{ asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
		<!-- bootstrap color picker -->
		<script src="{{ asset('plugins/colorpicker/bootstrap-colorpicker.min.js') }}"></script>
		<!-- bootstrap time picker -->
		<script src="{{ asset('plugins/timepicker/bootstrap-timepicker.min.js') }}"></script>
		<!-- jQuery UI 1.11.4 -->
{{--		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>--}}
		<script src="{{ asset('plugins/jQueryUI/jquery-ui.min.js') }}"></script>
		<!-- Slimscroll -->
		<script src="{{ asset('plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
		<!-- iCheck 1.0.1 -->
		<script src="{{ asset('plugins/iCheck/icheck.min.js') }}"></script>
		<!-- FastClick -->
		<script src="{{ asset('plugins/fastclick/fastclick.min.js') }}"></script>
		<!-- AdminLTE App -->
		<script src="{{ asset('js/app.min.js') }}"></script>
		<!-- AdminLTE for demo purposes -->
		<script src="{{ asset('js/demo.js') }}"></script>
		<!-- fullCalendar 2.2.5 -->
{{--		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>--}}
		<script src="{{ asset('plugins/fullcalendar/fullcalendar.min.js') }}"></script>
		<!-- Page specific script -->
		<script>
$(function () {

	/* initialize the external events
	 -----------------------------------------------------------------*/
	function ini_events(ele) {
		ele.each(function () {

			// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
			// it doesn't need to have a start or end
			var eventObject = {
				title: $.trim($(this).text()) // use the element's text as the event title
			};

			// store the Event Object in the DOM element so we can get to it later
			$(this).data('eventObject', eventObject);

			// make the event draggable using jQuery UI
			$(this).draggable({
				zIndex: 1070,
				revert: true, // will cause the event to go back to its
				revertDuration: 0  //  original position after the drag
			});

		});
	}
	ini_events($('#external-events div.external-event'));

	/* initialize the calendar
	 -----------------------------------------------------------------*/
	//Date for the calendar events (dummy data)
	var date = new Date();
	var d = date.getDate(),
			m = date.getMonth(),
			y = date.getFullYear();
	$('#calendar').fullCalendar({
		header: {
			left: 'prev,next today',
			center: 'title',
			right: 'month,agendaWeek,agendaDay'
		},
		buttonText: {
			today: 'today',
			month: 'month',
			week: 'week',
			day: 'day'
		},
		//Random default events
		events: [
			{
				title: 'All Day Event',
				start: new Date(y, m, 1),
				backgroundColor: "#f56954", //red
				borderColor: "#f56954" //red
			},
			{
				title: 'Long Event',
				start: new Date(y, m, d - 5),
				end: new Date(y, m, d - 2),
				backgroundColor: "#f39c12", //yellow
				borderColor: "#f39c12" //yellow
			},
			{
				title: 'Meeting',
				start: new Date(y, m, d, 10, 30),
				allDay: false,
				backgroundColor: "#0073b7", //Blue
				borderColor: "#0073b7" //Blue
			},
			{
				title: 'Lunch',
				start: new Date(y, m, d, 12, 0),
				end: new Date(y, m, d, 14, 0),
				allDay: false,
				backgroundColor: "#00c0ef", //Info (aqua)
				borderColor: "#00c0ef" //Info (aqua)
			},
			{
				title: 'Birthday Party',
				start: new Date(y, m, d + 1, 19, 0),
				end: new Date(y, m, d + 1, 22, 30),
				allDay: false,
				backgroundColor: "#00a65a", //Success (green)
				borderColor: "#00a65a" //Success (green)
			},
			{
				title: 'Click for Google',
				start: new Date(y, m, 28),
				end: new Date(y, m, 29),
				url: 'http://google.com/',
				backgroundColor: "#3c8dbc", //Primary (light-blue)
				borderColor: "#3c8dbc" //Primary (light-blue)
			}
		],
		editable: true,
		droppable: true, // this allows things to be dropped onto the calendar !!!
		drop: function (date, allDay) { // this function is called when something is dropped

			// retrieve the dropped element's stored Event Object
			var originalEventObject = $(this).data('eventObject');

			// we need to copy it, so that multiple events don't have a reference to the same object
			var copiedEventObject = $.extend({}, originalEventObject);

			// assign it the date that was reported
			copiedEventObject.start = date;
			copiedEventObject.allDay = allDay;
			copiedEventObject.backgroundColor = $(this).css("background-color");
			copiedEventObject.borderColor = $(this).css("border-color");

			// render the event on the calendar
			// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
			$('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

			// is the "remove after drop" checkbox checked?
			if ($('#drop-remove').is(':checked')) {
				// if so, remove the element from the "Draggable Events" list
				$(this).remove();
			}

		}
	});

	/* ADDING EVENTS */
	var currColor = "#3c8dbc"; //Red by default
	//Color chooser button
	var colorChooser = $("#color-chooser-btn");
	$("#color-chooser > li > a").click(function (e) {
		e.preventDefault();
		//Save color
		currColor = $(this).css("color");
		//Add color effect to button
		$('#add-new-event').css({"background-color": currColor, "border-color": currColor});
	});
	$("#add-new-event").click(function (e) {
		e.preventDefault();
		//Get value and make sure it is not null
		var val = $("#new-event").val();
		if (val.length == 0) {
			return;
		}

		//Create events
		var event = $("<div />");
		event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
		event.html(val);
		$('#external-events').prepend(event);

		//Add draggable funtionality
		ini_events(event);

		//Remove event from text input
		$("#new-event").val("");
	});
});

$(function () {
	//Initialize Select2 Elements
	$(".select2").select2();

	//Datemask dd/mm/yyyy
	$("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
	//Datemask2 mm/dd/yyyy
	$("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
	//Money Euro
	$("[data-mask]").inputmask();

	//Date range picker
	$('#reservation').daterangepicker();
	//Date range picker with time picker
	$('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
	//Date range as a button
	$('#daterange-btn').daterangepicker(
			{
				ranges: {
					'Today': [moment(), moment()],
					'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days': [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month': [moment().startOf('month'), moment().endOf('month')],
					'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
				},
				startDate: moment().subtract(29, 'days'),
				endDate: moment()
			},
			function (start, end) {
				$('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
			}
	);

	//iCheck for checkbox and radio inputs
	$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		checkboxClass: 'icheckbox_minimal-blue',
		radioClass: 'iradio_minimal-blue'
	});
	//Red color scheme for iCheck
	$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
		checkboxClass: 'icheckbox_minimal-red',
		radioClass: 'iradio_minimal-red'
	});
	//Flat red color scheme for iCheck
	$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
		checkboxClass: 'icheckbox_flat-green',
		radioClass: 'iradio_flat-green'
	});

	//Colorpicker
	$(".my-colorpicker1").colorpicker();
	//color picker with addon
	$(".my-colorpicker2").colorpicker();

	//Timepicker
	$(".timepicker").timepicker({
		showInputs: false
	});
});
		</script>
