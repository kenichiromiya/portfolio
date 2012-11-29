$(document).ready(function () {

/*
	$(function(){
		$('#container').masonry({
			// options
			itemSelector : '.item',
			columnWidth :230 
		});
	});
	var $container = $('#container');
	$container.imagesLoaded(function(){
		$container.masonry({
			itemSelector : '.item',
			columnWidth : 230
		});
	});
*/
    var uploadFiles = function (files) {
        // FormData オブジェクトを用意
        var fd = new FormData();

        // ファイル情報を追加する
        for (var i = 0; i < files.length; i++) {
            fd.append(i, files[i]);
        }

        // XHR で送信
        //url = document.URL.replace(/\/[a-zA-z0-9_]+$/,"/");
        //url = document.URL+"<?=$session['account_id']?>";
        url = document.URL;
        $.ajax({
            url: url,
            type: "POST",
            data: fd,
            processData: false,
            contentType: false,
	    success: function(html){
		alert(html);
	    },
complete: function(html){
		alert(url);
}
        });
    };


    $("#multiple").bind("change", function () {
        // 選択されたファイル情報を取得
        var files = this.files;

        // アップロード処理
        uploadFiles(files);
    });


    // ドラッグドロップからの入力
    $("#drag").bind("drop", function (e) {
        // ドラッグされたファイル情報を取得
        var files = e.originalEvent.dataTransfer.files;

        // アップロード処理
        uploadFiles(files);
	e.preventDefault();
    });
});
