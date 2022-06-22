<?php
date_default_timezone_set('Africa/Cairo');
if(!file_exists('config.json')){
	$token = readline('EnTaR ToKeN BoT : ');
	$id = readline('EnTaR iD TeLe : ');
	file_put_contents('config.json', json_encode(['id'=>$id,'token'=>$token]));
	
} else {
		  $config = json_decode(file_get_contents('config.json'),1);
	$token = $config['token'];
	$id = $config['id'];
}

if(!file_exists('accounts.json')){
    file_put_contents('accounts.json',json_encode([]));
}
include 'index.php';
try {
	$callback = function ($update, $bot) {
		global $id;
		if($update != null){
		  $config = json_decode(file_get_contents('config.json'),1);
		  $config['filter'] = $config['filter'] != null ? $config['filter'] : 1;
      $accounts = json_decode(file_get_contents('accounts.json'),1);
			if(isset($update->message)){
				$message = $update->message;
				$chatId = $message->chat->id;
				$text = $message->text;
				if($chatId == $id){
					if($text == '/start'){
              $bot->sendphoto([ 'chat_id'=>$chatId,
                  'photo'=>"https://t.me/SYY767/5",
                   'caption'=>'تم البرمجة بواسطة (@JHJJJJJ) ' ,
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ها تريد تسجل وهمي ؟🦦','callback_data'=>'login']],
                          [['text'=>"المطور",'url'=>"https://t.me/JHJJJJJ"]],
                      ]
                  ])
              ]);   
          } 
if($text == '/J'){
              $bot->sendvideo([ 'chat_id'=>$chatId,
              'video'=>"https://t.me/GGGGL/3533",
              'caption'=>'هاك اتونس',
                      'reply_markup'=>json_encode([
                      'inline_keyboard'=>[                       
                       [['text'=>"اشترك بهاي القناة وياك ", 'url'=>"https://t.me/O2222222"]],
                       ]
                       ])
                       ]);
    
              $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/GGGGL/3595",
                           'caption'=>' ♻️ ',
                ]);
                      $bot->sendvoice([ 'chat_id'=>$chatId,
                  'voice'=>"https://t.me/GGGGL/3210",
              'caption'=>' ♻️ ',
             ]);
            
 }

    elseif($text != null){
          	if($config['mode'] != null){
          		$mode = $config['mode'];
          		if($mode == 'addL'){
          			$ig = new ig(['file'=>'','account'=>['useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)']]);
          			list($user,$pass) = explode(':',$text);
          			list($headers,$body) = $ig->login($user,$pass);
          			 echo $body;
          			$body = json_decode($body);
          			if(isset($body->message)){
          				if($body->message == 'challenge_required'){
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"حجي الحساب متبند لو طالب تحقق"
          					]);
          				} else {
          					$bot->sendMessage([
          							'chat_id'=>$chatId,
          							'parse_mode'=>'markdown',
          							'text'=>"اليوزر لو الباس غلط"
          					]);
          				}
          			} elseif(isset($body->logged_in_user)) {
          				$body = $body->logged_in_user;
          				preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $headers, $matches);
								  $CookieStr = "";
								  foreach($matches[1] as $item) {
								      $CookieStr .= $item."; ";
								  }
          				$account = ['cookies'=>$CookieStr,'useragent'=>'Instagram 27.0.0.7.97 Android (28\/9; 320dpi; 720x1544; OPPO; CPH2015; OP4C7D; mt6765; en_US)'];
          				
          				$accounts[$text] = $account;
          				file_put_contents('accounts.json', json_encode($accounts));
          				$mid = $config['mid'];
          				$bot->sendMessage([
          				      'parse_mode'=>'markdown',
          							'chat_id'=>$chatId,
          							'text'=>"تم حب ضفتلك وهمي جديد💣.*\n _Username_ : [$user])(instagram.com/$user)\n_Account Name_ : _{$body->full_name}_",
												'reply_to_message_id'=>$mid		
          					]);
          				$keyboard = ['inline_keyboard'=>[
										[['text'=>"♡- اضافة حساب جديد -♡",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"حذف",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'⚙️الصفحة الرئيسية⚙️','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                  'text'=>"ضلعي هنا الحسابات الي ضايفهن",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
		              $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          			}
          		}  elseif($mode == 'selectFollowers'){
          		  if(is_numeric($text)){
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>"تم التعديل.",
          		        'reply_to_message_id'=>$config['mid']
          		    ]);
          		    $config['filter'] = $text;
          		    $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"حجي هاي صفحة التحكم مالتك اي شي تريدة راسل SAJAD - @JHJJJJJ",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ها تريد اضيفلك وهمي جديد ؟😉🏻','callback_data'=>'login']],
                          [['text'=>'X- طرق السحب -X','callback_data'=>'grabber']],
                          [['text'=>'تشغيل البوت ▶️','callback_data'=>'run'],['text'=>'ايقاف البوت ⏸','callback_data'=>'stop']],
                              [['text'=>'⚠️ حالة الوهميات ⚠️','callback_data'=>'status']],
                              [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                      ]
                  ])
                  ]);
          		    $config['mode'] = null;
		              $config['mid'] = null;
		              file_put_contents('config.json', json_encode($config));
          		  } else {
          		    bot('sendMessage',[
          		        'chat_id'=>$chatId,
          		        'text'=>'- دز  رقم بس .'
          		    ]);
          		  }
          		} else {
          		  switch($config['mode']){
          		    case 'search': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php search.php');
          		      break;
          		      case 'followers': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php followers.php');
          		      break;
          		      case 'following': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php following.php');
          		      break;
          		      case 'hashtag': 
          		      $config['mode'] = null; 
          		      $config['words'] = $text;
          		      file_put_contents('config.json', json_encode($config));
          		      exec('screen -dmS gr php hashtag.php');
          		      break;
          		  }
          		}
          	}
          }
				} else {
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"حبي البوت مو مجاني البوت مدفوع اذا تريد تشترك لو تريد نسخة خاصة راسل SAJAD🤘🏻",
							'reply_markup'=>json_encode([
                  'inline_keyboard'=>[
                      [['text'=>'SAJAD 🕸','url'=>'t.me/JHJJJJJ']]
					  [['text'=>"▪️| قناة صيد المشتركين", 'url'=>"t.me/O2222222"]],
                  ]
							])
					]);
				}
			} elseif(isset($update->callback_query)) {
          $chatId = $update->callback_query->message->chat->id;
          $mid = $update->callback_query->message->message_id;
          $data = $update->callback_query->data;
          echo $data;
          if($data == 'login'){
              
        		$keyboard = ['inline_keyboard'=>[
									[['text'=>"♡- اضافة حساب جديد -♡",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"حذف",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'⚙️الصفحة الرئيسية⚙️','callback_data'=>'back']];
		              $bot->sendMessage([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                   'text'=>"	ضلعي هنا الحسابات الي ضايفهن",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          } elseif($data == 'addL'){
          	
          	$config['mode'] = 'addL';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          	$bot->sendMessage([
          			'chat_id'=>$chatId,
          			'text'=>"  دز الحساب بهذا النمط `user:pass`",
          			'parse_mode'=>'markdown'
          	]);
          } elseif($data == 'grabber'){
            
            $for = $config['for'] != null ? $config['for'] : 'اختار حساب';
            $count = count(explode("\n", file_get_contents($for)));
            $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                        [['text'=>'كلمات 🧾','callback_data'=>'search']],
                        [['text'=>'هاشتاگ #️⃣ ','callback_data'=>'hashtag'],['text'=>'اكسبلور 📷','callback_data'=>'explore']],
                        [['text'=>
'𝐹𝑂𝐿𝐿𝑂𝑊𝐸𝑅𝑆','callback_data'=>'followers'],['text'=>"𝐹𝑂𝐿𝐿𝑂𝑊𝐼𝑁𝐺",'callback_data'=>'following']],
                        [['text'=>"الحساب المحدد : $for",'callback_data'=>'for']],
                        [['text'=>'New 📤','callback_data'=>'newList'],['text'=>'Old 📥','callback_data'=>'append']],
                        [['text'=>'⚙️الصفحة الرئيسية⚙️ ','callback_data'=>'back']],
                        [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                    ]
                ])
            ]);
          } elseif($data == 'search'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"هسة دز الكلمة الي تريد تبحث عليهة وتكدر اضيف اكثر من كلمة بس خلي مسافة بينهم🚬"
            ]);
            $config['mode'] = 'search';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'followers'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"هسة دز اليوزر الي تريد تسحب منة وتكدر تخلي اكثر من يوزر بس خلي مسافة بينهم 🌀"
            ]);
            $config['mode'] = 'followers';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'following'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"هسة دز اليوزر الي تريد تسحب منة وتكدر تخلي اكثر من يوزر بس خلي مسافة بينهم 🌀"
            ]);
            $config['mode'] = 'following';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'hashtag'){
            $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"هسة دز الهاشتاگ الي تريد تستعملة بس بدون هاي # وها بس هاشتاگ واحد تكدر تستعمل ⚔️"
            ]);
            $config['mode'] = 'hashtag';
            file_put_contents('config.json', json_encode($config));
          } elseif($data == 'newList'){
            file_put_contents('a','new');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"تم اختاريتلك لستة جديدة",
							'show_alert'=>1
						]);
          } elseif($data == 'append'){ 
            file_put_contents('a', 'ap');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"تم اختاريتلك لستة قديمة",
							'show_alert'=>1
						]);
						
          } elseif($data == 'for'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'forg&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"اختار حساب",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"يمعود ضيف حساب اول شي /:",
							'show_alert'=>1
						]);
            }
          } elseif($data == 'selectFollowers'){
            bot('sendMessage',[
                'chat_id'=>$chatId,
                'text'=>'دز عدد المتابعين .'  
            ]);
            $config['mode'] = 'selectFollowers';
          	$config['mid'] = $mid;
          	file_put_contents('config.json', json_encode($config));
          } elseif($data == 'run'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'start&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"اختار حساب",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"يمعود ضيف حساب اول شي /:",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stop'){
            if(!empty($accounts)){
            $keyboard = [];
             foreach ($accounts as $account => $v) {
                $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'stop&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"اختار الحساب",
                  'reply_markup'=>json_encode($keyboard)
              ]);
            } else {
              $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"يمعود ضيف حساب اول شي /: ",
							'show_alert'=>1
						]);
            }
          }elseif($data == 'stopgr'){
            shell_exec('screen -S gr -X quit');
            $bot->answerCallbackQuery([
							'callback_query_id'=>$update->callback_query->id,
							'text'=>"Add - InstaGram @UC6.T",
							'show_alert'=>1
						]);
						$for = $config['for'] != null ? $config['for'] : 'Select Account';
            $count = count(explode("\n", file_get_contents($for)));
						$bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                       [['text'=>'كلمات 🧾','callback_data'=>'search']],
                        [['text'=>'هاشتاگ #️⃣ ','callback_data'=>'hashtag'],['text'=>'اكسبلور 📷','callback_data'=>'explore']],
                        [['text'=>
'𝐹𝑂𝐿𝐿𝑂𝑊𝐸𝑅𝑆','callback_data'=>'followers'],['text'=>"𝐹𝑂𝐿𝐿𝑂𝑊𝐼𝑁𝐺",'callback_data'=>'following']],
                        [['text'=>"الحساب المحدد : $for",'callback_data'=>'for']],
                        [['text'=>'New 📤','callback_data'=>'newList'],['text'=>'Old 📥','callback_data'=>'append']],
                        [['text'=>'⚙️الصفحة الرئيسية⚙️','callback_data'=>'back']],
                        [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                    ]
                ])
            ]);
          } elseif($data == 'explore'){
            exec('screen -dmS gr php explore.php');
          } elseif($data == 'status'){
					$status = '';
					foreach($accounts as $account => $ac){
						$c = explode(':', $account)[0];
						$x = exec('screen -S '.$c.' -Q select . ; echo $?');
						if($x == '0'){
				        $status .= "*$account* ~> _Working_\n";
				    } else {
				        $status .= "*$account* ~> _Stop_\n";
				    }
					}
					$bot->sendMessage([
							'chat_id'=>$chatId,
							'text'=>"♡- حالة الحسابات -♡ : \n\n $status",
							'parse_mode'=>'markdown'
						]);
				} elseif($data == 'back'){
          	$bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                     'text'=>"حجي هاي صفحة التحكم مالتك اي شي تريدة راسل SAJAD - @JHJJJJJ",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ها تريد اضيفلك وهمي جديد ؟😉🏻','callback_data'=>'login']],
                          [['text'=>'X- طرق السحب -X','callback_data'=>'grabber']],
                          [['text'=>'تشغيل البوت ▶️','callback_data'=>'run'],['text'=>'ايقاف البوت ⏸','callback_data'=>'stop']],
                         [['text'=>'⚠️ حالة الوهميات ⚠️','callback_data'=>'status']],
                         [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                      ]
                  ])
                  ]);
          } else {
          	$data = explode('&',$data);
          	if($data[0] == 'del'){
          		
          		unset($accounts[$data[1]]);
          		file_put_contents('accounts.json', json_encode($accounts));
              $keyboard = ['inline_keyboard'=>[
							[['text'=>"اضف حساب جديد",'callback_data'=>'addL']]
									]];
		              foreach ($accounts as $account => $v) {
		                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'ddd'],['text'=>"تسجيل الخروج",'callback_data'=>'del&'.$account]];
		              }
		              $keyboard['inline_keyboard'][] = [['text'=>'⚙️الصفحة الرئيسية⚙️','callback_data'=>'back']];
		              $bot->editMessageText([
		                  'chat_id'=>$chatId,
		                  'message_id'=>$mid,
		                    'text'=>"♡- اضافة حساب جديد -♡",
		                  'reply_markup'=>json_encode($keyboard)
		              ]);
          	}  elseif($data[0] == 'moveList'){
          	  file_put_contents('list', $data[1]);
          	  $keyboard = [];
          	  foreach ($accounts as $account => $v) {
                  $keyboard['inline_keyboard'][] = [['text'=>$account,'callback_data'=>'moveListTo&'.$account]];
              }
              $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"اختر الحساب الذي تريد نقل اللسته اليه",
                  'reply_markup'=>json_encode($keyboard)
	              ]);
          	} elseif($data[0] == 'moveListTo'){
          	  $keyboard = [];
          	  file_put_contents($data[1], file_get_contents(file_get_contents('list')));
          	  unlink(file_get_contents('list'));
          	  $keyboard['inline_keyboard'][] = [['text'=>'♻️ الصفحه الرئيسية','callback_data'=>'back']];
          	  $bot->editMessageText([
                  'chat_id'=>$chatId,
                  'message_id'=>$mid,
                  'text'=>"تم نقل اللسته الى الحساب ".$data[1],
                  'reply_markup'=>json_encode($keyboard)
	              ]);
               }  elseif($data[0] == 'forg'){
          	  $config['for'] = $data[1];
          	  file_put_contents('config.json',json_encode($config));
              $for = $config['for'] != null ? $config['for'] : 'Select';
              $count = count(file_get_contents($for));
              $bot->editMessageText([
                'chat_id'=>$chatId,
                'message_id'=>$mid,
                'text'=>"Users collection page. \n - Users : $count \n - For Account : $for",
                'reply_markup'=>json_encode([
                    'inline_keyboard'=>[
                            [['text'=>'كلمات 🧾','callback_data'=>'search']],
                        [['text'=>'هاشتاگ #️⃣ ','callback_data'=>'hashtag'],['text'=>'اكسبلور 📷','callback_data'=>'explore']],
                        [['text'=>
'𝐹𝑂𝐿𝐿𝑂𝑊𝐸𝑅𝑆','callback_data'=>'followers'],['text'=>"𝐹𝑂𝐿𝐿𝑂𝑊𝐼𝑁𝐺",'callback_data'=>'following']],
                        [['text'=>"For Account : $for",'callback_data'=>'for']],
                        [['text'=>'New 📤','callback_data'=>'newList'],['text'=>'Old 📥','callback_data'=>'append']],
                        [['text'=>'⚙️الصفحة الرئيسية⚙️','callback_data'=>'back']],
                        [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                    ]
                ])
            ]);
          	} elseif($data[0] == 'start'){
          	  file_put_contents('screen', $data[1]);
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                       'text'=>"ها حجي منورني مرة ثانية المهم اختار شتريد منجوة👇",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ها تريد اضيفلك وهمي جديد ؟😉🏻','callback_data'=>'login']],
                          [['text'=>'X- طرق السحب -X','callback_data'=>'grabber']],
                          [['text'=>'تشغيل البوت ▶️','callback_data'=>'run'],['text'=>'ايقاف البوت ⏸','callback_data'=>'stop']],
                         [['text'=>'⚠️ حالة الوهميات ⚠️','callback_data'=>'status']],
                         [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                      ]
                  ])
                  ]);
              exec('screen -dmS '.explode(':',$data[1])[0].' php start.php');
              $bot->sendMessage([
                'chat_id'=>$chatId,
                'text'=>"*بدء الفحص برعايه عمك ⊰SAJAD ~ @JHJJJJJ⊱*\n Account: `".explode(':',$data[1])[0].'`',
                'parse_mode'=>'markdown'
              ]);
          	} elseif($data[0] == 'stop'){
          	  $bot->editMessageText([
                      'chat_id'=>$chatId,
                      'message_id'=>$mid,
                      'text'=>"ها حجي منورني مرة ثانية اختاار شتريد منجوة 👇",
                  'reply_markup'=>json_encode([
                      'inline_keyboard'=>[
                          [['text'=>'ها تريد اضيفلك وهمي جديد ؟😉🏻','callback_data'=>'login']],
                          [['text'=>'X- طرق السحب -X','callback_data'=>'grabber']],
                          [['text'=>'تشغيل البوت ▶️','callback_data'=>'run'],['text'=>'ايقاف البوت ⏸','callback_data'=>'stop']],
                         [['text'=>'⚠️ حالة الوهميات ⚠️','callback_data'=>'status']],
                         [['text'=>' 𝗦𝗔𝗝𝗔𝗗','url'=>'t.me/JHJJJJJ'],['text'=>' 𝗖𝗛 ','url'=>'t.me/O2222222']],
                      ]
                    ])
                  ]);
              exec('screen -S '.explode(':',$data[1])[0].' -X quit');
          	}
          }
			}
		}
	};
	$bot = new EzTG(array('throw_telegram_errors'=>false,'token' => $token, 'callback' => $callback));
} catch(Exception $e){
	echo $e->getMessage().PHP_EOL;
	sleep(1);
}