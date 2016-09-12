<?php
App::uses('Component', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class NotificationComponent extends Component {

    function sendSMS($phone, $message){
        App::uses('HttpSocket', 'Network/Http');
        $HttpSocket = new HttpSocket();
        $results = $HttpSocket->post('http://mobileautomatedsystems.com/index.php?option=com_spc&comm=spc_api', array('username' => 'noibilism', 'password' => 'noheeb', 'sender' => 'NASFAT', 'recipient' => $phone, 'message' => $message));
        return $results;
    }

    function sendsSMS($phone, $message){
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => 1,
            //http://www.mobileautomatedsystems.com/smsapi.php?username=user&password=1234&sender=testers&recipient=234809xxxxxxx,2348030000000&message=testing
            //CURLOPT_URL => 'http://www.mobileautomatedsystems.com/components/com_spc/smsapi.php?username=noibilism&password=noheeb&balance=true&'
            CURLOPT_URL => 'http://www.mobileautomatedsystems.com/components/com_spc/smsapi.php?username=noibilism&password=noheeb&sender=nasfat&recipient='.$phone.'&message='.$message
        ]);
        $response = curl_exec($ch);
        return $response;
    }

    function notify($msg, $subject=null, $to=null, $smtp=false){
      if ( ! $to ) $to = 'info@rolling.ng';
      $t = strftime('%Y-%m-%d %T ');
        $body = "Rolling Mobile Workshop.\n" . $t . "\n" . $msg;
        $webmasterName = 'Rollin Mobile Workshop';
      if ( $subject == null ) $subject = $webmasterName . ' - Site Notice';
        $Email = new CakeEmail('gmail');
        $Email->to($to);
        $Email->subject($subject);
        $Email->replyTo('workshop@rolling.ng');
        $Email->from (array('Rolling Mobile Workshop'=>'mobileworkshop.ng@gmail.com'));
        $Email->send($body);
    }




    public function SendNewRequestNotificationToAdmin(array $details, $to){
        $subject = 'Mobile Workshop | New Request: '.$details['req_code'];
        $msg = "Hello Admin, .\n";
        $msg .= "A new request has been created on the mobile workshop portal. Details below: .\n";
        $msg .= "Code: ".$details['req_code']."\n";
        $msg .= "Device: ".$details['device']."\n";
        $msg .= "Fault: ".$details['fault']."\n";
        if ( ! $to ) $to = 'info@rolling.ng';
        $t = strftime('%Y-%m-%d %T ');
        $body = "Rolling Mobile Workshop.\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('gmail');
        $Email->to($to);
        $Email->subject($subject);
        $Email->replyTo('workshop@rolling.ng');
        $Email->from (array('Rolling Mobile Workshop'=>'mobileworkshop.ng@gmail.com'));
        $Email->send($body);
    }

    public function SendRequestDetailsToMember(array $details, $to){
        $subject = 'NASFAT Youth Conference 2016 | New Registration: ';
        $msg = "Salam Alaekum ".$details['name'].", .\n";
        $msg .= "You have applied as a delegate for the NASFAT Youth Conference 2016. Details below: .\n";
        $msg .= "Name: ".$details['name']."\n";
        $msg .= "Branch: ".$details['branch']."\n";
        $msg .= "Zone: ".$details['zone']."\n";
        $msg .= "Amount Due: 5000"."\n";
        $msg .= "Payment Details: ".$details['payment']."\n";
        $msg .= "Please wait while we verify your payment details. Once verified, you will get your Conference registration number in this email and your registered phone number"."\n";
        $msg .= "Thank you!";
        if ( ! $to ) $to = 'youthconference@nasfat.org';
        $t = strftime('%Y-%m-%d %T ');
        $body = "NASFAT Youth Conference 2016.\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('portalmail');
        $Email->from(array('info@nasfatportal.com' => 'NASFAT Youth Conference 2016'));
        $Email->to($to);
        $Email->subject($subject);
        $Email->send($body);
    }

    public function SendVerificationDetailsToMember(array $details, $to){
        $subject = 'NASFAT Youth Conference 2016 | Registration Verified: ';
        $msg = "Salam Alaekum ".$details['name'].", .\n";
        $msg .= "Your payment for the NASFAT Youth Conference 2016 Has been verified and a TAG No assigned to you. Details below: .\n";
        $msg .= "Name: ".$details['name']."\n";
        $msg .= "Tag No: ".$details['tag']."\n";
        $msg .= "Group: ".$details['group']."\n";
        $msg .= "Jazakum Llahu Khaeran!";
        if ( ! $to ) $to = 'youthconference@nasfat.org';
        $t = strftime('%Y-%m-%d %T ');
        $body = "NASFAT Youth Conference 2016.\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('portalmail');
        $Email->from(array('info@nasfatportal.com' => 'NASFAT Youth Conference 2016'));
        $Email->to($to);
        $Email->subject($subject);
        $Email->send($body);
    }

    public function SendRegistrationDetailsToMember(array $details, $to){
        $subject = 'NASFAT Membership Portal | New Registration: ';
        $msg = "Salam Alaekum ".$details['name'].", .\n";
        $msg .= "You have been registered successfully on the NASFAT Membership Portal. Details below: .\n";
        $msg .= "Name: ".$details['name']."\n";
        $msg .= "Branch: ".$details['branch']."\n";
        $msg .= "Zone: ".$details['zone']."\n";
        $msg .= "Registration No: ".$details['reg']."\n";
        $msg .= "Portal Access No: ".$details['pin']."\n";
        $msg .= "Please keep your portal access number very well. It will be your access key to other NASFAT platorms in the future"."\n";
        $msg .= "Thank you!";
        if ( ! $to ) $to = 'info@nasfatportal.com';
        $t = strftime('%Y-%m-%d %T ');
        $body = "NASFAT Membership Portal .\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('portalmail');
        $Email->from(array('info@nasfatportal.com' => 'NASFAT Youth Conference 2016'));
        $Email->to($to);
        $Email->subject($subject);
        $Email->send($body);
    }

    public function SendRequestDetailsToAdmin(array $details, $to){
        $subject = 'NASFAT Youth Conference 2016 | New Registration: ';
        $msg = "Salam Alaekum ".$details['name'].", .\n";
        $msg .= "You have a new delegate registration for the NASFAT Youth Conference 2016. Details below: .\n";
        $msg .= "Name: ".$details['name']."\n";
        $msg .= "Branch: ".$details['branch']."\n";
        $msg .= "Zone: ".$details['zone']."\n";
        $msg .= "Phone: ".$details['phone']."\n";
        $msg .= "Email: ".$to."\n";
        $msg .= "Amount Due: 5000"."\n";
        $msg .= "Payment Details: ".$details['payment']."\n";
        $msg .= "Please verify payment details. Once verified, delegates Conference registration number will be sent to his/her email and registered phone number"."\n";
        $msg .= "Thank you!";
        if ( ! $to ) $to = 'youthconference@nasfat.org';
        $t = strftime('%Y-%m-%d %T ');
        $body = "NASFAT Youth Conference 2016.\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('portalmail');
        $Email->from(array('info@nasfatportal.com' => 'NASFAT Youth Conference 2016'));
        $Email->to($to);
        $Email->subject($subject);
        $Email->send($body);
    }

    public function SendRequestStatusDetailsToClient(array $details, $to){
        $subject = 'Mobile Workshop | Request Status.';
        $msg = "Hello".$details['user_name'].", .\n";
        $msg .= "Please be informed the status of your request has changed on the mobile workshop portal: .\n";
        $msg .= "Request Code: ".$details['code']."\n";
        $msg .= "New Status: ".$details['status']."\n";
        $msg .= "Thank you!";
        if ( ! $to ) $to = 'info@rolling.ng';
        $t = strftime('%Y-%m-%d %T ');
        $body = "Rolling Mobile Workshop.\n" . $t . "\n" . $msg;
        $Email = new CakeEmail('gmail');
        $Email->to($to);
        $Email->subject($subject);
        $Email->replyTo('workshop@rolling.ng');
        $Email->from (array('Rolling Mobile Workshop'=>'mobileworkshop.ng@gmail.com'));
        $Email->send($body);
    }

    public function SendPaymentDetailsToClient(array $details, $email){

    }

    public function SendEmail(){

    }



}
