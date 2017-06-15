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
    formData.append('to',$('.m-user').val());
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

function pj(val) {
      var by = $('.sentby').val();
      if(val.sent_by == by) {
        $('.chat').append('<div class="bubble me">' + val.message_text + '<br/><small>sent on : '+val.created_at+'</small></div>');
      } else {
        $('.chat').append('<div class="bubble you">' + val.message_text + '<br/><small>sent on : '+val.created_at+'</small></div>');
      }
      console.log(val);
}

function loadConversation() {
  $('.load-convo').on('click', function() {
    var r = $('.m-user').val();
    var s = $('._sender').val();
    $.ajax({
      type: 'get',
      url: '/get/message/'+s+'/'+r,
      data: 'randomvalue',
      contentType: false,
  		processData: false,
      success: function(data) {
        $('.chat').html('');
        var msgObj = JSON.parse(data);
        if(msgObj.length === 0){
          $('.pad').prepend('<div class="alert alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>You have not started conversation with this person.</div>');
        } else {
          msgObj.forEach(pj);
        }
  		},
  		error: function(data) {
  			console.log(data);
  		}
    });
  });
}

function newFriend() {

  $('.add_friend').on('click', function() {
    var purl = '/user/send/friend/request/to/'+$('.profile_user_id').val();
    var pdata = 'randomvalue=garbage';
    $.ajax({
      type: 'get',
      url: purl,
      data: pdata,
      contentType: false,
      processData: false,
      success: function(data) {
        alert(data);
      },
      error: function (data) {
        alert('failure');
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
  loadConversation();
  newFriend();
}

$(document).ready(function() {
  init();
});
