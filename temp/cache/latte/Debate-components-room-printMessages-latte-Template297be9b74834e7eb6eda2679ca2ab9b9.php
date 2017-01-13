<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Debate/../components/room/printMessages.latte

class Template297be9b74834e7eb6eda2679ca2ab9b9 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('937a838614', 'html')
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
<div class="post_messages"> 
<?php $iterations = 0; foreach ($messages as $message) { if (($message->id_users_from == $message->id_users_to)||
        ($localUser->id_users == $message->id_users_to)||
        ($localUser->id_users == $message->id_users_from)) { ?>
        <div id="date" class="ajax" ><?php echo Latte\Runtime\Filters::escapeHtml($template->date($message->time, 'F j, Y'), ENT_NOQUOTES) ?></div>
        <p><b><a  href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($message->id_users_from)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($message->login, ENT_NOQUOTES) ?></a></b> </p>
        <div class="ajax" ><?php echo Latte\Runtime\Filters::escapeHtml($message->message, ENT_NOQUOTES) ?></div><br>
<?php } $iterations++; } ?>
</div> <?php
}}