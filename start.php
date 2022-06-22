<?php
date_default_timezone_set('Africa/Cairo');
$config = json_decode(file_get_contents('config.json'),1);
$id = $config['id'];
$token = $config['token'];
$config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
$screen = file_get_contents('screen');
exec('kill -9 ' . file_get_contents($screen . 'pid'));
file_put_contents($screen . 'pid', getmypid());
include 'index.php';
$accounts = json_decode(file_get_contents('accounts.json') , 1);
$cookies = $accounts[$screen]['cookies'] . $accounts[$screen]['sessionid'];
$useragent = $accounts[$screen]['useragent'];
$users = explode("\n", file_get_contents($screen));
$uu = explode(':', $screen) [0];
$se = 100;
$i = 0;
$gmail = 0;
$hotmail = 0;
$yahoo = 0;
$mailru = 0;
$aol = 0;
$gmx = 0;
$protonmail = 0;
$AB1 = 0;
$true = 0;
$false = 0;
$NotBussines = 0;
function verfmatch($email){
    $check_mail = inInsta($email);
    if ($check_mail !== false) {
   if(strstr($email,"@gmail.com")){
     $ban = check_ban($email);
      if($ban == "Yes"){
         return "Good";
          }
      }else{
    return "Good";
      }
    }else{
     print_r($check_mail);
    }
  }
