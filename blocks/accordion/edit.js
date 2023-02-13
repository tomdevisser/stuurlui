import { __ } from "@wordpress/i18n";
import { useBlockProps, InnerBlocks } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit() {
	return (
		<section {...useBlockProps({ className: "accordion" })}>
			<InnerBlocks allowedBlocks={["strl/accordion-item"]} />
		</section>
	);
}
