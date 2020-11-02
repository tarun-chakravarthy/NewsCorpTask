( function( api ) {

	// Extends our custom "vw-tour-lite" section.
	api.sectionConstructor['vw-tour-lite'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );

