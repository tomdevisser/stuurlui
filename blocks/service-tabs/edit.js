import { __ } from "@wordpress/i18n";
import {
	useBlockProps,
	RichText,
	InspectorControls,
} from "@wordpress/block-editor";
import { rawHandler } from "@wordpress/blocks";
import { useEntityRecords, useEntityRecord } from "@wordpress/core-data";
import { FormTokenField, PanelBody } from "@wordpress/components";
import "./editor.scss";
import { useEffect } from "@wordpress/element";

export default function Edit(props) {
	console.log(props);
	const { attributes, setAttributes } = props;
	const { title, pretitle, services, activeService } = attributes;
	const serviceRequest = useEntityRecords("postType", "services");
	const { record: activeServiceRecord } = useEntityRecord(
		"postType",
		"services",
		activeService
	);
	const { record: activeImage } = useEntityRecord(
		"postType",
		"attachment",
		activeServiceRecord?.featured_media
	);

	useEffect(() => {
		setAttributes({ activeServiceImage: activeImage });
	}, [activeImage]);

	useEffect(() => {
		if (!activeService && serviceRequest?.records?.length > 0) {
			setAttributes({ activeService: serviceRequest.records[0].id });
		}
	}, [serviceRequest]);

	return (
		<section {...useBlockProps({ className: "service-tabs" })}>
			<InspectorControls>
				<PanelBody title={__("Services", "strl")}>
					<FormTokenField
						label={__("Services to display", "post-picker")}
						value={serviceRequest?.records
							?.filter((service) => services?.includes(service.id))
							.map((service) => service.title.raw)}
						suggestions={serviceRequest?.records?.map(
							(service) => service.title.raw
						)}
						onChange={(newList) => {
							console.log(newList);
							setAttributes({
								services: serviceRequest?.records
									?.filter((service) => newList.includes(service.title.raw))
									.map((service) => service.id),
							});
						}}
					/>
				</PanelBody>
			</InspectorControls>
			<div className="block-header">
				<RichText
					tagName="p"
					className="pretitle"
					value={pretitle}
					placeholder={__("Pretitle", "strl")}
					onChange={(pretitle) => setAttributes({ pretitle })}
				/>
				<RichText
					allowedFormats={[]}
					tagName="h2"
					className="block-title"
					value={title}
					placeholder={__("Here goes the block title...", "strl")}
					onChange={(title) => setAttributes({ title })}
				/>
			</div>
			<ul className="tab-titles">
				{serviceRequest?.records
					?.filter((service) => services?.includes(service.id))
					.map((service) => (
						<li
							className="tab-title"
							data-service={service.id}
							onClick={() => {
								setAttributes({ activeService: service.id });
							}}
						>
							{service.title.raw}
						</li>
					))}
			</ul>

			<div className="tabs-content">
				{activeService && activeServiceRecord && (
					<div className="tab-content">
						<div className="left-col">
							{activeImage ? (
								<>
									<img src={activeImage.source_url} />
								</>
							) : (
								<p>No featured image found.</p>
							)}
						</div>
						<div className="right-col">
							<div className="content-wrapper">
								<h2>{activeServiceRecord.title.raw}</h2>
								{
									rawHandler({
										HTML: activeServiceRecord.content.rendered,
										mode: "BLOCKS",
									})[0].attributes.content
								}
								<p>
									<a href={activeServiceRecord.link} className="btn">
										Meer info
									</a>
								</p>
							</div>
						</div>
					</div>
				)}
			</div>
		</section>
	);
}
