import { __ } from "@wordpress/i18n";
import {
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
	InnerBlocks,
} from "@wordpress/block-editor";
import "./editor.scss";
import { Button } from "@wordpress/components";

const ALLOWED_MEDIA_TYPES = ["image"];

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { imageURL, imageID } = attributes;

	return (
		<section {...useBlockProps({ className: "text-media" })}>
			<div className="left-col">
				{true && (
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
			<div className="right-col">
				<InnerBlocks
					allowedBlocks={[
						"core/paragraph",
						"core/heading",
						"core/buttons",
						"core/spacer",
						"core/separator",
					]}
				/>
			</div>
		</section>
	);
}
