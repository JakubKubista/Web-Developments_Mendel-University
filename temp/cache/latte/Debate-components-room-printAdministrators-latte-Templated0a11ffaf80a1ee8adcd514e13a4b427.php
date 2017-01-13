<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/Debate/../components/room/printAdministrators.latte

class Templated0a11ffaf80a1ee8adcd514e13a4b427 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('b0b22ee7a3', 'html')
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
<div class="box_title">Administrators</div>
<div class="box_content">                    
<?php $iterations = 0; foreach ($admins as $admin) { ?>        <div>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($admin->id_users)), ENT_COMPAT) ?>
"><div id="avatar"><p><?php echo Latte\Runtime\Filters::escapeHtml($admin->login, ENT_NOQUOTES) ?></p></div></a>
        </div>
<?php $iterations++; } ?>
</div><?php
}}