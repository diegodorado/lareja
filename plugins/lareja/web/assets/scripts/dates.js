$(document).ready(function(){
	$('.careTaker input.edit').click(function(){
		$(this).parent().parent().find('.info').hide();
		$(this).parent().parent().find('.edit-form').show();
	});
});
