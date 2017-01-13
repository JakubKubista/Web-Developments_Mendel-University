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
// block field
//
if (!function_exists($_b->blocks['field'][] = '_lb8d7aa09db0_field')) { function _lb8d7aa09db0_field($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="layout_body2">
    <div id="navigation2">
        <div id="nav4">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Sign:out"), ENT_COMPAT) ?>
">Logout</a>
            <div class="clearer">&nbsp;</div>
        </div>  
        <div class="clearer">&nbsp;</div>
    </div>
</div>

<div id="layout_body2">
    <div id="navigation2">
        <div id="nav3">
            <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($thisUserID)), ENT_COMPAT) ?>
">Profile</a>
            <div class="clearer">&nbsp;</div>
        </div>  
        <div class="clearer">&nbsp;</div>
    </div>
</div>
<?php
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb626320faf8_content')) { function _lb626320faf8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="navigation">
    <div id="nav1">
        <ul>
<?php $iterations = 0; foreach ($rooms as $room) { ?>            <div class="post">
            <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:room", array($room->id_rooms)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($room->title, ENT_NOQUOTES) ?></a></li>
            </div>
<?php $iterations++; } ?>
            <div class="post"><li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:create"), ENT_COMPAT) ?>
">►</a></li></div>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
</div>
            
<div id="main">
<?php $iterations = 0; foreach ($users as $thisUser) { ?>            <div >
                <div id="sidebar">
                    <div class="post_messages"><br>
                Login: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->login, ENT_NOQUOTES) ?></b><br><br>
                Email: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->email, ENT_NOQUOTES) ?></b><br><br>
                Name: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->name, ENT_NOQUOTES) ?></b><br><br>
                Surname: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->surname, ENT_NOQUOTES) ?></b><br><br>
                Gender: 
                <b>
<?php if ($thisUser->gender == 'm') { ?>
                    man
<?php } elseif ($thisUser->gender == 'f') { ?>
                    female
<?php } ?>
                </b><br><br>
                Registered: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->registered, ENT_NOQUOTES) ?></b><br><br>
                Role: <b><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->role, ENT_NOQUOTES) ?></b>
<?php if ($thisOwner == true) { ?>
                <center><div id="nav6"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:edit"), ENT_COMPAT) ?>
"><center><b>Change</b></center></a></div></center>  
<?php } ?>
            </div>
        </div>
    </div>
<?php $iterations++; } ?>
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
call_user_func(reset($_b->blocks['field']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}