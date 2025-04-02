const Encore = require('@symfony/webpack-encore');

Encore.setOutputPath('public/')
	.setPublicPath('/bundles/contaobackendviewtransition')
	.setManifestKeyPrefix('')
	.cleanupOutputBeforeBuild()
	.disableSingleRuntimeChunk()
	.enableSourceMaps(!Encore.isProduction())
	.enableVersioning(Encore.isProduction())
	.addEntry('backend', './assets/backend.js');

const config = Encore.getWebpackConfig();
config.watchOptions = {
	poll: 150,
};

module.exports = [config];
