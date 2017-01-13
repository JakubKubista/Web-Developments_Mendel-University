<?php
// source: C:\xampp\htdocs\wa_chat\app\presenters/templates/Debate/info.latte

class Templatec80a9afd8a423cf7a1b32dda1b840d6b extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('331342ea5b', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block field
//
if (!function_exists($_b->blocks['field'][] = '_lbcd67e8ccf1_field')) { function _lbcd67e8ccf1_field($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
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
if (!function_exists($_b->blocks['content'][] = '_lb547803802d_content')) { function _lb547803802d_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?><div id="navigation">
    <div id="nav1">
        <ul>
<?php $iterations = 0; foreach ($rooms as $room) { ?>            <div class="post">                
            <li <?php if ($room->id_rooms == $thisRoomID) { ?> class="current_room" <?php } ?>>
                <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:room", array($room->id_rooms)), ENT_COMPAT) ?>
"><?php echo Latte\Runtime\Filters::escapeHtml($room->title, ENT_NOQUOTES) ?></a>   
            </li>
            </div>
<?php $iterations++; } ?>
            <div class="post"><li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:create"), ENT_COMPAT) ?>
">►</a></li></div>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
    
    <div id="nav2">
        <ul>
            <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:info", array($thisRoomID)), ENT_COMPAT) ?>
">Information</a></li>
<?php if (($thisOwner > 0)||($thisUser->role == 'admin')) { if (($thisRoomID != 1)&&($thisRoomID != 2)) { ?>
            <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:rename", array($thisRoomID)), ENT_COMPAT) ?>
">Rename</a></li>
<?php } ?>
            <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:lock", array($thisRoomID)), ENT_COMPAT) ?>
"><?php if ($thisRoomLock > 0) { ?>Lock<?php } else { ?>Unlock<?php } ?></a></li>
<?php if (($thisRoomID != 1)&&($thisRoomID != 2)) { ?>
            <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:delete", array($thisRoomID)), ENT_COMPAT) ?>
">Delete</a></li>
<?php } } ?>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
</div>
<?php if ($thisRoom->lock == 't') { ?>
    <center>This room is locked</center>
<?php } elseif ($thisRoom->lock == 'f') { ?>
<div id="main"<?php echo '"' . Latte\Runtime\Filters::escapeHtml($_POST['roomId']= $thisRoomID, ENT_COMPAT) . '"' ?>>
    <div class="left" id="content_outer">
        <div id="content">
<?php if ($isRename > 0) { ?>
            <div class="post" >	
<?php $_l->tmp = $_control->getComponent("renameForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
            </div>
<?php } else { $iterations = 0; foreach ($actualRoom as $room) { ?>            <div class="post">
                <div id="sidebar">
                    <div class="post_messages"><br>
                    Title: <b><?php echo Latte\Runtime\Filters::escapeHtml($room->title, ENT_NOQUOTES) ?></b><br><br>
                    Owner name: <b><?php echo Latte\Runtime\Filters::escapeHtml($room->name, ENT_NOQUOTES) ?>
 <?php echo Latte\Runtime\Filters::escapeHtml($room->surname, ENT_NOQUOTES) ?></b><br><br>
                    Owner contact: <b><?php echo Latte\Runtime\Filters::escapeHtml($room->email, ENT_NOQUOTES) ?></b><br><br>
                    Created: <b><?php echo Latte\Runtime\Filters::escapeHtml($room->created, ENT_NOQUOTES) ?></b></div>
                </div>
            </div>
<?php $iterations++; } ?>

<?php } ?>
        </div>
    </div>

    <div class="right" id="sidebar_outer">
        <div id="sidebar">
            <div class="box">
                <div class="box_title">Users</div>
                    <div class="box_content">
<?php $iterations = 0; foreach ($members as $member) { ?>                        <div>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($member->id_users)), ENT_COMPAT) ?>
"><blockquote><p><?php echo Latte\Runtime\Filters::escapeHtml($member->login, ENT_NOQUOTES) ?></p></blockquote></a>
                        </div>
<?php $iterations++; } ?>
                    </div>
                    </div>
            </div>

            <div class="box">
                <div class="box_title">Administrators</div>
                <div class="box_content">                    
<?php $iterations = 0; foreach ($admins as $admin) { ?>                        <div>
                        <a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Homepage:profile", array($admin->id_users)), ENT_COMPAT) ?>
"><div id="avatar"><p><?php echo Latte\Runtime\Filters::escapeHtml($admin->login, ENT_NOQUOTES) ?></p></div></a>
                        </div>
<?php $iterations++; } ?>
                </div>
                <div class="box_content">                    
                        </div>
                </div>
            </div>
    <div class="clearer">&nbsp;</div>
</div>
<?php } 
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