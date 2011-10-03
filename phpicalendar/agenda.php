<?php
	
define('BASE', './');
require_once(BASE.'functions/date_functions.php');
require_once(BASE.'functions/init.inc.php');

// override $timeFormat in english.inc.php.  Check out: http://www.php.net/manual/en/function.date.php
$timeFormat = 'g:ia';

$current_view ='print';
$printview = 'agenda';

$days = 14;			if (isset($_GET['days']))			$days = $_GET['days'];
$start_time 	= strtotime($getdate);
$end_time 		= $start_time + ($days - 1) * 24 * 60 * 60;
$parse_month 		= date ("Ym", strtotime($getdate));
$events_week 		= 0;
$unix_time 			= strtotime($getdate);

$start_date 	= localizeDate($dateFormat_year, $start_time) . ' ' . localizeDate($dateFormat_week, $start_time);
$end_date 		= localizeDate($dateFormat_week, $end_time);
$display_date 	= "$start_date - $end_date";
$week_start 	= date("Ymd", $start_time);
$week_end 		= date("Ymd", $end_time);
$next_day		= date("Ymd", strtotime("+$days days", $unix_time));
$prev_day		= date("Ymd", strtotime("-$days days", $unix_time));
$today = date('Ymd', time() + $phpiCal_config->second_offset); 
$sidebar_date 		= localizeDate($dateFormat_week_list, $unix_time);

require_once(BASE.'functions/ical_parser.php');
require_once(BASE.'functions/list_functions.php');
require_once(BASE.'functions/template.php');
header("Content-Type: text/html; charset=$phpiCal_config->charset");

// select for calendars
$list_icals 	= display_ical_list(availableCalendars($username, $password, $phpiCal_config->ALL_CALENDARS_COMBINED));
$list_icals_pick = display_ical_list(availableCalendars($username, $password, $phpiCal_config->ALL_CALENDARS_COMBINED), TRUE);
$list_years 	= list_years();
$list_months 	= list_months();
$list_weeks 	= list_weeks();
$list_jumps 	= list_jumps();
$list_calcolors = list_calcolors();

$page = new Page(BASE.'templates/'.$template.'/agenda.tpl');

$page->replace_files(array(
	'header'			=> BASE.'templates/'.$phpiCal_config->template.'/header_agenda.tpl',
	'event_js'			=> BASE.'functions/event.js',
	'footer'			=> BASE.'templates/'.$phpiCal_config->template.'/footer.tpl',
    'calendar_nav'      => BASE.'templates/'.$phpiCal_config->template.'/calendar_nav.tpl',
    'search_box'        => BASE.'templates/'.$phpiCal_config->template.'/search_box.tpl'
	));

$page->replace_tags(array(
	'version'			=> $phpiCal_config->phpicalendar_version,
	'charset'			=> $phpiCal_config->charset,
	'template'			=> $phpiCal_config->template,
	'cal'				=> $cal,
	'getdate'			=> $getdate,
	'getcpath'			=> "&cpath=$cpath",
	'cpath'             => $cpath,
	'calendar_name'		=> $cal_displayname,
	'display_date'		=> $display_date,
	'rss_powered'	 	=> $rss_powered,
	'default_path'		=> $phpiCal_config->default_path,
	'rss_available' 	=> '',
	'rss_valid' 		=> '',
	'show_search' 		=> '',
	'next_day' 			=> $next_day,
	'prev_day'	 		=> $prev_day,
	'show_goto' 		=> '',
	'list_jumps' 		=> $list_jumps,
	'list_icals' 		=> $list_icals,
	'list_icals_pick'	=> $list_icals_pick,
	'list_years' 		=> $list_years,
	'list_months' 		=> $list_months,
	'list_weeks' 		=> $list_weeks,
	'legend'	 			=> $list_calcolors,
	'current_view'		=> $current_view,
	'style_select' 		=> '',
	'sidebar_date'		=> $sidebar_date,
	'l_goprint'			=> $lang['l_goprint'],
	'l_preferences'		=> $lang['l_preferences'],
	'l_calendar'		=> $lang['l_calendar'],
	'l_legend'			=> $lang['l_legend'],
	'l_tomorrows'		=> $lang['l_tomorrows'],
	'l_jump'			=> $lang['l_jump'],
	'l_todo'			=> $lang['l_todo'],
	'l_day'				=> $lang['l_day'],
	'l_week'			=> $lang['l_week'],
	'l_month'			=> $lang['l_month'],
	'l_year'			=> $lang['l_year'],
	'l_subscribe'		=> $lang['l_subscribe'],
	'l_download'		=> $lang['l_download'],
	'l_this_months'		=> $lang['l_this_months'],
	'l_search'			=> $lang['l_search'],
	'l_pick_multiple'	=> $lang['l_pick_multiple'],
	'days'				=> $days,
	'today'				=> $today,
	'event_js'			=> '',
	'is_logged_in' 		=> '',
	'l_time'			=> $lang['l_time'],
	'l_summary'			=> $lang['l_summary'],
	'l_description'		=> $lang['l_description'],
	'l_location'			=> $lang['l_location'],	
	'l_no_results'		=> $lang['l_no_results'],
	'l_powered_by'		=> $lang['l_powered_by'],
	'l_this_site_is'	=> $lang['l_this_site_is']				
	));

$page->draw_print($page);
$page->draw_subscribe($page);

$page->output();

?>
