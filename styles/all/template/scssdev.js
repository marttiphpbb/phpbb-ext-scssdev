;(function($, window, document) {
	$('document').ready(function () {
		$('select#marttiphpbb_scssdev_file').change(function () {
			$(this).closest('form').find('#marttiphpbb_scssdev_save').click();
			return false;
		});
		$('input#marttiphpbb_scssdev_new').keydown(function (e) {
			if (e.which == 13){
				$(this).closest('form').find('#marttiphpbb_scssdev_save').click();
				return false;
			}
		});
		$('input#marttiphpbb_scssdev_size_threshold').keydown(function (e) {
			if (e.which == 13){
				$(this).closest('form').find('#marttiphpbb_scssdev_minify').click();
				return false;
			}
		});
	});
})(jQuery, window, document);