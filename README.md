# Calendar:

This PHP code is a simple `calendar application` that allows users to view and manage events for specific days. The code consists of several important functions that handle the display of the calendar, events, and a modal window for adding new events. Here's a brief explanation of each part:

## Stack:

- `PHP`
- `CSS`
- `JavaScript`

## The PHP Functions:

`showCalendar()`: This function generates a monthly calendar table based on the given parameters, such as the month, year, first day of the week, and the total days of the month.

`showMonthAndYear()`: It displays the month and year as a heading in the calendar.

`showDaysOfTheWeek()`: This function shows the days of the week (Monday to Sunday) as table headers in the calendar.

`showDays()`: It populates the calendar with individual day cells, marking the current day and any existing events.

The `showEvents()` Function:

This function displays a list of events with their respective details (day, event text, and event hour) on the side of the calendar.
It also provides an option to delete events.

The `modal()` Function:

This function creates a modal window that allows users to add new events.
The modal includes input fields for event text, and event hour, along with "Add Event" and "Close" buttons.

The `saveDaysEvents()` Function:

This function is responsible for handling the saving and deletion of events in the calendar.
It reads and writes events data to a file named "eventsDays.txt" using serialization for data persistence.

The HTML part contains the structure of the calendar and events display. The calendar is displayed in a table format with each day represented in a cell. The events list is shown next to the calendar.

In addition, there are two simple JavaScript functions (openForm() and closeForm()) that control the visibility of the modal window for adding events.

## Resources

- `PHP` documentation: https://www.php.net/manual/en/langref.php
