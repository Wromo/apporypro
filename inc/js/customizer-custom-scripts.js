( function( api ) {

	// Extends our custom "apporypro" section.
	api.sectionConstructor['apporypro'] = api.Section.extend( {

		// No apporypros for this type of section.
		attachAppOryPros: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
