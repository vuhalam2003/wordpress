/*admin css*/
( function( bc_consulting_api ) {

	bc_consulting_api.sectionConstructor['bc_consulting_upsell'] = bc_consulting_api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
