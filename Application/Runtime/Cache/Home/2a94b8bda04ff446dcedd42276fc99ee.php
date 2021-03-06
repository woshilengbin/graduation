<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
<head>
<meta charset="utf-8">
<title>深智电科技有限公司</title>
<link rel="stylesheet" href="/graduation/Public/index/css/jquery.fullPage.css">
<link rel="stylesheet" href="/graduation/Public/index/css/me.fullPage.css">
<style>
	.section6 { background: url(/graduation/Public/index/images/fullpage/X9_06bg_01.png) 50%;}
	.section8 { background: url(/graduation/Public/index/images/fullpage/X9_08bg_01.png) 50%;}
	.section9 { background: url(/graduation/Public/index/images/fullpage/section9_bg.jpg) 50%;}
</style>
<script src="/graduation/Public/index/js/jquery-1.8.3.min.js"></script>
<script src="/graduation/Public/index/js/jquery.fullPage.min.js"></script>
<script src="http://cdn.staticfile.org/jquery-easing/1.3/jquery.easing.min.js"></script>
<script>
	$(function(){
		$('#dowebok').fullpage({
			'navigation': true,
			'resize': true,
			afterLoad: function(anchorLink, index){
				if(index == 1){
					$('.section1').find('img').delay(500).animate({
						bottom: '0'
					}, 500, 'easeOutExpo');
					$('.section1').find('h1').delay(500).animate({
						left: '0'
					}, 800, 'easeOutExpo');
					$('.section1').find('p').delay(500).animate({
						left: '0'
					}, 1300, 'easeOutExpo');
				}
				if(index == 2){
					$('.section2').find('.section2_img1').delay(500).animate({
						left: '0'
					}, 500, 'easeOutExpo');
					$('.section2').find('.section2_img2').delay(500).animate({
						right: '0'
					}, 600, 'easeOutExpo');
					$('.section2').find('.section2_img3').delay(500).animate({
						left: '0'
					}, 700, 'easeOutExpo');
					$('.section2').find('.section2_img4').delay(500).animate({
						right: '0'
					}, 800, 'easeOutExpo');
					$('.section2').find('.section2_img5').delay(500).animate({
						left: '0'
					}, 900, 'easeOutExpo');
					$('.section2').find('.section2_img6').delay(500).animate({
						right: '0'
					}, 1000, 'easeOutExpo');
					$('.section2').find('.section2_img7').delay(500).animate({
						left: '0'
					}, 1100, 'easeOutExpo');
					$('.section2').find('.section2_img8').delay(500).animate({
						right: '0'
					}, 1200, 'easeOutExpo');
					$('.section2').find('h1').delay(500).animate({
						left: '0'
					}, 500, 'easeOutExpo');
					$('.section2').find('p').delay(500).animate({
						left: '0'
					}, 1000, 'easeOutExpo');
				}
				if(index == 3){
					$('.section3').find('img').delay(500).animate({
						bottom: '0'
					}, 500, 'easeOutExpo');
					$('.section3').find('h1').delay(500).animate({
						right: '0'
					}, 800, 'easeOutExpo');
					$('.section3').find('p').delay(500).animate({
						right: '0'
					}, 1300, 'easeOutExpo');
				}
				if(index == 4){
					$('.section4').find('img').delay(500).animate({
						top: '0'
					}, 500, 'easeOutExpo');
					$('.section4').find('h1').delay(500).animate({
						left: '0'
					}, 800, 'easeOutExpo');
					$('.section4').find('p').delay(500).animate({
						right: '0'
					}, 1300, 'easeOutExpo');
				}
				if(index == 5){
					$('.section5').find('img').fadeIn(500);
					$('.section5').find('h1').delay(500).animate({
						left: '0'
					}, 500, 'easeOutExpo');
					$('.section5').find('p').delay(500).animate({
						left: '0'
					}, 1000, 'easeOutExpo');
				}
				if(index == 6){
					$('.section6').find('img').delay(500).animate({
						bottom: '0'
					}, 500, 'easeOutExpo');
					$('.section6').find('h1').delay(500).animate({
						left: '0'
					}, 800, 'easeOutExpo');
					$('.section6').find('p').delay(500).animate({
						left: '0'
					}, 1300, 'easeOutExpo');
				}
				if(index == 7){
					$('.section7').find('h1').delay(500).animate({
						left: '0'
					}, 800, 'easeOutExpo');
					$('.section7').find('p').delay(500).animate({
						right: '0'
					}, 1300, 'easeOutExpo');
					$('.section7').find('.section7_img1').delay(500).animate({
						top: '0'
					}, 800, 'easeOutExpo');
					$('.section7').find('.section7_img2').delay(500).animate({
						left: '0'
					}, 1300, 'easeOutExpo');
					$('.section7').find('.section7_img3').delay(500).animate({
						right: '0'
					}, 3500, 'easeOutExpo');
				}
				if(index == 8){
					$('.section8').find('h1').delay(500).animate({
						left: '0'
					}, 800, 'easeOutExpo');
					$('.section8').find('p').delay(500).animate({
						left: '0'
					}, 1300, 'easeOutExpo');
					$('.section8').find('.section8_img1').delay(500).animate({
						top: '0'
					}, 500, 'easeOutExpo');
					$('.section8').find('.section8_img2').delay(500).animate({
						bottom: '0'
					}, 1500, 'easeOutExpo');
				}
				if(index == 9){
					$('.section9').find('.go').delay(500).animate({
						top: '0'
					}, 2000, 'easeOutExpo');
					$('.section9').find('.section9_title').delay(500).animate({
						left: '0'
					}, 500, 'easeOutExpo');
					$('.section9').find('.section9_main').delay(500).animate({
						right: '0'
					}, 500, 'easeOutExpo');
				}
			},
			onLeave: function(index, direction){
				if(index == '1'){
					$('.section1').find('img').delay(500).animate({
						bottom: '-120%'
					}, 1000, 'easeOutExpo');
					$('.section1').find('h1').delay(500).animate({
						left: '-120%'
					}, 1500, 'easeOutExpo');
					$('.section1').find('p').delay(500).animate({
						left: '-120%'
					}, 2000, 'easeOutExpo');
				}
				if(index == '2'){
					$('.section2').find('.section2_img1').delay(500).animate({
						left: '-150%'
					}, 500, 'easeOutExpo');
					$('.section2').find('.section2_img2').delay(500).animate({
						right: '-150%'
					}, 600, 'easeOutExpo');
					$('.section2').find('.section2_img3').delay(500).animate({
						left: '-150%'
					}, 700, 'easeOutExpo');
					$('.section2').find('.section2_img4').delay(500).animate({
						right: '-150%'
					}, 800, 'easeOutExpo');
					$('.section2').find('.section2_img5').delay(500).animate({
						left: '-150%'
					}, 900, 'easeOutExpo');
					$('.section2').find('.section2_img6').delay(500).animate({
						right: '-150%'
					}, 1000, 'easeOutExpo');
					$('.section2').find('.section2_img7').delay(500).animate({
						left: '-150%'
					}, 1100, 'easeOutExpo');
					$('.section2').find('.section2_img8').delay(500).animate({
						right: '-150%'
					}, 1200, 'easeOutExpo');
					$('.section2').find('h1').delay(500).animate({
						left: '-120%'
					}, 1000, 'easeOutExpo');
					$('.section2').find('p').delay(500).animate({
						left: '-120%'
					}, 500, 'easeOutExpo');
				}
				if(index == '3'){
					$('.section3').find('img').delay(500).animate({
						bottom: '-120%'
					}, 1000, 'easeOutExpo');
					$('.section3').find('h1').delay(500).animate({
						right: '-120%'
					}, 1500, 'easeOutExpo');
					$('.section3').find('p').delay(500).animate({
						right: '-120%'
					}, 2000, 'easeOutExpo');
				}
				if(index == '4'){
					$('.section4').find('img').delay(500).animate({
						top: '-120%'
					}, 1000, 'easeOutExpo');
					$('.section4').find('h1').delay(500).animate({
						left: '-120%'
					}, 1500, 'easeOutExpo');
					$('.section4').find('p').delay(500).animate({
						right: '-120%'
					}, 2000, 'easeOutExpo');
				}
				if(index == '5'){
					$('.section5').find('img').fadeOut(500);
					$('.section5').find('h1').delay(500).animate({
						left: '-120%'
					}, 500, 'easeOutExpo');
					$('.section5').find('p').delay(500).animate({
						left: '-120%'
					}, 1000, 'easeOutExpo');
				}
				if(index == '6'){
					$('.section6').find('img').delay(500).animate({
						bottom: '-120%'
					}, 1000, 'easeOutExpo');
					$('.section6').find('h1').delay(500).animate({
						left: '-120%'
					}, 1500, 'easeOutExpo');
					$('.section6').find('p').delay(500).animate({
						left: '-120%'
					}, 2000, 'easeOutExpo');
				}
				if(index == '7'){
					$('.section7').find('h1').delay(500).animate({
						left: '-120%'
					}, 800, 'easeOutExpo');
					$('.section7').find('p').delay(500).animate({
						right: '-120%'
					}, 1300, 'easeOutExpo');
					$('.section7').find('.section7_img1').delay(500).animate({
						top: '-120%'
					}, 800, 'easeOutExpo');
					$('.section7').find('.section7_img2').delay(500).animate({
						left: '-120%'
					}, 1300, 'easeOutExpo');
					$('.section7').find('.section7_img3').delay(500).animate({
						right: '-120%'
					}, 500, 'easeOutExpo');
				}
				if(index == '8'){
					$('.section8').find('h1').delay(500).animate({
						left: '-120%'
					}, 1500, 'easeOutExpo');
					$('.section8').find('p').delay(500).animate({
						left: '-120%'
					}, 2000, 'easeOutExpo');
					$('.section8').find('.section8_img1').delay(500).animate({
						top: '-150%'
					}, 1100, 'easeOutExpo');
					$('.section8').find('.section8_img2').delay(500).animate({
						bottom: '-150%'
					}, 1100, 'easeOutExpo');
				}
				if(index == '9'){
					$('.section9').find('.go').delay(500).animate({
						top: '-120%'
					}, 500, 'easeOutExpo');
					$('.section9').find('.section9_title').delay(500).animate({
						left: '-120%'
					}, 2000, 'easeOutExpo');
					$('.section9').find('.section9_main').delay(500).animate({
						right: '-120%'
					}, 2000, 'easeOutExpo');
				}
			}
		});
	});
