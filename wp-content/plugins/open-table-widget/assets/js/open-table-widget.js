/**
 *  Open Table Widget JavaScript
 *
 *  @description: JavaScripts for the frontend display of Open Table Widget
 */

jQuery(document).ready(function ($) {

	//Selects (only if loaded)
	if (typeof $.fn.selectpicker == 'function') {
		jQuery('.otw-selectpicker').selectpicker();
	}

	//Party Size Change
	jQuery('.otw-party-size-select').on('change', function () {
		jQuery('.PartySize').val($(this).val());
	});

	var now = (Date.now() - 86400000); //allow today to be selected

	//Datepicker Initialization
	jQuery(".otw-reservation-date").datepicker({
		autohide : true,
		autopick : true,
		format: "mm/dd/yyyy",
		weekStart: 0,
		filter: function ( date ) {
			return date.valueOf() >= now;
		},
		template: (
			'<div class="open-table-widget-datepicker datepicker-container">' +
			'<div class="datepicker-panel" data-view="years picker">' +
			'<ul>' +
			'<li data-view="years prev">&lsaquo;</li>' +
			'<li data-view="years current"></li>' +
			'<li data-view="years next">&rsaquo;</li>' +
			'</ul>' +
			'<ul data-view="years"></ul>' +
			'</div>' +
			'<div class="datepicker-panel" data-view="months picker">' +
			'<ul>' +
			'<li data-view="year prev">&lsaquo;</li>' +
			'<li data-view="year current"></li>' +
			'<li data-view="year next">&rsaquo;</li>' +
			'</ul>' +
			'<ul data-view="months"></ul>' +
			'</div>' +
			'<div class="datepicker-panel" data-view="days picker">' +
			'<ul>' +
			'<li data-view="month prev">&lsaquo;</li>' +
			'<li data-view="month current"></li>' +
			'<li data-view="month next">&rsaquo;</li>' +
			'</ul>' +
			'<ul data-view="week"></ul>' +
			'<ul data-view="days"></ul>' +
			'</div>' +
			'</div>'
		)
	});

	$.fn.datepicker.noConflict();

});