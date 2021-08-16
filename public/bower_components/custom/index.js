function MainPage()
{
	this.postdeleteURL = null;
	this.postsortURL = null;
	this.csrf_token = null;
}
MainPage.prototype.deletePhoto = function(pid)
{
	let sendData = {
		'_token' : this.csrf,
		'pid' : pid
	}
	$.post(this.postdeleteURL, sendData, function(result){
		if(!result.error)
		{
			$('#image_'+pid).fadeOut();	
		}
	});
}

MainPage.prototype.sortImage = function(serializeList)
{
	let sendData = {
		'_token' : this.csrf,
		'images' : serializeList
	}
	$.post(this.postsortURL, sendData, function(result){});
}


$(document).ready(function(){
	$( "#sortable" ).sortable({
		stop:function(event, ui){
			let serializeList = $("#sortable").sortable("serialize");
			mainpage.sortImage(serializeList);
		}
	});

  $( "#sortable" ).disableSelection();

	$(document).on('click', '[data-del="button"]', function(){
		if (confirm("Are you sure!")) {
		  let pid = $(this).data("detail");
			mainpage.deletePhoto(pid);
		}
	});
});