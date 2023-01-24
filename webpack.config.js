/**
 * External Dependencies
 */
const path = require("path");

/**
 * WordPress Dependencies
 */
const defaultConfig = require("@wordpress/scripts/config/webpack.config.js");

module.exports = {
	...defaultConfig,
	entry: {
		service: path.resolve(__dirname, "/blocks/service", "index.js"),
	},
	output: {
		path: path.resolve(__dirname, "build"),
	},
};
