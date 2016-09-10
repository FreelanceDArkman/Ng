<?php
defined( '_JEXEC' ) or die( 'Restricted access' );?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >

<head>
<jdoc:include type="head" />

<!--<link rel="stylesheet" href="templates/system/css/system.css" type="text/css" />-->
<link rel="stylesheet" href="templates/system/css/general.css" type="text/css" />
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
<link rel="shortcut icon" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/favicon.ico" />

<!--[if lte IE 7]>
<link rel="stylesheet" href="templates/<?php echo $this->template ?>/css/ie6.css" type="text/css" />
<![endif]-->
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-21518969-7']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body class="body_bg">
<div id="clouds">
	<div id="wrapper">
		<div id="header">
			<div id="header_img">
				<div id="top">
					<div id="search">
						<jdoc:include type="modules" name="user4" />
					<div class="clr"></div>	
					</div>
					<div id="logo">
						<a href="index.php"><?php echo $mainframe->getCfg('sitename') ;?></a>
						<div class="clr"></div>	
					</div>
				</div>
				<div id="news">
					<div id="news_flash">
						<jdoc:include type="modules" style="rounded" name="top" />
						<div class="clr"></div>
					</div>	
				</div>	
				<div id="top_menu">	
					<jdoc:include type="modules" name="user3" />
				</div>
			</div>
		</div>
		<div class="content_m">
			<div class="content_b">
				<div class="content_t">
					<div id="pathway">
						<div class="pathway_l">
							<table cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<jdoc:include type="module" name="breadcrumbs" />
									</td>	
								</tr>
							</table>
						</div>
					</div>
						<?php if($this->countModules('left') and JRequest::getCmd('layout') != 'form') : ?>
						<div id="leftcolumn">	
							<jdoc:include type="modules" name="left" style="rounded" />
<br /><?php $sg = "banner"; include "templates.php"; ?><br />
							
						</div>
						<?php endif; ?>
						
						<?php if($this->countModules('right') and JRequest::getCmd('layout') != 'form') : ?>			
						<div id="main">
						<?php else: ?>
						<div id="main_full">
							<?php endif; ?>
							<div class="nopad">				
								<jdoc:include type="message" />
								<?php if($this->params->get('showComponent')) : ?>
									<jdoc:include type="component" />
								<?php endif; ?>
							</div>						
						</div>							
						<div class="clr"></div>						
				</div>		
			</div>
		</div>
		<div id="footer">
			<p class="copyright"><? $sg = ''; include "templates.php"; ?></p>
		</div>
		<div id="valid">
			Valid <a href="http://validator.w3.org/check/referer">XHTML</a> and <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>.
		</div>
	</div>
</div>	
<jdoc:include type="modules" name="debug" />		
</body>
</html>