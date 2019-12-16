/**
 * File blocks.js.
 *
 * Block scripts
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

wp.domReady( () => {

	wp.blocks.registerBlockStyle( 'core/image', [ 
		{
			name: 'default',
			label: 'Default',
			isDefault: true,
		},
		{
			name: 'clipped',
			label: 'Clipped Corner - Bottom',
        },
        {
			name: 'clipped-top',
			label: 'Clipped Corner - Top',
		}
	]);
} );

