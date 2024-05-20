<?php require_once('Connections_mysqli/conexao.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
    function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
    {
	  global $conexao;
      if (PHP_VERSION < 6) {
        $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
      }
      $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($conexao, $theValue) : mysqli_escape_string($conexao, $theValue);
    
      switch ($theType) {
        case "text":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;    
        case "long":
        case "int":
          $theValue = ($theValue != "") ? intval($theValue) : "NULL";
          break;
        case "double":
          $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
          break;
        case "date":
          $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
          break;
        case "defined":
          $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
          break;
      }
      return $theValue;
    }
}


$colname_conteudo = "-1";
if (isset($_GET['id'])) {
  $colname_conteudo = $_GET['id'];
}
mysqli_select_db($conexao, $database_conexao);
$query_conteudo = sprintf("SELECT * FROM site_noticias WHERE id = %s", GetSQLValueString($colname_conteudo, "int"));
$conteudo = mysqli_query($conexao, $query_conteudo) or die(mysql_error());
$row_conteudo = mysqli_fetch_assoc($conteudo);
$totalRows_conteudo = mysqli_num_rows($conteudo);


$colname_galeria = "-1";
if (isset($_GET['id'])) {
  $colname_galeria = $_GET['id'];
}
mysqli_select_db($conexao, $database_conexao);
$query_galeria = sprintf("SELECT * FROM site_galeria WHERE id_relativo = %s", GetSQLValueString($colname_galeria, "int"));
$galeria = mysqli_query($conexao, $query_galeria) or die(mysql_error());
$row_galeria = mysqli_fetch_assoc($galeria);
$totalRows_galeria = mysqli_num_rows($galeria);


$colname_pdf = "-1";
if (isset($_GET['id'])) {
  $colname_pdf = $_GET['id'];
}
mysqli_select_db($conexao, $database_conexao);
$query_pdf = sprintf("SELECT * FROM site_pdf WHERE relativo = %s", GetSQLValueString($colname_pdf, "int"));
$pdf = mysqli_query($conexao, $query_pdf) or die(mysql_error());
$row_pdf = mysqli_fetch_assoc($pdf);
$totalRows_pdf = mysqli_num_rows($pdf);


$colname_video = "-1";
if (isset($_GET['id'])) {
  $colname_video = $_GET['id'];
}
mysqli_select_db($conexao, $database_conexao);
$query_video = sprintf("SELECT * FROM site_pdf WHERE relativo = %s", GetSQLValueString($colname_video, "int"));
$video = mysqli_query($conexao, $query_video) or die(mysql_error());
$row_video = mysqli_fetch_assoc($video);
$totalRows_video = mysqli_num_rows($video);

$colname_video = "-1";
if (isset($_GET['id'])) {
  $colname_video = $_GET['id'];
}
mysqli_select_db($conexao, $database_conexao);
$query_video = sprintf("SELECT * FROM site_video_noticia WHERE relativo = %s", GetSQLValueString($colname_video, "int"));
$video = mysqli_query($conexao, $query_video) or die(mysql_error());
$row_video = mysqli_fetch_assoc($video);
$totalRows_video = mysqli_num_rows($video);

?>

<!DOCTYPE html>
<html lang="pt-BR" class="no-js" itemscope itemtype="https://schema.org/WebPage">
<head>
<meta charset="UTF-8" />

<link rel="alternate" hreflang="pt-BR" href="https://emersonpenalva.com.br/"/>
<title>Emerson Penalva - <?php echo $row_conteudo['titulo']; ?></title>
<meta name="description" content="Emerson Penalva tem 47 anos, é administrador, casado há 25 anos com Keila Penalva e tem 3 filhos: Matheus, de 24 anos, Maria Helena, com 10 anos, ..."/>

<meta name="format-detection" content="telephone=no">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<link rel='stylesheet' id='wp-block-library-css'  href='css/style.min.css?ver=5.4.4' type='text/css' media='all' />
<link rel='stylesheet' id='contact-form-7-css'  href='css/styles.css?ver=5.1.7' type='text/css' media='all' />
<link rel='stylesheet' id='rs-plugin-settings-css'  href='css/rs6.css?ver=6.2.2' type='text/css' media='all' />
<link rel='stylesheet' id='style-css'  href='css/style.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-base-css'  href='css/base.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-layout-css'  href='css/layout.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-shortcodes-css'  href='css/shortcodes.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-animations-css'  href='css/animations.min.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-jquery-ui-css'  href='css/jquery.ui.all.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-jplayer-css'  href='css/jplayer.blue.monday.css?ver=21.6.2' type='text/css' media='all' />
<link rel='stylesheet' id='mfn-responsive-css'  href='css/responsive.css?ver=21.6.2' type='text/css' media='all' />



