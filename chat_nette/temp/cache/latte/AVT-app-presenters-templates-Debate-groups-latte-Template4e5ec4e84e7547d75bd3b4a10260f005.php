<?php
// source: C:\xampp\htdocs\AVT\app\presenters/templates/Debate/groups.latte

class Template4e5ec4e84e7547d75bd3b4a10260f005 extends Latte\Template {
function render() {
foreach ($this->params as $__k => $__v) $$__k = $__v; unset($__k, $__v);
// prolog Latte\Macros\CoreMacros
list($_b, $_g, $_l) = $template->initialize('455f0ab2c9', 'html')
;
// prolog Latte\Macros\BlockMacros
//
// block contentHome1
//
if (!function_exists($_b->blocks['contentHome1'][] = '_lb68423e1c14_contentHome1')) { function _lb68423e1c14_contentHome1($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
}}

//
// block content
//
if (!function_exists($_b->blocks['content'][] = '_lbd92eab27a2_content')) { function _lbd92eab27a2_content($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
?>    <div id="content">
    <div class="box_home_all">

<?php $iterations = 0; foreach ($posts as $post) { ?><div class="post">
        
        <div style="width:10px; float:left; height:15px;"></div>
        <div class="box_home">
            <h1 class="window_img0"><?php echo Latte\Runtime\Filters::escapeHtml($post->title, ENT_NOQUOTES) ?></h1>
                <div style="padding-left:7px;">
                    <?php echo Latte\Runtime\Filters::escapeHtml($post->content, ENT_NOQUOTES) ?>

                </div> <br><br><br>
            <div class="read_l"><a href="<?php echo Latte\Runtime\Filters::escapeHtml($_control->link("Debate:post", array($post->id)), ENT_COMPAT) ?>
">Zobrazit více</a></div>
        </div>
       
        </div>	
<?php $iterations++; } ?>
    </div>
</div>

        
        </div>
    
   
    
<?php
}}

//
// block contentHome2
//
if (!function_exists($_b->blocks['contentHome2'][] = '_lb84db8cf7a3_contentHome2')) { function _lb84db8cf7a3_contentHome2($_b, $_args) { foreach ($_args as $__k => $__v) $$__k = $__v
;
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
call_user_func(reset($_b->blocks['contentHome1']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['content']), $_b, get_defined_vars()) ; call_user_func(reset($_b->blocks['contentHome2']), $_b, get_defined_vars()) ; 
}}