</script>
</head>

<body>
	<div id="dowebok">
		<div class="section section1">
			<h1>全球顶配的盒子</h1>
			<p>现在，离未来更进一步。ZIDOO X9是全球最顶级配置的盒子</p>
			<br>
			<br>
			<br>
			<img src="/graduation/Public/index/images/fullpage/X9_01.png" alt="">
		</div>
		<div class="section section2">
			<h1>为内容而生</h1>
			<p>是的，你所喜爱的剧集，电影，你统统都能够在X9上找到</p>
			<p>并轻松享用</p>
			<br><br><br>
			<div id="fullpage_section2">
				<img src="/graduation/Public/index/images/fullpage/X9_02_01.png" class="section2_img1">
				<img src="/graduation/Public/index/images/fullpage/X9_02_02.png" class="section2_img2">
				<img src="/graduation/Public/index/images/fullpage/X9_02_03.png" class="section2_img3">
				<img src="/graduation/Public/index/images/fullpage/X9_02_04.png" class="section2_img4">
				<img src="/graduation/Public/index/images/fullpage/X9_02_05.png" class="section2_img5">
				<img src="/graduation/Public/index/images/fullpage/X9_02_06.png" class="section2_img6">
				<img src="/graduation/Public/index/images/fullpage/X9_02_07.png" class="section2_img7">
				<img src="/graduation/Public/index/images/fullpage/X9_02_08.png" class="section2_img8">
			</div>
		</div>
		<div class="section section3">
			<h1>顶级芯片铸就不凡</h1>
			<p>X9采用基于A9架构的MSTAR MSO9180D1R UP，并拥有</p>
			<p>1.5GHz的速率，堪比PC性能</p>
			<br><br><br><br><br><br>
			<img src="/graduation/Public/index/images/fullpage/X9_03.png" alt="">
		</div>
		<div class="section section4">
			<h1>连接从未如此简单</h1>
			<p>X9内置蓝牙4.0芯片，您可轻松的连接蓝牙音箱，蓝牙键鼠等</p>
			<p>设备，怎么好玩怎么来</p>
			<br><br><br><br><br><br>
			<img src="/graduation/Public/index/images/fullpage/X9_04_01.png" alt="">
		</div>
		<div class="section section5">
			<h1>ZIUI<span>power by Android</span></h1>
			<p>基于Android深度定制的电视操控系统，更符合电视用户</p>
			<p>使用习惯</p>
			<br><br><br>
			<img src="/graduation/Public/index/images/fullpage/X9_05_01.png" alt="">
		</div>
		<div class="section section6">
			<h1 style="color: white;">回归到看这件事儿</h1>
			<p style="color: white;">得益于强大的主控芯片及视频处理技术，X9给你带来完美的4K观影体验及</p>
			<p style="color: white;">身临其境的音效感受</p>
			<br><br><br><br><br><br><br><br>
			<img src="/graduation/Public/index/images/fullpage/X9_06_02.png" alt="">
			<img src="/graduation/Public/index/images/fullpage/X9_06_03.png" alt="">
			<img src="/graduation/Public/index/images/fullpage/X9_06_04.png" alt="">
		</div>
		<div class="section section7">
			<h1>互动新玩法</h1>
			<p>现在你可以将手机里的照片通过盒子分享给家里所有人了，支持AirPlay及</p>
			<p>DLNA传输协议</p>
			<br>
			<img src="/graduation/Public/index/images/fullpage/X9_07_01.png" class="section7_img1">
			<br>
			<img src="/graduation/Public/index/images/fullpage/X9_07_03.png" class="section7_img2">
			<img src="/graduation/Public/index/images/fullpage/X9_07_02.png" class="section7_img3">
		</div>
		<div class="section section8">
			<h1>塔罗新玩法</h1>
			<p>zidoo基于open GL自主研发的一套塔罗3D引擎，将图形处理效率</p>
			<p>提高80%，获得更佳的游戏体验</p>
			<img src="/graduation/Public/index/images/fullpage/X9_08_02.png" class="section8_img1">
			<img src="/graduation/Public/index/images/fullpage/X9_08_03.png" class="section8_img2">
		</div>
		<div class="section section9">
			<p class="section9_title">深智电科技有限公司</p>
			<p class="section9_main">更多先进技术，更多科技产品</p>
			<a class="go" href="<?php echo U('main');?>">
				<img src="/graduation/Public/index/images/fullpage/btn.png" alt="">
			</a>
			<p class="copyright">
				<a href="javascript:">关于zidoo</a>
				<a href="javascript:">官方博客</a>
				<a href="javascript:">客户服务</a>
				<a href="javascript:">隐私政策</a>
				<span>|</span>
				<span>深智电科技有限公司版权所有 © 1997-2014 </span>
			</p>
		</div>
	</div>
</body>
</html>