/**
 * BLOCK: animated CTA
 *
 * Registering a basic block with Gutenberg.
 * Simple block, renders and saves the same content without any interactivity.
 */

//  Import CSS.
import './editor.scss';
import './style.scss';

const { __ } = wp.i18n;
const { registerBlockType } = wp.blocks;
const { URLInput } = wp.editor;
const {
	TextControl,
	CheckboxControl
} = wp.components;

const blockAttributes = {
	url: {
		type: 'string',
	},
	text: {
		type: 'string',
	},
	target: {
		type: 'boolean',
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
registerBlockType( 'custom/back-link', {
	title: __( 'Back Link', 'site-functionality' ), 
	icon: 'arrow-left-alt',
	category: 'custom',
	keywords: [
		__( 'navigation', 'site-functionality' ),
		__( 'back link', 'site-functionality' ),
	],
	anchor: true,
	customClassName: true,
	className: false,
	attributes: blockAttributes,

	/**
	 * The edit function describes the structure of your block in the context of the editor.
	 * This represents what the editor will render when the block is used.
	 *
	 * The "edit" property must be a valid function.
	 *
	 * @link https://wordpress.org/gutenberg/handbook/block-api/block-edit-save/
	 */
	edit: props => {
		const { attributes: { url, text, target }, className, getAttributes, setAttributes } = props;

		return (
			<div 
				className="custom-block-back-link"
			>
				<div className="inner-container">
					<TextControl
						label={ __( "Link Text", "site-functionality" ) }
						help={ __( "Add link text", "site-functionality" ) }
						value={ text }
						onChange={ text => setAttributes( { text } ) }
					/>
					<URLInput
						value={ url }
						onChange={ url => setAttributes( { url } ) }
					/>
					<CheckboxControl
						label={ __( "Open link in a new tab", "site-functionality" ) }
						checked={ target }
						onChange={ target => setAttributes( { target } ) }
					/>
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
		const { attributes: { url, text, target }, className } = props;
		const hasTarget = target;

		return (
			<div>
				{hasTarget ? (
					<a href={url} target="_blank" rel="nofollow noopener noreferrer">{text}</a>
				) : (
					<a href={url}>{text}</a>
				)}

			</div>
		);
	  },
} );
