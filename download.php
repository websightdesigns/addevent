<?php

// set the variables
if( isset( $_GET['format'] ) ) $format = $_GET['format'];
if( isset( $_GET['date'] ) ) $current_date = $_GET['date'];
if( isset( $_GET['dates'] ) ) $dates = $_GET['dates'];
if( isset( $_GET['location'] ) ) $event_location = $_GET['location'];
if( isset( $_GET['text'] ) ) $event_name = $_GET['text'];
if( isset( $_GET['details'] ) ) $event_details = str_replace("\n", "\\n", $_GET['details']);

$filename = "calendar-event-";
if( isset($format) ) $filename .= $format . "-";
$filename .= date('Ymd') . ".ics";

// force file download
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=" . $filename);

// split the start and end dates
$dateparts = explode('/', $dates);
$start_date = $dateparts[0];
$end_date = $dateparts[1];

// echo the vcard
$str = <<< EOD
BEGIN:VCALENDAR
VERSION:2.0
PRODID:AddEvent
BEGIN:VEVENT
UID:55e62f5c3ae64
DTSTAMP;TZID=UTC:$current_date
DTSTART;TZID=UTC:$start_date
SEQUENCE:0
TRANSP:OPAQUE
DTEND;TZID=UTC:$end_date
LOCATION:$event_location
SUMMARY:$event_name
DESCRIPTION:$event_details
END:VEVENT
END:VCALENDAR
EOD;
echo $str;
