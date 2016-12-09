<?php
require_once "../jssdk_js/jssdk.php";
$jssdk = new JSSDK("wx69fc779c6c311cd2", "4084af48e02eecb6bbb99b5fce8b38d6");
$signPackage = $jssdk->GetSignPackage();
?>
<?php


    //获取完整的url
    //echo 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'].'?'.$_SERVER['QUERY_STRING'];
    
    $old_opid = $_GET['state'];

    $appid = "wx69fc779c6c311cd2";
    $secret = "4084af48e02eecb6bbb99b5fce8b38d6";
    $code = $_GET["code"];

    $get_token_url = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid='.$appid.'&secret='.$secret.'&code='.$code.'&grant_type=authorization_code';

    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$get_token_url);
    curl_setopt($ch,CURLOPT_HEADER,0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    $res = curl_exec($ch);
    curl_close($ch);
    $json_obj = json_decode($res,true);


    //openid
     $new_opid = $json_obj['openid']; 
?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
<meta http-equiv="Content-Type">
<meta content="text/html; charset=utf-8">
<meta charset="utf-8">
<title>我有个恋爱想跟你谈谈</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
<meta name="format-detection" content="telephone=no">
<meta name="format-detection" content="email=no">
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/index.css" />
<link rel="stylesheet" type="text/css" href="css/animations.css" />
<script>if(typeof window.wView !== "undefined"){	window.wView.allowsInlineMediaPlayback = "YES";	window.wView.mediaPlaybackRequiresUserAction = "NO";}</script>
<script>
var fla_nub_sjs= new Date().getTime(); 
</script>
</head>
<body>
<div>
  <div class="page page-1-1 page-current">
    <div class="wrap">
    	<img class="img_1 pt-page-fade1" src="img/img_01.jpg" />
        <img class="img_2 pt-page-fade1 pt-page-delay1000" src="img/img_02.png" />
        <div class="img_3 pt-height pt-page-delay3000">
        	<img src="img/img_03.png" />
        </div>
        <img id="sound_image" class="img_4 pt-page-moveFromRight1 pt-page-delay2000" src="img/img_04.png" />
        <img class="img_up pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-2-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_02_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_02_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-3-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_03_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_03_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-4-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_04_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_04_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-5-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_05_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_05_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-6-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_06_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_06_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-7-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_07_1.jpg" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_07_2.png" />
        </div>
        <img class="img_3 hide pt-page-flipInLeft1 pt-page-delay700" src="img/img_02_3.png">
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-8-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_08_2.png" />
        <div class="img_2 pt-width pt-page-delay1000">
        	<img src="img/img_08_3.png" />
        </div>
        <img class="img_3 hide pt-page-bounceIn pt-page-delay1700" src="img/img_08_4.png" />
        <img class="img_up hide pt-page-moveIconUp" src="img/UP.png">
    </div>
  </div>
  <div class="page page-9-1 hide">
    <div class="wrap">
    	<img class="img_1 hide pt-page-fade1" src="img/img_09_1.jpg">
    </div>
  </div>
</div>
<script src="js/zepto.min.js"></script>
<script src="js/touch.js"></script>
<script src="js/index.js"></script>
<script src="http://res.wx.qq.com/open/js/jweixin-1.0.0.js"></script>
<script>
	wx.config({
		//debug: true,
		appId: '<?php echo $signPackage["appId"];?>',
		timestamp: <?php echo $signPackage["timestamp"];?>,
		nonceStr: '<?php echo $signPackage["nonceStr"];?>',
		signature: '<?php echo $signPackage["signature"];?>',
		jsApiList: [
			'checkJsApi',
			'onMenuShareTimeline',
			'onMenuShareAppMessage',
			'onMenuShareQQ',
			'onMenuShareWeibo'
		]
	});
  
	wx.ready(function () {
		var new_opid = "<?php echo $new_opid ?>_" + fla_nub_sjs;
		wx.onMenuShareAppMessage({
			title: '我有个恋爱想跟你谈谈', // 分享标题
			desc: '深蓝中心 献给青岛最珍贵的礼物', // 分享描述
			link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx69fc779c6c311cd2&redirect_uri=http://projects.chinaflamingo.com/love/index.php?response_type=code&scope=snsapi_base&state='+ new_opid +'#wechat_redirect', // 分享链接
			imgUrl: 'http://projects.chinaflamingo.com/love/img/share.jpg', // 分享图标
			type: '', // 分享类型,music、video或link，不填默认为link
			dataUrl: '', // 如果type是music或video，则要提供数据链接，默认为空
			success: function () { 
				// 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
		wx.onMenuShareTimeline({
			title: '我有个恋爱想跟你谈谈', // 分享标题
			link: 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wx69fc779c6c311cd2&redirect_uri=http://projects.chinaflamingo.com/love/index.php?response_type=code&scope=snsapi_base&state='+ new_opid +'#wechat_redirect', // 分享链接
			imgUrl: 'http://projects.chinaflamingo.com/love/img/share.jpg', // 分享图标
			success: function () { 
				// 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
		wx.onMenuShareQQ({
			title: '我有个恋爱想跟你谈谈', // 分享标题
			desc: '深蓝中心 献给青岛最珍贵的礼物', // 分享描述
			link: 'http://projects.chinaflamingo.com/love/index.php?state='+ new_opid+'&type=wx', // 分享链接
			imgUrl: 'http://projects.chinaflamingo.com/love/img/share.jpg', // 分享图标
			success: function () { 
			   // 用户确认分享后执行的回调函数
			},
			cancel: function () { 
			   // 用户取消分享后执行的回调函数
			}
		});
		wx.onMenuShareWeibo({
			title: '我有个恋爱想跟你谈谈', // 分享标题
			desc: '深蓝中心 献给青岛最珍贵的礼物', // 分享描述
			link: 'http://projects.chinaflamingo.com/love/index.php?state='+ new_opid+'&type=wx', // 分享链接
			imgUrl: 'http://projects.chinaflamingo.com/love/img/share.jpg', // 分享图标
			success: function () { 
			   // 用户确认分享后执行的回调函数
			},
			cancel: function () { 
				// 用户取消分享后执行的回调函数
			}
		});
	});
</script>

<script src="js/jquery.js"></script>
<script src="js/jquery.rotate.min.js"></script>
<div id="audiocontainer"></div>
<script type="text/javascript">
	var angle = 0;
	var inter;
	var is_start = true;
		gSound = 'yinyue.mp3'; 
			document.onreadystatechange = function(){
			var audiocontainer = $('#audiocontainer');
		if (audiocontainer != undefined) {
			audiocontainer.html('<audio id="bgsound" loop="loop" autoplay preload > <source src="' + gSound + '" /> </audio>');
		}
		$$('sound_image').onclick = switchsound;
		jQuery("#st1").click(function() {
			if(jQuery("#bgsound")[0].paused&&is_start){
				jQuery("#bgsound")[0].play();
				is_start = false;
				inter = setInterval(function(){
					angle+=3;
					jQuery("#sound_image").eq(0).rotate(angle);
				},50);
			}
		});
	}

	function $$(name) {
		return document.getElementById(name);
	}

	function switchsound() {
		au = $$('bgsound');
		ai = $$('sound_image');
		if (au.paused) {
		 au.play();
		 inter = setInterval(function(){
		 angle+=3;
		// jQuery("#sound_image").eq(0).rotate(angle);
		 },50);
			}
			else {
				au.pause();
				clearInterval(inter);
				
			}
	}
</script>
        
<script>
	var fla_Obj = new Object;
	fla_Obj.key = "YYnDUxbZxZOmBxYgRtgtR01qtv";
	fla_Obj.old_opid = "<?php echo $old_opid ?>";
	fla_Obj.new_opid = "<?php echo $new_opid ?>_"+ fla_nub_sjs;
	if(fla_Obj.old_opid == ''){
		fla_Obj.old_opid = "_"+fla_nub_sjs;
	}
</script>
<script src="http://t.chinaflamingo.com/js/share.js"></script>
<script>
var _hmt = _hmt || [];
(function() {
  var hm = document.createElement("script");
  hm.src = "//hm.baidu.com/hm.js?a2b3cb89af2350e0bdd1e64361773bf2";
  var s = document.getElementsByTagName("script")[0]; 
  s.parentNode.insertBefore(hm, s);
})();
</script>

</body>
</html>
