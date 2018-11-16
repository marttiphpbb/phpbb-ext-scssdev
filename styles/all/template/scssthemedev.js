;(function($, window, document) {
	$('document').ready(function () {
		$('select#marttiphpbb_scssthemedev_filename').change(function () {
			$(this).closest('form').submit();
		});
	});
})(jQuery, window, document);