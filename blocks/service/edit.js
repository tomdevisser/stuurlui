import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { useSelect } from "@wordpress/data";
import { SelectControl, PanelBody } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const { services } = useSelect((select) => {
		const { getEntityRecords } = select("core");

		return {
			services: getEntityRecords("postType", "services", {
				status: "publish",
				per_page: 6,
			}),
		};
	});

	let options = [];
	if (services) {
		options.push({ value: 0, label: "Select a page" });
		services.forEach((service) => {
			options.push({ value: service.id, label: service.title.rendered });
		});
	} else {
		options.push({ value: 0, label: "Loading..." });
	}

	return (
		<>
			<section {...useBlockProps({ className: "service" })}></section>
			<InspectorControls>
				<PanelBody title={__("Service", "strl")}>
					<SelectControl
						label={__("Choose a service", "strl")}
						options={options}
					/>
				</PanelBody>
			</InspectorControls>
		</>
	);
}
