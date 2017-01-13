<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Debate/../components/room/printInformation.latte

class Templatedbed8020e64f9e664556223e12964253 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('a1bd83a70e', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
?>
<div id="sidebar">
    <div class="post_messages"><br>
    Title: <b><?php echo Latte\Runtime\Filters::escapeHtml($localRoom->title, ENT_NOQUOTES) ?></b><br><br>
    Owner name: <b><?php echo Latte\Runtime\Filters::escapeHtml($owner->name, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($owner->surname, ENT_NOQUOTES) ?></b><br><br>
    Owner contact: <b><?php echo Latte\Runtime\Filters::escapeHtml($owner->email, ENT_NOQUOTES) ?></b><br><br>
    Created: <b><?php echo Latte\Runtime\Filters::escapeHtml($localRoom->created, ENT_NOQUOTES) ?></b></div>
</div>
<?php
}}