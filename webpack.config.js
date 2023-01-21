/**
 * External Dependencies
 */
const path = require('path');

/**
 * WordPress Dependencies
 */
const defaultConfig = require('@wordpress/scripts/config/webpack.config.js');

module.exports = {
	...defaultConfig,
	entry: {
		pretitle: path.resolve(__dirname, '/blocks/pretitle', 'index.js'),
	},
	output: {
		path: path.resolve(__dirname, 'build'),
	},
}
