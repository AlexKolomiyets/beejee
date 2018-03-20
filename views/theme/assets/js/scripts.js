$(document).ready(function(){

	var taskPreview = $('.task-preview');
	var taskPreviewDisabled = false;

	// validation
	$('.taskform .form-control').keyup(function(){

		$('.taskform .required .form-control').each(function(){
			var dataInInput = $(this).val();
			if(dataInInput == ''){
				taskPreviewDisabled = true;
				return false;
			}
			taskPreviewDisabled = false;
		});

		taskPreview.attr('disabled', taskPreviewDisabled);
	});

	// image
	$("#image").change(function () {
	    var reader = new FileReader();

	    reader.onload = function (e) {
	        // get loaded data and render thumbnail.
	        $("#modal-task-image").attr('src', e.target.result);
	    };

	    // read the image file as a data URL.
	    reader.readAsDataURL(this.files[0]);
	});

	// modal
	$('#myModal').on('show.bs.modal', function (e) {
	  var taskName = $("#name").val();
	  var taskTitle = $("#title").val();
	  var taskContent = $("#content").val();
	  var taskEmail = $("#email").val();

	  $("#modal-task-name").text(taskName);
	  $("#modal-task-title").text(taskTitle);
	  $("#modal-task-content").text(taskContent);
	  $("#modal-task-email").text(taskEmail);
	  $("#modal-task-email").attr('href','mailto:'+taskEmail);
	});
});