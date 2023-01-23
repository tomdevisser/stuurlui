import { __ } from "@wordpress/i18n";
import { InnerBlocks, RichText, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps({ className: "crewmember" })}>
			<p>Crewmember image</p>
			<h4>Hans Oorschot</h4>
			<p>Strateeg</p>
		</div>
	);
}
