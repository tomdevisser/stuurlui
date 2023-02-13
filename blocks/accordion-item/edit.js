import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";
import "./editor.scss";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { title, content, isOpen } = attributes;

	return (
		<>
			<section {...useBlockProps({ className: "accordion-item" })}>
				<div className="accordion-item-header">
					<RichText
						tagName="h3"
						className="accordion-item-title"
						value={title}
						placeholder={__("Accordion item title", "strl")}
						onChange={(title) => setAttributes({ title })}
						onClick={() => {
							setAttributes({ isOpen: !isOpen });
							console.log(attributes.isOpen);
						}}
					/>
				</div>
				{isOpen && (
					<div className="accordion-item-content-wrapper">
						<RichText
							tagName="p"
							className="accordion-item-content"
							value={content}
							placeholder={__("Accordion item content", "strl")}
							onChange={(content) => setAttributes({ content })}
						/>
					</div>
				)}
			</section>
		</>
	);
}
