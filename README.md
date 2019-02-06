AddEvent
================

by @ezrafree

Add an event to a calendar with PHP.

Supports the following calendars:

* Apple Calendar
* Google Calendar
* Outlook
* Outlook Online
* Yahoo! Calendar

## Configuration Instructions

Edit `index.php` and edit the configuration section at the top to set your event information.

## Notes

### Apple Calendar

Apple's Calendar app uses a downloaded .ics file to set up the event in your calendar.

### Outlook

Microsoft's Outlook app also uses a downloaded .ics file to set up the event in your calendar.

### Yahoo! Calendar

Yahoo Calendar is the only calendar API that requires an event duration. With Yahoo! Calendar, you provide the event start date/time and it's duration.
