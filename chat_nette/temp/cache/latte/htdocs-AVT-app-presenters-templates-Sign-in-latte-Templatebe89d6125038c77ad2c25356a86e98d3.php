<?php
// source: C:\xampp\htdocs\AVT\app\presenters/templates/Sign/in.latte

class Templatebe89d6125038c77ad2c25356a86e98d3 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1574ece681', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block contentHome1
//
if (!function_exists($_b->blocks['contentHome1'][] = '_lbd21c6df2f4_contentHome1')) { function _lbd21c6df2f4_contentHome1($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb52b1855a64_content')) { function _lb52b1855a64_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div class="box_home2">
<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>
<center>
<?php $_l->tmp = $_control->getComponent("signInForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
</center>
</div>
<?php call_user_func(reset($_b->blocks['contentHome2']), $_b, get_defined_vars()) ; 
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbf7a6fab968_title')) { function _lbf7a6fab968_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Přihlášení</h1>
<?php
}}

//
// block contentHome2
//
if (!function_exists($_b->blocks['contentHome2'][] = '_lb636e7c86b0_contentHome2')) { function _lb636e7c86b0_contentHome2($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
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
call_user_func(reset($_b->blocks['contentHome1']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}