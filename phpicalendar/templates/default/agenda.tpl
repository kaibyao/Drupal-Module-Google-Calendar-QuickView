	<!-- switch rss_available on -->
	<link rel="alternate" type="application/rss+xml" title="RSS" href="{DEFAULT_PATH}/rss/rss.php?cal={CAL}&amp;rssview={CURRENT_VIEW}">
	<!-- switch rss_available off -->		
	{EVENT_JS}
<form name="eventPopupForm" id="eventPopupForm" method="post" action="/web/calendar.php" style="display: none;">
  <input type="hidden" name="date" id="date" value="" />
  <input type="hidden" name="time" id="time" value="" />
  <input type="hidden" name="uid" id="uid" value="" />
  <input type="hidden" name="cpath" id="cpath" value="" />
  <input type="hidden" name="event_data" id="event_data" value="" />
</form>
<form name="todoPopupForm" id="todoPopupForm" method="post" action="/web/sites/all/modules/gcalqv/phpicalendar/includes/todo.php" style="display: none;">
  <input type="hidden" name="todo_data" id="todo_data" value="" />
  <input type="hidden" name="todo_text" id="todo_text" value="" />
</form>

<!-- switch some_events on -->
	<div class="gcalendar-date">{DAYOFMONTH}</div>
	<!-- loop events on -->
	<div class="gcalendar-description">{EVENT_START} - {EVENT_TEXT}</div>
	<!-- loop events off -->
<!-- switch some_events off -->

<!-- switch no_events on -->
<div class="V12"><b>{L_NO_RESULTS}</b></div>
<!-- switch no_events off -->
<!-- switch display_download on -->
<br /><span class="V9">{L_SUBSCRIBE}: <a href="{DOWNLOAD_FILENAME}">{CALENDAR_NAME}</a></span>
<!-- switch display_download off -->	