import { __ } from "@wordpress/i18n";
import {
	MediaUpload,
	MediaUploadCheck,
	useBlockProps,
	RichText,
	InnerBlocks,
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
					tagName="h1"
					className="block-title"
					value={title}
					placeholder={__("Here goes the block title...", "strl")}
					onChange={(title) => setAttributes({ title })}
				/>
			</div>
			<div className="right-col">
				<div className="media-wrapper">
					<InnerBlocks />
				</div>
			</div>
		</section>
	);
}
