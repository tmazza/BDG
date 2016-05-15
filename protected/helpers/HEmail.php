<?php

class HEmail {

  /**
   *
   */
  public static function comTemplate($email,$assunto,$msg,$template='_emailBasico'){
    $content = Yii::app()->controller->renderPartial('application.views.main.'.$template,[
      'msg'=>$msg,
    ],true);
    Yii::app()->ses->sendEmail($email,$assunto,$content);
  }

  /**
   *
   */
  public static function templateSimples($email,$assunto,$msg){
    Yii::app()->ses->mailer->AddEmbeddedImage(Yii::getPathOfAlias('application').'/webroot/images/logo.png', 'logo');
    self::comTemplate($email,$assunto,$msg);
  }


  public static function toAdmin($msg,$assunto='Email automático'){
    self::templateSimples(Yii::app()->params['adminEmail'],$assunto,$msg);
  }


}
