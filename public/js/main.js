// ajax form submission for post
function newPost(){
  $(document).on('submit', 'form#create-post', function(event){
    event.preventDefault();
    var objForm = $('#create-post')[0];
  	var formData = new FormData(objForm);

  	// actual ajax implementation
  	$.ajax({
  		type: 'post',
  		url: 'user/post',
  		data: formData,
  		contentType: false,
  		processData: false,
  		success: function(data) {
  			$('textarea').val('');
        $('.alert-success').show(500, function() {
          $(this).fadeOut(3000);
        });
  		},
  		error: function(data) {
  			$('.alert-danger').show();
  		}
  	});
  });
}

// hovering on like and comment buttons
// function actionHover() {
//   $('i.fa').on({
//     mouseenter: function () {
//       $(this).css('background-color','red');
//     },
//     mouseleave: function () {
//       $(this).css('background-color','transparent');
//     },
//     click: function() {
//       alert($(this).attr('class'));
//     }
//   });
// }

function init() {
  $('.alert').hide();
  $('.alert').hide();
  newPost();
  //actionHover();
}

$(document).ready(function() {
  init();
});
