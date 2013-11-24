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

//Load admin language file
$lang = JFactory::getLanguage();
$lang->load('com_student_geekhub', JPATH_ADMINISTRATOR);
$canEdit = JFactory::getUser()->authorise('core.edit', 'com_student_geekhub.' . $this->item->id);
if (!$canEdit && JFactory::getUser()->authorise('core.edit.own', 'com_student_geekhub' . $this->item->id)) {
	$canEdit = JFactory::getUser()->id == $this->item->created_by;
}
?>
<?php if ($this->item) : ?>

    <div class="item_fields">

        <ul class="fields_list">

<!--Непротрібний для виводу в контенті список починаючи з ID завершуючи рядком "ким створено"-->

<!--            			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_ID'); ?><!--:-->
<!--			--><?php //echo $this->item->id; ?><!--</li>-->
<!--			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_ORDERING'); ?><!--:-->
<!--			--><?php //echo $this->item->ordering; ?><!--</li>-->
<!--			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STATE'); ?><!--:-->
<!--			--><?php //echo $this->item->state; ?><!--</li>-->
<!--			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_CHECKED_OUT'); ?><!--:-->
<!--			--><?php //echo $this->item->checked_out; ?><!--</li>-->
<!--			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_CHECKED_OUT_TIME'); ?><!--:-->
<!--			--><?php //echo $this->item->checked_out_time; ?><!--</li>-->
<!--			<li>--><?php //echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_CREATED_BY'); ?><!--:-->
<!--			--><?php //echo $this->item->created_by; ?><!--</li>-->
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_FOTO'); ?>:

			<?php 
				$uploadPath = 'administrator' . DIRECTORY_SEPARATOR . 'components' . DIRECTORY_SEPARATOR . 'com_student_geekhub' . DIRECTORY_SEPARATOR . 'image' . DIRECTORY_SEPARATOR . $this->item->student_foto;
			?>
			<a href="<?php echo JRoute::_(JUri::base() . $uploadPath, false); ?>" target="_blank"><?php echo $this->item->student_foto; ?></a></li>			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_NAME'); ?>:
			<?php echo $this->item->student_name; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_DATE_OF_BIRTH'); ?>:
			<?php echo $this->item->date_of_birth; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_GENDER'); ?>:
			<?php echo $this->item->student_gender; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_GRUPE'); ?>:
			<?php echo $this->item->student_grupe; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_GPA'); ?>:
			<?php echo $this->item->student_gpa; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_NUMBER'); ?>:
			<?php echo $this->item->student_number; ?></li>
			<li><?php echo JText::_('COM_STUDENT_GEEKHUB_FORM_LBL_GEEKHUBINFO_STUDENT_INFO'); ?>:
			<?php echo $this->item->student_info; ?></li>


        </ul>

    </div>
    <?php if($canEdit): ?>
		<a href="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.edit&id='.$this->item->id); ?>"><?php echo JText::_("COM_STUDENT_GEEKHUB_EDIT_ITEM"); ?></a>
	<?php endif; ?>
								<?php if(JFactory::getUser()->authorise('core.delete','com_student_geekhub.geekhubinfo.'.$this->item->id)):
								?>
									<a href="javascript:document.getElementById('form-geekhubinfo-delete-<?php echo $this->item->id ?>').submit()"><?php echo JText::_("COM_STUDENT_GEEKHUB_DELETE_ITEM"); ?></a>
									<form id="form-geekhubinfo-delete-<?php echo $this->item->id; ?>" style="display:inline" action="<?php echo JRoute::_('index.php?option=com_student_geekhub&task=geekhubinfo.remove'); ?>" method="post" class="form-validate" enctype="multipart/form-data">
										<input type="hidden" name="jform[id]" value="<?php echo $this->item->id; ?>" />
										<input type="hidden" name="jform[ordering]" value="<?php echo $this->item->ordering; ?>" />
										<input type="hidden" name="jform[state]" value="<?php echo $this->item->state; ?>" />
										<input type="hidden" name="jform[checked_out]" value="<?php echo $this->item->checked_out; ?>" />
										<input type="hidden" name="jform[checked_out_time]" value="<?php echo $this->item->checked_out_time; ?>" />
										<input type="hidden" name="jform[created_by]" value="<?php echo $this->item->created_by; ?>" />
										<input type="hidden" name="jform[student_foto]" value="<?php echo $this->item->student_foto; ?>" />
										<input type="hidden" name="jform[student_name]" value="<?php echo $this->item->student_name; ?>" />
										<input type="hidden" name="jform[date_of_birth]" value="<?php echo $this->item->date_of_birth; ?>" />
										<input type="hidden" name="jform[student_gender]" value="<?php echo $this->item->student_gender; ?>" />
										<input type="hidden" name="jform[student_grupe]" value="<?php echo $this->item->student_grupe; ?>" />
										<input type="hidden" name="jform[student_gpa]" value="<?php echo $this->item->student_gpa; ?>" />
										<input type="hidden" name="jform[student_number]" value="<?php echo $this->item->student_number; ?>" />
										<input type="hidden" name="jform[student_info]" value="<?php echo $this->item->student_info; ?>" />
										<input type="hidden" name="option" value="com_student_geekhub" />
										<input type="hidden" name="task" value="geekhubinfo.remove" />
										<?php echo JHtml::_('form.token'); ?>
									</form>
								<?php
								endif;
							?>
<?php
else:
    echo JText::_('COM_STUDENT_GEEKHUB_ITEM_NOT_LOADED');
endif;
?>
