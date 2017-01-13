<?php
// source: C:\xampp\htdocs\sandbox\app\presenters/templates/Homepage/default.latte

class Templated9516166f211b79e2d4660dd2994d776 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('8c6c3784da', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbe1c48e05e3_content')) { function _lbe1c48e05e3_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;call_user_func(reset($_b->blocks['title']), $_b, get_defined_vars())  ?>

<?php $iterations = 0; foreach ($posts as $post) { ?><div class="post">
    <div class="date"><?php echo Latte\Runtime\Filters::escapeHtml($template->date($post->created_at, '%d.%m.%Y %H:%M'), ENT_NOQUOTES) ?></div>

    <h2><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></h2>

    <div><?php echo Latte\Runtime\Filters::escapeHtml($post->content, ENT_NOQUOTES) ?></div>
    
    <h2><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Post:show", array($post->id)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></a></h2>
</div>
<?php $iterations++; } ?>
    
<?php
}}

//
// block title
//
if (!function_exists($_b->blocks['title'][] = '_lb5c0106fdcf_title')) { function _lb5c0106fdcf_title($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <h1>Můj blog</h1>
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}