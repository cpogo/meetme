$('.followButton').hover(function(){
     $button = $(this);
    if($button.hasClass('btn-success')){
		$button.removeClass('btn-success');
        $button.addClass('btn-danger');
		$button.children('b').text('Unfollow');
		$button.children('i').removeClass('fa-check');
		$button.children('i').addClass('fa-times');
    }
}, function(){
    if($button.hasClass('btn-danger')){
        $button.removeClass('btn-danger');
		$button.addClass('btn-success');
		$button.children('b').text('Following');
		$button.children('i').removeClass('fa-times');
		$button.children('i').addClass('fa-check');
    }
});