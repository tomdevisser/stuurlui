# Stuurlui

This is the official FSE theme used by Stuurlui, a WordPress comany from Utrecht.

## Usage

### Building assets

For building assets we're using the official `@wordpress/scripts` package from WordPress. We're tweaking it a little bit in our `webpack.config.js` in order to have multiple blocks in our theme.

### Adding a new block

Usually blocks are supposed to be living in plugins. To accomodate them all in this theme, I've made a few tweaks in registering, compiling and loading blocks. In order to add one, there are a few simple steps:

1. Add your block folder in `/blocks` and change the name on all occurances
2. Add the `index.js` entry point to `webpack.config.js`
3. That's really all, everything else gets done automatically :)

## General

## Roadmap

## Coding Standards

We follow all coding standards as specified by WordPress. To enforce these standards we use the industry standard code linters.

### PHP

For PHP we use the PHP Code Sniffer in combination with the WPCS configuration, as provided by WordPress. You can find the config in `phpcs.xml`.

### Editor

We also provide an editor config, found in the file `.editorconfig`. It specifies tabs instead of spaces, and ensures linebreak consistency between operating systems.
