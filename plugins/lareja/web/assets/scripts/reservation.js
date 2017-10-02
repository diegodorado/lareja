$(document).ready(function(){
	$('.person-select span').focus();
	$('.hosts-area.create').hide();
	$('#person-select').change(function(){
		$('.hosts-area').show();
		$person = $('#person-select option:selected').html();
		$person = $person.split('[')[0].trim();
		$('.hosts-area .host-name label').html($person);
	});
	$('.add-button').click(function(){
		new_host();	
	});
	$('[data-control="datepicker"]').datePicker({ format: 'D/MM/Y' });
	$('.host-enabled input').change(function(){
		toggle_enabled($(this).parent().parent());
	});
	name_fields();
});

function new_host(){

	$last_host = $('.hosts.table .host:last');

	$place_title 	= $('.hosts.table .host:last .host-place .select2-selection__rendered').attr('title');
	$date_in 		= $('.hosts.table .host:last .host-date-in input').val();
	$date_out 		= $('.hosts.table .host:last .host-date-out input').val();

	$person_select = $('#person-select').clone();
	$person_select.removeAttr('id').removeClass('select2-hidden-accessible');
	$place_select = $('.hosts.table .host:last .host-place select').clone();
	$place_select.removeClass('select2-hidden-accessible');
	$last_host.clone().insertAfter($last_host);

	$('.hosts.table .host:last .host-name').html($person_select);
	$('.hosts.table .host:last .host-place').html($place_select);

	init_selects();
	init_datePickers();

	$('.hosts.table .host:last .host-place .select2-selection__rendered').attr('title',$place_title).html($place_title);
	$('.hosts.table .host:last .host-name span').focus();
	$('.hosts.table .host:last .host-date-in input').val($date_in);
	$('.hosts.table .host:last .host-date-out input').val($date_out);

	name_fields();

} 

function init_datePickers(){
	$('[data-control="datepicker"]').datePicker({ format: 'DD/MM/Y' });
	/*$('.host-date-in [data-control="datepicker"]').change(function(){
		$val = $(this).val();
		$(this).parent().parent().find('.host-date-out [data-control="datepicker"]').datePicker({ minDate: '2017-09-13' });
	});*/
}

function name_fields(){
	$counter = 0;
	$('.hosts.table .host').each(function(){		
		$(this).find('.host-name select').attr('name','data[hosts]['+$counter+'][person_id]');
		$(this).find('.host-name input').attr('name','data[hosts]['+$counter+'][person_id]');
		$(this).find('.host-date-in input').attr('name','data[hosts]['+$counter+'][from]');
		$(this).find('.host-date-out input').attr('name','data[hosts]['+$counter+'][to]');
		$(this).find('.host-place select').attr('name','data[hosts]['+$counter+'][place_id]');
		$(this).find('.host-workshop input').attr('name','data[hosts]['+$counter+'][workshop]');
		$(this).find('.host-enabled input').attr('name','data[hosts]['+$counter+'][enabled]');
		$counter++;
	});
}
function toggle_enabled( $host ){
	if ($host.find('.host-enabled input:checked').length > 0 ){
		$host.removeClass('disabled').addClass('enabled');
	}
	else{
		$host.removeClass('enabled').addClass('disabled');
	}
}