<meta property="og:type" content="website" />
<meta name="msapplication-TileImage" content="https://emersonpenalva.com.br/imagens/noticias/pequeno/<?php echo $row_conteudo['nomeThumb']; ?>">
<meta property="og:site_name" content="Emerson Penalva - Deputado Estadual 12123" />
<meta property="og:title" content="<?php echo $row_conteudo['titulo']; ?>">
<meta property="og:description" content="<?php echo $row_conteudo['subTitulo']; ?>">

<meta property="og:image" content="https://emersonpenalva.com.br/imagens/noticias/pequeno/<?php echo $row_conteudo['nomeThumb']; ?>">
<link itemprop="thumbnailUrl" href="https://emersonpenalva.com.br/imagens/noticias/pequeno/<?php echo $row_conteudo['nomeThumb']; ?>">

<meta property="og:type" content="website" />
<meta property="og:image:type" content="image/jpg">

<meta property="og:image:width" content="300">
<meta property="og:image:height" content="300">

<meta property="og:url" content="ihttps://emersonpenalva.com.br/imagens/noticias/pequeno/<?php echo $row_conteudo['nomeThumb']; ?>">

<link itemprop="thumbnailUrl" href="url_image">
<span itemprop="thumbnail" itemscope itemtype="http://schema.org/ImageObject">
<link itemprop="url" href="https://emersonpenalva.com.br/imagens/noticias/pequeno/<?php echo $row_conteudo['nomeThumb']; ?>">

<link rel='stylesheet' id='mfn-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A1%2C300%2C400%2C400italic%2C500%2C700%2C700italic%7CRoboto+Condensed%3A1%2C300%2C400%2C400italic%2C500%2C700%2C700italic&#038;ver=5.4.4' type='text/css' media='all' />
<style id='mfn-dynamic-inline-css' type='text/css'>
#Action_bar {
    left: 0;
    top: 0;
    width: 100%;
    z-index: 30;
    line-height: 21px;
    background: #054b91;
    height: 150px;
	background-image: url(imagens/banner.png);
}
</style>
<script type='text/javascript' src='https://caiofrancasp.com.br/caiofranca/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
<script type='text/javascript' src='https://caiofrancasp.com.br/caiofranca/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
<script type='text/javascript' src='https://caiofrancasp.com.br/caiofranca/wp-content/plugins/revslider/public/assets/js/rbtools.min.js?ver=6.0'></script>
<script type='text/javascript' src='https://caiofrancasp.com.br/caiofranca/wp-content/plugins/revslider/public/assets/js/rs6.min.js?ver=6.2.2'></script>


<script type="text/javascript">function setREVStartSize(e){			
			try {								
				var pw = document.getElementById(e.c).parentNode.offsetWidth,
					newh;
				pw = pw===0 || isNaN(pw) ? window.innerWidth : pw;
				e.tabw = e.tabw===undefined ? 0 : parseInt(e.tabw);
				e.thumbw = e.thumbw===undefined ? 0 : parseInt(e.thumbw);
				e.tabh = e.tabh===undefined ? 0 : parseInt(e.tabh);
				e.thumbh = e.thumbh===undefined ? 0 : parseInt(e.thumbh);
				e.tabhide = e.tabhide===undefined ? 0 : parseInt(e.tabhide);
				e.thumbhide = e.thumbhide===undefined ? 0 : parseInt(e.thumbhide);
				e.mh = e.mh===undefined || e.mh=="" || e.mh==="auto" ? 0 : parseInt(e.mh,0);		
				if(e.layout==="fullscreen" || e.l==="fullscreen") 						
					newh = Math.max(e.mh,window.innerHeight);				
				else{					
					e.gw = Array.isArray(e.gw) ? e.gw : [e.gw];
					for (var i in e.rl) if (e.gw[i]===undefined || e.gw[i]===0) e.gw[i] = e.gw[i-1];					
					e.gh = e.el===undefined || e.el==="" || (Array.isArray(e.el) && e.el.length==0)? e.gh : e.el;
					e.gh = Array.isArray(e.gh) ? e.gh : [e.gh];
					for (var i in e.rl) if (e.gh[i]===undefined || e.gh[i]===0) e.gh[i] = e.gh[i-1];
										
					var nl = new Array(e.rl.length),
						ix = 0,						
						sl;					
					e.tabw = e.tabhide>=pw ? 0 : e.tabw;
					e.thumbw = e.thumbhide>=pw ? 0 : e.thumbw;
					e.tabh = e.tabhide>=pw ? 0 : e.tabh;
					e.thumbh = e.thumbhide>=pw ? 0 : e.thumbh;					
					for (var i in e.rl) nl[i] = e.rl[i]<window.innerWidth ? 0 : e.rl[i];
					sl = nl[0];									
					for (var i in nl) if (sl>nl[i] && nl[i]>0) { sl = nl[i]; ix=i;}															
					var m = pw>(e.gw[ix]+e.tabw+e.thumbw) ? 1 : (pw-(e.tabw+e.thumbw)) / (e.gw[ix]);					

					newh =  (e.type==="carousel" && e.justify==="true" ? e.gh[ix] : (e.gh[ix] * m)) + (e.tabh + e.thumbh);
				}			
				
				if(window.rs_init_css===undefined) window.rs_init_css = document.head.appendChild(document.createElement("style"));					
				document.getElementById(e.c).height = newh;
				window.rs_init_css.innerHTML += "#"+e.c+"_wrapper { height: "+newh+"px }";				
			} catch(e){
				console.log("Failure at Presize of Slider:" + e)
			}					   
		  };</script>
