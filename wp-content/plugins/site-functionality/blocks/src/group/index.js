/**
 * BLOCK: group
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';
import classnames from 'classnames';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

const {
	InspectorControls,
	InnerBlocks,
	ColorPalette,
} = wp.editor;
const {
	PanelBody,
    PanelRow,
} = wp.components;

const blockAttributes = {
	backgroundColor: {
		type: "string",
    }
}

/**
 * Register: aa Gutenberg Block.
 *
 * Registers a new block provided a unique name and an object defining its
 * behavior. Once registered, the block is made editor as an option to any
 * editor interface where blocks are implemented.
 *
 * @link https://wordpress.org/gutenberg/handbook/block-api/
 * @param  {string}   name     Block name.
 * @param  {Object}   settings Block settings.
 * @return {?WPBlock}          The block, if it has been successfully
 *                             registered; otherwise `undefined`.
 */
registerBlockType( 'custom/group', {
	title: __( 'Group', 'site-functionality' ), 
	icon: 'screenoptions',
	category: 'cls-custom',
	keywords: [
		__( 'group', 'site-functionality' ),
		__( 'section', 'site-functionality' ),
	],
	attributes: blockAttributes,
	supports: {
		align: [ 'full', 'wide' ],
	},
	alignWide: true,
	anchor: true,
	customClassName: true,
	className: 'group',

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: { backgroundColor }, className, getAttributes, setAttributes } = props;

		const classNames = classnames( className,  {
			'has-background': backgroundColor,
			'block-group': true
		} );

		return (
			<div 
				className={classNames}
			>
				<InspectorControls> 
					<PanelBody
						title={ __( 'Color Settings', 'core-blocks' ) }
					>
						<PanelRow>
							<ColorPalette
								value={backgroundColor}
								onChange={backgroundColor => {
									setAttributes({ backgroundColor });
								}}
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>
				<div className="wp-block-functionality-group__inner-container inner-container">
					<InnerBlocks />
				</div>
			</div>
		);
	},

	/**
	 * The save function defines the way in which the different attributes should be combined
	 * into the final markup, which is then serialized by Gutenberg into post_content.
	 *
	 * The "save" property must be specified and must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	save: props => {
		const { attributes: {backgroundColor}, className } = props;

		const classNames = classnames( className, {
			'has-background': backgroundColor,
			'block-group': true
		} );

		return (
			<div 
				className={classNames}
			>
				<div className="wp-block-functionality-group__inner-container inner-container">
					<InnerBlocks.Content />
				</div>
		  </div>
		);
	  },
} );
