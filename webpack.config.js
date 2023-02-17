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
		strlStyles: path.resolve(__dirname, "/src/scss", "styles.scss"),
		strlScripts: path.resolve(__dirname, "/src/js", "scripts.js"),
		homeHeader: path.resolve(__dirname, "/blocks/home-header", "index.js"),
		textMedia: path.resolve(__dirname, "/blocks/text-media", "index.js"),
		contactTeam: path.resolve(__dirname, "/blocks/contact-team", "index.js"),
		milestones: path.resolve(__dirname, "/blocks/milestones", "index.js"),
		serviceTabs: path.resolve(__dirname, "/blocks/service-tabs", "index.js"),
	},
	output: {
		path: path.resolve(__dirname, "build"),
	},
};
