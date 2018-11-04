$(document).ready(function(){
	console.log('it vorcs');
	$('.activity h3, .activity h4, .activity .img-container').click(function(){
		console.log('clicked on img or h3');
		openModal($(this).closest('.activity'));
	});
	$('.activity-modal .close-button').click(function(){
		$(this).parent().hide();
	});
});
function openModal(activity){
	let title 		= activity.find('.title').html();
	let imgUrl 		= activity.find('.img-url').val();
	let description	= activity.find('.description').val();
	let date 		= activity.find('.date').html();
	let link 		= activity.find('.link').html();
	console.log(title);
	$('.activity-modal').find('h3').html(title);
	$('.activity-modal').find('img').attr('src',imgUrl);
	$('.activity-modal').find('p').html(description);
	$('.activity-modal').find('.date').html(date);
	$('.activity-modal').find('.link').html(link);
	$('.activity-modal').css('display','flex');
}
