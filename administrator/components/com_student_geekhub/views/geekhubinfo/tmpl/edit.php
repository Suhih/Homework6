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

JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
// Import CSS
$document = JFactory::getDocument();
$document->addStyleSheet('components/com_student_geekhub/assets/css/student_geekhub.css');
?>
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
            

            Joomla.submitbutton = function(task)
            {
                if (task == 'geekhubinfo.cancel') {
                    Joomla.submitform(task, document.getElementById('geekhubinfo-form'));
                }
                else{
                    
				js = jQuery.noConflict();
				if(js('#jform_student_foto').val() != ''){
					js('#jform_student_foto_hidden').val(js('#jform_student_foto').val());
				}
				if (js('#jform_student_foto').val() == '' && js('#jform_student_foto_hidden').val() == '') {
					alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
					return;
				}
                    if (task != 'geekhubinfo.cancel' && document.formvalidator.isValid(document.id('geekhubinfo-form'))) {
                        
                        Joomla.submitform(task, document.getElementById('geekhubinfo-form'));
                    }
                    else {
                        alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED')); ?>');
                    }
                }
            }
        });
    });
</script>

<form action="<?php echo JRoute::_('index.php?option=com_student_geekhub&layout=edit&id=' . (int) $this->item->id); ?>" method="post" enctype="multipart/form-data" name="adminForm" id="geekhubinfo-form" class="form-validate">
    <div class="width-60 fltlft">
        <fieldset class="adminform">
            <legend><?php echo JText::_('COM_STUDENT_GEEKHUB_LEGEND_GEEKHUBINFO'); ?></legend>
            <ul class="adminformlist">

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
						<a href="<?php echo JRoute::_(JUri::base() . 'components' . DIRECTORY_SEPARATOR . 'com_student_geekhub' . DIRECTORY_SEPARATOR . 'image' .DIRECTORY_SEPARATOR . $this->item->student_foto, false);?>">[View File]</a>
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


            </ul>
        </fieldset>
    </div>

    <div class="clr"></div>

<?php if (JFactory::getUser()->authorise('core.admin','student_geekhub')): ?>
	<div class="width-100 fltlft">
		<?php echo JHtml::_('sliders.start', 'permissions-sliders-'.$this->item->id, array('useCookie'=>1)); ?>
		<?php echo JHtml::_('sliders.panel', JText::_('ACL Configuration'), 'access-rules'); ?>
		<fieldset class="panelform">
			<?php echo $this->form->getLabel('rules'); ?>
			<?php echo $this->form->getInput('rules'); ?>
		</fieldset>
		<?php echo JHtml::_('sliders.end'); ?>
	</div>
<?php endif; ?>

    <input type="hidden" name="task" value="" />
    <?php echo JHtml::_('form.token'); ?>
    <div class="clr"></div>

    <style type="text/css">
        /* Temporary fix for drifting editor fields */
        .adminformlist li {
            clear: both;
        }
    </style>
</form>