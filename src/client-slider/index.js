import { registerBlockType } from '@wordpress/blocks';
import {
	InspectorControls,
	MediaUpload,
	useBlockProps,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';

registerBlockType( 'limon/logo-slider', {
	title: 'Client Logo Slider',
	icon: 'images-alt2',
	category: 'common',
	attributes: {
		images: {
			type: 'array',
			default: [],
		},
		speed: {
			type: 'number',
			default: 500,
		},
	},

	// Explicitly support alignment options: "wide" and "full"
	supports: {
		align: [ 'wide', 'full' ], // Now supports both 'wide' and 'full' alignments
	},

	edit( { attributes, setAttributes } ) {
		const { images, speed } = attributes;

		const handleImageSelect = ( media ) => {
			const newImages = media.map( ( image ) => ( {
				url: image.url,
				alt: image.alt,
				id: image.id,
			} ) );
			setAttributes( { images: newImages } );
		};

		const settings = {
			speed,
			infinite: true,
			centerMode: false,
			focusOnSelect: true,
		};

		// Use useBlockProps to apply the correct alignment class
		const blockProps = useBlockProps();

		return (
			<div>
				<InspectorControls>
					<PanelBody title="Slider Settings">
						<RangeControl
							label="Speed (ms)"
							value={ speed }
							onChange={ ( value ) =>
								setAttributes( { speed: value } )
							}
							min={ 200 }
							max={ 5000 }
						/>
					</PanelBody>
				</InspectorControls>

				<div
					{ ...blockProps } // Apply blockProps to include alignment classes
					className={ `${ blockProps.className } wp-block-limon-logo-slider-init` }
				>
					{ images.map( ( image, index ) => (
						<div key={ index }>
							<div className="wp-block-limon-logo-slider-item">
								<img src={ image.url } alt={ image.alt } />
							</div>
						</div>
					) ) }
				</div>

				<MediaUpload
					onSelect={ handleImageSelect }
					allowedTypes={ [ 'image' ] }
					multiple
					value={ images.map( ( image ) => image.id ) }
					render={ ( { open } ) => (
						<button onClick={ open }>Select Images</button>
					) }
				/>
			</div>
		);
	},

	save( { attributes } ) {
		const { images, speed } = attributes;

		const settings = {
			speed,
			infinite: true,
			centerMode: false,
			focusOnSelect: true,
		};

		// Use useBlockProps to apply the correct alignment class in the frontend
		const blockProps = useBlockProps.save();

		return (
			<div { ...blockProps }>
				<div
					className={ `${ blockProps.className } wp-block-limon-logo-slider-init` }
					{ ...settings }
				>
					{ images.map( ( image, index ) => (
						<div key={ index }>
							<div className="wp-block-limon-logo-slider-item">
								<img src={ image.url } alt={ image.alt } />
							</div>
						</div>
					) ) }
				</div>
			</div>
		);
	},
} );
