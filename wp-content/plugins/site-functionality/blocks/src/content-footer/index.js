/**
 * BLOCK: content footer
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;

const {
	InnerBlocks,
} = wp.editor;

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
registerBlockType( 'custom/content-footer', {
	title: __( 'Content Footer Section', 'site-functionality' ), 
	icon: 'format-aside',
	category: 'custom',
	keywords: [
		__( 'footer', 'site-functionality' ),
		__( 'section', 'site-functionality' ),
	],
	anchor: true,
	customClassName: true,
	className: 'content-footer',

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: {}, className, getAttributes, setAttributes } = props;

		return (
			<section 
				className={className}
			>
				<div className="wp-block-custom-content-footer__inner-container inner-container">
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
		const { attributes: {}, className } = props;

		return (
			<section>
				<div className="wp-block-custom-content-footer__inner-container inner-container">
					<InnerBlocks.Content />
				</div>
		  </section>
		);
	  },
} );
