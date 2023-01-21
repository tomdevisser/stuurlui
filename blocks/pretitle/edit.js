import { __ } from '@wordpress/i18n';
import { RichText, useBlockProps } from '@wordpress/block-editor';
import './editor.scss';

export default function Edit({ attributes, setAttributes }) {
	return (
		<div {...useBlockProps()}>
			<RichText
				tagName="p"
				value={ attributes.text }
				allowedFormats={[]}
				onChange={ ( text ) => setAttributes( { text } ) }
				placeholder={ __( 'Pretitle here...', 'strl' ) }
			/>
		</div>
	);
}
