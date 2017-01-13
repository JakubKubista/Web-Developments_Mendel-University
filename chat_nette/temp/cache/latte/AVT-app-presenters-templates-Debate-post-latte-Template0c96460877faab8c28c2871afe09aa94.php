<?php
// source: C:\xampp\htdocs\AVT\app\presenters/templates/Debate/post.latte

class Template0c96460877faab8c28c2871afe09aa94 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('2a0e495867', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block contentHome1
//
if (!function_exists($_b->blocks['contentHome1'][] = '_lb89a7baedff_contentHome1')) { function _lb89a7baedff_contentHome1($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb73069deb8a_content')) { function _lb73069deb8a_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>        <div class="box_home2">
<p><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:groups"), ENT_COMPAT) ?>
"><div class="back">←</div></a></p>

<?php call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<div class="post"><?php echo Latte\Runtime\Filters::escapeHtml($post->content, ENT_NOQUOTES) ?></div>

<br><h2>Komentáře</h2><br>

<div class="comments">
<?php $iterations = 0; foreach ($comments as $comment) { ?>
        <div class="date"><?php echo Latte\Runtime\Filters::escapeHtml($template->date($comment->created_at, 'F j, Y'), ENT_NOQUOTES) ?></div>
        <p><b><?php if ($_l->ifs[] = ($comment->email)) { ?><a href="mailto:<?php echo Latte\Runtime\Filters::escapeHtml(Latte\Runtime\Filters::safeUrl($comment->email), ENT_COMPAT) ?>
"><?php } echo Latte\Runtime\Filters::escapeHtml($comment->name, ENT_NOQUOTES) ;if (array_pop($_l->ifs)) { ?>
</a><?php } ?>
</b> napsal:</p>
        <div><?php echo Latte\Runtime\Filters::escapeHtml($comment->content, ENT_NOQUOTES) ?></div><br>
<?php $iterations++; } ?>
</div>

<br>
<center>
<h2>Vložte nový příspěvek</h2>

<?php $_l->tmp = $_control->getComponent("commentForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
</center>
</div>
<?php call_user_func(reset($_b->blocks['contentHome2']), $_b, get_defined_vars()) ; 
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb969e965cab_title')) { function _lb969e965cab_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><h1><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
<?php
}}

//
// block contentHome2
//
if (!function_exists($_b->blocks['contentHome2'][] = '_lb31cfd45007_contentHome2')) { function _lb31cfd45007_contentHome2($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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