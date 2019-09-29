const { __ } = wp.i18n; // Import __() from wp.i18n
const { compose, ifCondition } = wp.compose;
const { registerFormatType, toggleFormat } = wp.richText;
const { RichTextToolbarButton } = wp.blockEditor;
const { withSelect } = wp.data;

/**
 * Define Format Button
 * @param {object} props 
 */
const TooltipButton = props => {
    return <RichTextToolbarButton
        icon='testimonial'
        title={__( 'Insert Tooltip', 'core-functonality' )}
        onClick={ () => {
            props.onChange( toggleFormat(
                props.value,
                { type: 'core-functionality/tooltip' }
            ) );
        } }
        isActive={ props.isActive }
    />
};

/**
 * Define Edit Component
 */
const ConditionalButton = compose(
    withSelect( function( select ) {
        return {
            selectedBlock: select( 'core/editor' ).getSelectedBlock()
        }
    } ),
    ifCondition( function( props ) {
        return (
            props.selectedBlock &&
            (props.selectedBlock.name === 'core/paragraph' || props.selectedBlock.name === 'core/list')
        );
    } )
)( TooltipButton );

/**
 * Register Tooltip
 */
registerFormatType(
    'core-functionality/tooltip', {
        title: __( 'Footnote Citation', 'core-functonality' ),
        tagName: 'a',
		className: 'fn-citation',
		attributes: {
			editable: 'contenteditable',
			id: 'id',
			note: 'data-note',
		},
        edit: ConditionalButton,
    }
);