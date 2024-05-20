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

$maxRows_destaque = 3;
$pageNum_destaque = 0;
if (isset($_GET['pageNum_destaque'])) {
  $pageNum_destaque = $_GET['pageNum_destaque'];
}
$startRow_destaque = $pageNum_destaque * $maxRows_destaque;

mysqli_select_db($conexao, $database_conexao);
$query_destaque = "SELECT * FROM site_noticias WHERE galeria = 0 ORDER BY id DESC";
$query_limit_destaque = sprintf("%s LIMIT %d, %d", $query_destaque, $startRow_destaque, $maxRows_destaque);
$destaque = mysqli_query($conexao, $query_limit_destaque) or die(mysqli_error());
$row_destaque = mysqli_fetch_assoc($destaque);

if (isset($_GET['totalRows_destaque'])) {
  $totalRows_destaque = $_GET['totalRows_destaque'];
} else {
  $all_destaque = mysqli_query($query_destaque);
  $totalRows_destaque = mysqli_num_rows($all_destaque);
}
$totalPages_destaque = ceil($totalRows_destaque/$maxRows_destaque)-1;

$maxRows_conteudo2 = 3;
$pageNum_conteudo2 = 0;
if (isset($_GET['pageNum_conteudo2'])) {
  $pageNum_conteudo2 = $_GET['pageNum_conteudo2'];
}
$startRow_conteudo2 = $pageNum_conteudo2 * $maxRows_conteudo2;

mysqli_select_db($conexao, $database_conexao);
$query_conteudo2 = "SELECT * FROM site_noticias WHERE galeria = 0 ORDER BY id DESC";
$query_limit_conteudo2 = sprintf("%s LIMIT %d, %d", $query_conteudo2, $startRow_conteudo2, $maxRows_conteudo2);
$conteudo2 = mysqli_query($conexao, $query_limit_conteudo2) or die(mysqli_error());
$row_conteudo2 = mysqli_fetch_assoc($conteudo2);

if (isset($_GET['totalRows_conteudo2'])) {
  $totalRows_conteudo2 = $_GET['totalRows_conteudo2'];
} else {
  $all_conteudo2 = mysqli_query($query_conteudo2);
  $totalRows_conteudo2 = mysqli_num_rows($all_conteudo2);
}
$totalPages_conteudo2 = ceil($totalRows_conteudo2/$maxRows_conteudo2)-1;


$maxRows_eventos = 3;
$pageNum_eventos = 0;
if (isset($_GET['pageNum_eventos'])) {
  $pageNum_eventos = $_GET['pageNum_eventos'];
}
$startRow_eventos = $pageNum_eventos * $maxRows_eventos;

mysqli_select_db($conexao, $database_conexao);
$query_eventos = "SELECT id, titulo, agenda FROM site_eventos ORDER BY id DESC";
$query_limit_eventos = sprintf("%s LIMIT %d, %d", $query_eventos, $startRow_eventos, $maxRows_eventos);
$eventos = mysqli_query($conexao, $query_limit_eventos) or die(mysqli_error());
$row_eventos = mysqli_fetch_assoc($eventos);

if (isset($_GET['totalRows_eventos'])) {
  $totalRows_eventos = $_GET['totalRows_eventos'];
} else {
  $all_eventos = mysqli_query($query_eventos);
  $totalRows_eventos = mysqli_num_rows($all_eventos);
}
$totalPages_eventos = ceil($totalRows_eventos/$maxRows_eventos)-1;

mysqli_select_db($conexao, $database_conexao);
$query_video = "SELECT * FROM site_galeria WHERE id_relativo = 1  ORDER BY id DESC";
$video = mysqli_query($conexao, $query_video) or die(mysqli_error());
$row_video = mysqli_fetch_assoc($video);
$totalRows_video = mysqli_num_rows($video);

?>

<!DOCTYPE html>
<html lang="pt-BR" class="no-js" itemscope itemtype="https://schema.org/WebPage">
<head>
<meta charset="UTF-8" />

<link rel="alternate" hreflang="pt-BR" href="https://emersonpenalva.com.br/"/>
<title>Emerson Penalva - Deputado Estadual</title>
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

