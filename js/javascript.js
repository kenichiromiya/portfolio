$(document).ready(function () {

	$(function(){
		var $items = $('#items');
		$items.imagesLoaded( function(){
			$items.masonry({
				itemSelector : '.item'
			});
		});
		$items.infinitescroll({
			navSelector  : '#page-nav',    // ページのナビゲーションを選択 
			nextSelector : '#page-nav a',  // 次ページへのリンク
			itemSelector : '.item',     // 持ってくる要素のclass
			loading: {
				finishedMsg: '', //次のページがない場合に表示するテキスト
				img: '' //ローディング画像のパス
			}
		},

		function( newElements ) {

			var $newElems = $( newElements ).css({ opacity: 0 });

			$newElems.imagesLoaded(function(){
				$newElems.animate({ opacity: 1 });
				$items.masonry( 'appended', $newElems, true ); 
				//var state = $("#items").html();
				//history.replaceState(state, "", "");
			});
		});
	})
/*
                $(window).on('popstate', function(jqevent) {
                        if(jqevent.originalEvent.state){
                                $("#items").children().remove();
                                $("#items").append(jqevent.originalEvent.state);
                        }
                });
*/


/*
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
		},
		complete: function(html){
			document.location = url;
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
