<?php
//http://127.0.0.3:90/EARQGQMFRCDQVRWD9AQOPVP
//http://127.0.0.3:90/customer
//https://pages.awscloud.com/EMEA_Free_Live_Training-confirmation.html?aliId=eyJpIjoibEsyRWxsVmxIQ2hpUHB1SSIsInQiOiJUOUtxWmQ4b2NPSnlySWo4REZUTXpnPT0ifQ%253D%253D
//https://www.jewfaq.org/hebrew_alphabet
require_once  __DIR__ . '/vendor/autoload.php'; ///__DIR___ make command line augment to function

use App\Controller\Admin\Register;
use App\Err\Err;
use App\Dependency\DB;
use App\Gateway\Router;
//use App\Gateway\Route2;
use App\Test;


$test  = function () {
    //echo "<br>\nFunction test calls as middleware\n";
};
//$test();


class A
{
    function getName($a)
    {
        //print_r($_SERVER);
        try {
            $postData = json_decode(file_get_contents('php://input'));
            $response = ['message' => "Data received successfully , $postData->email, $a"];
            echo json_encode([$response]);
        } catch (\Throwable $th) {
            //throw $th;'
            // echo "<div>";
            // var_dump($th);
            // echo "</div>";
            echo json_encode($th);
        }
    }

    function getName2($a)
    {
        //print_r($_SERVER);
        try {

            echo json_encode([$a]);
        } catch (\Throwable $th) {
            //throw $th;'
            // echo "<div>";
            // var_dump($th);
            // echo "</div>";
            echo json_encode($th);
        }
    }
}

// Router::middleware([$test])->group('/student', function ($Router) {
//     $Router::group('/main', function ($Router) {
//         $Router::get(['/login/{id}', '/register'], function () {
//             echo "SUBGROUPING CALLED FOR STUDENTS";
//         });
//     });
// });   
Router::get(['/', '/register/s/:id'], '\A@getName2');

// Router::middleware([$test])->group('/student', function ($Router) {
//     $Router::group('/main', function ($Router) {
//         $Router::get(['/login/{id}', '/register'], '\A@getName');
//     });
// });

Router::middleware([$test])->group('/student', function ($Router) {
    $Router::group('/main', function ($Router) {
        $Router::post(['/login/{id}', '/register'], '\A@getName');
    });
});

/*
Route->Request->middleware & controller-> Resouces-> model
//https://refactoring.guru/design-patterns/factory-method
//mvxusifgbwlupnha
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
https://pages.awscloud.com/global-traincert-twitch-sysops.html
downlad tronsscript

https://nodejs.org/api/crypto.html
https://nodejs.org/api/buffer.html#buffers-and-character-encodings

Is this webinar enough to pass the AWS Machine Learning exam ?
A:
No, this is an introduction to Machine Learning. To pass the exam, we recommend you have at least two years of hands-on experience developing, architecting, and running ML or deep learning workloads in the AWS Cloud

With what I am seeing, this imply that, an expert in data analysis will be good in ML, and ML programmer are good statistician, is this right?
A:
In my experience, Data Analysts do need to be proficient in statistics, but that doesn't mean the ML engineer will avoid it! It is sort of transversal. ML engineers will need to have a better understanding of how the algorithms work, so it is more complex statistics and mathematics concepts. Data Analysts maybe won't use the statistics concepts to understand the models and algorithms, but they will use it to understand, clarify and explain the model results and the data "format"

do you have a model for training alcohol abuse prediction
A:
Not that I'm aware of - but you could train your own. All you need is a lot of labeled data, then using algorithms that come with Amazon SageMaker, you can train your own model. We'll cover using SageMaker in the next session.

https://d1.awsstatic.com/training-and-certification/ramp-up_guides/Ramp-Up_Guide_Machine_Learning.pdf

https://aws.amazon.com/machine-learning/mlu/
https://mlu-explain.github.io/

https://studiolab.sagemaker.aws/
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form action="/student/main/login/234" method="post">
        <input type="test" name="">
        <input type="submit" value="send">
    </form>
</body>

</html>
*/
