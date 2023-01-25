import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { useEntityRecords, useEntityRecord } from "@wordpress/core-data";
import { SelectControl, PanelBody } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const servicesRequest = useEntityRecords("postType", "services");
	const { service } = attributes;
	const { isResolving, record } = useEntityRecord(
		"postType",
		"services",
		service
	);

	return (
		<>
			<section {...useBlockProps({ className: "service" })}>
				{isResolving ? (
					<div>Loading service...</div>
				) : (
					<div>
						{record ? (
							<h2>{record.title.raw}</h2>
						) : (
							<p>Please select a service in block settings.</p>
						)}
					</div>
				)}
			</section>
			<InspectorControls>
				<PanelBody title={__("Service", "strl")}>
					{servicesRequest.isResolving ? (
						<div>Loading services...</div>
					) : (
						<SelectControl
							label={__("Choose a service", "strl")}
							value={service}
							options={servicesRequest?.records?.map((service) => {
								return {
									label: service.title.raw,
									value: service.id,
								};
							})}
							onChange={(selectedService) => {
								setAttributes({ service: parseInt(selectedService) });
							}}
						/>
					)}
				</PanelBody>
			</InspectorControls>
		</>
	);
}