<link rel='stylesheet' id='mfn-fonts-css'  href='https://fonts.googleapis.com/css?family=Roboto%3A1%2C300%2C400%2C400italic%2C500%2C700%2C700italic%7CRoboto+Condensed%3A1%2C300%2C400%2C400italic%2C500%2C700%2C700italic&#038;ver=5.4.4' type='text/css' media='all' />
<style id='mfn-dynamic-inline-css' type='text/css'>

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
      <div class="mfn-main-slider mfn-rev-slider">
        <!-- START psychologist2 REVOLUTION SLIDER 6.2.2 -->
        <p class="rs-p-wp-fix"></p>
        <rs-module-wrap id="rev_slider_1_1_wrapper" data-source="gallery" style="background:transparent;padding:0;margin:0px auto;margin-top:0;margin-bottom:0;">
          <rs-module id="rev_slider_1_1" style="display:none;" data-version="6.2.2">
            <rs-slides>
              <rs-slide data-key="rs-1" data-title="Slide" data-anim="ei:d;eo:d;s:1000;r:0;t:fade;sl:0;"> <img src="imagens/banner.png?isisis" title="banner" width="1920" height="990" class="rev-slidebg" data-no-retina>
                <!--
							-->
                <rs-layer
								id="slider-1-slide-1-layer-1" 
								data-type="text"
								data-rsp_ch="on"
								data-xy="xo:60px,60px,60px,27px;y:m;yo:-101px,-101px,-101px,-83px;"
								data-text="w:normal;s:55,55,55,25;l:65,65,65,27;fw:700;"
								data-frame_999="o:0;st:w;"
								style="z-index:10;font-family:Roboto;"><span style="color:#e9b500;">A força da nossa voz</span><br />
                 Deputado Estadual  <br />
                  Emerson Penalva<br />
                </rs-layer>
                <!--

							-->
                <rs-layer
								id="slider-1-slide-1-layer-2" 
								data-type="text"
								data-rsp_ch="on"
								data-xy="xo:61px,61px,61px,27px;y:m;yo:69px,69px,69px,-8px;"
								data-text="w:normal;s:16,16,16,9;l:25,25,25,13;"
								data-dim="w:470px,470px,470px,181px;"
								data-frame_999="o:0;st:w;"
								style="z-index:11;font-family:Roboto;"
							>Conheça minha trajetória e fique por dentro das novidades do nosso mandato e nossos projetos. </rs-layer>
                <!--

							-->
                <a
								id="slider-1-slide-1-layer-3" 
								class="rs-layer rev-btn"
								href="https://emersonpenalva.com.br/atuacao" target="_self" rel="noopener"
								data-type="button"
								data-rsp_ch="on"
								data-xy="xo:180px,0px,0px,0px;y:m;yo:142px,142px,142px,0px;"
								data-text="w:normal;s:16,16,16,9;l:40,40,0,0;fw:700;a:left,left,left,center;"
								data-dim="w:auto,auto,auto,97px;minh:0px,0px,0px,none;"
								data-padding="r:25,25,25,10;l:25,25,25,10;"
								data-frame_999="o:0;st:w;"
								data-frame_hover="bgc:#f38745;bor:0px,0px,0px,0px;bri:120%;"
								style="z-index:13;background-color:#e9b500;font-family:DM Sans;cursor:pointer;"
							>ATUAÇÃO<br />
                </a>
                <!--

							-->
                <a
								id="slider-1-slide-1-layer-4" 
								class="rs-layer rev-btn"
								href="https://emersonpenalva.com.br/perfil" target="_self" rel="noopener"
								data-type="button"
								data-color="#003567"
								data-rsp_ch="on"
								data-xy="xo:60px,60px,60px,27px;y:m;yo:142px,142px,142px,45px;"
								data-text="w:normal;s:16,16,16,9;l:40,40,40,22;fw:700;a:left,left,left,center;"
								data-dim="w:auto,auto,auto,97px;minh:0px,0px,0px,none;"
								data-padding="r:25,25,25,10;l:25,25,25,10;"
								data-frame_999="o:0;st:w;"
								data-frame_hover="c:#003567;bgc:#c9c9c9;bor:0px,0px,0px,0px;bri:120%;"
								style="z-index:12;background-color:#ffffff;font-family:DM Sans;cursor:pointer;"
							>PERFIL </a>
                <!--
