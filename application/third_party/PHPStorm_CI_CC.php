<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * ------------- DO NOT UPLOAD THIS FILE TO LIVE SERVER ---------------------
 *
 * Implements code completion for CodeIgniter in PHPStorm.
 * PHPStorm indexes all class constructs, so if this file is in the project it will be loaded.
 *
 * Thanks to cartalot from CI's community as well as Stack Overflow's community for this one file structure.
 *
 * These property values were borrowed and upgraded from another project to work with CI3.
 * Visit : https://github.com/topdown/phpStorm-CC-Helpers
 *
 * PHP version 5
 *
 * LICENSE: GPL http://www.gnu.org/copyleft/gpl.html
 *
 * Created 11/23/15, 09:45 PM
 *
 * @category
 * @package    CodeIgniter CI_PHPStorm.php
 * @author     Nicolas Goudry
 * @copyright  2015 Nicolas Goudry
 * @license    GPL http://www.gnu.org/copyleft/gpl.html
 * @version    2015.11.23
 */

/**
 * @description Completion in codeigniter
 ***************** CORE COMPONENTS *****************
 * @property CI_Benchmark $benchmark                    This class enables you to mark points and calculate the time difference between them. Memory consumption can also be displayed.
 * @property CI_Config $config                                 This class contains functions that enable config files to be managed
 * @property CI_Controller $controller                        This class object is the super class that every library in CodeIgniter will be assigned to.
 * @property CI_Exceptions $exceptions                     Exceptions Class
 * @property CI_Hooks $hooks                                  Provides a mechanism to extend the base system without hacking.
 * @property CI_Input $input                                    Pre-processes global input data for security
 * @property CI_Lang $lang                                      Language Class
 * @property WB_Loader $load                                  Loads framework components.
 * @property CI_Log $log                                         Logging Class
 * @property CI_Model $model                                  Model Class
 * @property CI_Output $output                               Responsible for sending final output to the browser.
 * @property CI_Router $router                                Parses URIs and determines routing
 * @property CI_Security $security                           Security Class
 * @property CI_URI $uri                                         Parses URIs and determines routing
 * @property CI_Utf8 $utf8                                      Provides support for UTF-8 environments
 ***************** DATABASE COMPONENTS *****************
 * @property CI_DB_forge $dbforge                           Database Forge Class
 * @property CI_DB_query_builder $db                       This is the platform-independent base Query Builder implementation class.
 * @property CI_DB_utility $dbutil                             Database Utility Class
 ***************** CORE LIBRARIES *****************
 * @property CI_Cache $cache                                CodeIgniter Caching Class
 * @property CI_Session $session                             CodeIgniter Session Class
 * @property CI_Calendar $calendar                          This class enables the creation of calendars
 * @property CI_Cart $cart                                      Shopping Cart Class
 * @property CI_Driver_Library $driver                       This class enables you to create "Driver" libraries that add runtime ability to extend the capabilities of a class via additional driver objects
 * @property CI_Email $email                                    Permits email to be sent using Mail, Sendmail, or SMTP.
 * @property CI_Encryption $encryption                     Provides two-way keyed encryption via PHP's MCrypt and/or OpenSSL extensions.
 * @property CI_Form_validation $form_validation        Form Validation Class
 * @property CI_FTP $ftp                                        FTP Class
 * @property WB_Image_lib $image_lib                       Image Manipulation class
 * @property CI_Migration $migration                        All migrations should implement this, forces up() and down() and gives access to the CI super-global.
 * @property CI_Pagination $pagination                     Pagination Class
 * @property CI_Parser $parser                                Parser Class
 * @property CI_Profiler $profiler                              This class enables you to display benchmark, query, and other data in order to help with debugging and optimization.
 * @property CI_Table $table                                  Lets you create tables manually or from database result objects, or arrays.
 * @property CI_Trackback $trackback                     Trackback Sending/Receiving Class
 * @property CI_Typography $typography                 Typography Class
 * @property CI_Unit_test $unit                              Simple testing class
 * @property WB_Upload $upload                             File Uploading Class (CI_Upload extends)
 * @property CI_User_agent $agent                         Identifies the platform, browser, robot, or mobile device of the browsing agent
 * @property CI_Xmlrpc $xmlrpc                              XML-RPC request handler class
 * @property CI_Xmlrpcs $xmlrpcs                           XML-RPC server class
 * @property CI_Zip $zip                                        Zip Compression Class
 ***************** DEPRECATED LIBRARIES *****************
 * @property CI_Jquery $jquery                              Jquery Class
 * @property CI_Encrypt $encrypt                          Provides two-way keyed encoding using Mcrypt
 * @property CI_Javascript $javascript                    Javascript Class
 ***************** MY LIBRARIES *****************
 * @property CI_DB_query_builder $wbs                   Query Builder instance
 * @property CI_DB_query_builder $lms                    Query Builder instance
 * @property FirePHP $firephp                                FirePHP Class
 * @property Curl $curl                                         Curl Class
 * @property Format $format                                 Format Class
 ***************** MY MODELS *****************
 * @property SampleModel $sampleModel                       Sample Model Class
 ***************** WBS ***********************
 * @property AdminModel $adminModel                          Admin Model Class
 * @property CodeModel $codeModel                             Code Model Class
 * @property LoginModel $loginModel                             Login Model Class
 * @property LoginLogModel $loginLogModel                    Login Log Model Class
 * @property RoleModel $roleModel                                Role Model Class
 * @property MenuModel $menuModel                            Menu Model Class
 * @property CpModel $cpModel                                    CP Model Class
 * @property AdminSettingsModel $adminSettingsModel     AdminSettings Model Class
 * @property LectureModel $lectureModel                       Lecture Model Class
 * @property UnitModel $unitModel                                Lecture Unit Model Class
 * @property ProfessorModel $professorModel                  Professor Model Class
 * @property PublisherModel $publisherModel                   Publisher Model Class
 * @property AuthorModel $authorModel                         Author Model Class
 * @property BookModel $bookModel                              Book Model Class
 ***************** LMS ***********************
 * @property SiteModel $siteModel                                 Site Model Class
 * @property SiteGroupModel $siteGroupModel                  Site Group Model Class
 * @property CategoryModel $categoryModel                   Category Model Class
 * @property BoardMasterModel $boardMasterModel          BoardMaster Model Class
 * @property BoardModel $boardModel                      BoardModel Model Class
 */
class PHPStorm_CI_CC
{
}

class CI_Controller extends PHPStorm_CI_CC
{
    public function __construct()
    {
        // This default returns construct as set
    }
}

class CI_Model extends PHPStorm_CI_CC
{
    public function __construct()
    {
        // This default returns construct as set
    }
}
