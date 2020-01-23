<? 
//error_reporting(0);
require_once 'fbConfig.php';
require_once 'User.php'; 

$conn = mysqli_connect("HKST","LGNDB","PASS","DBF");

if(isset($accessToken)){
    if(isset($_SESSION['facebook_access_token'])){
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }else{
        // Put short-lived access token in session
        $_SESSION['facebook_access_token'] = (string) $accessToken;
        
          // OAuth 2.0 client handler helps to manage access tokens
        $oAuth2Client = $fb->getOAuth2Client();
        
        // Exchanges a short-lived access token for a long-lived one
        $longLivedAccessToken = $oAuth2Client->getLongLivedAccessToken($_SESSION['facebook_access_token']);
        $_SESSION['facebook_access_token'] = (string) $longLivedAccessToken;
        
        // Set default access token to be used in script
        $fb->setDefaultAccessToken($_SESSION['facebook_access_token']);
    }
    
    // Redirect the user back to the same page if url has "code" parameter in query string
    if(isset($_GET['code'])){
        header('Location: https://winterbets.pl/game/');
    }
    
    // Getting user facebook profile info
    try {
        $profileRequest = $fb->get('/me?fields=name,first_name,last_name,email,picture.width(320)');
        $fbUserProfile = $profileRequest->getGraphNode()->asArray();
    } catch(FacebookResponseException $e) {
        echo 'Graph returned an error: ' . $e->getMessage();
        session_destroy();
        // Redirect user back to app login page
        header("Location: ./");
        exit;
    } catch(FacebookSDKException $e) {
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
	
	// Initialize User class
    $user = new User();
    
    // Insert or update user data to the database
    $fbUserData = array(
        'oauth_provider'=> 'facebook',
        'oauth_uid'     => $fbUserProfile['id'],
        'first_name'    => $fbUserProfile['first_name'],
        'last_name'     => $fbUserProfile['last_name'],
        'email'         => $fbUserProfile['email'],
        'picture'       => $fbUserProfile['picture']['url'],
    );
    $userData = $user->checkUser($fbUserData);
    
    // Put user data into session
    $_SESSION['userData'] = $userData;
    
    // Get logout url
    $logoutURL = $helper->getLogoutUrl($accessToken, $redirectURL.'logout.php');
    
    // Render facebook profile data
    if(!empty($userData)){
   
  
    }else{
        $output = '<h3 style="color:red">Some problem occurred, please try again.</h3>';
    }
    
}else{
    // Get login url
    $loginURL = $helper->getLoginUrl($redirectURL, $fbPermissions);
    
    // Render facebook login button
	$output_nologin = '<center>Dostęp do tego miejsca wymaga zalogowania się:<br> <a href="'.$loginURL.'"><img src="fblogin-btn.png"></a></center>';
//echo "<script>window.top.location.href = \"$loginURL\";</script>";
}

$isadm = $userData['admin'];

 function admin_console($txt,$isadm){
	 if($isadm == 1){
		 echo $txt;
	 }
 }
 
 
//////////////////////Sumy kontrolne naprawy baz danych etc.////////////////////////////////////////
	$ustQuery = "SELECT * FROM `users_ust` WHERE `ussid` = '".$userData['id']."'";
	$ustResult = mysqli_query($conn, $ustQuery);
	
	$credQuery = "SELECT * FROM `users_credits` WHERE `ussid` = '".$userData['id']."'";
	$credResult = mysqli_query($conn, $credQuery);

	$ranksQuery = "SELECT * FROM `ranks_sk` WHERE `ussid` = '".$userData['id']."'";
	$ranksResult = mysqli_query($conn, $ranksQuery);


	if($ustResult->num_rows == 0 AND $userData['id'] == NULL){
			// Insert user data config
                $query_ust = "INSERT INTO `users_ust` (`ussid`, `opis`, `lang`, `hide`) VALUES ('".$userData['id']."', 'brak opisu', '1',  '0')";
				$insert_ust = mysqli_query($conn, $query_ust);
				admin_console(" ust num row = 0 ",$isadm);
			}else{
				admin_console(" ust num row = 1 ",$isadm);
			}
			
	if($credResult->num_rows == 0 AND $userData['id'] == NULL){
			// Insert user data config
                $query_cred = "INSERT INTO `users_credits` (`ussid`, `credits`, `auto_wybor`)  VALUES ('".$userData['id']."', '0', '0')";
				$insert_cred = mysqli_query($conn, $query_cred);
				admin_console(" cred num row = 0 ",$isadm);
			}	else{
				admin_console(" cred num row = 1 ",$isadm);
			}

	if($ranksResult->num_rows == 0 AND $userData['id'] == NULL){
			// Insert user data config
                $query_ranks = "INSERT INTO `ranks_sk` (`ussid`,`nation`) VALUES ('".$userData['id']."','".$userData['nation']."')";
				$insert_ranks = mysqli_query($conn, $query_ranks);
				admin_console(" Rank num row = 0 ",$isadm);
			}else{
			admin_console(" Rank num row = 1 ",$isadm);}				
//////////////////////////////////////////////////////////////////////////////////////////////////////


///////////CHAT FUNKCJE//////////////////
	if ($_GET['usun_chat'] != NULL){
				$id_msg = $_GET['usun_chat'];
				$query_dlt = mysqli_query($conn,"DELETE FROM `messages` WHERE `messages`.`id` = $id_msg");
			}
////////////////////////////////////////



function plik_wczytaj($d1,$g1,$u1){
	
$_GET['konk'] = $g1;
$_GET['dysc'] = $d1;
$_GET['ussid'] = $u1;

include "typer_$d1.php";
	
}

function admin_wczytaj($d1,$u1){
	
$_GET['pnl'] = $g1;
$_GET['ussid'] = $u1;

include "admin_$d1.php";
	
}

$global_ust = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM `global_settings`"));

?>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="icon" href="logo.png" />

<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=OpenSans-Light" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">

<link rel="stylesheet" id="animate-css" href="animate.css" type="text/css" media="all"/>
<link rel="stylesheet" id="fontawesome-font-css" href="font-awesome.min.css" type="text/css" media="all"/>
<link rel="stylesheet" id="accesspress-mag-style-css" href="style.css" type="text/css" media="all"/>
<link rel="stylesheet" id="responsive-css" href="responsive.css" type="text/css" media="all"/>


<style id="accesspress-mag-style-inline-css" type="text/css">

                    .ticker-title,
                    .big-image-overlay i,
                    #back-top:hover,
                    .bread-you,
                    .entry-meta .post-categories li a,
                    .error404 .error-num .num,
                    .navigation .nav-links a:hover,
                    .bttn:hover,
                    button,
                    input[type="button"]:hover,
                    input[type="reset"]:hover,
                    input[type="submit"]:hover{
					   background: #dc3522;
					}
                    #site-navigation ul li:hover > a,
                    #site-navigation ul li.current-menu-item > a,
                    #site-navigation ul li.current-menu-ancestor > a,
                    .search-icon > i:hover,
                    .block-poston a:hover,
                    .block-post-wrapper .post-title a:hover,
                    .random-posts-wrapper .post-title a:hover,
                    .sidebar-posts-wrapper .post-title a:hover,
                    .review-posts-wrapper .single-review .post-title a:hover,
                    .latest-single-post a:hover,
                    #top-navigation .menu li a:hover,
                    #top-navigation .menu li.current-menu-item > a,
                    #top-navigation .menu li.current-menu-ancestor > a,
                    #footer-navigation ul li a:hover,
                    #footer-navigation ul li.current-menu-item > a,
                    #footer-navigation ul li.current-menu-ancestor > a,
                    #top-right-navigation .menu li a:hover,
                    #top-right-navigation .menu li.current-menu-item > a,
                    #top-right-navigation .menu li.current-menu-ancestor > a,
                    #accesspres-mag-breadcrumbs .ak-container > .current,
                    .entry-footer a:hover,
                    .oops,
                    .error404 .not_found,
                    #cancel-comment-reply-link:before,
                    #cancel-comment-reply-link{
                        color: #dc3522;
                    }
                    #site-navigation ul.menu > li:hover > a:after,
                    #site-navigation ul.menu > li.current-menu-item > a:after,
                    #site-navigation ul.menu > li.current-menu-ancestor > a:after,
                    #site-navigation ul.sub-menu li:hover,
                    #site-navigation ul.sub-menu li.current-menu-item,
                    #site-navigation ul.sub-menu li.current-menu-ancestor,
                    .navigation .nav-links a,
                    .bttn,
                    button, input[type="button"],
                    input[type="reset"],
                    input[type="submit"]{
                        border-color: #dc3522;
                    }
                    .ticker-title:before,
                    .bread-you:after{
					   border-left-color: #dc3522;
					}
