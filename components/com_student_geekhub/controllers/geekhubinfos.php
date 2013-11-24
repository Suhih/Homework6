<?php
/**
 * @version     1.0.0
 * @package     com_student_geekhub
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuriy <Satoru@ukr.net> - http://
 */

// No direct access.
defined('_JEXEC') or die;

require_once JPATH_COMPONENT.'/controller.php';

/**
 * Geekhubinfos list controller class.
 */
class Student_geekhubControllerGeekhubinfos extends Student_geekhubController
{
	/**
	 * Proxy for getModel.
	 * @since	1.6
	 */
	public function &getModel($name = 'Geekhubinfos', $prefix = 'Student_geekhubModel')
	{
		$model = parent::getModel($name, $prefix, array('ignore_request' => true));
		return $model;
	}
}