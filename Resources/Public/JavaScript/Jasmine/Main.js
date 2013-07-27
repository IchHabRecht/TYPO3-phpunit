Ext.ns('TYPO3.Phpunit.Jasmine');

TYPO3.Phpunit.Jasmine.App = {

	loadHtmlSpecRunner: function(extKey) {
		TYPO3.Phpunit.JasmineExtDirect.getHtmlSpecRunner(extKey, function(result) {
			if (result.status === 'success') {

				new Ext.Panel({
					renderTo: Ext.getBody(),
					width: '100%',
					html: '<iframe id="specrunner" frameborder="0" src="../' + result.file + '"></iframe>'
				}).show();

				var iframe = Ext.get('specrunner');
				iframe.setHeight(Ext.getBody().getHeight() - iframe.getTop() - 2);
			} else {
				console.log(result);
			}
		});
	}

};