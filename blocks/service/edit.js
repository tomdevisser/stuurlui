import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { useSelect, select } from "@wordpress/data";
import { SelectControl, PanelBody } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	return (
		<>
			<section {...useBlockProps({ className: "service" })}></section>
			<InspectorControls>
				<PanelBody title={__("Service", "strl")}>
					<SelectControl label={__("Choose a service", "strl")} />
				</PanelBody>
			</InspectorControls>
		</>
	);
}
