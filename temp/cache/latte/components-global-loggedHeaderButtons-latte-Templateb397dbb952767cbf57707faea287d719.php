<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/components/global/loggedHeaderButtons.latte

class Templateb397dbb952767cbf57707faea287d719 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('5b268586f6', 'html')
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
<div id="layout_body2">
    <div id="navigation2">
        <div id="nav_small">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Logout</a>
            <div class="clearer">&nbsp;</div>
        </div>  
        <div class="clearer">&nbsp;</div>
    </div>
</div>

<div id="layout_body2">
    <div id="navigation2">
        <div id="nav_middle">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($user->getId())), ENT_COMPAT) ?>
">Profile</a>
            <div class="clearer">&nbsp;</div>
        </div>  
        <div class="clearer">&nbsp;</div>
    </div>
</div>   <?php
}}