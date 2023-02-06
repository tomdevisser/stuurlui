import { __ } from "@wordpress/i18n";
import {
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
	RichText,
} from "@wordpress/block-editor";
import "./editor.scss";
import { Button } from "@wordpress/components";

const ALLOWED_MEDIA_TYPES = ["image"];

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { pretitle, title, imageURL, imageID } = attributes;

	return (
		<section {...useBlockProps({ className: "home-header" })}>
			<div className="left-col">
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
			<div className="right-col">
				{props.isSelected && (
					<MediaUploadCheck>
						<MediaUpload
							value={imageID}
							title={__("Choose an image", "chaos")}
							onSelect={(media) =>
								setAttributes({
									imageURL: media.url,
									imageID: media.url,
								})
							}
							allowedTypes={ALLOWED_MEDIA_TYPES}
							render={({ open }) => (
								<Button variant="primary" onClick={open} className="image-btn">
									{imageURL ? "Change Image" : "Upload Image"}
								</Button>
							)}
						/>
					</MediaUploadCheck>
				)}
				{imageURL && (
					<div className="media-wrapper">
						<img src={imageURL} />
					</div>
				)}
			</div>
		</section>
	);
}