$edit = bot('sendMessage',[
    'chat_id'=>$id,
    'text'=>"قلبي بده الفحص 🦦❤️
	روح نام او شوفلك شغله سويهه على ما اصيدلك حساب مرتب مثلك -.- ",
    'parse_mode'=>'markdown',
    'reply_markup'=>json_encode([
            'inline_keyboard'=>[
                [['text'=>'Checked : '.$i,'callback_data'=>'fgf']],
                [['text'=>'User : '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'Email : '.$mail,'callback_data'=>'ghj']],
                [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'MailRu : '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
			    [['text'=>"Aol : $aol",'callback_data'=>'fgjjjvf'],['text'=>"Gmx : $gmx",'callback_data'=>'gdfgfd']],
				[['text'=>"Protonmail : $protonmail",'callback_data'=>'fgd'],['text'=>"SAJAD : $AB1",'callback_data'=>'fgd']],
                [['text'=>'Available : '.$true,'callback_data'=>'gj'],['text'=>'Unavailable : '.$false,'callback_data'=>'dghkf']],
                [['text'=>'NotBusiness : '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'Business : '.$false,'callback_data'=>'dghkf']],
            ]
        ])
]);
$se = 100;
$editAfter = 1;
foreach ($users as $user) {
    $info = getInfo($user, $cookies, $useragent);
    if ($info != false and !is_string($info)) {
        $mail = trim($info['mail']);
        $usern = $info['user'];
        $e = explode('@', $mail);
               if (preg_match('/(hotmail|outlook|yahoo|Yahoo|yAhoo|aol|aOl|Aol|gmX|gMx|Gmx|protonmail|mail)\.(.*)|(gmail)\.(com)|(mail|bk|yandex|inbox|list)\.(ru)/i', $mail,$m)) {
            echo 'check ' . $mail . PHP_EOL;
                    if(checkMail($mail)){
                        $inInsta = verfmatch($mail);
                        if ($inInsta == "Good") {
                            // if($config['filter'] <= $follow){
                                echo "True - $user - " . $mail . "\n";
                                if(strpos($mail, 'gmail.com')){
                                    $gmail += 1;
                                } elseif(strpos($mail, 'hotmail.') or strpos($mail,'outlook.')){
                                    $hotmail += 1;
                                } elseif(strpos($mail, 'yahoo')){
                                    $yahoo += 1;
                                } elseif(strpos($mail, 'aol')){
                                    $aol += 1;
                                } elseif(strpos($mail, 'gmx')){
                                    $gmx += 1;
								}  elseif(strpos($mail, 'protonmail')){
                                    $protonmail += 1;
                                } elseif(strpos($mail, 'gmx')){
                                    $gmx += 1;
								}  elseif(strpos($mail, 'protonmail')){
                                    $protonmail += 1;
								}  elseif(strpos($mail, 'mail')){
                                    $AB1 += 1;
                                } elseif(preg_match('/(mail|bk|yandex|inbox|list)\.(ru)/i', $mail)){
                                    $mailru += 1;
                                }
                                $follow = $info['f'];
                                $following = $info['ff'];
                                $media = $info['m'];
                                bot('sendMessage', ['disable_web_page_preview' => true, 'chat_id' => $id, 'text' => " • 💻مطور البوت @JHJJJJJ   \n------------𝑥---------------𝑥-----------\n • 🏷𝚄𝚂𝙴𝚁 : [$usern](instagram.com/$usern) 🔥🧿
 • 📧𝙴𝙼𝙰𝙸𝙻 : [$mail] 🔥🧿
 • 📟𝙵𝙾𝙻𝙻𝙾𝚆𝙴𝚁𝚂 : $follow 🔥🧿
 • 🧮𝙵𝙾𝙻𝙻𝙾𝚆𝙸𝙽𝙶 : $following 🔥🧿
 • 🖼️𝙿𝙾𝚂𝚃 : $media 🔥🧿 \n------------𝑥---------------𝑥-----------\n • ༒ 𝚃𝙴𝙻𝙴 : @JHJJJJJ  ➺ 𝙲𝙷 : @O2222222 > ",
                                
                                'parse_mode'=>'markdown']);
                                
                                bot('editMessageReplyMarkup',[
                                    'chat_id'=>$id,
                                    'message_id'=>$edit->result->message_id,
                                    'reply_markup'=>json_encode([
                                        'inline_keyboard'=>[
                                            [['text'=>'Checked : '.$i,'callback_data'=>'fgf']],
                                            [['text'=>'User : '.$user,'callback_data'=>'fgdfg']],
											[['text'=>'Email : '.$mail,'callback_data'=>'ghj']],
                                            [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                                            [['text'=>'MailRu: '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
			                             	[['text'=>"Aol : $aol",'callback_data'=>'fgjjjvf'],['text'=>"Gmx : $gmx",'callback_data'=>'gdfgfd']],
				                            [['text'=>"Protonmail : $protonmail",'callback_data'=>'fgd'],['text'=>"SAJAD : $AB1",'callback_data'=>'fgd']],
                                            [['text'=>'Available : '.$true,'callback_data'=>'gj'],['text'=>'UnAvailable : '.$false,'callback_data'=>'dghkf']],
                                            [['text'=>'NotBusiness : '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'Business : '.$false,'callback_data'=>'dghkf']],
                                        ]
                                    ])
                                ]);
                                $true += 1;
                            // } else {
                            //     echo "Filter , ".$mail.PHP_EOL;
                            // }
                            
                        } else {
                          echo "No Rest $mail\n";
                        }
                    } else {
                        $false +=1;
                        echo "Not Vaild 2 - $mail\n";
                    }
        } else {
          echo "BlackList - $mail\n";
        }
    }elseif(is_string($info)){
        bot('sendMessage',[
            'chat_id'=>$id,
            'text'=>"الحساب - `$screen`\n تم حظره من *الفحص*.",
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                        [['text'=>'نقل اللستة الى حساب ثاني','callback_data'=>"moveList&$screen"]],
                        [['text'=>'حذف الحساب','callback_data'=>'del&'.$screen]]
                    ]    
            ]),
            'parse_mode'=>'markdown'
        ]);
        exit;
    } else {
         $NotBussines +=1;
        echo "NotBussines - $user\n";
    }
    usleep(950000);
    $i++;
    file_put_contents($screen, str_replace($user, '', file_get_contents($screen)));
    file_put_contents($screen, preg_replace("/(^[\r\n]*|[\r\n]+)[\s\t]*[\r\n]+/", "", file_get_contents($screen)));
    if($i == $editAfter){
        bot('editMessageReplyMarkup',[
            'chat_id'=>$id,
            'message_id'=>$edit->result->message_id,
            'reply_markup'=>json_encode([
                'inline_keyboard'=>[
                    [['text'=>'Checked : '.$i,'callback_data'=>'fgf']],
                [['text'=>'User : '.$user,'callback_data'=>'fgdfg']],
                [['text'=>'Email : '.$mail,'callback_data'=>'ghj']],
                [['text'=>"Gmail : $gmail",'callback_data'=>'dfgfd'],['text'=>"Yahoo : $yahoo",'callback_data'=>'gdfgfd']],
                [['text'=>'MailRu : '.$mailru,'callback_data'=>'fgd'],['text'=>'Hotmail : '.$hotmail,'callback_data'=>'ghj']],
			    [['text'=>"Aol : $aol",'callback_data'=>'fgjjjvf'],['text'=>"Gmx : $gmx",'callback_data'=>'gdfgfd']],
				[['text'=>"Protonmail : $protonmail",'callback_data'=>'fgd'],['text'=>"SAJAD : $AB1",'callback_data'=>'fgd']],
                [['text'=>'Available : '.$true,'callback_data'=>'gj'],['text'=>'Unavailable : '.$false,'callback_data'=>'dghkf']],
                [['text'=>'NotBusiness : '.$NotBussines,'callback_data'=>'dgdge'],['text'=>'Business : '.$false,'callback_data'=>'dghkf']],
                ]
            ])
        ]);
        $editAfter += 1;
    }
}
bot('sendMessage', ['chat_id' => $id, 'text' =>"Stop Checking : ".explode(':',$screen)[0]]);

