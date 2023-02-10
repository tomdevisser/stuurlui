import { __ } from "@wordpress/i18n";
import { useBlockProps } from "@wordpress/block-editor";
import "./editor.scss";
// Import Swiper React components
import { Swiper, SwiperSlide } from "swiper/react";
import { Navigation, Pagination, A11y } from "swiper";
import { Button } from "@wordpress/components";

// Import Swiper styles
import "swiper/css";
import "swiper/css/navigation";
import "swiper/css/pagination";
import "swiper/css/scrollbar";

export default function Edit(props) {
	const { attributes, setAttributes } = props;
	const { slides } = attributes;

	function addSlide(slides) {
		console.log("test");
		let newSlides = [
			...slides,
			{
				text: "Lorem ipsum dolor amet si donos ip",
			},
		];

		setAttributes({ slides: newSlides });
	}

	return (
		<section {...useBlockProps({ className: "slider" })}>
			<Button
				variant="primary"
				onClick={() => addSlide(slides)}
				className="slide-btn"
			>
				Add Slide
			</Button>
			<Swiper
				modules={[Navigation, Pagination, A11y]}
				spaceBetween={150}
				slidesPerView={2}
				navigation
				pagination={{ clickable: true }}
				onSwiper={(swiper) => console.log(swiper)}
				onSlideChange={() => console.log("slide change")}
			>
				{slides.map((slide) => {
					return <SwiperSlide>{slide.text}</SwiperSlide>;
				})}
			</Swiper>
		</section>
	);
}
