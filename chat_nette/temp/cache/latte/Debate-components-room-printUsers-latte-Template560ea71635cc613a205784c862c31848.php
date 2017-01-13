<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Debate/../components/room/printUsers.latte

class Template560ea71635cc613a205784c862c31848 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('4b3fcd15bb', 'html')
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
<div class="box_title">Users</div>
<div class="box_content">
<?php $iterations = 0; foreach ($members as $member) { ?>    <div>
    <a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($member->id_users)), ENT_COMPAT) ?>
"><blockquote><p><?php echo Latte\Runtime\Filters::escapeHtml($member->login, ENT_NOQUOTES) ?></p></blockquote></a>
    </div>
<?php $iterations++; } ?>
</div><?php
}}