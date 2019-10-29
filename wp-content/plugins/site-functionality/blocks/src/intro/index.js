/**
 * BLOCK: intro
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
	RichText,
	ColorPalette,
	URLInput,
	InspectorControls,
	withColors, 
	PanelColorSettings, 
	getColorClassName,
	getColorObjectByColorValue
} = wp.editor;

const {
	TextControl,
	CheckboxControl,
	PanelBody,
	PanelRow,
	RadioControl,
} = wp.components;

const { Fragment } = wp.element;

const { withSelect } = wp.data;

const blockAttributes = {
	data: {
		type: 'string',
		source: 'meta',
		meta: 'intro-data'
	},
	title: {
		type: 'string',
		source: 'meta',
		meta: 'intro-title'
	},
	content: {
		type: 'string',
		source: 'meta',
		meta: 'intro-content'
	},
	url: {
		type: 'string',
		source: 'meta',
		meta: 'intro-button-url'
	},
	linkText: {
		type: 'string',
		source: 'meta',
		meta: 'intro-button-text'
	},
	target: {
		type: 'boolean',
		source: 'meta',
		meta: 'intro-button-target'
	},
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
registerBlockType( 'custom/intro', {
	title: __( 'Intro Section', 'site-functionality' ), 
	icon: 'editor-aligncenter',
	category: 'custom',
	keywords: [
		__( 'intro', 'site-functionality' ),
		__( 'div', 'site-functionality' ),
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
		const { attributes: { title, content, url, linkText, color, colorData, target }, className, getAttributes, setAttributes } = props;

		const colors = {

		}

		return (
			<div 
				className="custom-block"
			>
				<InspectorControls>
					<PanelBody
							title={ __( 'Button Settings', 'site-functionality' ) }
							initialOpen={true}
					>
						<PanelRow>
							<TextControl
								id='button-text'
								label={ __( 'Button Text', 'site-functionality' ) }
								placeholder={ __( 'Enter button text', 'site-functionality' ) }
								value={ linkText }
								onChange={ linkText => setAttributes( { linkText } ) }
							/>
						</PanelRow>
						<PanelRow>
							<div className="components-base-control">
								<div className="components-base-control__field">
									<label className="url-label">
										{ __( 'Button Link', 'site-functionality' ) }
									</label>
									<URLInput
										value={ url }
										onChange={ url => setAttributes( { url } ) }
									/>
								</div>
							</div>
						</PanelRow>
						<PanelRow>
							<CheckboxControl
								id="button-target"
								label={ __( "Open link in a new tab", "site-functionality" ) }
								checked={ target }
								onChange={ target => setAttributes( { target } ) }
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>
				<div className="inner-container">
					<RichText
						tagName="h2"
						value={ title }
						placeholder={ __( 'Enter heading...', 'site-functionality' ) }
						keepPlaceholderOnFocus={ true }
						onChange={ ( title ) => setAttributes( { title } ) }
					/>
					<RichText
						multiline="p"
						value={ content }
						placeholder={ __( 'Enter text...', 'site-functionality' ) }
						keepPlaceholderOnFocus={ true }
						onChange={ ( content ) => setAttributes( { content } ) }
					/>
					<Fragment>
						<TextControl
							id='button-text'
							label={ __( 'Button Text', 'site-functionality' ) }
							value={ linkText }
							onChange={ linkText => setAttributes( { linkText } ) }
						/>
						<URLInput
							value={ url }
							onChange={ url => setAttributes( { url } ) }
						/>
						<CheckboxControl
							id="button-target"
							label={ __( "Open link in a new tab", "site-functionality" ) }
							checked={ target }
							onChange={ target => setAttributes( { target } ) }
						/>
					</Fragment>
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
	save() {
		return null;
	},
} );
