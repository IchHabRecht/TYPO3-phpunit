Ext.ns('TYPO3.Phpunit.Jasmine');

TYPO3.Phpunit.Jasmine.App = {

	loadHtmlSpecRunner: function(extKey) {
		TYPO3.Phpunit.JasmineExtDirect.getHtmlSpecRunner(extKey, function(result) {
			if (result.status === 'success') {
				var $iframe = jQuery('<iframe id="specrunner" frameborder="0" src="../' + result.file + '"></iframe>');
				var $body = jQuery('body');

				jQuery('#jasmine-test-results').append($iframe);
			} else {
				console.log(result);
			}
		});
	}

};