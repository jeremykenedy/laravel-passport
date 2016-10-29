<script type="text/javascript">

	jQuery('#confirmSave').on('show.bs.modal', function (e) {
		var message = jQuery(e.relatedTarget).attr('data-message');
		var title = jQuery(e.relatedTarget).attr('data-title');
		var form = jQuery(e.relatedTarget).closest('form');
		jQuery(this).find('.modal-body p').text(message);
		jQuery(this).find('.modal-title').text(title);
		jQuery(this).find('.modal-footer #confirm').data('form', form);
	});
	jQuery('#confirmSave').find('.modal-footer #confirm').on('click', function(){
	  	jQuery(this).data('form').submit();
	});

</script>