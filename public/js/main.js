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

// new like through ajax

function newLike() {
  // when user clicks on the post
  $('.pst').on('click', '.post_like', function() {
    var userid = $('.p_userid').val();
    var postid = $(this).prev($('.p_postid')).val();
    var csrft = $('input[name=_token]').val();

    var turl = '/'+csrft+'/'+userid+'/'+postid;
    var pdata = 'postid='+postid;

    alert(postid);


    $.ajax({
      type: 'get',
      url: turl,
      data: pdata,
  		contentType: false,
  		processData: false,
      success: function(data) {
        console.log(data);
      },
      error: function (data) {
        console.log(data);
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
  newLike();
  //actionHover();
}

$(document).ready(function() {
  init();
});
