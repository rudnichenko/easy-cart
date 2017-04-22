<?php
session_start();
if (empty($_POST['phone']) || empty($_POST['email'])) {
 echo 1;
  
} 
else { 
  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $visitor_email = $_POST['email'];
  $adress = $_POST['adress'];
  $item = $_POST['item'];

  $email_from = 'order@bingogo.com.ua';
  $email_subject = "Новый заказ с bingogo.com.ua";
  $email_subject2 = "Спасибо за заказ с bingogo.com.ua! Ожидайте звонка";
  $email_body = "Детали клиента:\nИмя: $name\nНомер телефона: $phone\nEmail: $visitor_email\nАдрес: $adress\nХочет заказать: $item\n"."Обработайте заказ";

  $message = '
  						<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
  <html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><meta name="viewport" content="initial-scale=1.0"><meta name="format-detection" content="telephone=no"><title>Подтверждение заказа bingogo.com.ua</title><style type="text/css">.socialLinks {font-size: 6px;}
  .socialLinks a {display: inline-block;}
  .socialIcon {display: inline-block;vertical-align: top;padding-bottom: 0px;border-radius: 100%;}
  table.vb-row, table.vb-content {border-collapse: separate;}
  table.vb-row {border-spacing: 9px;}
  table.vb-row.halfpad {border-spacing: 0;padding-left: 9px;padding-right: 9px;}
  table.vb-row.fullwidth {border-spacing: 0;padding: 0;}
  table.vb-container.fullwidth {padding-left: 0;padding-right: 0;}</style><style type="text/css">
      /* yahoo, hotmail */
      .ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font, .ExternalClass td, .ExternalClass div{ line-height: 100%; }
      .yshortcuts a{ border-bottom: none !important; }
      .vb-outer{ min-width: 0 !important; }
      .RMsgBdy, .ExternalClass{
        width: 100%;
        background-color: #3f3f3f;
        background-color: #3f3f3f}

      /* outlook */
      table{ mso-table-rspace: 0pt; mso-table-lspace: 0pt; }
      #outlook a{ padding: 0; }
      img{ outline: none; text-decoration: none; border: none; -ms-interpolation-mode: bicubic; }
      a img{ border: none; }

      @media screen and (max-device-width: 600px), screen and (max-width: 600px) {
        table.vb-container, table.vb-row{
          width: 95% !important;
        }

        .mobile-hide{ display: none !important; }
        .mobile-textcenter{ text-align: center !important; }

        .mobile-full{
          float: none !important;
          width: 100% !important;
          max-width: none !important;
          padding-right: 0 !important;
          padding-left: 0 !important;
        }
        img.mobile-full{
          width: 100% !important;
          max-width: none !important;
          height: auto !important;
        }   
      }
    </style><style type="text/css">#ko_textBlock_8 .links-color a, #ko_textBlock_8 .links-color a:link, #ko_textBlock_8 .links-color a:visited, #ko_textBlock_8 .links-color a:hover {color: #3f3f3f;color: #3f3f3f;text-decoration: underline;}
  #ko_textBlock_11 .links-color a, #ko_textBlock_11 .links-color a:link, #ko_textBlock_11 .links-color a:visited, #ko_textBlock_11 .links-color a:hover {color: #3f3f3f;color: #3f3f3f;text-decoration: underline;}
  #ko_footerBlock_2 .links-color a, #ko_footerBlock_2 .links-color a:link, #ko_footerBlock_2 .links-color a:visited, #ko_footerBlock_2 .links-color a:hover {color: #ccc;color: #ccc;text-decoration: underline;}</style></head><body bgcolor="#3f3f3f" text="#919191" alink="#cccccc" vlink="#cccccc" style="margin: 0;padding: 0;background-color: #3f3f3f;color: #919191;">

    <center>

    <table class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_logoBlock_5"><tbody><tr><td class="vb-outer" align="center" valign="top" bgcolor="#bfbfbf" style="padding-left: 9px;padding-right: 9px;background-color: #bfbfbf;">

  <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
          <div class="oldwebkit" style="max-width: 570px;">
          <table width="570" style="border-collapse: separate;border-spacing: 18px;padding-left: 0;padding-right: 0;width: 100%;max-width: 570px;" border="0" cellpadding="0" cellspacing="18" class="vb-container fullpad"><tbody><tr><td valign="top" align="center">

  <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="350"><tr><td align="center" valign="top"><![endif]-->
  <div class="mobile-full" style="display: inline-block; max-width: 350px; vertical-align: top; width: 100%;"> 
                      <img width="350" vspace="0" hspace="0" border="0" alt="" style="border: 0px;display: block;width: 100%;max-width: 350px;" src="http://bingogo.com.ua/letters/letter-first/logo_350x150.png"></div>
  <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->

              </td>
            </tr></tbody></table></div>
  <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->

        </td>
      </tr></tbody></table><table class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_titleBlock_9"><tbody><tr><td class="vb-outer" align="center" valign="top" bgcolor="#bfbfbf" style="padding-left: 9px;padding-right: 9px;background-color: #bfbfbf;">

  <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
          <div class="oldwebkit" style="max-width: 570px;">
          <table width="570" border="0" cellpadding="0" cellspacing="9" class="vb-container halfpad" bgcolor="#ffffff" style="border-collapse: separate;border-spacing: 9px;padding-left: 9px;padding-right: 9px;width: 100%;max-width: 570px;background-color: #fff;"><tbody><tr><td bgcolor="#ffffff" align="center" style="background-color: #ffffff; font-size: 22px; font-family: Arial, Helvetica, sans-serif; color: #3f3f3f; text-align: center;">
                <span><strong>Поздравляем Вас!</strong></span>
              </td>
            </tr></tbody></table></div>
  <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
        </td>
      </tr></tbody></table><table class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_textBlock_8"><tbody><tr><td class="vb-outer" align="center" valign="top" bgcolor="#bfbfbf" style="padding-left: 9px;padding-right: 9px;background-color: #bfbfbf;">

  <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
          <div class="oldwebkit" style="max-width: 570px;">
          <table width="570" border="0" cellpadding="0" cellspacing="18" class="vb-container fullpad" bgcolor="#ffffff" style="border-collapse: separate;border-spacing: 18px;padding-left: 0;padding-right: 0;width: 100%;max-width: 570px;background-color: #fff;"><tbody><tr><td align="left" class="long-text links-color" style="text-align: left; font-size: 14px; font-family: Arial, Helvetica, sans-serif; color: #3f3f3f;"><p style="margin: 1em 0px;margin-top: 0px;">Ваша фортуна привела в заветное online-пространство – сайт bingogo.com.ua, где можно получить шанс забрать 350 000 грн и другие ценные призы.<br></p><p style="margin: 1em 0px;">Бланк затребования приза и подтверждающий заказ от Вас успешно получены.</p><p style="margin: 1em 0px;">Чтобы Вы получили выбранные товары как можно раньше, наш менеджер свяжется с Вами в течении суток.</p><p style="margin: 1em 0px;margin-bottom: 0px;">После совершения оплаты заказа на Ваш e-mail будет отправлен Сертификат затребования приза.</p></td>
            </tr></tbody></table></div>
  <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
        </td>
      </tr></tbody></table><table class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_textBlock_11"><tbody><tr><td class="vb-outer" align="center" valign="top" bgcolor="#bfbfbf" style="padding-left: 9px;padding-right: 9px;background-color: #bfbfbf;">

  <!--[if (gte mso 9)|(lte ie 8)]><table align="center" border="0" cellspacing="0" cellpadding="0" width="570"><tr><td align="center" valign="top"><![endif]-->
          <div class="oldwebkit" style="max-width: 570px;">
          <table width="570" border="0" cellpadding="0" cellspacing="18" class="vb-container fullpad" bgcolor="#ffffff" style="border-collapse: separate;border-spacing: 18px;padding-left: 0;padding-right: 0;width: 100%;max-width: 570px;background-color: #fff;"><tbody><tr><td align="left" class="long-text links-color" style="text-align: left; font-size: 13px; font-family: Arial, Helvetica, sans-serif; color: #3f3f3f;"><p style="margin: 1em 0px;margin-bottom: 0px;margin-top: 0px;text-align: right;" data-mce-style="text-align: right;"><strong>bingogo.com.ua</strong></p></td>
            </tr></tbody></table></div>
  <!--[if (gte mso 9)|(lte ie 8)]></td></tr></table><![endif]-->
        </td>
      </tr></tbody></table><table class="vb-outer" width="100%" cellpadding="0" border="0" cellspacing="0" bgcolor="#bfbfbf" style="background-color: #bfbfbf;" id="ko_spacerBlock_7"><tbody><tr><td class="vb-outer" valign="top" align="center" bgcolor="#bfbfbf" height="24" style="padding-left: 9px;padding-right: 9px;height: 24px;background-color: #bfbfbf;font-size: 1px;line-height: 1px;"> </td>
      </tr></tbody></table></center>
  </body></html>
  						';

  $to = "order@bingogo.com.ua";
  $headers = "From: $email_from \r\n";
  $headers .= "Reply-To: $visitor_email \r\n";

  mail($to,$email_subject,$email_body,$headers);

  $headers2[] = 'MIME-Version: 1.0';
  $headers2[] = 'Content-type: text/html; charset=UTF-8';
  $headers2[] = "From: BingoGo <$email_from>";

  mail($visitor_email, $email_subject2, $message, implode("\r\n", $headers2));

  // header('Location: index.html');

  $name = stripslashes(htmlspecialchars($_POST['name']));
  $phone = stripslashes(htmlspecialchars($_POST['phone']));
  $pass = stripslashes(htmlspecialchars($_POST['passText']));
  $curl = curl_init();

  curl_setopt($curl, CURLOPT_URL, 'https://prize-patrol.leadvertex.ru/api/admin/getOrdersIdsByCondition.html?token=gnYa4TazPWbm&phone='.$phone);
  curl_setopt($curl, CURLOPT_POST, true);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
  $out = curl_exec($curl);
  curl_close($curl);
    if (strlen($out) > 2){
      echo 2;
    }
    else {
    $name = stripslashes(htmlspecialchars($_POST['name']));
    $phone = stripslashes(htmlspecialchars($_POST['phone']));
    $email = stripslashes(htmlspecialchars($_POST['email']));
$data = array(
  'fio' => $name,
  'phone' => $phone,
  'email' => $email,
  'additional1' => $item,
  'domain'          => $_SERVER['SERVER_NAME'],  // сайт отправляющий запрос
  'referer'          => $_SESSION['utms']['referer'],  // сайт отправляющий запрос
  'ip'              => $_SERVER['REMOTE_ADDR'],  // IP адрес покупателя
  'utm_source'      => $_SESSION['utms']['utm_source'],  // utm_source
  'additional15'    => $_SESSION['utms']['clickid'],  // utm_source
  'utm_medium'      => $_SESSION['utms']['utm_medium'],  // utm_medium
  'utm_content'     => $_SESSION['utms']['utm_content'], // utm_content
  'utm_campaign'    => $_SESSION['utms']['utm_campaign'], // utm_campaign
  'comment'         => $_SESSION['utms']['utm_campaign'] // utm_campaign
);
// echo $email;
// var_dump($data);
$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'https://prize-patrol.leadvertex.ru/api/admin/addOrder.html?token=gnYa4TazPWbm');
curl_setopt($curl, CURLOPT_POST, true);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
$out = curl_exec($curl);
curl_close($curl);  
echo 4;   
    }
}
?>