<noscript>
<style> 
.wpb_animate_when_almost_visible { opacity: 1; }
</style>
</noscript>
</head><body class="home page-template-default page page-id-7 template-slider  color-custom style-simple button-flat layout-full-width if-zoom if-border-hide hide-love no-shadows header-transparent header-fw minimalist-header-no sticky-header sticky-tb-color ab-show subheader-both-center menu-line-below-80 menuo-arrows menuo-no-borders mobile-tb-center mobile-side-slide mobile-mini-mr-lc tablet-sticky mobile-header-mini mobile-sticky be-reg-2162 wpb-js-composer js-comp-ver-6.2.0 vc_responsive">
<!-- mfn_hook_top -->
<!-- mfn_hook_top -->
<div id="Wrapper">
  <div id="Header_wrapper" class="" >
    <header id="Header">
      <div id="Action_bar">
        <div class="container">
          <div class="column one">
            <ul class="contact_details">
            </ul>
            <ul class="social">

              <?php include("includes/social.php"); ?> 
            </ul>
          </div>
        </div>
      </div>
      <div class="header_placeholder"></div>
      <div id="Top_bar" class="loading">
        <div class="container">
          <div class="column one">
            <div class="top_bar_left clearfix">
              <div class="logo">
                 <a id="logo" href="https://www.emersonpenalva.com.br/" title="Caio França - Deputado Estadual" data-height="40" data-padding="15"><img class="logo-main scale-with-grid" src="imagens/logo.png" data-retina="imagens/logo.png" data-height="93" alt="logo" data-no-retina /><img class="logo-sticky scale-with-grid" src="imagens/logo.png" data-retina="imagens/logo.png" data-height="93" alt="logo" data-no-retina /><img class="logo-mobile scale-with-grid" src="imagens/logo.png" data-retina="imagens/logo.png" data-height="93" alt="logo" data-no-retina /><img class="logo-mobile-sticky scale-with-grid" src="imagens/logo.png" data-retina="imagens/logo.png" data-height="93" alt="logo" data-no-retina /></a>
                 </div>
              <?php include("includes/menu.php"); ?>
              <div class="secondary_menu_wrapper"> </div>
              <div class="banner_wrapper"> </div>
              
            </div>
          </div>
        </div>
      </div>
      
    </header>
  </div>
  <!-- mfn_hook_content_before -->
  <!-- mfn_hook_content_before -->
  
  <div class="post-wrapper-content">

		<div class="section the_content has_content"><div class="section_wrapper"><div class="section mcb-section mcb-section-cjhf40aok  no-margin-h full-width" style="padding-top:204px;background-color:#fff;background-repeat:repeat-x;background-position:center bottom">
        
        
        
       
        
        
        <div></div>
        <img class="scale-with-grid" src="imagens/noticias/grande/<?php echo $row_conteudo['nomeImg']; ?>" alt="" title="" width="500"/>
        <h2><?php echo $row_conteudo['titulo']; ?></h2> 
		<p><?php echo $row_conteudo['subTitulo']; ?></p>
         <?php echo $row_conteudo['conteudo']; ?> 
		</div></div></div>
		<div class="section section-post-footer">
			<div class="section_wrapper clearfix">

				<div class="column one post-pager">
									</div>

			</div>
		</div>

		
			
							
			<br><br><br><br><br>
		
		<div class="section section-post-about">
			<div class="section_wrapper clearfix">

							</div>
		</div>

	</div>
  
  
  <!-- mfn_hook_content_after -->
  <!-- mfn_hook_content_after -->
	<?php include("includes/rodape.php"); ?> 
</div>
<div id="Side_slide" class="right dark" data-width="250">
  <div class="close-wrapper"><a href="#" class="close">X</a></div>
  <div class="extras">
    <div class="extras-wrapper"></div>
  </div>
  <div class="lang-wrapper"></div>
  <div class="menu_wrapper"></div>
  
</div>
<div id="body_overlay"></div>
<!-- mfn_hook_bottom -->
<!-- mfn_hook_bottom -->
<link href="https://fonts.googleapis.com/css?family=Roboto:700%2C400%7CDM+Sans:700" rel="stylesheet" property="stylesheet" media="all" type="text/css" >

<?php include("includes/scripts.php"); ?> 
</body>
</html>