-->
              </rs-slide>
            </rs-slides>
            <rs-progress class="rs-bottom" style="visibility: hidden !important;"></rs-progress>
          </rs-module>
          <script type="text/javascript">
					setREVStartSize({c: 'rev_slider_1_1',rl:[1240,1240,1240,480],el:[860,860,860,400],gw:[1240,1240,1240,480],gh:[860,860,860,400],type:'standard',justify:'',layout:'fullwidth',mh:"0"});
					var	revapi1,
						tpj;
					jQuery(function() {
						tpj = jQuery;
						if(tpj("#rev_slider_1_1").revolution == undefined){
							revslider_showDoubleJqueryError("#rev_slider_1_1");
						}else{
							revapi1 = tpj("#rev_slider_1_1").show().revolution({
								jsFileLocation:"//caiofrancasp.com.br/caiofranca/wp-content/plugins/revslider/public/assets/js/",
								sliderLayout:"fullwidth",
								visibilityLevels:"1240,1240,1240,480",
								gridwidth:"1240,1240,1240,480",
								gridheight:"860,860,860,400",
								spinner:"spinner9",
								spinnerclr:"#10c2ba",
								editorheight:"860,768,960,400",
								responsiveLevels:"1240,1240,1240,480",
								disableProgressBar:"on",
								navigation: {
									onHoverStop:false
								},
								fallbacks: {
									allowHTML5AutoPlayOnAndroid:true
								},
							});
						}
						
					});
				</script>
        </rs-module-wrap>
        <!-- END REVOLUTION SLIDER -->
      </div>
    </header>
  </div>
  <!-- mfn_hook_content_before -->
  <!-- mfn_hook_content_before -->
  <div id="Content">
    <div class="content_wrapper clearfix">
      <div class="sections_group">
        <div class="entry-content" itemprop="mainContentOfPage">
          <div class="section mcb-section mcb-section-ai05xnmz0"  style="padding-top:30px" >
            <div class="section_wrapper mcb-section-inner">
              <div class="wrap mcb-wrap mcb-wrap-hkrp9eok2 one  valign-top clearfix" style=""  >
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-vwkq2l4hp one column_column">
                    <div class="column_attr clearfix" style="">
                      <h2>Notícias<br /> em destaque</h2>
                    </div>
                  </div>
                  <div class="column mcb-column mcb-item-43yo37kqg one column_blog_teaser">
                    <div class="blog-teaser ">
                      <ul class="teaser-wrapper">
                        
                        <?php do { ?>
                        
                        <li class="post-1344 post type-post status-publish format-standard has-post-thumbnail hentry category-noticias">
                          <div class="photo-wrapper scale-with-grid"><img  src="imagens/noticias/grande/<?php echo $row_conteudo2['nomeImg']; ?>" class="scale-with-grid wp-post-image" alt="" /></div>
                          <div class="desc-wrapper">
                            <div class="desc">
                              <div class="post-meta clearfix"><span class="author"><span class="label"> <?php echo $row_conteudo2['subTitulo']; ?></span> </span> </div>
                              <div class="post-title">
                                <h3><a href="vernoticias.php?id=<?php echo $row_conteudo2['id']; ?>"><?php echo $row_conteudo2['titulo']; ?></a></h3>
                              </div>
                            </div>
                          </div>
                        </li>
                       <?php } while ($row_conteudo2 = mysqli_fetch_assoc($conteudo2)); ?> 
                        
                        
                     
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section mcb-section mcb-section-cjhf40aok  no-margin-h full-width"  style="padding-top:200px;background-color:#f6f8f7;background-image:url(https://agenciaideall.com.br/caiofranca/wp-content/uploads/2020/02/psycho-stripe-white.png);background-repeat:repeat-x;background-position:center bottom" >
            <div class="section_wrapper mcb-section-inner">
              <div class="wrap mcb-wrap mcb-wrap-xo6ay5mam one-second  valign-top move-up clearfix" style="margin-top:-75px"  data-mobile="no-up">
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-xcsv33y1e one-fourth column_placeholder">
                    <div class="placeholder">&nbsp;</div>
                  </div>
                  <div class="column mcb-column mcb-item-wulpss52r three-fourth column_image">
                    <div class="image_frame image_item no_link scale-with-grid no_border" >
                      <div class="image_wrapper"><img class="scale-with-grid" src="imagens/base.png" alt="" title="" width="720" height="720"/></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="wrap mcb-wrap mcb-wrap-luujst52j one-second  valign-top clearfix" style="padding:60px 5% 0;background-color:#ffffff"  >
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-32kjkw65h two-third column_column column-margin-20px">
                    <div class="column_attr clearfix" style="">
                      <h2><strong>Emerson Penalva</strong><br>
                      A força da nossa voz</h2>
                      <hr class="no_line" style="margin:0 auto 15px"/>
                      <p>Para Emerson Penalva, a política é uma ferramenta de transformação social e importante instrumento para mudar a vida das pessoas.</p>
                      <p><br>
                      </p>
                      <p>Em seu primeiro mandato na Câmara Municipal de Salvador, Penalva travou lutas em prol do fortalecimento do Terceiro Setor, da Educação e o fomento aos Esportes, assim como defendeu durante toda a campanha eleitoral. Penalva acredita que o debate em torno do Terceiro Setor é um dos caminhos para a geração de emprego e renda, melhorar a saúde e educação da população, estimular a cultura e a prática de esportes. Com essa atuação, Penalva presidiu a Frente Parlamentar em Defesa do Terceiro Setor na Câmara de Salvador.</p>
                      <p><br>
                      </p>
                      <p>Seu destaque no Legislativo rendeu frutos. Penalva foi escolhido como líder do Podemos na Câmara de Vereadores de janeiro de 2021 a março de 2022. Atualmente, no PDT, devido ao seu desempenho, ele também recebeu o título de líder do seu atual partido na Casa.</p>
                      <p><br>
                      </p>
                      <p>Durante seu mandato como vereador, Penalva ainda ocupou três importantes comissões do Legislativo soteropolitano: Educação, Esporte e Lazer; Assistência Social e Direitos das Pessoas com Deficiência e Legislação Participativa.</p>
                    </div>
                  </div>
                  <div class="column mcb-column mcb-item-pchid6ftv two-third column_button"><a class="button  button_size_2 button_js" href="perfil" style="background-color:#f57f37!important;color:#ffffff;"    ><span class="button_label"><strong>SAIBA MAIS</strong></span></a> </div>
                </div>
              </div>
            </div>
          </div>
          <div class="section mcb-section mcb-section-b6olsit0m  dark bg-cover"  style="padding-top:50px;background-color:#054b91" >
            <div class="section_wrapper mcb-section-inner">
              <div class="wrap mcb-wrap mcb-wrap-4qwoiwt21 one  valign-top clearfix" style="padding:0 5%"  >
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-s6n37dwri one column_column">
                    <div class="column_attr clearfix align_center" style="">
                      <h2>ATUAÇÃO PARLAMENTAR</h2>
                      <p>Confira nossa atuação parlamentar na Câmara de Vereadores de Salvador</p>
                    </div>
                  </div>
                  <div class="column mcb-column mcb-item-zl03qd33v column one-fourth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a class="" href="https://emersonpenalva.com.br/atuacao"  >
                      <div class="image_wrapper"><img src="imagens/1.png" class="scale-with-grid" alt="desenvolvimento" width="95" height="90"/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">DEFESA DO TERCEIRO SETOR</h4>
                      </div>
                      </a></div>
                  </div>
                  <div class="column mcb-column mcb-item-54kq9qm88 column one-fourth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a class="" href="https://emersonpenalva.com.br/atuacao"  >
                      <div class="image_wrapper"><img src="imagens/2.png" class="scale-with-grid" alt="infraestrutura" width="95" height="90"/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">MELHORIAS PARA A EDUCAÇÃO</h4>
                      </div>
                      </a></div>
                  </div>
                  <div class="column mcb-column mcb-item-nx6mohkzm column one-fourth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a class="" href="https://emersonpenalva.com.br/atuacao"  >
                      <div class="image_wrapper"><img src="imagens/3.png" class="scale-with-grid" alt="" width="" height=""/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">FOMENTO A CULTURA, ESPORTE E LAZER:</h4>
                      </div>
                      </a></div>
                  </div>
                  
                  
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          <div class="section mcb-section mcb-section-p5u19g353 bg-cover" >
            <div class="section_wrapper mcb-section-inner">
              
              <br><br><br><br>
              <div class="content-wrapper w-container">
    
    
    
    <div class="column mcb-column mcb-item-vwkq2l4hp one column_column">
                    <div class="column_attr clearfix" style="">
                      <h2>Emerson nas redes</h2>
                    </div>
                  </div>
    
