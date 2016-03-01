<?php

// configure event details
$start_date = "2016-03-12 10:00:00"; // 10am
$end_date = "2016-03-12 16:00:00"; // 4pm
$event_name = "Example Event";
$event_details = htmlspecialchars('Event Details Here\n\n--\nhttp://example.com');
$event_location = "123 Main St, Example, NY 20001";
$return_url = "http://www.90octane.com/"; // return url for yahoo

// do not edit below this line
$current_date = str_replace( '-', '', str_replace( ':', '', gmdate('Y-m-d\TH:i:s\Z') ) );
$fstart_date = str_replace( '-', '', str_replace( ':', '', gmdate('Y-m-d\TH:i:s\Z', strtotime($start_date) ) ) );
$fend_date = str_replace( '-', '', str_replace( ':', '', gmdate('Y-m-d\TH:i:s\Z', strtotime($end_date) ) ) );

// calculate duration (for yahoo)
$start = new DateTime($start_date.'+00:00');
$end = new DateTime($end_date.'+00:00');
if ($start > $end) $start->sub(new DateInterval('P1D'));
$interval = $end->diff($start);
$hours = sprintf( '%02d', $interval->h );
$minutes = sprintf( '%02d', $interval->m );
$event_duration = $hours . $minutes;

?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Add To Calendar</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
	<style type="text/css">
		.dropdown-menu > li > a:focus,
		.dropdown-menu > li > a:hover {
			color: #fff;
			background-color: #337ab7;
		}
	</style>
</head>
<body>

	<div class="container">
		<div class="row">
			<div class="col-md-12">&nbsp;</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<div class="dropdown">
					<button class="btn btn-default btn-primary dropdown-toggle" type="button" id="addEventDropDown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">Add To Calendar <span class="caret"></span></button>
					<ul class="dropdown-menu" aria-labelledby="addEventDropDown">
						<li><a href="download.php?format=icalendar&amp;date=<?php echo str_replace('Z', '', $current_date); ?>&amp;text=<?= rawurlencode($event_name) ?>&amp;dates=<?= $fstart_date ?>/<?= $fend_date ?>&amp;details=<?= rawurlencode($event_details) ?>&amp;location=<?= rawurlencode($event_location) ?>">iCalendar</a></li>
						<li><a href="https://www.google.com/calendar/event?action=TEMPLATE&amp;text=<?= rawurlencode($event_name) ?>&amp;dates=<?= $fstart_date ?>/<?= $fend_date ?>&amp;details=<?= str_replace("%5Cn", "%0A", rawurlencode($event_details)) ?>&amp;location=<?= rawurlencode($event_location) ?>" target="_blank">Google Calendar</a></li>
						<li><a href="download.php?format=outlook&amp;date=<?= $current_date ?>&amp;text=<?= rawurlencode($event_name) ?>&amp;dates=<?= $fstart_date ?>Z/<?= $fend_date ?>Z&amp;details=<?= rawurlencode($event_details) ?>&amp;location=<?= rawurlencode($event_location) ?>">Outlook</a></li>
						<li><a href="https://bay04.calendar.live.com/calendar/calendar.aspx?rru=addevent&amp;summary=<?= rawurlencode($event_name) ?>&amp;location=<?= rawurlencode($event_location) ?>&amp;description=<?= str_replace("%5Cn", "%0A", rawurlencode($event_details)) ?>&amp;dtstart=<?= rawurlencode($fstart_date) ?>&amp;dtend=<?= rawurlencode($fend_date) ?>" target="_blank">Outlook Online</a></li>
						<li><a href="https://calendar.yahoo.com/?v=60&amp;view=d&amp;type=20&amp;title=<?= rawurlencode($event_name) ?>&amp;st=<?= rawurlencode($fstart_date) ?>&amp;dur=<?= rawurlencode($event_duration) ?>&amp;in_loc=<?= rawurlencode($event_location) ?>&amp;desc=<?= str_replace("%5Cn", "%0A", rawurlencode($event_details)) ?>&amp;url=<?= rawurlencode($return_url) ?>" target="_blank">Yahoo! Calendar</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="/js/bootstrap.min.js"></script>

</body>
</html>