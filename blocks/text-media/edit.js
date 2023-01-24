import { __ } from "@wordpress/i18n";
import {
	MediaUpload,
	MediaUploadCheck,
	InnerBlocks,
	useBlockProps,
} from "@wordpress/block-editor";
import { Button } from "@wordpress/components";
import "./editor.scss";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	let { image } = attributes;
	if (!image) {
		image = {
			url: "",
			id: "",
		};
	}

	return (
		<section {...useBlockProps({ className: "textmedia" })}>
			<div className="text-wrapper">
				<InnerBlocks />
			</div>
			<div className="media-wrapper">
				{image.url && <img srcSet={image.url} />}
				{props.isSelected && (
					<MediaUploadCheck>
						<MediaUpload
							value={image.id}
							title={__("Choose an image", "chaos")}
							onSelect={(media) =>
								setAttributes({
									image: {
										id: media.id,
										url: media.url,
									},
								})
							}
							allowedTypes={["image"]}
							render={({ open }) => (
								<Button
									variant="primary"
									onClick={open}
									className="background-image-btn"
								>
									{image.url ? "Change Image" : "Upload Image"}
								</Button>
							)}
						/>
					</MediaUploadCheck>
				)}
			</div>
		</section>
	);
}
