import { __ } from "@wordpress/i18n";
import { useBlockProps, InspectorControls } from "@wordpress/block-editor";
import { useEntityRecords, useEntityRecord } from "@wordpress/core-data";
import { select } from "@wordpress/data";
import { useEffect } from "@wordpress/element";
import { SelectControl, PanelBody } from "@wordpress/components";
import "./editor.scss";

export default function Edit({ attributes, setAttributes }) {
	const teamRequest = useEntityRecords("postType", "team");
	const { team, teamImage } = attributes;
	const { record } = useEntityRecord("postType", "team", team);
	const { isResolving, record: image } = useEntityRecord(
		"postType",
		"attachment",
		record?.featured_media
	);

	useEffect(() => {
		setAttributes({ teamImage: image });
	}, [image]);

	return (
		<>
			<section {...useBlockProps({ className: "contact-team" })}>
				{isResolving || !teamImage ? (
					<div>Loading team member...</div>
				) : (
					<div>
						{record && teamImage ? (
							<>
								<img src={teamImage.source_url} />
								<h2>{record.title.rendered}</h2>
							</>
						) : (
							<p>Please select a team member in block settings.</p>
						)}
					</div>
				)}
			</section>
			<InspectorControls>
				<PanelBody title={__("Team Member", "strl")}>
					{teamRequest.isResolving ? (
						<div>Loading team members...</div>
					) : (
						<SelectControl
							label={__("Choose a team member", "strl")}
							value={team}
							options={teamRequest?.records?.map((team) => {
								return {
									label: team.title.raw,
									value: team.id,
								};
							})}
							onChange={(selectedTeam) => {
								setAttributes({ team: parseInt(selectedTeam) });
							}}
						/>
					)}
				</PanelBody>
			</InspectorControls>
		</>
	);
}
