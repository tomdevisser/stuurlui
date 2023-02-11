import { __ } from "@wordpress/i18n";
import { useBlockProps, useInnerBlocksProps } from "@wordpress/block-editor";
import "./editor.scss";
// Import Swiper React components
import { Swiper } from "swiper/react";
import { Navigation, Pagination, A11y } from "swiper";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";

export default function Edit(props) {
	const blockProps = useBlockProps({ className: "slider" });
	const { children, ...combinedBlockProps } = useInnerBlocksProps(blockProps, {
		allowedBlocks: ["strl/slide"],
		template: [["strl/slide", { text: "Slide 1" }]],
	});

	return (
		<Swiper
			{...combinedBlockProps}
			modules={[Navigation, Pagination, A11y]}
			spaceBetween={150}
			slidesPerView={2}
			navigation
			pagination={{ clickable: true }}
			onSwiper={(swiper) => console.log(swiper)}
			onSlideChange={() => console.log("slide change")}
		>
			{children}
		</Swiper>
	);
}
