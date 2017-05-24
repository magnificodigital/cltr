<?php
	
	require("assets/inc/dbConnect.php");
	
	$id = $_GET['id'];

?>

<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="pt-BR"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang="pt-BR"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="pt-BR"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="pt-BR"> <!--<![endif]-->
	<head>

        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    
        <title>CLTR</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <link rel="stylesheet" href="assets/css/fontes.css">
        <link rel="stylesheet" href="assets/css/banner.css" />
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script src="assets/js/slides.min.jquery.js"></script>
        
	</head>
	
	<script type="text/javascript">
		//banner
		$(function(){
			$('#slides').slides({
				preload: true,
				preloadImage: 'imgs/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true,
				animationStart: function(current){
					$('.caption').animate({
						bottom:-35
					},100);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationStart on slide: ', current);
					};
				},
				animationComplete: function(current){
					$('.caption').animate({
						bottom:15
					},200);
					if (window.console && console.log) {
						// example return of current slide number
						console.log('animationComplete on slide: ', current);
					};
				},
				slidesLoaded: function() {
					$('.caption').animate({
						bottom:15
					},200);
				}
			});
		});
	</script>

<body>

	<?php
		
		$sql = "SELECT * FROM produtos_portfolio WHERE `id`='".$id."' ";
                			
        $result = mysql_query($sql);
        
        while($linha = mysql_fetch_assoc($result))
        {
	        $id = $linha['id'];
	        $titulo = utf8_encode($linha['titulo']);
	        $arrAmp = explode(";", $linha['img']);
	        $desc = $linha['desc'];
        }
	
	?>

	<div style="width:1000px;height:727px;background-color:#FFF:poistion:relative">
	
		<!--<div id="slides">
			<div class="slides_container">
			 	<div class="slide">
					<img src="assets/imgs/portfolio/grande/bombay1.jpg" width="950" height="467" alt="Slide 1" />	
				</div>
				<div class="slide">
					<img src="assets/imgs/portfolio/grande/bombay1.jpg" width="950" height="467" alt="Slide 1" />
				</div>
			</div>
	    </div>-->
	
		<div id="slides" style="position:relative; padding-top:25px; padding-left:25px;width:950px;height:468px">
				<div class="slides_container">
					<?php
						
						$total = count($arrAmp);
						
						for($i=0; $i<$total; $i++)
						{
							echo '<div class="slide">
								<img src="assets/imgs/portfolio/grande/'.$arrAmp[$i].'" width="950" height="467" alt="'.$titulo.'" />
							</div>';
						}
						//echo '<img src="assets/imgs/portfolio/grande/'.$arrAmp[0].'" />';
					?>
				</div>
		</div>
		
		<div style="position:relative;padding-left:25px;padding-top:42px;color:#333">
			<span class="fontBebas24"><?php echo $titulo ?></span>
		</div>
		
		<div style="position:relative;color:#333;width:950px;padding-left:25px;padding-top:28px;">
			<span class="fontOpen14"><?php echo $desc ?></span>
		</div>
		
		<div style="height:10px;width:1000px;background-color:#33cc66;position:absolute;bottom:0;left:0">
		
		</div>
	
	</div>
	

</body>
</html>