<div class="embedsocial-hashtag" data-ref="8e71d3ff1811dc35f7d9d63aa5e665694d007a37"><a class="feed-powered-by-es feed-powered-by-es-slider" href="https://embedsocial.com/social-media-aggregator/" target="_blank" title="Widget by EmbedSocial">Widget by EmbedSocial<span>→</span></a></div><script>(function(d, s, id){var js; if (d.getElementById(id)) {return;} js = d.createElement(s); js.id = id; js.src = "https://embedsocial.com/cdn/ht.js"; d.getElementsByTagName("head")[0].appendChild(js);}(document, "script", "EmbedSocialHashtagScript"));</script>
    
  </div><br><br><br>
              
              
            </div>
          </div>
          
          <div class="section mcb-section mcb-section-z69rzfga6  dark bg-cover" id="projetos" style="padding-top:50px;background-color:#ff883e" >
            <div class="section_wrapper mcb-section-inner">
              <div class="wrap mcb-wrap mcb-wrap-8tzkyqt7j one  valign-top clearfix" style="padding:0 5%"  >
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-8ru9o3b5b one column_column">
                    <div class="column_attr clearfix align_center" style="">
                      <h2>PROJETOS</h2>
                      <p>Confira nossa atuação na Câmara de Vereadores de Salvador</p>
                    </div>
                  </div>
                  
                  
                  
                  
                  
                  <div class="mcb-wrap-inner">
                  
                  <div class="column mcb-column mcb-item-zl03qd33v one-fifth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a href="http://177.21.11.132:8073/leg/salvador/LEG_SYS_acompanhamento_proposicoes/"  >
                      <div class="image_wrapper"><img src="https://caiofrancasp.com.br/caiofranca/wp-content/uploads/2020/07/icon-requerimentos-1.png" class="scale-with-grid" alt="desenvolvimento" width="95" height="90"/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">PROJETOS DE LEI</h4>
                      </div>
                      </a></div>
                  </div>
                  <div class="column mcb-column mcb-item-54kq9qm88 one-fifth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a href="http://177.21.11.132:8073/leg/salvador/LEG_SYS_acompanhamento_proposicoes/"  >
                      <div class="image_wrapper"><img src="https://caiofrancasp.com.br/caiofranca/wp-content/uploads/2020/07/icon-requerimentos-1.png" class="scale-with-grid" alt="infraestrutura" width="95" height="90"/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">INDICAÇÕES</h4>
                      </div>
                      </a></div>
                  </div>
                  <div class="column mcb-column mcb-item-nx6mohkzm one-fifth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a href="http://177.21.11.132:8073/leg/salvador/LEG_SYS_acompanhamento_proposicoes/"  >
                      <div class="image_wrapper"><img src="https://caiofrancasp.com.br/caiofranca/wp-content/uploads/2020/07/icon-requerimentos-1.png" class="scale-with-grid" alt="" width="" height=""/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">REQUERIMENTOS</h4>
                      </div>
                      </a></div>
                  </div>
                  
                  <div class="column mcb-column mcb-item-nx6mohkzm one-fifth column_icon_box">
                    <div class="icon_box icon_position_top no_border"><a href="http://177.21.11.132:8073/leg/salvador/LEG_SYS_acompanhamento_proposicoes/"  >
                      <div class="image_wrapper"><img src="https://caiofrancasp.com.br/caiofranca/wp-content/uploads/2020/07/icon-requerimentos-1.png" class="scale-with-grid" alt="" width="" height=""/></div>
                      <div class="desc_wrapper">
                        <h4 class="title">MOÇÕES</h4>
                      </div>
                      </a></div>
                  </div>
                  
                  
                </div>
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                  
                </div>
              </div>
            </div>
          </div>
          <div class="section mcb-section mcb-section-p5u19g353 bg-cover"  style="background-image:url(imagens/contato.png);background-repeat:no-repeat;background-position:center bottom" >
            <div class="section_wrapper mcb-section-inner">
              <div class="wrap mcb-wrap mcb-wrap-5vzwjt1jk one-second  valign-top clearfix" style="padding:60px 20px 20px 20px;background-color:#329fe2"  >
                <div class="mcb-wrap-inner">
                  <div class="column mcb-column mcb-item-fg5m53snp one column_column">
                    <div class="column_attr clearfix" style="color:#fff">
                      <h2 style="color:#fff">Fale com o Emerson!</h2>
                      Preencha o formulário e retornaremos contato em até 48h.
                      <hr class="no_line" style="margin:0 auto 15px"/>
                      <div role="form" class="wpcf7" id="wpcf7-f106-p7-o1" lang="en-US" dir="ltr">
                        <div class="screen-reader-response"></div>
                        <form action="#" method="post" class="wpcf7-form" novalidate="novalidate">
                          <div style="display: none;">
                            <input type="hidden" name="_wpcf7" value="106" />
                            <input type="hidden" name="_wpcf7_version" value="5.1.7" />
                            <input type="hidden" name="_wpcf7_locale" value="en_US" />
                            <input type="hidden" name="_wpcf7_unit_tag" value="wpcf7-f106-p7-o1" />
                            <input type="hidden" name="_wpcf7_container_post" value="7" />
                          </div>
                          <div class="column one-second">
                            <label style="margin-right:10px"><span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="Nome" />
                            </span></label>
                          </div>
                          <div class="column one-second">
                            <label><span class="wpcf7-form-control-wrap your-subject1">
                            <input type="text" name="your-subject1" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Telefone" />
                            </span></label>
                          </div>
                          <div class="column one-second">
                            <label style="margin-right:10px"><span class="wpcf7-form-control-wrap your-email">
                            <input type="email" name="your-email" value="" size="40" class="wpcf7-form-control wpcf7-text wpcf7-email wpcf7-validates-as-required wpcf7-validates-as-email" aria-required="true" aria-invalid="false" placeholder="E-mail" />
                            </span></label>
                          </div>
                          <div class="column one-second">
                            <label><span class="wpcf7-form-control-wrap your-subject">
                            <input type="text" name="your-subject" value="" size="40" class="wpcf7-form-control wpcf7-text" aria-invalid="false" placeholder="Assunto" />
                            </span></label>
                          </div>
                          <div class="column one">
                            <label><span class="wpcf7-form-control-wrap your-message">
                            <textarea name="your-message" cols="40" rows="6" class="wpcf7-form-control wpcf7-textarea" aria-invalid="false" placeholder="Mensagem"></textarea>
                            </span> </label>
                          </div>
                          <div class="column one">
                            <input type="submit" value="Enviar mensagem" class="wpcf7-form-control wpcf7-submit button_full_width" />
                          </div>
                          <div class="wpcf7-response-output wpcf7-display-none"></div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          
          
          
          
          
          
          
          
          <div class="section the_content no_content">
            <div class="section_wrapper">
              <div class="the_content_wrapper"></div>
            </div>
          </div>
          <div class="section section-page-footer">
            <div class="section_wrapper clearfix">
              <div class="column one page-pager"> </div>
            </div>
          </div>
        </div>
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
