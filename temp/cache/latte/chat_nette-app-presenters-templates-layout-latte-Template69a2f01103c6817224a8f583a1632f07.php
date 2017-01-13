<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/@layout.latte

class Template69a2f01103c6817224a8f583a1632f07 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('43ed15197a', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block head
//
if (!function_exists($_b->blocks['head'][] = '_lb97abc9862c_head')) { function _lb97abc9862c_head($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block scripts
//
if (!function_exists($_b->blocks['scripts'][] = '_lb222a3539fc_scripts')) { function _lb222a3539fc_scripts($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>            <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/jquery.js"></script>
            <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette.ajax.js"></script>
            <script src="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/js/nette-start.js"></script>
<?php
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
 | <?php } ?>Online Chat</title>

        <link rel="stylesheet" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/css/style.css">
        <link rel="shortcut icon" href="<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($basePath), ENT_COMPAT) ?>/favicon.ico">
        
        <?php if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['head']), $_b, get_defined_vars())  ?>

        
    </head>

    <body id="top">
<?php $iterations = 0; foreach ($flashes as $flash) { ?>        <div<?php if ($_l->tmp = array_filter(array('flash', $flash->type))) echo ' class="' . Latte\Runtime\Filters::escapeHtml(implode(" ", array_unique($_l->tmp)), ENT_COMPAT) . '"' ?>
><?php echo Latte\Runtime\Filters::escapeHtml($flash->message, ENT_NOQUOTES) ?></div>
<?php $iterations++; } ?>
        
<?php call_user_func(reset($_b->blocks['scripts']), $_b, get_defined_vars())  ?>
            
        <div id="layout_wrapper_outer">
            <div id="layout_wrapper"> 
                
                <div id="layout_top">
                    <div id="site_title">
                        <h1><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:"), ENT_COMPAT) ?>
"><span>Online</span> Chat</a></h1>
                    </div>
<?php if ($user->loggedIn) { $_b->templates['43ed15197a']->renderChildTemplate("components/global/loggedHeaderButtons.latte", $template->getParameters()) ;} else { Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'notLoggedHeaderButtons', $template->getParameters()) ;} ?>
                </div>
                
                <div id="layout_body_outer">
                    <div id="layout_body">
<?php Latte\Macros\BlockMacrosRuntime::callBlock($_b, 'content', $template->getParameters()) ?>
                    </div>
                </div>
                    
                <div id="footer">
                    <div class="left">Copyright &copy; 2017 Jakub Kubišta - Chat</div>		
                    <div class="clearer">&nbsp;</div>
                </div>
                    
            </div>
        </div>
                    
    </body>
</html>
<?php
}}