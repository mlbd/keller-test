import {
	useBlockProps,
	InnerBlocks,
	InspectorControls,
} from '@wordpress/block-editor';
import { PanelBody, RangeControl } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import './editor.scss';

export default function Edit( { attributes, setAttributes } ) {
	const { columns } = attributes;

	const onChangeColumns = ( newColumns ) => {
		setAttributes( { columns: newColumns } );
	};

	return (
		<div
			{ ...useBlockProps( {
				className: `has-columns-${ columns }`,
				'data-rows': columns,
			} ) }
		>
			<InspectorControls>
				<PanelBody title={ __( 'Settings', 'boilerplate' ) }>
					<RangeControl
						label={ __( 'Number of Team Members', 'boilerplate' ) }
						value={ columns }
						min={ 1 }
						max={ 9 }
						onChange={ onChangeColumns }
					/>
				</PanelBody>
			</InspectorControls>
			<InnerBlocks
				allowedBlocks={ [ 'limon/team-member' ] }
				orientation="horizontal"
				template={ [
					[ 'limon/team-member' ],
					[ 'limon/team-member' ],
					[ 'limon/team-member' ],
				] }
			/>
		</div>
	);
}
