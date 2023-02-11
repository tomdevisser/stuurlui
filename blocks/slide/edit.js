import { __ } from "@wordpress/i18n";
import { RichText } from "@wordpress/block-editor";
import "./editor.scss";
// Import Swiper React components
import { SwiperSlide } from "swiper/react";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { text, image } = attributes;

	return (
		<SwiperSlide>
			<RichText
				tagName="p"
				className="text"
				value={text}
				placeholder={__("Text here", "strl")}
				onChange={(text) => setAttributes({ text })}
			/>
		</SwiperSlide>
	);
}
