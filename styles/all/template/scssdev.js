;(function($, window, document) {
	$('document').ready(function () {
		$('select#marttiphpbb_scssdev_file').change(function () {
			$(this).closest('form').find('#marttiphpbb_scssdev_submit').click();
		});
	});
})(jQuery, window, document);