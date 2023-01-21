import { __ } from '@wordpress/i18n';
import { InnerBlocks, RichText, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps({ className: "services" })}>
			<RichText
				className="pretitle"
				tagName="p"
				value={ attributes.pretitle }
				allowedFormats={[]}
				onChange={ ( pretitle ) => setAttributes( { pretitle } ) }
				placeholder={ __( 'Pretitle here...', 'strl' ) }
			/>
			<RichText
				tagName="h2"
				value={ attributes.title }
				allowedFormats={[]}
				onChange={ ( title ) => setAttributes( { title } ) }
				placeholder={ __( 'Title here...', 'strl' ) }
			/>

			<div className="service-tab-titles">
				<button>Strategie</button>
				<button>Design</button>
				<button>Development</button>
			</div>

			<div className="service-tab-content">
				<div className="service-tab-image">

				</div>
				<div className="service-tab-card">
					<InnerBlocks
						allowedBlocks={[ 'core/paragraph', 'core/heading', 'core/button' ]}
					/>
				</div>
			</div>
		</div>
	);
}
