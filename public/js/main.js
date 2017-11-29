$('.like').on('click',function(event){
  event.preventDefault();
  // var isLike=event.target.previousElementSibling==null?true:false;
  var isLike=this.getAttribute('data');
  var answerId=this.parentNode.getAttribute('data-ansId');
  var likeBox=this.parentNode.childNodes[0];
  var likeBtn=this.parentNode.childNodes[2];
  var dislikeBox=this.parentNode.childNodes[4];
  var dislikeBtn=this.parentNode.childNodes[6];
  // console.log(token);
  $.ajax({
    method: 'POST',
    url:urlLike,
    data:{
      _token:token,
      isLike:isLike,
      answer_id:answerId
    },
    success: function(d) {
      // console.log(d);

      if(d[0]==='like'){
        likeBox.innerHTML=d[1];
        dislikeBox.innerHTML=d[2];
        likeBtn.classList.remove('label-default');
        likeBtn.classList.add('label-primary');
        dislikeBtn.classList.remove('label-primary');
        dislikeBtn.classList.add('label-default');
        // dislikeBtn.outerHTML='Dislike';
      }
      if(d[0]==='dislike'){
        likeBox.innerHTML=d[1];
        dislikeBox.innerHTML=d[2];
        likeBtn.classList.remove('label-primary');
        likeBtn.classList.add('label-default');
        dislikeBtn.classList.remove('label-default');
        dislikeBtn.classList.add('label-primary');
      }
      if(d[0]==='remove'){
        likeBox.innerHTML=d[1];
        dislikeBox.innerHTML=d[2];
        likeBtn.classList.remove('label-primary');
        likeBtn.classList.add('label-default');
        dislikeBtn.classList.remove('label-primary');
        dislikeBtn.classList.add('label-default');
      }
    }
  });
  // console.log(isLike);
});
