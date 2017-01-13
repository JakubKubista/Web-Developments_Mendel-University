<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/Homepage/default.latte

class Template9235d3780f9d47b43503f1a573a50ec9 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('58c38e679c', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb7284ffbfe8_content')) { function _lb7284ffbfe8_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="navigation">
    <div id="nav1">
        <ul>
<?php $_b->templates['58c38e679c']->renderChildTemplate("../components/global/printRooms.latte", $template->getParameters()) ?>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
</div>
<div id="main">
    <div class="left" id="content_outer">
        <div id="content">
            <div class="post" >	
                <br><b>    
                Wellcome <i><?php echo Latte\Runtime\Filters::escapeHtml($localUser->name, ENT_NOQUOTES) ?></i>,<br>
                If you want, you can create a new room by the arrow button or you can join to some created room. 
                Have a nice chat. - <i>Admin</i></b>
            </div> 
        </div>
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}