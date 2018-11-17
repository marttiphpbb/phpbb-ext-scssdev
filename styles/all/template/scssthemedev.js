;(function($, window, document) {
	$('document').ready(function () {
		$('select#marttiphpbb_scssthemedev_file').change(function () {
			$(this).closest('form').find('#marttiphpbb_scssthemedev_submit').click();
		});
	});
})(jQuery, window, document);