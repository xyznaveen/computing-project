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

    var myLike = $(this).parent().parent().parent().parent().find('.panel-footer').find('.like_count');

    var turl = '/'+csrft+'/'+userid+'/'+postid;
    var pdata = 'postid='+postid;

    $.ajax({
      type: 'get',
      url: turl,
      data: pdata,
  		contentType: false,
  		processData: false,
      success: function(data) {
        myLike.html(data);
      },
      error: function (data) {
        alert('failure');
      }
    });
  });
}

// new comment through ajax

function newComment() {
  // when user clicks on the post
  $('.panel-footer').on('click', '.post_comment', function() {
    var postid = $('.p_postid').val();
    var text = $('.comment-text').val();

    var turl = '/do/comment/'+postid+'/'+text;
    var pdata = 'postid='+postid+'&text='+text;

    $.ajax({
      type: 'get',
      url: turl,
      data: pdata,
  		contentType: false,
  		processData: false,
      success: function(data) {
        location.reload();
      },
      error: function (data) {
        alert('failure');
      }
    });
  });
}

var mh = 0;

function appendMessage(text) {
  $('.me').removeClass('new');
  var elem = $('.chat').first().prepend('<div calss="chat"><div class="bubble me new">'+text+'</div></div>');
  $('.new').hide();
  $('.chat').find('.new').show(100);
}

// sending message through ajax
function newMessage(){
  $(document).on('submit', 'form#message', function(event){
    event.preventDefault();
    if($('#message .message').val() === '')
      return;
    var objForm = $('#message')[0];
  	var formData = new FormData(objForm);

  	// actual ajax implementation
  	$.ajax({
  		type: 'post',
  		url: 'user/message',
  		data: formData,
  		contentType: false,
  		processData: false,
  		success: function(data) {
          $('#message .message').val('');
  		    appendMessage(data)
  		},
  		error: function(data) {
  			alert(data);
  		}
  	});
  });
}

function init() {
  $('.alert').hide();
  $('.alert').hide();

  newPost();
  newLike();
  newComment();
  newMessage();
}

$(document).ready(function() {
  init();
});
