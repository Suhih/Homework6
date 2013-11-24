<?php
/**
 * @version     1.0.0
 * @package     com_student_geekhub
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuriy <Satoru@ukr.net> - http://
 */

defined('_JEXEC') or die;

// Include dependancies
jimport('joomla.application.component.controller');

// Execute the task.
$controller	= JController::getInstance('Student_geekhub');
$controller->execute(JFactory::getApplication()->input->get('task'));
$controller->redirect();
