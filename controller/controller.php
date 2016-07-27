<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/* import libraries */
require_once "model/Model.mod.php";
require_once "model/Model.math.php";
require_once "includes/safemysql.class.php";


$post = $_POST;
$get = $_GET;
$db = new MysqliDb($db_host, $db_user, $db_pass, $db_name);
class Controller{
      
    private $current_page = '';
    private $db;
    private $model;
    //private $forte_sap_url = 'http://10.2.1.18:8000/sap/bc/webrfc?_FUNCTION='; //DEV
//    private $forte_sap_url = 'http://FODSAP:8000/sap/bc/webrfc?_FUNCTION=';//dev from WITHIN FORTE
//    private $forte_sap_url = 'http://10.2.1.15:8000/sap/bc/webrfc?_FUNCTION=';//QA
//    private $forte_sap_url = 'http://FOQSAP:8000/sap/bc/webrfc?_FUNCTION=';//qa from WITHIN FORTE
    private $forte_sap_url = 'http://196.200.126.133:8000/sap/bc/webrfc?_FUNCTION=';//public ip accessible only to 
    
    /* constructor */

    public function __construct($db, $post, $get) {
        ini_set('max_execution_time', 300);
	error_reporting(E_ERROR | E_PARSE);
        //print '</pre>';print_r($_GET);print '</pre>';
        /* router */
        $this->db = $db;
        $this->model = new Model($this->db);
//        if ($_SESSION['logged_in']){
            $page = $_GET['view'];
            
//            print '<pre>';print_r($_SESSION);print'</PRE>';
            if (!$_GET['view'] && $_SESSION['logged_in'] ) {
                $this->current_page = 'view/home.php';
            }
            
            elseif ( !$_GET['view'] && $_SESSION['logged_in_transporter']){
                $this->current_page = 'view/transporterhome.php';
            }
            elseif ( !$_GET['view'] && $_SESSION['logged_in_station']){
                $this->current_page = 'view/stationhome.php';
            }
            elseif( !$_SESSION['logged_in'] && !$_SESSION['logged_in_transporter'] && !$_SESSION['logged_in_station']){
                
                if($_GET['view'] == 'api') $this->current_page = 'view/api.php';
                else
                $this->current_page = 'view/login.php';
            }
            
            else {
                
                //check the directory for the requested file
                $request_file = false;
                if ($handle = opendir('view')) {
                    while (false !== ($file = readdir($handle))) {
                        if (($file != ".") && ($file != "..")) {
                            if ($file == $page . '.php'):
                                $request_file = true;
                            endif;
                        }
                    }
                    closedir($handle);
                }
                if (!$request_file) {
                    session_destroy();
                }
                if ($request_file && $page == 'login') {
                    if( isset($_SESSION['logged_in']))
                    $this->current_page = 'view/home.php';
                    
                    elseif( isset($_SESSION['logged_in_transporter']))
                        $this->current_page = 'view/transporterhome.php';
                    
                    elseif( isset($_SESSION['logged_in_station']))
                        $this->current_page = 'view/stationhome.php';
                } else if ($request_file && $page == 'register') {
                    $this->current_page = 'view/home.php';
                } 
                else {
                    $this->current_page = $request_file ? 'view/' . $page . '.php' : 'view/pageserror.php';
                }
            }
            
//        }else{
//            $this->current_page = 'view/home.php';
//        }
        
        $this->handleFormActions();
        
        require_once $this->current_page;
    }
    
