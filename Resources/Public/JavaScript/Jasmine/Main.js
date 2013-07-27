Ext.ns('TYPO3.Phpunit.Jasmine');

TYPO3.Phpunit.Jasmine.App = {
	loadHtmlSpecRunner: function(extensionKey) {
		TYPO3.Phpunit.JasmineExtDirect.getHtmlSpecRunner(extensionKey, function(result) {
			if (result.status === 'success') {
				var $iframe = jQuery('<iframe id="specrunner" frameborder="0" src="../' + result.file + '"></iframe>');

				jQuery('#jasmine-test-results').append($iframe);
			} else {
				console.log(result);
			}
		});
	}
};