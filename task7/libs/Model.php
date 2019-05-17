<?php 

class Model
{  private $html_value;
   private $html_select;
   public function __construct()
   {
   	/*$this->html_value = array(
   	'%NAME_STYLE%'=>'',
   	'%NAME_ERROR%'=>'',
      '%NAME_VALUE%'=>'',
      '%EMAIL_STYLE%'=>'',
      '%EMAIL_ERROR%'=>'',
      '%EMAIL_VALUE%'=>'',
      '%SUBJECT_STYLE%'=>'',
      '%SUBJECT_ERROR%'=>'',
      '%MESSAGE_STYLE%'=>'', 
      '%MESSAGE_ERROR%'=>'', 
      '%MESSAGE_VALUE%'=>'',
      '%MAIL%'=>''
      );*/
      $this->html_value = unserialize (HTML_VALUE);	
      $this->html_select = unserialize (SELECT);
      $this->create_select(0);
   }
   function create_select($n)
   {
      $ss='';
      for($i=0;$i<count($this->html_select);$i++ )
      {
         $ss.='<option ';
         if ($i == $n) {$ss.=' selected ' ;}
         $ss.=' value="'.$i.'">'.$this->html_select[$i].'</option>'."\n";
      }
      $this->html_value['%SELECT%']=$ss;

   }
   	
	public function getArray()
   {	
      //var_dump($this->html_value);    
      return $this->html_value; 	
   }
	
	public function checkForm()
   {  
      $this->html_value['%NAME_VALUE%']=$_POST['name']; //echo $_POST[name];
      $this->html_value['%EMAIL_VALUE%']=$_POST['email'];
      $this->html_value['%SUBJECT_VALUE%']=$_POST['typemessage'];
      $this->html_value['%MESSAGE_VALUE%']=$_POST['message'];
      $this->create_select($_POST[typemessage]);
      $check = true;

      if (strlen($this->html_value['%NAME_VALUE%'])<2)
      {
         $check = false;
         $this->html_value['%NAME_STYLE%']=STYLE_ERROR;
         $this->html_value['%NAME_ERROR%']='Поле должно бить заполнено !';
      }
      if (!filter_var($this->html_value['%EMAIL_VALUE%'], FILTER_VALIDATE_EMAIL))
      {
         $check = false; 
         $this->html_value['%EMAIL_STYLE%']=STYLE_ERROR;
         $this->html_value['%EMAIL_ERROR%']='Введите коректный email !';
      }
      if ($this->html_value['%SUBJECT_VALUE%']==0)
      {
         $check = false;
         $this->html_value['%SUBJECT_STYLE%']=STYLE_ERROR;
         $this->html_value['%SUBJECT_ERROR%']='Выберите тему !';
      }
      if (strlen($this->html_value['%MESSAGE_VALUE%'])<2)
      {
         $check = false;
         $this->html_value['%MESSAGE_STYLE%']=STYLE_ERROR;
         $this->html_value['%MESSAGE_ERROR%']='Поле должно бить заполнено !';
      }

		return $check;			
	}
   
	public function sendEmail()
	{
      $textmail .= "ФИО: " . $_POST['name'] . "\r\n" .
            "Мail: " . $_POST['email'] . "\r\n" .
            "Тема: " . $this->html_select[$_POST['typemessage']] . "\r\n" .
            "Сообщение: " . $_POST['message'] . "\r\n";
     $m=mail(EMAIL, 
         $this->html_select[$_POST['typemessage']],
         $textmail,
         "From: ".$_POST['name']." <".$_POST['email'].">\r\n"
      );     
      if ($m) 
      {
         $this->html_value['%MAIL%']='Сообщение отправлено';
      } else {
         $this->html_value['%MAIL%']='Ошибка ??? Сообщение не отправлено';
      }
      return $m;
   }		
}
