<?php
/**
 * @version     1.0.0
 * @package     com_student_geekhub
 * @copyright   © 2013. Все права защищены.
 * @license     GNU General Public License версии 2 или более поздней; Смотрите LICENSE.txt
 * @author      Yuriy <Satoru@ukr.net> - http://
 */

// No direct access
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');

/**
 * Geekhubinfo controller class.
 */
class Student_geekhubControllerGeekhubinfo extends JControllerForm
{

    function __construct() {
        $this->view_list = 'geekhubinfos';
        parent::__construct();
    }

}