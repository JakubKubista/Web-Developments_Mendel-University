<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Homepage/default.latte

class Templateaa4b29a16f153c5365474231f2d3954f extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('c1e69e0d7b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block field
//
if (!function_exists($_b->blocks['field'][] = '_lb0e7ceaa3a8_field')) { function _lb0e7ceaa3a8_field($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
if (!function_exists($_b->blocks['content'][] = '_lb0b8d65a7c5_content')) { function _lb0b8d65a7c5_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
    <div class="left" id="content_outer">
        <div id="content"><div class="post" >	<br><b>    
            Wellcome <i><?php echo Latte\Runtime\Filters::escapeHtml($thisUser->name, ENT_NOQUOTES) ?></i>,<br>
            If you want, you can create a new room by the click on arrow or you can join to any created room. 
            Have a nice chat. - <i>Admin</i></b>
        </div> </div>
    </div><div class="clearer">&nbsp;</div>
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