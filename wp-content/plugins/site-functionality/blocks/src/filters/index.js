function addListBlockAnchor( settings, name ) {
    if ( name !== 'core/list' && name !== 'core/paragraph' ) {
        return settings;
    }
 
    return lodash.assign( {}, settings, {
        supports: lodash.assign( {}, settings.supports, {
            anchor: true
        } ),
    } );
}
 
wp.hooks.addFilter(
    'blocks.registerBlockType',
    'custom/list',
    addListBlockAnchor
);
