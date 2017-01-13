<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Homepage/profile.latte

class Template255634d11a6bc73a1389feddbe9b59f1 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c36b904e12', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb626320faf8_content')) { function _lb626320faf8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="navigation">
    <div id="nav1">
        <ul>
<?php $_b->templates['c36b904e12']->renderChildTemplate("../components/global/printRooms.latte", $template->getParameters()) ?>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
</div>
            
<div id="main">
    <div id="sidebar">
        <div class="post_messages"><br>

            Login: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->login, ENT_NOQUOTES) ?></b><br><br>
            Email: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->email, ENT_NOQUOTES) ?></b><br><br>
            Name: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->name, ENT_NOQUOTES) ?></b><br><br>
            Surname: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->surname, ENT_NOQUOTES) ?></b><br><br>

            Gender: 
            <b>
<?php if ($localUser->gender == 'm') { ?>
                    man
<?php } elseif ($localUser->gender == 'f') { ?>
                    female
<?php } ?>
            </b>
            <br><br>

            Registered: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->registered, ENT_NOQUOTES) ?></b><br><br>
            Role: <b><?php echo Latte\Runtime\Filters::escapeHtml($localUser->role, ENT_NOQUOTES) ?></b>

<?php if ($profileAuthority) { ?>
                <div id="nav6">
                    <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:edit"), ENT_COMPAT) ?>
"><b>Change</b></a>
                </div>
<?php } ?>
        </div>
    </div>
    <div class="clearer">&nbsp;</div>
</div>
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