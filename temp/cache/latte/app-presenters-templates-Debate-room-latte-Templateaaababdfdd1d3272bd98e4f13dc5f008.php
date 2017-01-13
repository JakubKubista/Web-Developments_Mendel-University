<?php
// source: C:\xampp\htdocs\chat_nette\app\presenters/templates/Debate/room.latte

class Templateaaababdfdd1d3272bd98e4f13dc5f008 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('1b03e64902', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lb6e9b4c2323_content')) { function _lb6e9b4c2323_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
 ?>
<div id="<?php echo $_control->getSnippetId('roomSnip') ?>"><?php call_user_func(reset($_b->blocks['_roomSnip']), $_b, $template->getParameters()) ?>
</div><script>
    $(".post_messages").scrollTop($(".post_messages")[0].scrollHeight);
    $(document).ready(function() {   
        $('#information').click(function() {
                if(document.getElementById('showInfo').style.display === "none"){
                  document.getElementById('showMessages').style.display= "none";
                  document.getElementById('showInfo').style.display = "block";
                }else{
                  document.getElementById('showInfo').style.display = "none";
                  document.getElementById('showMessages').style.display= "block";
                }
                return false;
        });
    });
</script> 
<?php
}}

//
// block _roomSnip
//
if (!function_exists($_b->blocks['_roomSnip'][] = '_lb591c431431__roomSnip')) { function _lb591c431431__roomSnip($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v; $_control->redrawControl('roomSnip', FALSE)
?><div id="navigation">
    <div id="nav1">
        <ul>
<?php $_b->templates['1b03e64902']->renderChildTemplate("../components/room/printRooms.latte", $template->getParameters()) ?>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>
    
    <div id="nav2">
        <ul >
            <li><a href="#" id="information">Information</a></li>
                
<?php if (($localUser->id_users == $owner->id_users)||($localUser->role == 'admin')) { ?>
            
<?php if (($localRoom->id_rooms != 1)&&($localRoom->id_rooms != 2)) { ?>
                    <li><a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("rename!", array($localRoom->id_rooms)), ENT_COMPAT) ?>
">Rename</a></li>
<?php } ?>
                
                    <li><a class="ajax" href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("lock!"), ENT_COMPAT) ?>
">
                            <?php if ($localRoom->lock == 'f') { ?>Lock<?php } else { ?>
Unlock<?php } ?>

                        </a>
                    </li>
                    
<?php if (($localRoom->id_rooms != 1)&&($localRoom->id_rooms != 2)) { ?>
                    <li><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("delete!", array($localRoom->id_rooms)), ENT_COMPAT) ?>
">Delete</a></li>
<?php } ?>
                
<?php } ?>
        </ul>
        <div class="clearer">&nbsp;</div>
    </div>       
</div>
            
<?php if ($localRoom->lock == 'f') { ?>
    <div id="main" <?php echo '"' . Latte\Runtime\Filters::escapeHtml($_POST['roomId']= $localRoom->id_rooms, ENT_COMPAT) . '"' ?>>
        <div class="left" id="content_outer">
            <div id="content">
<?php if ($localRoom->rename == 't') { ?>
                <div class="post" >	
<?php $_l->tmp = $_control->getComponent("renameForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
                </div>
<?php } else { ?>
                <div id="showMessages">
                <div class="post">
<?php $_b->templates['1b03e64902']->renderChildTemplate("../components/room/printMessages.latte", $template->getParameters()) ?>
                </div>          
                <div class="post">
                    <div class="post_body">
                        <blockquote>
<?php $_l->tmp = $_control->getComponent("messageForm"); if ($_l->tmp instanceof Nette\Application\UI\IRenderable) $_l->tmp->redrawControl(NULL, FALSE); $_l->tmp->render() ?>
                        </blockquote>
                    </div>
                </div>
                </div>        
                <div id="showInfo">    
                    <div class="post">
<?php $_b->templates['1b03e64902']->renderChildTemplate("../components/room/printInformation.latte", $template->getParameters()) ?>
                    </div>
                </div>             
<?php } ?>
            </div>
        </div>

        <div class="right" id="sidebar_outer">
            <div id="sidebar">
                <div class="box">
<?php $_b->templates['1b03e64902']->renderChildTemplate("../components/room/printUsers.latte", $template->getParameters()) ?>
                </div> 

                <div class="box">
<?php $_b->templates['1b03e64902']->renderChildTemplate("../components/room/printAdministrators.latte", $template->getParameters()) ?>
                </div>
            </div>
        </div>                 
        <div class="clearer">&nbsp;</div>
    </div>
<?php } elseif ($localRoom->lock == 't') { ?>
    <center>This room is locked</center>                          
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
call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; 
}}