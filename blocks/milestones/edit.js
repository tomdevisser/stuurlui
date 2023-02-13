import { __ } from "@wordpress/i18n";
import { useBlockProps, RichText } from "@wordpress/block-editor";
import { useEntityRecords } from "@wordpress/core-data";
import Slider from "react-slick";
import "./editor.scss";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { pretitle, title } = attributes;
	const milestonesRequest = useEntityRecords("postType", "milestone");
	const slickSettings = {
		infinite: false,
		arrows: true,
		dots: true,
		slidesToShow: 3,
		slidesToScroll: 1,
		appendDots: (dots) => <div className="timelinedots">{dots}</div>,
		appendArrows: (arrows) => <div className="timelinearrows">{arrows}</div>,
	};

	return (
		<section {...useBlockProps({ className: "milestones" })}>
			<div className="header">
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
			<div className="timelineslider">
				<Slider {...slickSettings}>
					{milestonesRequest.isResolving ? (
						<div>Loading milestones...</div>
					) : (
						milestonesRequest?.records?.map((milestone) => {
							return (
								<div className="timelineslide">
									<div className="slidewrap">
										<h4>{milestone.title.rendered}</h4>
										<div
											dangerouslySetInnerHTML={{
												__html: milestone.content.rendered,
											}}
										></div>
									</div>
								</div>
							);
						})
					)}
				</Slider>
			</div>
		</section>
	);
}
