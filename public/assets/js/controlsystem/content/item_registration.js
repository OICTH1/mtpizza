
$('input[type=file]').after('<span></span>');
 
// アップロードするファイルを選択
$('input[type=file]').change(function() {
  var file = $(this).prop('files')[0];

  // 画像以外は処理を停止
  if (! file.type.match('image.*')) {
    // クリア
    $(this).val('');
    $('span').html('');
    return;
  }

  // 画像表示
  var reader = new FileReader();
  reader.onload = function() {
    var img_src = $('<img>').attr('src', reader.result);
    $('span').html(img_src);
	$('img').css("width",300);
	$('img').css("height",200);
  }

  reader.readAsDataURL(file);
}); 

/*function connecttext( textid, ischecked ) {
   if( ischecked == true ) {
      // チェックが入っていたら有効化
      document.getElementById(textid).disabled = false;
   }
   else {
      // チェックが入っていなかったら無効化
      document.getElementById(textid).disabled = true;
   }
}

$('.size').attr('disabled','true');

$('input[name=category]').change(function(){
  var val = $('input[name=category]:checked').val();
  console.log(val);
  if(val == 'pizza'){
    $('.size').attr('disabled','false');
    $('.one').attr('disabled','true');
  }
});*/