    function getCustomerID($name){
        $json = array();
        $str = file_get_contents('json/results.json');
        $str = utf8_encode($str);
        $json = json_decode($str,true);
        $json = json_decode($json);
        
        foreach($json as $k=>$v){
            for($a=0;$a<count($v);$a++){
                if(  trim($v[$a]->cust_name) == $name ){
                    return $v[$a]->cust_id;
                }
            }
        }
    }
    function getCustomerID2($id){
        $res = $this->model->map_request('retrieve','ppms_user',$_POST,'id',$id);
        $name = $res[0]['sap_cust'];
        $json = array();
        $str = file_get_contents('json/results.json');
        $str = utf8_encode($str);
        $json = json_decode($str,true);
        $json = json_decode($json);
        
        foreach($json as $k=>$v){
            for($a=0;$a<count($v);$a++){
                if(  trim($v[$a]->cust_name) == $name ){
                    return $v[$a]->cust_id;
                    
                }
            }
        } 
    }
    public function handleFormActions(){
        //handle apis
        if($_GET['view'] == 'api'){
//            echo json_encode($_POST);exit();
            if($_POST['rate']){
                $this->model->map_request('insert','ratings',
                        array(
                             'user'=>$_POST['cust_no'],
                            'delivery'=>$_POST['delivery'],
                            'rate'=>$_POST['rate']
                        ));  
            } 
            if(isset($_POST['del_history'])){
               $deliveries = $this->model->map_request('retrieve','delivery_details',$_POST,'userid',$_POST['userid']);
//               $deliveries = $this->model->map_request('retrieve','delivery_details',$_POST);
               echo json_encode($deliveries);exit();
            }
            if(isset($_POST['del_search'])){
                $this->model->set_query('SELECT * from `delivery_details` where delivery_details.userid=? AND delivery_details.delivery_date between ? and ?');
                $deliveries = $this->model->map_request('raw_query', '', '', '', '', array($_POST['userid'], $_POST['from'],$_POST['to']));
                echo json_encode($deliveries);exit();
                
            }
            if(isset($_POST['inventory_report'])){
                if($_POST['initial']){
                    $date30 = date('c', strtotime('-30 days'));
                    $userid = $_POST['userid'];
                    $datestr = substr($date30, 0, 10);
                    $this->model->set_query('SELECT * from `inventory` where inventory.user_id=? AND inventory.dateentered > ?');
                    $result = $this->model->map_request('raw_query', '', '', '', '', array($userid, $datestr));
                    echo json_encode($result); exit();

                } 
            }  
            if(isset($_POST['inv_search'])){ 
                if($_POST['to']){   
                    $to = $_POST['to'];
                    $from = $_POST['from'];
                    $userid = $_POST['userid'];
                    $this->model->set_query('SELECT * from `inventory` where inventory.user_id=? AND inventory.dateentered between ? and ?');
                    $result = $this->model->map_request('raw_query', '', '', '', '', array($userid, $from, $to));
                    echo json_encode($result); exit();

                } 
            } 
             if(isset($_POST['inventory'])){
                if($_POST['p1']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p1'],
                        'quantity'=>$_POST['q1'],
                        'measure1'=>$_POST['nh1'],
                        'measure2'=>$_POST['lh1'], 
                        'measure3'=>$_POST['lh1'],
                        'dateentered'=>$_POST['date1'],
                        'timeentered'=>$_POST['time1'],
                        'tank'=>'1'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
                if($_POST['p2']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p2'],
                        'quantity'=>$_POST['q2'],
                        'measure1'=>$_POST['nh2'],
                        'measure2'=>$_POST['lh2'],
                        'measure3'=>$_POST['lh2'],
                        'dateentered'=>$_POST['date2'],
                        'timeentered'=>$_POST['time2'],
                        'tank'=>'2'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
                if($_POST['p3']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p3'],
                        'quantity'=>$_POST['q3'],
                        'measure1'=>$_POST['nh3'],
                        'measure2'=>$_POST['lh3'],
                        'measure3'=>$_POST['lh3'],
                        'dateentered'=>$_POST['date3'],
                        'timeentered'=>$_POST['time3'],
                        'tank'=>'3'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
                if($_POST['p4']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p4'],
                        'quantity'=>$_POST['q4'],
                        'measure1'=>$_POST['nh4'],
                        'measure2'=>$_POST['lh4'],
                        'measure3'=>$_POST['lh4'],
                        'dateentered'=>$_POST['date4'],
                        'timeentered'=>$_POST['time4'],
                        'tank'=>'4'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
                if($_POST['p5']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p5'],
                        'quantity'=>$_POST['q5'],
                        'measure1'=>$_POST['nh5'],
                        'measure2'=>$_POST['lh5'],
                        'measure3'=>$_POST['lh5'],
                        'dateentered'=>$_POST['date5'],
                        'timeentered'=>$_POST['time5'],
                        'tank'=>'5'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
                if($_POST['p6']){
                    $data = array(
                        'user_id'=>$_POST['userid'],
                        'product'=>$_POST['p6'],
                        'quantity'=>$_POST['q6'],
                        'measure1'=>$_POST['nh6'],
                        'measure2'=>$_POST['lh6'],
                        'measure3'=>$_POST['lh6'],
                        'dateentered'=>$_POST['date6'],
                        'timeentered'=>$_POST['time6'],
                        'tank'=>'6'
                    );
                    $in = $this->model->map_request('insert','inventory',$data);
                    if($in){
                        echo json_encode('Success');exit();
                    }else{
                        echo json_encode('failure');exit();
                    }
                }
            }
            if($_POST['cust_no']){
                $login = $this->model->map_request_mulwhere('retrieve','ppms_user',$_POST,
                    array('username','password'),array($_POST['cust_no'],$_POST['password']));
                if(!empty($login)){
                    $customer = $this->getCustomerID($login[0]['sap_cust']);
                    $ch = curl_init();
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                    curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_DELIVERIES&_CUSTNO='.$customer);
                    $result = curl_exec($ch);
                    $fp = fopen('json/'.$customer.'_results.json', 'w');
                    $result = trim($result);
                    fwrite($fp, json_encode($result));
                    fclose($fp);
                    
                    echo json_encode($login);
                }else{
                    echo json_encode('Login Failed!');
                }
                
                
                
                exit();
            }
            if($_POST['pod']){
                $data = array(
                    'delivery'=>$_POST['delivery'],
                    'shortage'=>$_POST['shortage'],
                    'comment'=>$_POST['comment'],
                    'user'=>$_POST['user'],
                    'station'=>$_POST['station']
                );
                $nh = explode(',',$_POST['nh']);
                $lh = explode(',',$_POST['lh']);
                $th = explode(',',$_POST['th']);
                
                
                $data2 = array(
                    'delivery'=>$_POST['delivery'],
                    'nh1'=>$nh[0],
                    'nh2'=>$nh[1],
                    'nh3'=>$nh[2],
                    'lh1'=>$lh[0],
                    'lh2'=>$lh[1],
                    'lh3'=>$lh[2],
                    'th1'=>$th[0],
                    'th2'=>$th[1],
                    'th3'=>$th[2],
                    'userid'=>$_POST['userid'],
                    'volume'=>$_POST['volume'],
                    'delivery_date'=>date('Y-m-d')
                );
                
                $this->model->map_request('insert','disputes',$data);
                $this->model->map_request('insert','delivery_details',$data2);
                $ch = curl_init();
                $url = $this->forte_sap_url.'ZPOD_PERFORM_POD&_DELNO='.$_POST['delivery'].'&_QTYDIFF=0';
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_PERFORM_POD&_DELNO='.$_POST['delivery'].'&_QTYDIFF=0');
                $result = curl_exec($ch);
                curl_close($ch);
                    
                echo json_encode($url);exit();
            }
            if($_GET['action']){
                if($_GET['action'] == 'user'){
                    $customerid = $this->getCustomerID2($_GET['id']);
//                    $str = file_get_contents('json/'.$customerid.'_results.json');
//                    $str = utf8_encode($str);
//                    $json = json_decode($str,true);
//                    $json = json_decode($json);
//                    echo json_encode($json);exit();
                    
                    
                    
                    
                    //Read Station Data and Transporter Data
                    $user = $this->model->map_request('retrieve','ppms_user',$_POST,'id',$_GET['id']);
                    $usertype = $user[0]['usertype'];
                    
                    echo json_encode($usertype);exit();
                    
                }
                if($_GET['action'] == 'driver' ){
                    
                    $driver = $_GET['id'];
                    $fr = $this->model->map_request_mulwhere('retrieve','driver',$_POST,array('username','password'),
                           array(
                               explode('AND',$driver)[0],
                               explode('AND',$driver)[1]
                           ));
                    
                    echo json_encode(!empty($fr)?'true':'false');exit();
//                    echo json_encode($fr);exit();
                }
                if($_GET['action'] == 'gentoken'){
                    $_u = array();
                    $_u = explode('AND',$_GET['id']);
                    $driver = $_u[0];
                    $driver_phone = $_u[1];
                    $driver_phone = preg_replace('/^0/', '234', $driver_phone);
//                    echo json_encode($driver .'\'s'.$driver_phone);exit();
                    $otp = $this->generateRequestCode();
                    $msg = 'Dear '.$driver.',\n Please use this OTP: ' .$otp. ' to authenticate within the next 15mins.\nIgnore, this is just a test.';
//                    $this->sendSMS($driver_phone, $msg);
                    $this->sendSMS('2347066112584', $msg);
//                    $this->sendSMS('2347080701724', $msg);
                    echo json_encode($otp); exit();
                }
                
            }
            if($_POST['calibration']){
                echo json_encode('true');exit();
            }
           
        }
        if($_GET['view'] == 'inventoryreportstation'){
            $res = $this->model->map_request('retrieve','inventory',$_POST,'user_id',$_SESSION['user']['id']);
            
            $_SESSION['inventory'] = $res;
        }
        
        if($_GET['view'] == 'disputes'){
            $disputes = $this->model->map_request('retrieve','disputes',$_POST);
            $_SESSION['disputes'] = $disputes;
        }
        if($_GET['view'] == 'adddriver'){
            if($_POST['username']){
                $firstname = $_POST['firstname'];
                $lastname = $_POST['lastname'];
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $phoneno = $_POST['phoneno'];
                $trans_id = $_POST['trans_id'];
                
                
                $data = array(
                    'firstname'=>$firstname,
                    'lastname'=>$lastname,
                    'username'=>$username,
                    'password'=>$password,
                    'email'=>$email,
                    'phoneno'=>$phoneno,
                    'trans_id'=>$trans_id
                );
                
                $i = $this->model->map_request('insert','driver',$data);
                if($i){
                    $this->current_page = 'view/driversuccess.php';
                }
            }
        }
        if($_GET['view'] == 'driverslist'){
            $transporter = $_SESSION['user']['sap_cust'];
            $res = $this->model->map_request('retrieve','driver',$_POST,'trans_id',$transporter);
            $_SESSION['drivers'] = $res;
            
        }//668134587 j4w4k4
        if( $_GET['view'] == 'adduser'){
           if( $_POST['username']){
               $username = $_POST['username'];
               $password = $_POST['password'];
               $firstname = $_POST['firstName'];
               $lastname = $_POST['lastName'];
               $email = $_POST['email'];
               $phoneno = $_POST['phoneno'];
               $category = $_POST['userCategory'];
               $sapcust = $_POST['sap'];
               
                
               $creationdate = date("Y-m-d H:i:s");
               
               $insertdata = array(
                    'username' => $username,
                    'password' => $password,
                    'firstname' => $firstname,
                    'lastname' => $lastname,
                    'email' => $email,
                    'phoneno' => $phoneno,
                    'usertype' => $category,
                    'creationdate' => $creationdate,
                   'sap_cust'=>$sapcust
                );
               
               
               $i = $this->model->map_request('insert', 'ppms_user', $insertdata);
//               echo json_encode($i);exit();
               if( $i ){
                   $msg = "Congratulations! Your Serve LS1  Details are username: ".$username." and password: ".$password.". ";
                   $this->sendSMS($phoneno, $msg);
                   $this->current_page = 'view/success.php';
               }else{
               
               }
           }
        }
        if( $_GET['view'] == 'userlist' ){
            //fetch all users
            $users = $this->model->map_request('retrieve', 'ppms_user', $_POST, '', '');
            $_SESSION['users'] = $users;
       }
        
       if($_GET['regeneratetoken']){
           
           echo 'jnvfsa';exit();
           $drivername = $_POST['driver'];
           $driverphone = $_POST['phoneno'];
           
           
           
           $otp = $this->generateRequestCode();
//           $R = $this->model->map_request('insert','driver_token',array(
//               'id'=>'',
//               'driver'=>$drivername,
//               'token'=>$otp,
//               'phoneno'=>$driverphone
//           ));
//           
//           
//           if($R){
//               $this->current_page = 'view/tokensuccess.php';
//           }
       }
       if($_GET['view'] == 'configuration'){
           
           $exception = $this->model->map_request('retrieve','exception_setup',$_POST);
           $_SESSION['exception_setup'] = $exception;
           
           $persons = $this->model->map_request('retrieve','authorized_persons',$_POST);
           $_SESSION['authorized_persons'] = $persons;
           
           if($_POST['exceptiondays']!= ''){
//              $this->model->map_request('', 'exception_setup', $_POST);
              $res =  $this->model->map_request('insert','exception_setup',array('exception_value'=>$_POST['exceptiondays']));
              if($res){
                  $_SESSION['configuration_success'] = true;
              }
              $exception = $this->model->map_request('retrieve','exception_setup',$_POST);
              $_SESSION['exception_setup'] = $exception;
           }
           
           if($_POST['firstname'] != ''){
               $firstname = $_POST['firstname'];
               $lastname = $_POST['lastname'];
               $email = $_POST['email'];
               
               $res = $this->model->map_request('insert','authorized_persons',array(
                   'first_name'=>$firstname,
                   'last_name'=>$lastname,
                   'email_address'=>$email
               ));
               
               if($res){
                   $_SESSION['person_added'] = true;
               }
               $persons = $this->model->map_request('retrieve','authorized_persons',$_POST);
               $_SESSION['authorized_persons'] = $persons;
           }
           
           if($_POST['newpassword']!= ''){
               $u = $this->model->map_request('update','ppms_user',array(
                   'password'=>$_POST['newpassword']
               ),'username','admin');
               
               if($u){
                  
               }
           }
           
           if($_POST['truck']){
               
               if ($_FILES["filePic"]["name"] != "") {
                        //handle pic
                        $target_dir = "calibration/";
                       $target_file = $target_dir . $_POST['truck'].'.PNG';
                       
                
                       
                        $uploadOk = 1;
                        $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);

                        $f_name = $_FILES["filePic"]["name"];
                        //                    $check = getimagesize($_FILES["stockName"]["tmp_name"]);
                        $errors = array();
                        if ($this->endsWith($f_name, '.PNG') || $this->endsWith($f_name, '.png')
                                ) {
                            $uploadOk = 1;
                     
                        } else {
                            $uploadOk = 0;
                            $_SESSION['image_error'] = 1;
                        }



                        if (file_exists($target_file)) {
                            if (unlink($target_file)) {
                                
                            }
                        }
//                         print $_FILES["filePic"]["size"]; exit();
                        if ($_FILES["filePic"]["size"] > 5000000) {
//                        if ($_FILES["filePic"]["size"] > 500000) {
                            //                        echo "Sorry, your file is too large.";
                            $uploadOk = 0;
                            $_SESSION['image_error'] = 2;
                        }
                        // Check if $uploadOk is set to 0 by an error
                        if ($uploadOk == 0) {
                            //                        echo "Sorry, your file was not uploaded.";
                            // if everything is ok, try to upload file
                        } else {
                            if (move_uploaded_file($_FILES["filePic"]["tmp_name"], $target_file)) {
                                //                            echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                                $_SESSION['profileupdated'] = 1;
                            } else {
                                //                            echo "Sorry, there was an error uploading your file.";
                                $_SESSION['image_error'] = 3;
                            }
                        }
                    }
           }
       }
        if( $_GET['view'] == 'updateuser'){
            $users = $this->model->map_request('retrieve', 'ppms_user', $_POST, '', '');
            $_SESSION['users'] = $users;
            if($_POST['fetchuser']){
                $userdata = array(
                    'username'=>$_POST['username']
                );
                
                $res = $this->model->map_request('retrieve', 'ppms_user', $_POST, 'username', $_POST['username']);
                echo json_encode($res);exit();
            }
        }
        if( $_GET['view'] == 'ppms' ){
            $type = $_POST['userType'];
            if($type=='2'){
                 $this->current_page = 'view/transporterhome.php';
            }else{
                 $this->current_page = 'view/home.php';
            }
           
        }
        
        if( $_GET['view'] == 'logout'){
            session_destroy();
            $this->current_page = 'view/login.php';
        }
        if($_GET['view'] == 'resetpassword'){
            $u  = $this->model->map_request('retrieve','ppms_user',$_POST);
            $_SESSION['forteusers'] = $u;
            
            if($_POST['username']){
                $username = $_POST['username'];
                $pass = $_POST['password'];
                $confpass = $_POST['confirmPassword'];
                
                $data = array(
                    'password'=>$pass
                );
                
                if($pass == $confpass){
                    $u = $this->model->map_request('update','ppms_user',$data,'username',$username);
                    if($u){
                        $this->current_page = 'view/resetsuccess.php';
                    }else{
                        $this->current_page = 'view/resetfailure.php';
                    }
                }else{
                    $this->current_page = 'view/resetfailure.php';
                }
                
                
            }
        }
        if($_GET['view'] == 'login'){
            //read config/
            $exception = $this->model->map_request('retrieve','exception_setup',$_POST);
            $_SESSION['exception_setup'] = $exception;
            if($_POST['username']){
                $username = $_POST['username'];
                $password = $_POST['password'];
                //$usertype = $_POST['userType'];
//                if( $username == 'admin' && $password == 'jesus' ){
                    //forte staff
//                    $_SESSION['user'] = array(
//                        'username'=>'admin',
//                        'password'=>'admin',
//                        'sap_cust'=>'FORTE STAFF'
//                    );
//                    unset($_SESSION['login_failed']);
//                    $_SESSION['logged_in'] = 'true';
//                    $this->current_page = 'view/home.php';
                
                    $res = $this->model->map_request_mulwhere('retrieve', 'ppms_user', $_POST, array('username', 'password'), array($_POST['username'], $_POST['password']));
                    if(!empty($res)){
                        unset($_SESSION['login_failed']);
                        $_SESSION['user'] = $res[0];
                        if($_SESSION['user']['usertype'] == 'Depot Staff'){
                            if($_SESSION['user']['sap_cust'] == 'Customer Service'){
                                $users = $this->model->map_request('retrieve', 'ppms_user', $_POST, '', '');
                                $_SESSION['users'] = $users;
                               $this->current_page = 'view/userlist.php'; 
                            }else{
                               $this->current_page = 'view/home.php'; 
                            }
                            $_SESSION['logged_in'] = 'true';
                            

                        }elseif($_SESSION['user']['usertype'] == 'Transporter'){
        //                    echo 'afgaf'; exit();
                            $_SESSION['logged_in_transporter'] = 'true';
                            $this->current_page = 'view/transporterhome.php';
                        }else{
                            $_SESSION['logged_in_station'] = 'true';
                            $this->current_page = 'view/stationhome.php';
                        }
                    }else{
                        $_SESSION['login_failed'] = true;
                        $this->current_page = 'view/login.php';
                    }
                
            }
        }
        if($_GET['view'] == 'transporterdeliveries'){
            if($_POST['fetch_invoiced']){
                $res = $this->model->map_request('retrieve','invoices',$_POST,'trans_id',$_POST['trans_id']);
                echo json_encode($res);exit();
            }
        }
        if($_GET['view'] == 'transporterhome'){
            //get the list of my invoiced deliveries
            
           if($_POST['refresh']){
               $transid = $_POST['transporter'];
               $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                //get trans id.
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_TRANSPORTER_DELIVERY&_TRANSNO='.$transid);
                $result = curl_exec($ch);
                curl_close($ch);
//                $result = str_replace(" ", "", $result);
                $res = explode(":[", $result);
                $customers = explode(  '},' , $res[1] );
                $counter = count($customers);
                
                $fp = fopen('json/'.$transid.'_results.json', 'w');
                $result = trim($result);
                fwrite($fp, json_encode($result));
                fclose($fp);
                
                echo json_encode('success');
                exit();
           }
        }
        if($_GET['view'] == 'stockcountstation'){
            if($_POST['nh1']){
                $product = $_POST['product1'];
                $quantity = $_POST['quantity1'];
                $nh1 = $_POST['nh1'];
                $lh1 = $_POST['lh1'];
                $oh1 = $_POST['oh1'];
                $date1 = $_POST['date1'];
                $time1 = $_POST['time1'];
                $user = $_POST['user'];
                $insertdata = array(
                    'user_id'=>$user,
                    'product'=>$product,
                    'quantity'=>$quantity,
                    'measure1'=>$nh1,
                    'measure2'=>$lh1,
                    'measure3'=>$oh1,
                    'dateentered'=>$date1,
                    'timeentered'=>$time1
                );
                
                $res = $this->model->map_request('insert', 'inventory', $insertdata);
                if($res){
                    $this->current_page = 'view/inventorysuccess.php';
                }
            }
        }
        
        if($_GET['view'] == 'customersatisfaction'){
            $_rating = array();
            $rating = $this->model->map_request('retrieve','ratings',$_POST);
            foreach($rating as $k=>$v){
                $station = $this->model->map_request(
                        'retrieve','ppms_user',$_POST,'username',$v['user']);
                
                $v['username'] = $station[0]['sap_cust'];
                $_rating[$k] = $v;
            }
            $_SESSION['ratings'] = $_rating;
        }
        if($_GET['view'] == 'stationhome'){
            //get the inventory list of the user
            $userid = $_SESSION['user']['id'];
            $res = $this->model->map_request('retrieve','inventory',$_POST,'user_id',$userid);
            $_SESSION['inventory'] = $res;
//            if( $_POST['inventory']){
//                $user = $_POST['userid'];
//                $res = $this->model->map_request('retrieve', 'inventory', $_POST, 'user_id', $user);
//                echo json_encode($res);exit();
//                
//            }
        }
        
        if($_GET['view'] == 'userlist'){
            if($_POST['user']){
                $res = $this->model->map_request("delete", "ppms_user", $_POST, "username", $_POST['user']);
                if($res){
                    echo json_encode('success');exit();
                }else{
                    echo json_encode('failure');exit();
                }
            }
        }
        
        if($_GET['view'] == 'sapcustomers'){
            if($_POST['reset']){
                $this->model->set_query('truncate `sap_customers`');
                $result = $this->model->map_request('raw_query', 'sap_customers', $_POST);
            }
            if($_POST['loadapp']){
                $parsed = array();
                $data = file_get_contents("json/results.json");
                $parsed = json_decode($data);
                $res1 = explode(":[", $parsed);
                $res2 = explode("}", $res1[1]);
                
//                foreach($res2 as $k=>$v){
//                    $insertdata = array(
//                        'sap_cust_no'=>$v['cust_id'],
//                        'sap_cust_name'=>$v['cust_name'],
//                        'date'=>date('Y-m-d H:i:s')
//                    );
//                    $this->model->map_request('insert','sap_customers',$insertdata);                    
//                    ++$i;
//                }
                
            }
            if($_POST['customers']){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_CUSTOMERS');
                $result = curl_exec($ch);
                curl_close($ch);
//                $result = str_replace(" ", "", $result);
                $res = explode(":[", $result);
                $customers = explode(  '},' , $res[1] );
                $counter = count($customers);
                
                $fp = fopen('json/results.json', 'w');
                $result = trim($result);
                fwrite($fp, json_encode($result));
                fclose($fp);

                
//                print '<pre>';print_r($customers);print'</pre>';
//                foreach( $customers as $k=>$v){
//                    $v.='}';
//                    $value = json_decode($v);
//                    $insertdata = array(
//                        'sap_cust_no'=>$value->cust_id,
//                        'sap_cust_name'=>$value->cust_name,
//                        'date'=>date("Y:m:d H:i:s")
//                    );
//                    
//                    $this->model->map_request('insert','sap_customers',$insertdata);
//                    
//                    ++$i;
//                }
                
                
                
//                if( $i == $counter ){
//                    echo 'All SAP Customers have been migrated!';
//                }
//                elseif( $i > 0){
//                    echo 'Some SAP Customers were migrated!';
//                }
//                else{
//                    echo 'No customer was migrated';
//                }
                echo json_encode('success');
                exit();
              //  exit();
            }
        }
        
        if($_GET['view'] == 'deliveryreport'){
            if($_POST['deliveries']){
                $start = $_POST['start'];
                $end = $_POST['end'];
                
                $start = str_replace("-", "", $start);
                $end = str_replace("-", "", $end);
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_ALL_DELIVERIES&_START='.$start.'&_END='.$end);
                $result = curl_exec($ch);
                curl_close($ch);
//                $result = str_replace(" ", "", $result);
                $res = explode(":[", $result);
                $customers = explode(  '},' , $res[1] );
                $counter = count($customers);
                
                $fp = fopen('json/delivery_results.json', 'w');
                $result = trim($result);
                fwrite($fp, json_encode($result));
                fclose($fp);

            }
        }
        if($_GET['view'] == 'saptransporters'){
            
            if($_POST['loadapp']){
                $parsed = array();
                $data = file_get_contents("json/trans_results.json");
                $parsed = json_decode($data);
                $res1 = explode(":[", $parsed);
                $res2 = explode("}", $res1[1]);
                
//                foreach($res2 as $k=>$v){
//                    $insertdata = array(
//                        'sap_cust_no'=>$v['cust_id'],
//                        'sap_cust_name'=>$v['cust_name'],
//                        'date'=>date('Y-m-d H:i:s')
//                    );
//                    $this->model->map_request('insert','sap_customers',$insertdata);                    
//                    ++$i;
//                }
                
            }
            if($_POST['transporters']){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_TRANSPORTERS');
                $result = curl_exec($ch);
                curl_close($ch);
//                $result = str_replace(" ", "", $result);
                $res = explode(":[", $result);
                $customers = explode(  '},' , $res[1] );
                $counter = count($customers);
                
                $fp = fopen('json/trans_results.json', 'w');
                $result = trim($result);
                fwrite($fp, json_encode($result));
                fclose($fp);

                
//                print '<pre>';print_r($customers);print'</pre>';
//                foreach( $customers as $k=>$v){
//                    $v.='}';
//                    $value = json_decode($v);
//                    $insertdata = array(
//                        'sap_cust_no'=>$value->cust_id,
//                        'sap_cust_name'=>$value->cust_name,
//                        'date'=>date("Y:m:d H:i:s")
//                    );
//                    
//                    $this->model->map_request('insert','sap_customers',$insertdata);
//                    
//                    ++$i;
//                }
                
                
                
//                if( $i == $counter ){
//                    echo 'All SAP Customers have been migrated!';
//                }
//                elseif( $i > 0){
//                    echo 'Some SAP Customers were migrated!';
//                }
//                else{
//                    echo 'No customer was migrated';
//                }
                echo json_encode('success');
                exit();
              //  exit();
            }
        }
        
        if($_GET['view'] == 'invoices'){
            if($_POST['transff_id']){
                $deliveries = explode(',', $_POST['deliveries']);
                $amounts = explode(',',$_POST['amount']);
                $date = date("Y-m-d");
                $transid = $_POST['trans_id'];
//                $delivery = $_POST['delivery'];
//                $product = $_POST['product'];
//                $amount = $_POST['amount'];
                
                
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL,
               $this->forte_sap_url.'ZPOD_PROCESS_INVOICE&_TRANSNO='+$transid+'&DELV1='+$deliveries[0]+'&DELV2='+$deliveries[1]+'&DELV3='+$deliveries[2]+'&AMT1='+$amount[0]+'&AMT2='+$amount[1]+'&AMT3='+$amount[2]);
                $result = curl_exec($ch);
                curl_close($ch);
                
//                $data = array(
//                    'trans_id'=>$transid,
//                    'delivery'=>$delivery,
//                    'product'=>$product,
//                    'pod_date'=>$date,
//                    'amount'=>$amount,
//                    'invoice_date'=>$date
//                );
//                
//                $res = $this->model->map_request('insert','invoices',$DATA);
            }
            
            if($_POST['inv_po']){
                $transid = $_POST['trans_id'];
                $deliveries = explode(',', $_POST['deliveries']);
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                $url = $this->forte_sap_url.'ZPOD_POST_PO&_VEND='.$transid;
                for( $i=0;$i<count($deliveries);$i++){
                   $url.= '&_DEL'.($i+1).'='.$deliveries[$i];
                }
                curl_setopt($ch, CURLOPT_URL,$url);
                
                $result = curl_exec($ch);
                curl_close($ch);
                $fp = fopen('json/invoiced.json', 'w');
                $result = trim($result);
                $r = array();
                $r = json_decode($result);
                $invoice =  $r->results[0]->po_number;
                fwrite($fp, json_encode($result));
                fclose($fp);
                //INSERT INTO INVOICE TABLE
                $affected = 0;
                for($i=0;$i<count($deliveries);$i++){
                    $data = array(
                        'trans_id'=>$transid,
                        'delivery'=>$deliveries[$i],
                        'product'=>'PMS',
                        'invoice_no'=>$invoice,
                        'invoice_date'=>date('Y-m-d H:i:s')
                    );
                    $r = $this->model->map_request('insert','invoices',$data);
                    if($r){
                        ++$affected;
                    }
                }
                if ($affected == count($deliveries)){
                 echo json_encode("Invoice has been created successfully!");
                 exit();
                }
            }
        }
        
        if($_GET['view'] == 'invoicelist'){
            if($_POST['invoice']){
                $res = $this->model->map_request('retrieve','invoices',$_POST,'invoice_no',$_POST['invoice']);
                echo json_encode($res);exit();
            }
        }
        
        if($_GET['view'] == 'inventoryreport'){
            if($_POST['inventory']){
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_URL, $this->forte_sap_url.'ZPOD_GET_INVENTORY');
                $result = curl_exec($ch);
                curl_close($ch);
//                $result = str_replace(" ", "", $result);
                $res = explode(":[", $result);
                $customers = explode(  '},' , $res[1] );
                $counter = count($customers);
                
                $fp = fopen('json/inventory_results.json', 'w');
                $result = trim($result);
                fwrite($fp, json_encode($result));
                fclose($fp);
                
                echo json_encode("success");
                exit();
            }
        }
    }
    function generateRequestCode() {
            $code = rand(1000, 9999);
            return $code;
    }
    function sendSMS( $phoneno, $msg) {
        $owneremail = 'cyrilsayeh@gmail.com';
        $subacct = 'PPMS';
        $subacctpwd = 'passw0rd%%';
        $sender = 'PPMS';
        $cloudurl = "http://developers.cloudsms.com.ng/api.php?"
                . "userid=67559851"
                ."&password=Serve12345"
                ."&type=0&destination="
                .$phoneno
                ."&sender=SERVE%20LS1"
                ."&message=".urlencode($msg)."";
        
        $url = "http://www.smslive247.com/http/index.aspx?"
                . "cmd=sendquickmsg"
                . "&owneremail=" . UrlEncode($owneremail)
                . "&subacct=" . UrlEncode($subacct)
                . "&subacctpwd=" . UrlEncode($subacctpwd)
                . "&message=" . UrlEncode($msg)
                . "&sender=" . UrlEncode($sender)
                . "&sendto=" . UrlEncode($phoneno)
                . "&msgtype=" . UrlEncode(0)
        ;
//        if ($f = @fopen($url, "r")) {
        if ($f = @fopen($cloudurl, "r")) {
            $answer = fgets($f, 255);
//            echo json_encode($phoneno .'=' . $answer);
            if (substr($answer, 0, 2) == "101") {
                   return 1;
            } else {
                return 2;
            }
        } else {
           return 3; 
        }
    }
    function startsWith($haystack, $needle) {
        // search backwards starting from haystack length characters from the end
        return $needle === "" || strrpos($haystack, $needle, -strlen($haystack)) !== false;
    }

    /* endswith string function */

    function endsWith($haystack, $needle) {
        // search forward starting from end minus needle length characters
        return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== false);
    } 
        
}

  

/* Controller class instantiation */
$controller = new controller($db, $post, $get);

?> 