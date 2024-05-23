/*=========================================================================================
    File Name: picker-date-time.js
    Description: Pick a date/time Picker, Date Range Picker JS
    ----------------------------------------------------------------------------------------
    Item Name: Apex - Responsive Admin Theme
    Version: 2.1
    Author: Pixinvent
    Author URL: hhttp://www.themeforest.net/user/pixinvent
==========================================================================================*/
(function(window, document, $) {
	'use strict';

	/*******	Pick-a-date Picker	*****/
	// Basic date
	$('.pickadate').pickadate();

	// Change Day & Month strings
	$('.pickadate-short-string').pickadate({
		weekdaysShort: ['S', 'M', 'Tu', 'W', 'Th', 'F', 'S'],
		showMonthsShort: true
	});

	// Select Year
	$('.pickadate-select-year').pickadate({
		selectYears: 8
	});

	// Change first weekday
	$('.pickadate-firstday').pickadate({
		firstDay: 1
	});

	// Button options
	$('.pickadate-buttons').pickadate({
		today: '',
		close: 'Close Picker',
		clear: ''
	});

	// Date limits
	$('.pickadate-limits').pickadate({
		min: [2016,8,20],
		max: [2016,10,30]
	});

	// Format options
	$('.pickadate-format').pickadate({
		// Escape any 'rule' characters with an exclamation mark (!).
		format: 'Selecte!d Date : dddd, dd mmmm, yyyy',
		formatSubmit: 'mm/dd/yyyy',
		hiddenPrefix: 'prefix__',
		hiddenSuffix: '__suffix'
	});

	$( '.pickadate-arrow' ).pickadate({
		monthPrev: '&larr;',
		monthNext: '&rarr;',
		weekdaysShort: [ 'Su', 'Mo', 'Tu', 'We', 'Th', 'Fr', 'Sa' ],
		showMonthsFull: false
	});

	// Disable weekday range
	$('.pickadate-disable-weekday').pickadate({
		disable: [
			3
		]
	});

	// Disable dates
	$('.pickadate-disable-dates').pickadate({
		disable: [
			[2016,5,10],
			[2016,5,15],
			[2016,5,20]
		]
	});

	// Month & Year selectors
	$('.pickadate-selectors').pickadate({
		labelMonthNext: 'Next month',
		labelMonthPrev: 'Previous month',
		labelMonthSelect: 'Pick a Month',
		labelYearSelect: 'Pick a Year',
		selectMonths: true,
		selectYears: true
	});

	// With Select
	$('.pickadate-dropdown').pickadate({
		selectMonths: true,
		selectYears: true
	});

	// Events
	$('.pickadate-events').pickadate({
		onStart: function() {
			console.log('Hi there!!!');
		},
		onRender: function() {
			console.log('Holla... rendered new');
		},
		onOpen: function() {
			console.log('Picker Opened');
		},
		onClose: function() {
			console.log("I'm Closed now");
		},
		onStop: function() {
			console.log('Have a great day ahead!!');
		},
		onSet: function(context) {
			console.log('All stuff:', context);
		}
	});

	// Picker Translations
	$( '.pickadate-translations' ).pickadate({
		formatSubmit: 'dd/mm/yyyy',
		monthsFull: [ 'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre' ],
		monthsShort: [ 'Jan', 'Fev', 'Mar', 'Avr', 'Mai', 'Juin', 'Juil', 'Aou', 'Sep', 'Oct', 'Nov', 'Dec' ],
		weekdaysShort: [ 'Dim', 'Lun', 'Mar', 'Mer', 'Jeu', 'Ven', 'Sam' ],
		today: 'aujourd\'hui',
		clear: 'clair',
		close: 'Fermer'
	});

	$( '.pickadate-minmax' ).pickadate({
		dateMin: -8,
		dateMax: true
	});

	// // Date Range from & to
	// var from_$input = $('#picker_from').pickadate(),
	// from_picker = from_$input.pickadate('picker');

	// var to_$input = $('#picker_to').pickadate(),
	// 	to_picker = to_$input.pickadate('picker');


	// Check if there’s a “from” or “to” date to start with.
	// if ( from_picker.get('value') ) {
	// 	to_picker.set('min', from_picker.get('select'));
	// }
	// if ( to_picker.get('value') ) {
	// 	from_picker.set('max', to_picker.get('select'));
	// }

	// // When something is selected, update the “from” and “to” limits.
	// from_picker.on('set', function(event) {
	// 	if ( event.select ) {
	// 		to_picker.set('min', from_picker.get('select'));
	// 	}
	// 	else if ( 'clear' in event ) {
	// 		to_picker.set('min', false);
	// 	}
	// });
	// to_picker.on('set', function(event) {
	// 	if ( event.select ) {
	// 		from_picker.set('max', to_picker.get('select'));
	// 	}
	// 	else if ( 'clear' in event ) {
	// 		from_picker.set('max', false);
	// 	}
	// });


	/*******	Pick-a-time Picker	*****/
	// Basic time

})(window, document, jQuery);