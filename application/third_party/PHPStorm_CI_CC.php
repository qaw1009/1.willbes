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
 ***************** CORE COMPONENTS *************************************************************
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
 ***************** DATABASE COMPONENTS **********************************************************
 * @property CI_DB_forge $dbforge                           Database Forge Class
 * @property CI_DB_query_builder $db                       This is the platform-independent base Query Builder implementation class.
 * @property CI_DB_utility $dbutil                             Database Utility Class
 ***************** CORE LIBRARIES *****************************************************************
 * @property CI_Cache $cache                                CodeIgniter Caching Class
 * @property WB_Session $session                           CodeIgniter Session Class
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
 * @property Excel $excel                                      Loads framework components.
 * @property Jwt $jwt                                           Loads Libraries JWT
 * @property LogViewer $logviewer                          CodeIgniter Log Viewer
 * @property Approval $approval                              Approval Class
 ***************** DEPRECATED LIBRARIES **************************************************************
 * @property CI_Jquery $jquery                              Jquery Class
 * @property CI_Encrypt $encrypt                          Provides two-way keyed encoding using Mcrypt
 * @property CI_Javascript $javascript                    Javascript Class
 ***************** MY LIBRARIES **********************************************************************
 * @property CI_DB_query_builder $wbs                   Query Builder instance
 * @property CI_DB_query_builder $lms                    Query Builder instance
 * @property FirePHP $firephp                                FirePHP Class
 * @property Curl $curl                                         Curl Class
 * @property Format $format                                 Format Class
 * @property RestClient $restclient                         REST Client Class
 * @property Caching $caching                              Application Caching Driver Class
 * @property Pg $pg                                            Pg Driver Class
 * @property SendSms $sendsms                           Send Sms Class
 ***************** MY MODELS ************************************************************************
 * @property SampleModel $sampleModel                       Sample Model Class
 ***************** WBS ******************************************************************************
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
 ***************** LMS *******************************************************************************
 * @property WCodeModel $wCodeModel                                             WBS Code Model Class
 * @property SearchWProfessorModel $searchWProfessorModel               Search WBS Professor Model Class
 * @property SearchWBookModel $searchWBookModel                           Search WBS Book Model Class
 * @property SearchMemberModel $searchMemberModel                        Search Member Model Class
 * @property SiteModel $siteModel                                                     Site Model Class
 * @property SiteGroupModel $siteGroupModel                                      Site Group Model Class
 * @property SiteMenuModel $siteMenuModel                                       Site Menu Model Class
 * @property CategoryModel $categoryModel                                       Category Model Class
 * @property PayLogModel $payLogModel                                            Pay Log Model Class
 * @property CourseModel $courseModel                                             Product Course Model Class
 * @property SubjectModel $subjectModel                                           Product Subject Model Class
 * @property SortMappingModel $sortMappingModel                               Product Sort Mapping Model Class
 * @property BoardMasterModel $boardMasterModel                               BoardMaster Model Class
 * @property BoardModel $boardModel                                                 Board Model Class
 * @property BoardAssignmentModel $boardAssignmentModel                   Board For Assignment Model Class
 * @property BoardTpassModel $boardTpassModel                                 Board Tpass For Member Model Class
 * @property BoardMockModel $boardMockModel                                   Board Mock Model Class
 * @property WCpModel $wCpModel                                                    WCp Model Class
 * @property SearchWMasterLectureModel $searchWMasterLectureModel  Search MasterLecture Model Class
 * @property SmsModel $smsModel                                                     Search Sms Model Class
 * @property MessageModel $messageModel                                         Search Message Model Class
 * @property MailModel $mailModel                                                      Search Mail Model Class
 * @property FreebieModel $freebieModel                                             Freebie Model Class
 * @property ManageMemberModel $manageMemberModel                       Manage Member Model Class
 * @property ManageLectureModel $manageLectureModel                       Manage Lecture Model Class
 * @property CouponRegistModel $couponRegistModel                            Coupon Regist Model Class
 * @property CouponIssueModel $couponIssueModel                              Coupon Issue Model Class
 * @property CouponPinModel $couponPinModel                                     Coupon Pin Model Class
 * @property PointModel $pointModel                                                   Point Model Class
 * @property PackageUserModel $packageUserModel                               Lecture user package Model Class
 * @property PackageAdminModel $packageAdminModel                           Lecture admin package Model Class
 * @property PackagePeriodModel $packagePeriodModel                          Lecture period package Model Class
 * @property LectureFreeModel $lectureFreeModel                                 Lecture free Model Class
 * @property OffLectureModel $offLectureModel                                     Off Lecture Model Class
 * @property OffPackageAdminModel $offPackageAdminModel                   Off admin package Model Class
 * @property BeforeLectureModel $beforeLectureModel                            BeforeLecture Model Model Class
 * @property VideoManagerModel $videoManagerModel                           Live Video Manager Model Class
 * @property ClassRoomModel $classRoomModel                                    ClassRoom Model Class
 * @property ConsultModel $consultModel                                            Consult Model Class
 * @property LandingPageModel $landingPageModel                                landingPage Model Class
 * @property BannerRegistModel $bannerRegistModel                              bannerRegist Model Class
 * @property BannerDispModel $bannerDispModel                                   bannerDisp Model Class
 * @property PopupModel $popupModel                                                popup Model Class
 * @property EventLectureModel $eventLectureModel                             EventLecture Model Class
 * @property TermsModel $termsModel                                                Terms Model Class
 * @property DDayModel $dDayModel                                                  d-day Model Class
 * @property OnAirModel $onAirModel                                                  OnAir Model Class
 * @property SearchaAnalysisModel $searchaAnalysisModel                     SearchaAnalysis Model Class
 * @property BtobModel $btobModel                                                    BtoB Model Class
 * @property DeliveryPriceModel $deliveryPriceModel                               Delivery Price Product Model Class
 * @property BaseReadingRoomModel $baseReadingRoomModel                 BaseReadingRoom Model Class
 * @property ReadingRoomModel $readingRoomModel                              ReadingRoom Model Class
 * @property CertModel $certModel                                                     Cert Model Class
 * @property CertApplyModel $certApplyModel                                       Cert Apply Model Class
 * @property OrderModel $orderModel                                                  Order Model Class
 * @property OrderListModel $orderListModel                                         Order List Model Class
 * @property OrderSalesModel $orderSalesModel                                    Order Sales Model Class
 * @property ProfSalesModel $profSalesModel                                    Professor Order Sales Model Class
 * @property OrderStatsModel $orderStatsModel                                    Order Statistics Model Class
 * @property OrderCalcModel $orderCalcModel                                       Order Professor Calculate Model Class
 * @property OrderAdvanceModel $orderAdvanceModel                           Order Advance Received Model Class
 * @property OrderMemoModel $orderMemoModel                                   Order Memo Model Class
 * @property CartModel $cartModel                                                     Cart Model Class
 * @property DeliveryInfoModel $deliveryInfoModel                                 Delivery Info Model Class
 * @property SalesProductModel $salesProductModel                              Sales Product Model Class
 * @property TmModel $tmModel                                                         Tm Model Class
 * @property StudentModel $studentModel                                           Student Model Class
 * @property ManageCsModel $manageCsModel                                     Member Manage Cs Model Class
 * @property ManageBlackConsumerModel $manageBlackConsumerModel     Member Manage BlackConsumer Model Class
 * @property CsModel $csModel                                                           Manage Cs Model Class
 * @property ExcelDownLogModel $excelDownLogModel                                 Excel Download Log Model Class
 * @property RouletteModel $rouletteModel                                         Roulette Model Class
 * @property SupportersRegistModel $supportersRegistModel                   Supporters Regist Model Class
 * @property WelcomePackModel $welcomePackModel                             Welcompack Model Class
 ***************** MockTest ****************************************************************************
 * @property MockCommonModel $mockCommonModel                              MockTest MockCommon Model Class
 * @property BaseCodeModel $baseCodeModel                                        MockTest BaseCod Model Class
 * @property ApplyExamModel $applyExamModel                                      MockTest ApplyExam Model Class
 * @property ApplyUserModel $applyUserModel                                        MockTest ApplyUser Model Class
 * @property BaseRangeModel $baseRangeModel                                     MockTest BaseRange Model Class
 * @property RegExamModel $regExamModel                                           MockTest RegExam Model Class
 * @property RegGoodsModel $regGoodsModel                                        MockTest RegGoods Model Class
 * @property RegGroupModel $regGroupModel                                         MockTest RegGroup Model Class
 * @property SearchMockTestModel $searchMockTestModel                      Search MockTest Model Class
 ***************** Predict *****************************************************************************
 * @property PredictModel $predictModel                                    Predict Model Class
 * @property SurveyModel $surveyModel                                      Survey Model Class
 ***************** FRONT *******************************************************************************
 * @property BaseProductFModel $baseProductFModel                            Product Base Model Class
 * @property ProfessorFModel $professorFModel                                    Professor Model Class
 * @property ProductFModel $productFModel                                        Product Main Model Class
 * @property LectureFModel $lectureFModel                                         Lecture Product Model Class
 * @property PackageFModel $packageFModel                                      Package Product Model Class
 * @property BookFModel $bookFModel                                                Book Product Model Class
 * @property CartFModel $cartFModel                                                 Cart Model Class
 * @property OrderFModel $orderFModel                                              Order Model Class
 * @property OrderListFModel $orderListFModel                                     Order List Model Class
 * @property MyDeliveryAddressFModel $myDeliveryAddressFModel           My Delivery Address Model Class
 * @property CouponFModel $couponFModel                                         Coupon Model Class
 * @property PointFModel $pointFModel                                               Point Model Class
 * @property MemberFModel $memberFModel                                        Member Model Class
 * @property BannerFModel $bannerFModel                                          Banner Model Class
 * @property PopupFModel $popupFModel                                            Popup Model Class
 * @property PlayerFModel $playerFModel                                            Player Model Class
 * @property BaseSupportFModel $baseSupportFModel                           BaseSupport Model Class
 * @property SupportBoardFModel $supportBoardFModel                         SupportBoard Model Class
 * @property SupportBoardTwoWayFModel $supportBoardTwoWayFModel  SupportBoardTwoWayF Model Class
 * @property BoardAttachFModel $boardAttachFModel                            BoardAttachF Model Class
 * @property SiteFModel $siteFModel                                                   Site Model Class
 * @property CategoryFModel $categoryFModel                                     Category Model Class
 * @property AccessFModel $accessFModel                                          Access Model Class
 * @property DownloadFModel $downloadFModel                                    Download Model Class
 * @property ClassroomFModel $classroomFModel                                   Classroom Model Class
 * @property MessageFModel $messageFModel                                       Message Model Class
 * @property CertApplyFModel $certApplyFModel                                    Cert Apply Model Class
 * @property EventFModel $eventFModel                                              Event Model Class
 * @property ConsultFModel $consultFModel                                          Consult Model Class
 * @property OnAirFModel $onAirFModel                                                OnAir Model Class
 * @property DDayFModel $dDayFModel                                                D-Day Model Class
 * @property MockInfoFModel $mockInfoFModel                                      MockTest Info  Model Class
 * @property MockExamModel $mockExamModel                                      MockExam Class
 * @property RegGradeModel $regGradeModel                                         RegGrade Class
 * @property SubTitlesFModel $subTitlesFModel                                   SubTitles Model Class
 * @property PredictFModel $predictFModel                                       Predict Model Class
 * @property RouletteFModel $rouletteFModel                                         Roulette Model Class
 ***************** API ***********************************************************************************
 * @property BookAModel $bookAModel                                                 API Delivery Book Model Class
 *******************************************************************************************************
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
