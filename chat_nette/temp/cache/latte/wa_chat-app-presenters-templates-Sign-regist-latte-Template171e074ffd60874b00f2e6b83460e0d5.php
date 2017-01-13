<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Sign/regist.latte

class Template171e074ffd60874b00f2e6b83460e0d5 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('707b1cb525', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block field
//
if (!function_exists($_b->blocks['field'][] = '_lba82a85db91_field')) { function _lba82a85db91_field($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="layout_body2">
    <div id="navigation2">
        <div id="nav3">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:in"), ENT_COMPAT) ?>
">Log in</a>    
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
if (!function_exists($_b->blocks['content'][] = '_lb37ed7a1bd1_content')) { function _lb37ed7a1bd1_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="main">
    <div class="left" id="sidebar_outer">
        <div id="sidebar">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars()) ; $_l->tmp = $_control->getComponent("registrationForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
        </div>
    </div>
    <div class="clearer">&nbsp;</div>
</div><?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb56f23f66c0_title')) { function _lb56f23f66c0_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>            <h1>Registration</h1>
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
call_user_func(reset($_b->blocks['field']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}