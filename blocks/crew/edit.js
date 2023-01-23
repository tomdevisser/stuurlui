import { __ } from "@wordpress/i18n";
import { InnerBlocks, RichText, useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps({ className: "crew" })}>
			<RichText
				tagName="h3"
				value={attributes.title}
				allowedFormats={[]}
				onChange={(title) => setAttributes({ title })}
				placeholder={__("Title here...", "strl")}
			/>
			<InnerBlocks allowedBlocks={["strl/crewmember"]} />
		</div>
	);
}
