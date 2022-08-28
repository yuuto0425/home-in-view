<?php
//reCAPTCHA
//サイトキー
//6LcdgtsgAAAAAJJlc_xiSBDv_-2FaPzllQOBXP_0
//シークレットキー
//6LcdgtsgAAAAAA_c5BbbvWVUyYj7zfYCniS51kb2
$url = 'https://www.google.com/recaptcha/api/siteverify';
$post_data = array(
  'secret' => '6LcdgtsgAAAAAA_c5BbbvWVUyYj7zfYCniS51kb2',
  'response' => $_REQUEST['g-recaptcha-response'],
  'remoteip' => $_SERVER['REMOTE_ADDR'],
);
$options = array(
  'http' => array(
    'method' => 'POST',
    'header' => 'Content-type: application/x-www-form-urlencoded',
    'content' => http_build_query($post_data),
  )
);
$context = stream_context_create($options);
$res = json_decode(file_get_contents($url, false, $context));

if($res->success == 1) {

	// 認証成功の処理
	header('Content-type: application/json');
	// PHP5.1.0以上はタイムゾーンの定義が必須
	date_default_timezone_set('Asia/Tokyo');

	// --------------------------
	// 個別設定項目（３つ）
	// 送信先メールアドレス
	$to = 'dog905469@gmail.com';
	// メールタイトル
	$subject = 'お問い合わせフォームより';
	// ドメイン（リファラチェックと送信元メールアドレスに利用）
	$domain = 'http://home-in-view.site';
	// --------------------------

	//変数初期化
	$errflg =0;    // エラー判定フラグ
	$dispmsg ='';  // 画面出力内容

	// 入力項目
	$nameval = '';   // 名前
	$mailval = '';   // メールアドレス
	$post_subject = '';    // 件名
	$textval = '';   // 内容
	$referrer = '';  // 遷移元画面

	if(isset($_POST['nameval'])){ $nameval = $_POST['nameval']; }
	if(isset($_POST['mailval'])){ $mailval = $_POST['mailval']; }
	if(isset($_POST['subject'])){ $post_subject = $_POST['subject']; }
	if(isset($_POST['textval'])){ $textval = $_POST['textval']; }
	if(isset($_POST['referrer'])){ $referrer = $_POST['referrer']; }

	if(strpos($_SERVER['HTTP_REFERER'], $domain) === false){
		// リファラチェック
		$dispmsg = '<p id="errmsg">【リファラチェックエラー】お問い合わせフォームから入力されなかったため、メール送信できませんでした。</p>';
		$errflg = 1;
	}else if($nameval == '' || $mailval == '' || $textval == ''){
		//必須チェック
		$dispmsg = '<p id="errmsg">【エラー】名前・メールアドレス・内容は必須項目です。</p>';
		$errflg = 1;
	}else if(!preg_match("/^[\.!#%&\-_0-9a-zA-Z\?\/\+]+\@[!#%&\-_0-9a-z]+(\.[!#%&\-_0-9a-z]+)+$/", $mailval) || count( explode('@',$mailval) ) !=2){
		//メールアドレスチェック
		$dispmsg .= '<p id="errmsg">【エラー】メールアドレスの形式が正しくありません。</p>';
		$errflg = 1;
	}else{
		// メールデータ作成
		$subject = "=?iso-2022-jp?B?".base64_encode(mb_convert_encoding($subject,'JIS','UTF-8'))."?=";
		$message= '名前：'.$nameval."\n";
		$message.='メール：'.$mailval."\n";
		$message.='件名：'.$post_subject."\n";
		$message.="\n――――――――――――――――――――――――――――――\n\n";
		$message.=$textval;
		$message.="\n\n――――――――――――――――――――――――――――――\n";
		$message.='送信日時：'.date( "Y/m/d (D) H:i:s", time() )."\n";
		$message.='送信元IPアドレス：'.@$_SERVER["REMOTE_ADDR"]."\n";
		$message.='送信元ホスト名：'.getHostByAddr(getenv('REMOTE_ADDR'))."\n";
		$message.='リファラURL：'.$referrer."\n";
		$message.='お問い合わせページ：'.@$_SERVER['HTTP_REFERER']."\n";
		$message= mb_convert_encoding($message,'JIS','UTF-8');
		$fromName = mb_encode_mimeheader(mb_convert_encoding($nameval,'JIS','UTF-8'));
		$header ='From: '.$fromName.'<wordpress@'.$domain.'>'."\n";
		$header.='Reply-To: '.$mailval."\n";
		$header.='Content-Type:text/plain;charset=iso-2022-jp\nX-Mailer: PHP/'.phpversion();
		// メール送信
		$retmail = mail($to,$subject,$message,$header);

		if( $retmail ){
			$dispmsg ='<p id="posted_message">お問い合わせありがとうございます。確認次第返答させていただきます。</p>';
		}else{
			$dispmsg .= '<p id="errmsg">【エラー】メール送信に失敗しました。</p>';
			$errflg = 1;
		}
	}
	$result = array('errflg'=>$errflg, 'dispmsg'=>$dispmsg, 'recaptcha' => true);
	echo json_encode( $result );

}else{
	// 認証失敗の処理
	$result = array('errflg'=>'', 'dispmsg'=>'', 'recaptcha' => false);
	echo json_encode( $result );
}


// HTMLエスケープ処理
function hsc_utf8($str) {
	return htmlspecialchars($str, ENT_QUOTES,'UTF-8');
}

?>