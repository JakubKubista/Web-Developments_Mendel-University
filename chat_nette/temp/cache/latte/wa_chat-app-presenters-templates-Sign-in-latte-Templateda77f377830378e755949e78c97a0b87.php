<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Sign/in.latte

class Templateda77f377830378e755949e78c97a0b87 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('75adcb4bc8', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block notLoggedHeaderButtons
//
if (!function_exists($_b->blocks['notLoggedHeaderButtons'][] = '_lb9cbce1c0bf_notLoggedHeaderButtons')) { function _lb9cbce1c0bf_notLoggedHeaderButtons($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="layout_body2">
    <div id="navigation2">
        <div id="nav_big">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:regist"), ENT_COMPAT) ?>
">Registration</a>
            <div class="clearer">&nbsp;</div>
        </div>  
        <div class="clearer">&nbsp;</div>
    </div>
</div>
<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb0d36346065_content')) { function _lb0d36346065_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="main">
    <div class="left" id="sidebar_outer">
        <div id="sidebar">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ; $_l->tmp = $_control->getComponent("signInForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
        </div>
    </div>
    <div class="clearer">&nbsp;</div>
</div>
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbb8b81e52f2_title')) { function _lbb8b81e52f2_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>            <h1>Login</h1>
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
if ($_l->extends) { ob_end_clean(); return $template->renderChildTemplate($_l->extends, get_defined_vars()); }
call_user_func(reset($_b->blocks['notLoggedHeaderButtons']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}