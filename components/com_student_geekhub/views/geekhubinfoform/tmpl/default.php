<?php
/**
 * @version     1.0.0
 * @package     com_student_geekhub
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuriy <Satoru@ukr.net> - http://
 */
// no direct access
defined('_JEXEC') or die;

JHtml::_('behavior.keepalive');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_student_geekhub', JPATH_ADMINISTRATOR);
?>

<!-- Styling for making front end forms look OK -->
<!-- This should probably be moved to the template CSS file -->
<style>
    .front-end-edit ul {
        padding: 0 !important;
    }
    .front-end-edit li {
        list-style: none;
        margin-bottom: 6px !important;
    }
    .front-end-edit label {
        margin-right: 10px;
        display: block;
        float: left;
        text-align: center;
        width: 200px !important;
    }
    .front-end-edit .radio label {
        float: none;
    }
    .front-end-edit .readonly {
        border: none !important;
        color: #666;
    }    
    .front-end-edit #editor-xtd-buttons {
        height: 50px;
        width: 600px;
        float: left;
    }
    .front-end-edit .toggle-editor {
        height: 50px;
        width: 120px;
        float: right;
    }

    #jform_rules-lbl{
        display:none;
    }

    #access-rules a:hover{
        background:#f5f5f5 url('../images/slider_minus.png') right  top no-repeat;
        color: #444;
    }

    fieldset.radio label{
        width: 50px !important;
    }
</style>
<script type="text/javascript">
    function getScript(url,success) {
        var script = document.createElement('script');
        script.src = url;
        var head = document.getElementsByTagName('head')[0],
        done = false;
        // Attach handlers for all browsers
        script.onload = script.onreadystatechange = function() {
            if (!done && (!this.readyState
                || this.readyState == 'loaded'
                || this.readyState == 'complete')) {
                done = true;
                success();
                script.onload = script.onreadystatechange = null;
                head.removeChild(script);
            }
        };
        head.appendChild(script);
    }
    getScript('//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js',function() {
        js = jQuery.noConflict();
        js(document).ready(function(){
            js('#form-geekhubinfo').submit(function(event){
                
				if(js('#jform_student_foto').val() != ''){
					js('#jform_student_foto_hidden').val(js('#jform_student_foto').val());
				}
				if (js('#jform_student_foto').val() == '' && js('#jform_student_foto_hidden').val() == '') {
					alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
					event.preventDefault();
				} 
            }); 
        
            
        });
    });
    
</script>

<div class="geekhubinfo-edit front-end-edit">
    <?php if (!empty($this->item->id)): ?>
        <h1>Edit <?php echo $this->item->id; ?></h1>
    <?php else: ?>
        <h1>Add</h1>
    <?php endif; ?>

    <form id="form-geekhubinfo" action="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.save'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
        <ul>
            				<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
				<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
				<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
				<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
				<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />

				<?php if(empty($this->item->created_by)){ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo JFactory::getUser()->id; ?>" />

				<?php }
				else{ ?>
					<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />

				<?php } ?>				<li><?php echo $this->form->getLabel('student_foto'); ?>
				<?php echo $this->form->getInput('student_foto'); ?></li>

				<?php if (!empty($this->item->student_foto)) : ?>
						<a href="<?php echo JRoute::_(JUri::base() . 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_student_geekhub' . DIRECTORY_SEPARATOR . 'image' .DIRECTORY_SEPARATOR . $this->item->student_foto, false);?>"><?php echo JText::_("COM_STUDENT_GEEKHUB_VIEW_FILE"); ?></a>
				<?php endif; ?>
				<input type="hidden" name="jform[student_foto]" id="jform_student_foto_hidden" value="<?php echo $this->item->student_foto ?>" />				<li><?php echo $this->form->getLabel('student_name'); ?>
				<?php echo $this->form->getInput('student_name'); ?></li>
				<li><?php echo $this->form->getLabel('date_of_birth'); ?>
				<?php echo $this->form->getInput('date_of_birth'); ?></li>
				<li><?php echo $this->form->getLabel('student_gender'); ?>
				<?php echo $this->form->getInput('student_gender'); ?></li>
				<li><?php echo $this->form->getLabel('student_grupe'); ?>
				<?php echo $this->form->getInput('student_grupe'); ?></li>
				<li><?php echo $this->form->getLabel('student_gpa'); ?>
				<?php echo $this->form->getInput('student_gpa'); ?></li>
				<li><?php echo $this->form->getLabel('student_number'); ?>
				<?php echo $this->form->getInput('student_number'); ?></li>
				<li><?php echo $this->form->getLabel('student_info'); ?>
				<?php echo $this->form->getInput('student_info'); ?></li>
				<div class="width-100 fltlft" <?php if (!JFactory::getUser()->authorise('core.admin','student_geekhub')): ?> style="display:none;" <?php endif; ?> >
                <?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
                <?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
                <fieldset class="panelform">
                    <?php echo $this->form->getLabel('rules'); ?>
                    <?php echo $this->form->getInput('rules'); ?>
                </fieldset>
                <?php echo JHtml::_('sliders.end'); ?>
            </div>
				<?php if (!JFactory::getUser()->authorise('core.admin','student_geekhub')): ?>
                <script type="text/javascript">
                    jQuery.noConflict();
                    jQuery('#rules select').each(function(){
                       var option_selected = jQuery(this).find(':selected');
                       var input = document.createElement("input");
                       input.setAttribute("type", "hidden");
                       input.setAttribute("name", jQuery(this).attr('name'));
                       input.setAttribute("value", option_selected.val());
                       console.log(input);
                       document.getElementById("form-geekhubinfo").appendChild(input);
                       jQuery(this).attr('disabled',true);
                    });
                </script>
             <?php endif; ?>
        </ul>

        <div>
            <button type="submit" class="validate"><span><?php echo JText::_('JSUBMIT'); ?></span></button>
            <?php echo JText::_('or'); ?>
            <a href="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.cancel'); ?>" title="<?php echo JText::_('JCANCEL'); ?>"><?php echo JText::_('JCANCEL'); ?></a>

            <input type="hidden" name="option" value="com_student_geekhub" />
            <input type="hidden" name="task" value="geekhubinfoform.save" />
            <?php echo JHtml::_('form.token'); ?>
        </div>
    </form>
</div>