</style>

<style>
.divTable9{
	display: table;
	width: 100%;
}
.divTableRow9 {
	display: table-row;
}
.divTableHeading9 {
	background-color: #EEE;
	display: table-header-group;
}
.divTableCell9, .divTableHead9 {
	border: 0px solid #999999;
	display: table-cell;
	padding: 3px 10px;
	vertical-align: middle;
	
}
.divTableHeading9 {
	background-color: #EEE;
	display: table-header-group;
	font-weight: bold;
}
.divTableFoot9 {
	background-color: #EEE;
	display: table-footer-group;
	font-weight: bold;
}
.divTableBody9 {
	display: table-row-group;
}
</style>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>
	$(document).ready(function(){
		$(document).on('submit', '#chatForm', function(){
			var text = $.trim($("#text_chat").val());
			var name = $.trim($("#user_name").val());
			var user_id = $.trim($("#user_id").val());
			
			if(text != "" && name != "") {
				$.post('ChatPoster.php', {text_chat: text, user_name: name, user_id: user_id}, function(data){
					$(".chatMessages").append(data);
					
					$(".chatMessages").scrollTop($(".chatMessages")[0].scrollHeight);
					$("#text_chat").val('');
				});
			} else {
				alert("Musisz wpisac wiadomość!");
			}
		});



		function getMessages() {
			$.get(<? echo "'GetMessages.php?ussid=".$userData['id']."'";?>, function(data){
				var amount = $(".chatMessages li:last-child").attr('id');
				$(".chatMessages").html(data);
				var countMsg = data.split('<li').length - 1;
				array = [countMsg, amount];
			});
			return array;
		}


		setInterval(function(){
		var num =	getMessages();
		if(num[0] > num[1]) {
				$(".chatMessages").scrollTop($(".chatMessages")[0].scrollHeight);
		}
	},1500);


	});
</script>

<script charset='UTF-8' src='https://winterbets.push-ad.com/integration.php' async></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-102921141-4"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-102921141-4');
</script>
<script data-ad-client="ca-pub-4050047055641922" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<title>Winter Bets – obstawiaj sporty zimowe online!</title>
</head>