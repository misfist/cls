/**
 * BLOCK: group
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

console.log( 'group loaded' );

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
registerBlockType( 'core-functionality/group', {
	title: __( 'Group', 'core-functionality' ), 
	icon: {
		background: "#11155e",
		foreground: '#ffffff',
		src: 'screenoptions',
	},
	category: 'layout',
	keywords: [
		__( 'group', 'core-functionality' ),
		__( 'section', 'core-functionality' ),
	],
	keywords: [
		__( 'group section content', 'core-blocks' ),
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
			<section 
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
			</section>
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
			<section 
				className={classNames}
			>
				<div className="wp-block-functionality-group__inner-container inner-container">
					<InnerBlocks.Content />
				</div>
		  </section>
		);
	  },
} );
