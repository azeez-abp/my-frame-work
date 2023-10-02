<?php
//http://127.0.0.3:90/
//http://127.0.0.3:90/customer
//https://pages.awscloud.com/EMEA_Free_Live_Training-confirmation.html?aliId=eyJpIjoibEsyRWxsVmxIQ2hpUHB1SSIsInQiOiJUOUtxWmQ4b2NPSnlySWo4REZUTXpnPT0ifQ%253D%253D
//https://www.jewfaq.org/hebrew_alphabet
//require_once 'vendor/autoload.php';
$cors  = function () {
        header("Access-Control-Allow-Origin: http://127.0.0.1:5500"); // Replace with your frontend domain
        header("Access-Control-Allow-Methods: POST");
        header("Access-Control-Allow-Headers: Content-Type");
        header("Content-Type: application/json");
};
$cors();
require_once 'server_master.php';

use App\Gateway\Router;
// use App\Controller\Admin\Register;

// use App\Dependency\DB;
// use App\Gateway\Route;
// use App\Test ;

$Router = new Router();
$Router->_run();
// Route::group('customer',function($Route){
//     // echo "<pre> GONE";
//     // var_dump($Route);
//     // echo "GONE</pre>";
//  $Route::get('/register:a:v',['App/Controller/Admin/Register','getRegister']);

// });
// Route::group('/',function($Route){
//     // echo "<pre> GONE";
//     // var_dump($Route);
//     // echo "GONE</pre>";
//  $Route::get('/yesme',['ControllerPath','method']);

// });

// Route::group('user',function($Route){
//     // echo "<pre> GONE";
//      //var_dump($Route);
//     // echo "GONE</pre>";
//  $Route::post('user/register:/param:/param2',[Register::class,'getRegister']);

// });


// Route::post(['/home','/gonre'],['ControllerPath','method']);
/*
//https://refactoring.guru/design-patterns/factory-method
//https://observatory.mozilla.org/analyze/theproli.com#ssh
//https://rappasoft.com/quizzes/laravel/e82c336f-6782-4bcb-8525-4d7779b891b7/random?question=7c5b720c-945e-4367-b948-5fddd3a14d29
https://www.codingninjas.com/codestudio/auth?redirect=%2Fcodestudio%2Fproblems%2Fvalid-string_762939&logged_out=true
https://www.codingninjas.com/codestudio/problems?practice_topic[]=Bit%20Manipulation&category[]=Advanced%20Algorithms4


cPHulk provides protection for your server against brute force attacks (a hacking method that uses an automated system to guess passwords). If you enable cPHulk, you can decrease the chance that a hacker can use a brute force attack to gain access to your server’s mail accounts.

To enable this feature, navigate to WHM’s cPHulk Brute Force Protection interface (WHM » Home » Security Center » cPHulk Brute Force Protection) and click Off to toggle the feature’s status.


Greylisting is a service that protects your server against unwanted email or spam. When enabled, the mail server will temporarily reject any email from a sender that the server does not recognize. If the email is legitimate, the originating server tries to send it again after a delay. After sufficient time passes, the server accepts the email.

To enable this feature, navigate to WHM’s Greylisting interface (WHM » Home » Email » Greylisting) and click Off to toggle the feature’s status.


SMTP restrictions
If you enable the SMTP Restrictions feature, spammers cannot directly interact with remote mail servers or work around mail security settings.

This feature restricts outgoing email connection attempts to the mail transfer agent (MTA), the mailman system user, and the root user.

This feature forces both scripts and users to use Exim’s sendmail binary, which helps to prevent direct access to the socket.

To enable this feature, navigate to WHM’s SMTP Restrictions interface (WHM » Home » Security Center » SMTP Restrictions) and click Enable. 

Spam emails are usually about 1-4 kB in size; 

*/


#'/inndex/:id1/:id2/:dod3/:'
//require_once 'server.php';
////generate composer json
////user psr-4
////mapp your App to App
////require the autoload
//use App\Dependency\DB;
// use App\Gateway\Route;
// try {
//         $db  = DB::table('school_students')
//                 ->select('name AS a', 'email As b', 'address')
//                 ->where('id', '<', 500)
//                 ->where('name', '<', "ADES")
//                 ->nest(function ($q) {
//                         $q->where('n', '=', 'nmcdd');
//                         $q->where("sdsdsdq", "==", 232432);
//                         $q->orWhere("sdsdsdq", "==", 232432);
//                 })->orWhere("IBSC", "=", "ABUJA")
//                 ->get();
//         //code...
// } catch (\Throwable $th) {
//         //throw $th;
// }


// var_dump(__DIR__,__FILE__,dirname(__DIR__),$GLOBALS);
//var_dump(...[32,2,3,23,2,2]);

// $db  = DB::table('school_staffs')
// ->select('fn AS a','email As b','user_id')
// ->where('mn',"!="," ")
// ->nest(function($q){
// 	  $q->where('id','>',0);
//       // $q->where("sdsdsdq","==",232432);
//       // $q->orWhere("sdsdsdq","==",232432);
// })->orWhere("email","=","adioadeyoriazeez@gmail.com")
// //->toSql(false);
// //->count();
// ->get();
// print_r($db);
// echo "trtdt";
// Route::get('admin/register', ['controller'=>(object)[],'method'=>'getRegister']);
// Route::get('admin/user', ['controller'=>(object)[],'method'=>'getUser']);
// /https://pages.awscloud.com/EMEA_TC_The-SSA-Challenge-2022-Hub.html

//https://portal.azure.com/#view/Microsoft_Azure_GTM/BillingProfilePaymentMethodsBlade/billingProfileId/%2Fproviders%2FMicrosoft.Billing%2FbillingAccounts%2F8dd28b8c-6e3d-5bb4-6306-184fe6b988e8%3A055ff3a8-73c2-4f2b-8967-8df912d7c427_2019-05-31%2FbillingProfiles%2FJLTT-TUBQ-BG7-PGB


/*
before<====(?=/)===>after
(?<=/).+(?=/) between two slash
^[A-Za-z0-9]+@+[A-Za-z]+\.\w{2,3}$ valid email requet
*/
