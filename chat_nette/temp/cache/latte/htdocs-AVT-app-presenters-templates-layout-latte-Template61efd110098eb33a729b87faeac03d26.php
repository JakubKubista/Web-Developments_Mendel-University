<?php
// source: C:\xampp\htdocs\AVT\app\presenters/templates/@layout.latte

class Template61efd110098eb33a729b87faeac03d26 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('94c41a9c10', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lba86c79b8e0_head')) { function _lba86c79b8e0_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lbfa7b573db2_scripts')) { function _lbfa7b573db2_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>	<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
	<script src="//nette.github.io/resources/js/netteForms.min.js"></script>
	<script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/main.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery.easing.1.3.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/menu.js"></script>
        <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery.coda-slider-2.0.js"></script>
	<script type="text/javascript">
            $().ready(function() {
                $('#coda-slider-2').codaSlider({
                   autoSlide: true,
                   autoSlideInterval: 6000,
                   autoSlideStopWhenClicked: true	

               });
           });
        </script>
        

<div id="menu">
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'contentHome1', $template->getParameters()) ?>
<div id="main">   
<div id="header">
    <div id="logo_picture">
	<div id="logo">
    	<h1><a href="#">All About Fitness</a></h1>
      	<h2><a href="#"><small>&bdquo;Motivace je to, díky čemuž začnete. Zvyk je to, díky čemuž v tom budete pokračovat.&ldquo;</small></a></h2>

<?php if ($user->loggedIn) { ?>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
"><div class="login">Odhlásit se</div></a>
<?php } else { ?>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:regist"), ENT_COMPAT) ?>
"><h3>Registrovat se</h3></a>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:in"), ENT_COMPAT) ?>
"><div class="login">Přihlásit se</div></a>
<?php } ?>
<div id="sse2">
  <div id="sses2">
    <ul>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
"><div class="window_img7">&nbsp;</div></a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Jídelníčky</a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Tréninky</a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Trenéři</a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Posilovny</a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:groups"), ENT_COMPAT) ?>
">Diskuze</a></li>
      <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
">Kontakt</a></li>
    </ul>
  </div>
</div>
    </div>
    </div>
</div> 
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
        
    <div style="height:15px"></div>
    <div style="clear: both"></div>
    
 </div>
    <div id="footer">
        <div class="row-top">
            <div class="row-padding">
                    <p>© 2015 Jakub Kubišta - AVT</p>
                    <p>Designed by xkubist1</p>
                    <a href=""><div id="youtube_img">&nbsp;</div></a>
                    <a href=""><div id="facebook_img">&nbsp;</div></a>
                    <a href=""><div id="tweet_img" >&nbsp;</div></a>
            </div>
	</div>
    </div>
</div>
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'contentHome2', $template->getParameters()) ;
}}

//
// end of blocks
//

// template extending

$_l->extends = empty($_g->extended) && isset($_control) && $_control instanceof Nette\Application\UI\Presenter ? $_control->findLayoutTemplateFile() : NULL; $_g->extended = TRUE;

if ($_l->extends) { ob_start();}

// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<!DOCTYPE html>
<html>
<head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8">
        <meta name="keywords" content="">
        <meta name="description" content="">
        
	<title><?php if (isset($_b->blocks["title"])) { ob_start(); Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'title', $template->getParameters()); echo $template->striptags(ob_get_clean()) ?>
 | <?php } ?>All About Fitness</title>

	<link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
	<link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
	<?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

</head>

<body>
<?php $iterations = 0; foreach ($flashes as $flash) { ?>	<div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="' . Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
</body>
</html>
<?php
}}