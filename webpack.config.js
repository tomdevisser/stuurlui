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
		services: path.resolve(__dirname, "/blocks/services", "index.js"),
		homeHeader: path.resolve(__dirname, "/blocks/home-header", "index.js"),
		textMedia: path.resolve(__dirname, "/blocks/text-media", "index.js"),
		contactTeam: path.resolve(__dirname, "/blocks/contact-team", "index.js"),
	},
	output: {
		path: path.resolve(__dirname, "build"),
	},
};
