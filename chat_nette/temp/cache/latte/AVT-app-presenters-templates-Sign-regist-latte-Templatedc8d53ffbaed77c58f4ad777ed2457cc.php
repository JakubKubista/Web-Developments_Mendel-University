<?php
// source: C:\xampp\htdocs\AVT\app\presenters/templates/Sign/regist.latte

class Templatedc8d53ffbaed77c58f4ad777ed2457cc extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('f9eef28ded', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block contentHome1
//
if (!function_exists($_b->blocks['contentHome1'][] = '_lb7708114e0d_contentHome1')) { function _lb7708114e0d_contentHome1($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb9cd0f4cca1_content')) { function _lb9cd0f4cca1_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <div class="box_home2">

<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<center>
<?php $_l->tmp = $_control->getComponent("registrationForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
</center>
</div>
<?php call_user_func(reset($_b->blocks['contentHome2']), $_b, get_defined_vars()) ; 
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lbcd3ca8b44e_title')) { function _lbcd3ca8b44e_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1>Registrace</h1>
<?php
}}

//
// block contentHome2
//
if (!function_exists($_b->blocks['contentHome2'][] = '_lb21098e0257_contentHome2')) { function _lb21098e0257_contentHome2($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
call_user_func(reset($_b->blocks['contentHome1']), $_b, get_defined_vars())  ?>

<?php call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}