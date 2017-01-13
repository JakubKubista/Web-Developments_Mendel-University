<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/Homepage/../components/global/printRooms.latte

class Template2b64d41d6ffe5d40040ccc1608c2d9f6 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('b25ec738fc', 'html')
;
// prolog Nette\Bridges\ApplicationLatte\UIMacros

// snippets support
if (empty($_l->extends) && !empty($_control->snippetMode)) {
	return Nette\Bridges\ApplicationLatte\UIMacros::renderSnippets($_control, $_b, get_defined_vars());
}

//
// main template
//
$iterations = 0; foreach ($rooms as $room) { ?><div class="post">
    <li>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:room", array($room->id_rooms)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($room->title, ENT_NOQUOTES) ?></a>
    </li>
</div>
<?php $iterations++; } ?>
<div class="post">
    <li>
        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:create"), ENT_COMPAT) ?>
">►</a>
    </li>
</div><?php
}}