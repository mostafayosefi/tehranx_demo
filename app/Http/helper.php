<?php

use App\Models\User;
use App\Models\Ticket;
use App\Models\Wallet;
use App\Models\Setting;
use App\Models\Timeline;

use App\Rules\Uniqemail;

use App\Models\Eform\Form;
use App\Models\Eform\Price;
use Illuminate\Support\Str;
use Illuminate\Http\Request;


use Morilog\Jalali\Jalalian;
use App\Models\Course\Course;
use App\Models\Loginhistorie;
use App\Models\Authentication;
use App\Models\Course\Teacher;
use App\Models\Eform\Currency;
use App\Models\Eform\FormData;
use App\Models\Eform\PriceFee;
use App\Models\Eform\FormColoumn;
use App\Models\Eform\FormCategory;
use App\Models\Eform\FormDataList;
use App\Models\Eform\FormDataMult;
use App\Models\Eform\PriceFinical;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Eform\FormColoumnMult;
use App\Models\Eform\FormSubcategory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\Types\Null_;
use App\Models\Notification\NotificationList;
use App\Models\Notification\NotificationType;
use App\Models\Notification\NotificationMessage;
use App\Http\Services\Message\MessageService;
use App\Http\Services\Message\SMS\SmsService;
use App\Http\Services\Message\Email\EmailService;
use App\Models\BankAccount;
use App\Models\Eform\PriceDiscount;

if(!function_exists('isActive'))
{
    function isActive($key , $activeClassName = 'active')
    {
        if (is_array($key))
        {
            return in_array(Route::currentRouteName() , $key) ? $activeClassName : '';
        }
        return Route::currentRouteName() == $key ? $activeClassName : '';
    }
}


if(!function_exists('isShow'))
{
    function isShow($key , $showClassName = 'show')
    {
        if (is_array($key))
        {
            return in_array(Route::currentRouteName() , $key) ? $showClassName : '';
        }
        return Route::currentRouteName() == $key ? $showClassName : '';
    }
}







//get Status EmployerPackage
if(! function_exists('getStatusEmployerPackage') ) {

    function getStatusEmployerPackage($status)
    {
        if($status == 'active')
        {
            echo '<span class="badge badge-primary">فعال</span>';
        }
        elseif($status == 'inactive')
        {
            echo '<span class="badge badge-danger">غیرفعال</span>';
        }
        else
        {
            echo '<span class="badge badge-info">بررسی شده</span>';
        }
    }

}





if(! function_exists('getstatusdefault') ) {

    function getstatusdefault($status)
    {



/*
        if($status == 'active')
        {
            echo '<i class="fas fa-toggle-on"  ></i> Default';

        }
        elseif($status == 'inactive')
        {
            echo '';
        }
 */

        if($status == 'active')
        {
            echo '<div class="form-check form-check-inline">
            <label class="form-check-label"><input type="radio"   disabled checked class="form-check-input"> پیش فرض </label>
             </div>  ';

        }
        elseif($status == 'inactive')
        {
            echo '<div class="form-check form-check-inline">
            <label class="form-check-label"><input type="radio"   disabled   class="form-check-input">   </label>
             </div> ';
        }



    }

}



if(! function_exists('uploadFileArray') ) {
    function uploadFileArray($file,$path){
if($file){
  if(is_array($file)){
      foreach($file as $part) {
          if($part){

            $current_timestamp = \Carbon\Carbon::now()->timestamp;
            $imagePath = "/upload/$path/";
            $filename = $current_timestamp . $part->getClientOriginalName();
            $file = $part->move(public_path($imagePath) , $filename);
            $filearray[]=$imagePath.$filename;

          }  }  }
          return $filearray;

 }else{
    //  return $defaultfile;
 }
    }

}

if(! function_exists('urllink') ) {
    function urllink($urllink)
    {

$mystring = $urllink; $findme   = 'http'; $pos = strpos($mystring, $findme);
  if ($pos !== false) {  $mystring = $urllink; }else{ $mystring = 'http://'.$urllink; }
return  $mystring;

  }
}




if(! function_exists('str_rep_price') ) {
    function str_rep_price($price)
    {

     return  str_replace( ",","" , $price);


    }
}


if(! function_exists('uploadFile') ) {

    function uploadFile($file,$path,$defaultfile)
    {
 if($file){
        $current_timestamp = \Carbon\Carbon::now()->timestamp;
        $imagePath = "/upload/$path/";
        $filename = $current_timestamp . $file->getClientOriginalName();
        $file = $file->move(public_path($imagePath) , $filename);
        return $imagePath.$filename;

 }else{
     return $defaultfile;
 }
    }

}







if(! function_exists('Change_status') ) {
    function Change_status($id, $table)
    {

        if($table=='users'){
            $table= User::find($id);
            Alert::success('تغییر وضعیت اکانت با موفقیت انجام شد', 'تغییرات وضعیت اکانت با موفقیت انجام شد');
        }


        if($table=='form_categories'){
            $table= FormCategory::find($id);
            Alert::success('تغییر وضعیت گروه با موفقیت انجام شد', 'تغییرات وضعیت گروه با موفقیت انجام شد');
        }


        if($table=='form_subcategories'){
            $table= FormSubcategory::find($id);
            Alert::success('تغییر وضعیت زیرگروه با موفقیت انجام شد', 'تغییرات وضعیت زیرگروه با موفقیت انجام شد');
        }



        if($table=='forms'){
            $table= Form::find($id);
            Alert::success('تغییر وضعیت فرم با موفقیت انجام شد', 'تغییرات وضعیت فرم با موفقیت انجام شد');
        }


        if($table=='form_coloumns'){
            $table= FormColoumn::find($id);
            Alert::success('تغییر وضعیت فیلد با موفقیت انجام شد', 'تغییرات وضعیت فیلد با موفقیت انجام شد');
        }



        if($table=='form_coloumn_mults'){
            $table= FormColoumnMult::find($id);
            Alert::success('تغییر وضعیت پارامتر با موفقیت انجام شد', 'تغییرات وضعیت پارامتر با موفقیت انجام شد');
        }


        if($table=='currencies'){
            $table= Currency::find($id);
            Alert::success('تغییر وضعیت ارز با موفقیت انجام شد', 'تغییرات وضعیت ارز با موفقیت انجام شد');
        }


        if($table=='notification_lists'){
            $table= NotificationList::find($id);
            Alert::success('تغییر وضعیت متن پیش فرض با موفقیت انجام شد', 'تغییرات وضعیت متن پیش فرض با موفقیت انجام شد');
        }


        if($table=='bank_accounts'){
            $table= BankAccount::find($id);
            Alert::success('تغییر وضعیت اطلاعات بانکی با موفقیت انجام شد', 'تغییرات وضعیت اطلاعات بانکی با موفقیت انجام شد');
        }

        if($table=='price_discounts'){
            $table= PriceDiscount::find($id);
            Alert::success('تغییر وضعیت تخفیفها با موفقیت انجام شد', 'تغییرات وضعیت تخفیفها  با موفقیت انجام شد');
        }




        if($table->status=='active'){$status='inactive';}
        elseif($table->status=='inactive'){$status='active';}
        $flag = $table->update([ 'status' => $status ]);
        return $flag;


    }
}





 if(! function_exists('date_frmat_mnth') ) {
    function date_frmat_mnth($date)
    {
        $date = Jalalian::forge($date)->format('%A, %d %B %Y');
        return $date;

    }

}
//get date_frmat
if(! function_exists('date_frmat') ) {
    function date_frmat($date)
    {
        $date = Jalalian::forge($date)->format('Y/m/d ساعت H:i a');
        return $date;
        // return Verta($date)->format('Y/m/d ساعت H:i a');

    }

}


 if(! function_exists('date_frmat_ymd') ) {
    function date_frmat_ymd($date)
    {
        $date = Jalalian::forge($date)->format('Y/m/d');
        return $date;

    }

}








if(! function_exists('Mywallet') ) {
    function Mywallet($user_id,$operator)
    {
        $query=Wallet::query()->where([
            ['user_id' , '=' ,$user_id],
            ['status' , '=' ,'active'],
        ]);
        $my_inc=$query->where([
            ['flag' , '=' ,'inc'],
            ])->sum('price');

            $my_dec=Wallet::where([
                ['user_id' , '=' ,$user_id],
                ['status' , '=' ,'active'],
                ['flag' , '=' ,'dec'],
            ])->sum('price');

                $mycharge= $my_inc - $my_dec;
                if($operator=='inc'){  return $my_inc;}
                if($operator=='dec'){  return $my_dec;}
                if($operator=='mycharge'){  return $mycharge;}

    }
}

if(! function_exists('linkdomain') ) {
    function linkdomain($domain,$suffix)
    {

 $countDot=0;
         foreach (count_chars($domain, 1) as $char => $count) {
            if(chr($char) =='.'){   $countDot=$count; }
         }
 if($countDot=='0') {
    return $domain.'.'.$suffix;
  }else{
      return $domain;
    $headers = explode('.', $domain);
    $headers['0'];
  }

  }
}



if(! function_exists('count_dashboard') ) {
    function count_dashboard($dash_id,$mytable)
    {



if($mytable=='user'){ $query=User::query()->where([ ['id' , '<>' ,'1'], ]);}

if($mytable=='ticket'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ]);}
if($mytable=='new_ticket'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ['fromshow' , '=' ,'unread'], ]);}
if($mytable=='new_ticket_admin'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ['toshow' , '=' ,'unread'], ]);}

$count=$query->count();

if($dash_id!='all'){$count=$query->where([  ['user_id' , '=' ,$dash_id],  ])->count();}

return $count;

    }
}



//get Status EmployerPackage
if(! function_exists('getStatusEmployerPackage') ) {

    function getStatusEmployerPackage($status)
    {
        if($status == 'active')
        {
            echo '<span class="badge badge-success"><i data-feather="check-circle"></i> &nbsp; فعال </span>';
        }
        elseif($status == 'inactive')
        {
            echo '
            <span class="badge badge-warning"><i data-feather="x-circle"></i> &nbsp; غیرفعال </span> ';
        }
        else
        {
            echo '<span class="badge badge-info">بررسی شده</span>';
        }
    }

}



if(! function_exists('priority') ) {
    // function priority($id_link, $id , $up_down , $pri_name)
    function priority($priority)
    {


        $id_link = $priority['id_link'] ;
        $up_down = $priority['up_down'] ;
        $pri_name = $priority['pri_name'] ;
        $my_priority = $priority['my_priority'] ;
        $id = $priority['id'] ;

        // dd($priority);

        if($pri_name=='coloumn'){
            $query=FormColoumn::query()->where([
                ['id' , '<>' , 0],
                ['form_id' , '=' , $id_link ],
            ]);
            $count = $query->where([
                ['form_id' , '=' , $id_link ],
            ])->count();


            if($up_down=='up'){ $new_priority=$my_priority-1; $default_priority=100; }
            if($up_down=='down'){ $new_priority=$my_priority+1; $default_priority=100; }
            if($up_down=='insert'){ $new_priority=$count;   }


            if(($up_down=='up')||($up_down=='down')){

//            3=>100
            // $query->where([
            //     ['priority' , '=' , $my_priority ],
            // ])->update(['priority' => $default_priority]);


            $UpdateDetails = FormColoumn::where( 'priority' ,   $my_priority)->first();
            $UpdateDetails->priority = $default_priority;
            $UpdateDetails->save();


//            2=>3
            // $query->where([
            //     ['priority' , '=' , $new_priority ],
            // ])->update(['priority' => $my_priority]);

            $UpdateDetails = FormColoumn::where( 'priority' ,   $new_priority)->first();
            $UpdateDetails->priority = $my_priority;
            $UpdateDetails->save();


//            100=2
            // $query->where([
            //     ['priority' , '=' , $default_priority ],
            // ])->update(['priority' => $new_priority]);


            $UpdateDetails = FormColoumn::where( 'priority' ,   $default_priority)->first();
            $UpdateDetails->priority = $new_priority;
            $UpdateDetails->save();


            }

            if($up_down=='insert'){
                $query->where([
                    ['id' , '=' , $id ],
                ])->update(['priority' => $new_priority]);
            }


            if($up_down=='sort'){

                $form_coloumns= $query->orderBy('priority','asc')->get();
                $i=0;
                if($form_coloumns){
                    foreach($form_coloumns as   $mtcoloumn){
                        $i++;
                        $UpdateDetails = FormColoumn::where( 'priority' ,   $mtcoloumn->priority )->first();
                        $UpdateDetails->new_priority = $i;
                        $UpdateDetails->save();
                    }}

                    $form_coloumns= $query->orderBy('id','asc')->get();
                if($form_coloumns){
                    foreach($form_coloumns as   $mtcoloumn){
                        $UpdateDetails = FormColoumn::where( 'id' ,   $mtcoloumn->id )->first();
                        $UpdateDetails->priority = $mtcoloumn->new_priority;
                        $UpdateDetails->save();
                    }
                }


            }







            // 966*0905*5022-2910-8959-5993

        }




//        git remote set-url origin "https://mostafayosefi@github.com/mostafayosefi/payment.git"
//        git remote set-url origin "https://github.com/mostafayosefi/payment.git"


//        git fetch
//git merge
//        git reset --hard

// https://appdividend.com/2022/02/28/laravel-dropzone-image-upload/


    }



}


if(! function_exists('update_lastlogin') ) {
    function update_lastlogin($id, $key)
    {




        if($key=='login'){
            $myuser =  User::addSelect(['last_login' => Loginhistorie::select('created_at')
            ->whereColumn('user_id', 'users.id')
            ->where('users.id' , $id)
            ->orderByDesc('created_at')
            ->limit(1)
        ])->first();
        return $myuser->last_login;}


        if($key=='ip'){
            $myuser =  User::addSelect(['last_ip' => Loginhistorie::select('ip')
            ->whereColumn('user_id', 'users.id')
            ->where('users.id' , $id)
            ->orderByDesc('created_at')
            ->limit(1)
        ])->first();
        return $myuser->last_ip;}

    }

}




    if(! function_exists('secret_user') ) {
        function secret_user(Request $request , $user , $oper , $db)
        {


            if($oper=='secret'){

                session(['err' => '1']);
                $request->validate([
                    'password' => 'required| min:4 |confirmed',
                    'password_confirmation' => 'required| min:4'
                ]);
        $user->update([ 'password' => Hash::make($request->password) ]);
        Alert::success('با موفقیت ویرایش شد', 'رمزعبور با موفقیت تغییر پیدا کرد ');
            }


            if($oper=='update'){
                $request->session()->forget('err');

                $request->validate([
                    'name' => 'required',
                    'username' => ['required',new Uniqemail($db,'username',$user->id)] ,
                    'email' => ['required' , 'email',new Uniqemail($db,'email',$user->id)] ,
                    'tell' => ['required', 'regex:/^09[0-9]{9}$/' ,new Uniqemail($db,'tell',$user->id)] ,
                ]);


                 $data = $request->all();
                $data['image']= $user->image;
                $data['image']  =  uploadFile($request->file('image'),'images/'.$db,$user->image);


       $m =  $user->update($data);
         Alert::success('با موفقیت ویرایش شد', 'اطلاعات با موفقیت ویرایش شد');


            }


     return back();



        }
    }






    if(! function_exists('flage_price') ) {
        function flage_price($price)
        {



$exit=number_format($price).' ريال ';    return  $exit;



        }
    }







    if(! function_exists('count_dashboard') ) {
        function count_dashboard($dash_id,$mytable)
        {



if($mytable=='user'){ $query=User::query()->where([ ['id' , '<>' ,'1'], ]);}


if($mytable=='ticket'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ]);}
if($mytable=='new_ticket'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ['fromshow' , '=' ,'unread'], ]);}
if($mytable=='new_ticket_admin'){ $query=Ticket::query()->where([ ['id' , '<>' ,'0'], ['toshow' , '=' ,'unread'], ]);}

$count=$query->count();

if($dash_id!='all'){$count=$query->where([  ['user_id' , '=' ,$dash_id],  ])->count();}

return $count;

        }
    }


    if(! function_exists('status_req') ) {
        function status_req($status,$myfunc)
        {

$nameoper='';
if($status == 'register'){$statusacc='waiting'; $nameoper='براورد هزینه'; $messagetext='براورد هزینه سفارش توسط مدیریت انجام شد';}
if ($status == 'waiting'){$statusacc='active';  $nameoper='تایید سفارش';  $messagetext='سفارش توسط مدیریت تایید شد';}
if ($status == 'active'){$statusacc='active';  $nameoper='فعالسازی مجدد سفارش';  $messagetext='سفارش فعال شد';}
if ($status == 'inactive'){$statusacc='register';  $nameoper='فعالسازی مجدد سفارش';  $messagetext='سفارش مجددا توسط مدیریت تایید شد';}
if ($status == 'reactive'){$statusacc='register';  $nameoper='فعالسازی مجدد سفارش';  $messagetext='سفارش مجددا توسط مدیریت تایید شد';}
if ($status == 'recerve'){$statusacc='active';  $nameoper='ثبت نهایی شرکت';  $messagetext='ثبت نهایی شرکت باموفقیت انجام شد';}
if ($status == 'waitpay'){$statusacc='active';  $nameoper='تایید پرداخت کاربر';  $messagetext='پرداخت کاربر توسط مدیریت تایید شد';}



if($myfunc=='status'){ return $statusacc; }
if($myfunc=='nameoper'){ return $nameoper; }
if($myfunc=='text'){ return $messagetext; }

        }
    }

    if(! function_exists('now_time') ) {
        function now_time( $value)
        {
            return now()->addYears($value)->format('Y-m-d');
        }
    }



    if(! function_exists('time_fake') ) {
        function time_fake( $endtime ,$value)
        {


            $modifier= '-'.$value.' days';
            $modifier .= '-9 hourse';
        $date = strtotime($endtime);
        $newdate = date('Y-m-d h:i',strtotime($modifier,$date));
        return $newdate;

        }
    }




if(! function_exists('validate_price') ) {
    function validate_price($form_id, $form_data_list_id , $form_currency_id , $comparison)
    {

        $form=Form::find($form_id);
        $currencies=Currency::all();





        if($form_currency_id > 0 ){
            foreach ($currencies as $currency ){
                if($form->form_currency_id==$currency->id){
                    if($comparison=='currency_rate') {
                        return $currency->rate;
                    }
                    if($comparison=='currency_money') {
                        return $form->money;
                    }
                    if($comparison=='currency_name') {
                        return $currency->name;
                    }
                    if($comparison=='currency') {
                        return '1';
                    }
                    if($comparison=='currency_exchange_price') {
                        $price = ($form->money * $currency->rate);
                        return $price;                    }
                    if($comparison=='update_price_form') {
                        $price = ($form->money * $currency->rate);
                        $form->update([ 'price' => $price ]);
                        return $price;
                    }
                }
            }

        }else{

            if($comparison=='currency') {
                return '0';
            }

            if($comparison=='update_price_form') {
                $price = $form->price;
                $form->update([ 'price' => $price ]);
                return $price;
            }
        }



    }
}


if(! function_exists('updateorcreate') ) {
    function updateorcreate($id , $form_coloumn_id , $form_field_name , $mydata)
    {



        if(($form_field_name=='input')||($form_field_name=='textaria')){
            $newUser = FormData::updateOrCreate([
                'form_data_list_id'   => $id,
                'form_coloumn_id'   => $form_coloumn_id,
            ],[
                'data'     => $mydata,
            ]);

        }

        if($form_field_name=='radiobox'){

            $newUser = FormData::updateOrCreate([
                'form_data_list_id'   => $id,
                'form_coloumn_id'   => $form_coloumn_id,
            ],[
                'data'     => $mydata,
            ]);

            $query=FormDataMult::query()->where([
                'form_data_list_id'   => $id,
                'form_coloumn_id'   => $form_coloumn_id,
            ]);

            $count=$query->count();
            if($count=='0'){
                FormDataMult::create([
                    'form_data_list_id'   => $id,
                    'form_coloumn_id'   => $form_coloumn_id,
                    'form_coloumn_mult_id'   => $mydata,
                    'data'   => $mydata,
                ]);

            }else{
                $query->update([
                    'form_coloumn_mult_id'   => $mydata,
                    'data'   => $mydata,
                ]);
            }



        }



    }
}


if(! function_exists('mydata') ) {
    function mydata($form_data , $admin)
    {

         $mydata='';
         if($form_data){
         foreach ($form_data as $medata ){
         if ($medata->form_coloumn_id==$admin->id){
         $mydata=$medata->data;
         }
        }

        return $mydata;

    }


    }
}

if(! function_exists('currency_id') ) {
    function currency_id($rate)
    {


        $currencies = Currency::all();

        foreach($currencies as $currency){
            if($currency->rate==$rate){
                $currency_id = $currency->id;
            }
        }

return $currency_id;

    }
}




if(! function_exists('my_list') ) {
    function my_list($form , $form_data_list , $oper )
    {



        if($form_data_list){
        $currency = $form_data_list->price->currency;
        $money = $form_data_list->price->money;
        }else{
        $currency = $form->currency->id;
        $money = $form->money;
        }

        $model_currency=Currency::find($currency);
        $rate = $model_currency->rate;
        $price = $money*$rate;

        if($oper=='currency'){ return $currency; }
        if($oper=='money'){ return $money; }
        if($oper=='rate'){ return $rate; }
        if($oper=='price'){ return $price; }



    }
}






if(! function_exists('currency_form_data') ) {
    function currency_form_data($data)
    {
        $form=Form::find($data['form_id']);
        $currency = currency_id($data['currency']);
        $money = $data['money'];
        $price = Price::create([ 'currency' => $currency , 'money' => $money ]);
        return $price;

    }
}


if(! function_exists('store_price_form_request') ) {
    function store_price_form_request($data   )
    {

      $price =  currency_form_data($data);
      $data['price_id']=$price->id;
      $form_data_list=FormDataList::create($data);

if($form_data_list->form->comision=='active'){
    $fee=PriceFee::find('1')->price;
}else{
    $fee=0;
}

$discount = 0;
if($data['discount']){
$price_discount=PriceDiscount::where([ ['code','=',$data['discount'], ] ])->first();
if($price_discount){
    $discount = $price_discount->price;
}
}
      $myprice = $data['currency']*$data['money'];
      $sum = ($myprice + $fee) - $discount ;
      PriceFinical::create([ 'form_data_list_id' => $form_data_list->id ,
      'price' => $myprice , 'fee' => $fee  , 'sum' => $sum  , 'discount' => $discount ]);

      return $form_data_list;

    }
}


if(! function_exists('updata_form_data') ) {
    function updata_form_data(Request $request, $id)
    {

        $form_data_list=FormDataList::find($id);
        $form_data=FormData::where([ [ 'form_data_list_id','=', $id ] ])->get();
        $count=FormData::where([ [ 'form_data_list_id','=', $id ] ])->count();

$price=Price::find($form_data_list->price_id);
$currency_id = currency_id($request->currency);
$price->update([ 'currency'=>$currency_id , 'money'=>$request->money  ]);

        foreach($form_data_list->form->form_coloumns as $admin){
            $form_field_name = $admin->form_field->name;
            $form_coloumn_id = $admin->id;
            $m=$form_field_name.$form_coloumn_id;
            if(($form_field_name=='input')||($form_field_name=='password')||($form_field_name=='textaria')||($form_field_name=='datepersian')){
                $mydata = $request->$m;
                updateorcreate($id , $form_coloumn_id , $form_field_name , $mydata );
               }
            if(($form_field_name=='select')||($form_field_name=='checkbox')||($form_field_name=='radiobox')){
                foreach($admin->form_coloumn_mults as $mult){
                    if($request->$m==$mult->id) {
                    $mydata=$mult->id;
                updateorcreate($id , $form_coloumn_id , $form_field_name , $mydata );
                    }
                }
            }
        }


    }
}




if(! function_exists('form_or_date') ) {
    function form_or_date($form_data_list , $form)
    {

        if($form_data_list){
            return $form_data_list->form;
        }else{
            return $form;
        }


    }

}


if(! function_exists('count_auth') ) {
    function count_auth($user , $authentication)
    {


        if($authentication){

        }else{
             Authentication::create([ 'user_id' =>$user->id , 'email' =>$user->email ,
            'tell' => $user->tell ,
            'tells' => $user->tells  ]);
        }


        // $user = Auth::guard('user')->user();
        $authentication=  $user->authentication;

        return $authentication;


    }

}





if(! function_exists('store_timeline') ) {
    function store_timeline( $guard , $activition , $text , $flag  , $array_timeline  )
    {
        $data['guard']=$guard;
        $data['activition']=$activition;
        $data['form_data_list_id']=$array_timeline['form_data_list_id'];
        $data['user_id']=$array_timeline['user_id'];
        $data['flag']=$flag;
        $data['text']=$text;
        Timeline::create($data);
    }
}




if(! function_exists('validate_empty') ) {
    function validate_empty( $authentication , $name  )
    {

       // dd($authentication);
        // $random = Str::random(5);

        $random =  random_int(99999,999999);


        if($name=='email'){
            $quer= $authentication->user->email;
            $authentication->update([ 'email_code_verify' => $random ]);
            Alert::success('با موفقیت ارسال شد', 'کد وریفای با موفقیت به ایمیل شما ارسال شد');
        }


        if($name=='tell'){
            $quer= $authentication->user->tell;
            $authentication->update([ 'tell_code_verify' => $random ]);
            Alert::success('با موفقیت ارسال شد', 'کد وریفای با موفقیت به شماره همراه شما ارسال شد');
        }


        if($name=='tells'){
            $quer= $authentication->user->tells;
            $authentication->update([ 'tells_code_verify' => $random ]);
            Alert::success('با موفقیت ارسال شد', 'کد وریفای با موفقیت به تلفن ثابت شما ارسال شد');
        }



        if($quer!=""){

        }else{



            if($name=='email'){
                Alert::error('ایمیل کاربر نمی تواند خالی باشد      ', '  ایمیل کاربر انتخاب نشده است      ');  }

            if($name=='tell'){
                Alert::error('شماره همراه کاربر نمی تواند خالی باشد      ', '  شماره همراه کاربر انتخاب نشده است      '); }

            if($name=='tells'){
                Alert::error('شماره تلفن ثابت نمی تواند خالی باشد      ', '  شماره تلفن ثابت انتخاب نشده است      '); }

            return back();

        }



    }
}



if(! function_exists('activition_auth') ) {
    function activition_auth( $authentication , $name  , $request  )
    {

        if($name=='email'){
            if($authentication->email_code_verify==$request->email_code_verify){
                $authentication->update([ 'email_verify' => 'active' ]);
                Alert::success('      با موفقیت فعال شد', '      ایمیل شما باموفقیت فعال شد');

            }else{
                Alert::error('کد وریفای اشتباه می باشد     ', '  متاسفانه کد وریفای به اشتباه وارد شده است');
            }

        }


        if($name=='tell'){
            if($authentication->tell_code_verify==$request->tell_code_verify){
                $authentication->update([ 'tell_verify' => 'active' ]);
                Alert::success('      با موفقیت فعال شد', '      شماره همراه شما باموفقیت فعال شد');

            }else{
                Alert::error('کد وریفای اشتباه می باشد     ', '  متاسفانه کد وریفای به اشتباه وارد شده است');
            }

        }

        if($name=='tells'){
            if($authentication->tells_code_verify==$request->tells_code_verify){
                $authentication->update([ 'tells_verify' => 'active' ]);
                Alert::success('      با موفقیت فعال شد', '      شماره تلفن ثابت شما باموفقیت فعال شد');

            }else{
                Alert::error('کد وریفای اشتباه می باشد     ', '  متاسفانه کد وریفای به اشتباه وارد شده است');
            }

        }




    }
}




if(! function_exists('name_type') ) {
    function name_type(   $contact    )
    {

        if($contact=='email'){ $myname="ایمیل";}
        if($contact=='tell'){ $myname="شماره تلفن همراه"; }
        if($contact=='tells'){ $myname="شماره تلفن ثابت"; }
        if($contact=='selfi'){ $myname="تصویر سلفی"; }
        if($contact=='document'){ $myname="مدارک هویتی"; }
        if($contact=='cardmelli'){ $myname="کارت ملی"; }
        if($contact=='passport'){ $myname="پاسپورت"; }
        if($contact=='bank_account'){ $myname="مدارک بانکی"; }


        if($contact=='active'){ $myname="تایید"; }
        if($contact=='reject'){ $myname="عدم تایید"; }


        return $myname;

    }
}



if(! function_exists('change_contact') ) {
    function change_contact( $authentication , $contact  , $request  )
    {
        $myname = name_type($contact);

        if($authentication->$contact==$request->$contact){
            Alert::error(' ویرایش انجام نشد',  $myname.' جدید و قدیم نمی تواند با هم برابر باشد');

        }else{

            if($contact=='email'){ $myname="ایمیل";
                $authentication->update([ 'email_verify' => 'inactive' , 'email' => $request->email ]);
                $authentication->user->update([  'email' => $request->email ]);
                validate_empty($authentication , 'email');
            }

        if($contact=='tell'){ $myname="شماره تلفن همراه";
                $authentication->update([ 'tell_verify' => 'inactive'  , 'tell' => $request->tell  ]);
                $authentication->user->update([   'tell' => $request->tell  ]);
                    validate_empty($authentication , 'tell');
 }

        if($contact=='tells'){ $myname="شماره تلفن ثابت";
                $authentication->update([ 'tells_verify' => 'inactive'  , 'tells' => $request->tells  ]);
            }

  Alert::success('      با موفقیت تغییر پیدا کرد ', $myname.' شما با موفقیت تغییر پیدا کرد');


        }

    }
}



if(! function_exists('upload_file_auth') ) {
    function upload_file_auth( $authentication , $file  , $request  )
    {
        $myname = name_type($file);

        $file_upload   =  uploadFile($request->file('file'),'images/'.$file,$authentication->$file);

         if($file=='passport'){
        $authentication->update([ 'passport_verify' => 'waiting' , 'passport' => $file_upload ]); }
         if($file=='document'){
        $authentication->update([ 'document_verify' => 'waiting' , 'document' => $file_upload ]); }
         if($file=='cardmelli'){
        $authentication->update([ 'cardmelli_verify' => 'waiting' , 'cardmelli' => $file_upload ]); }
         if($file=='selfi'){
        $authentication->update([ 'selfi_verify' => 'waiting' , 'selfi' => $file_upload ]); }
         session(['errus' => $file]);

         $array_timeline['user_id']=$authentication->user_id;
         $array_timeline['form_data_list_id']='';
         $text='';
         store_timeline( 'user', $file , $text , 'waiting'  , $array_timeline  );

  Alert::success('      با موفقیت آپلود شد   ', $myname.' شما با موفقیت آپلود شد  ');



    }
}


if(! function_exists('update_fee_refresh') ) {
    function update_fee_refresh( $currency_id , $money  , $price  )
    {


    $currency=Currency::where([ ['id' , '=',$currency_id] ])->first();

        $price_fee=PriceFee::find(1);
        if($money==0){$money=$price_fee->money;   }
        $price = $money*$currency->rate;


        $price_fee->update(['currency_id' => $currency_id ,
         'money' =>  $money , 'price' => $price   ]);


    }
}




if(! function_exists('send_notification_email') ) {
    function send_notification_email(  $notification_message_id  )
    {

//  Start Send Email

$notification_message = NotificationMessage::find($notification_message_id);
$emailrecerve = $notification_message->user->authentication->email;

$title = $notification_message->notification_list->notification_type->name;

$emailService = new EmailService();
$details = [
    'title' => $title,
    'body' =>  $notification_message->text
];
$emailService->setDetails($details);
$emailService->setFrom($emailrecerve, 'example');
$emailService->setSubject($title);
$emailService->setTo($emailrecerve);

$messagesService = new MessageService($emailService);

$messagesService->send();




    }
}




if(! function_exists('send_notification_sms') ) {
    function send_notification_sms(  $notification_message_id  )
    {

//  Start Send Sms



$notification_message = NotificationMessage::find($notification_message_id);
validate_empty($notification_message->user->authentication , 'tell');
$MobileNumbers = $notification_message->user->authentication->tell;
$random = $notification_message->user->authentication->tell_code_verify;


// dd($random);



$postData = array(
    'UserApiKey' => '72f9c543d655faf535dd156',
    'SecretKey' => '!Mehdi1241368',
    'System' => 'php_rest_v_2_0'
);


$urll='https://ws.sms.ir/';
$postString = json_encode($postData);


$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://RestfulSms.com/api/Token");
curl_setopt(
    $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json'
    )
);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

$result = curl_exec($ch);
curl_close($ch);

$response = json_decode($result);

$resp = false;
$IsSuccessful = '';
$TokenKey = '';
if (is_object($response)) {
    $IsSuccessful = $response->IsSuccessful;
    if ($IsSuccessful == true) {
        $TokenKey = $response->TokenKey;
        $resp = $TokenKey;
    } else {
        $resp = false;
    }
}

$token=$resp;


if($notification_message->notification_list->link == 'sms_verifylogin'){
    $TemplateId='40099';
    $postData=array(
    "ParameterArray" => array(
        array(
            "Parameter" => "VerificationCode",
            "ParameterValue" => $random
        ),
    ),
    "Mobile" => $MobileNumbers,
    "TemplateId" => $TemplateId
    );
    }
if($notification_message->notification_list->link == 'sms_requestform'){
    $TemplateId='40100';
    $postData=array(
    "ParameterArray" => array(
        array(
            "Parameter" => "nameuser",
            "ParameterValue" => $notification_message->user->name
        ),
        // array(
        //     "Parameter" => "nameorder",
        //     "ParameterValue" => $notification_message->user->name
        // ),
    ),
    "Mobile" => $MobileNumbers,
    "TemplateId" => $TemplateId
    );
    }

//Start Template Sms

// متن قالب : کد تایید شما : [VerificationCode] Tehranxe.com خدمات پرداخت آنلاین
// شناسه قالب : 40099

// متن قالب : کاربر گرامی : [nameuser] سفارش شما ثبت شد Tehranxe.com
// شناسه قالب : 40100

// متن قالب : کابر گرامی : [nameuser] سفارش شما تکمیل شد Tehranxe.com
// شناسه قالب : 40101

// متن قالب : [nameuser] سفارش [nameorder] را ثبت کرد
// شناسه قالب : 40102

//End Template Sms


$urll='http://RestfulSms.com/api/UltraFastSend';
$postString = json_encode($postData);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $urll);


curl_setopt(
    $ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'x-sms-ir-secure-token: '.$token
    )
);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, $postString);

$result = curl_exec($ch);
curl_close($ch);

// echo '<br>aaa<br>'. $result;


// End Sms


    }
}



if(! function_exists('send_notification_all') ) {
    function send_notification_all( $user , $type_link,$order ,$notif )
    {
        $authentication=  count_auth($user,$user->authentication);

if($notif==null){
    $notif['email']='active';
    $notif['sms']='active';
    $notif['elan']='active';
 }

$notification_type = NotificationType::where([ ['link', '=' , $type_link ], ])->first();
$notification_lists = $notification_type->notification_lists;
foreach($notification_lists as $notification_list){


    if(($notification_list->status == 'active')){

       message_save_send($user, $notification_list,$order , $notif);


    }

}




    }
}




if(! function_exists('message_save_send') ) {
    function message_save_send($user, $notification_list,$order , $notif)
    {


        if(($notification_list->notification_service->link=='sms')&&($notif['sms']=='active')){
            $notification_message_id = replacee_text_default($user, $notification_list,$order);
            send_notification_sms($notification_message_id);
        }

        if(($notification_list->notification_service->link=='email')&&($notif['email']=='active')){
            $notification_message_id = replacee_text_default($user, $notification_list,$order);
            send_notification_email($notification_message_id);

        }

        if(($notification_list->notification_service->link=='notification')&&($notif['elan']=='active')){

        }

    }
}




if(! function_exists('replacee_text_default') ) {
    function replacee_text_default( $user , $notification_list,$order )
    {

if($order){
    $message = str_replace(array('#tit' ,'#pay' ), array( $order->form->name  , $order->price_finical->sum  ), $notification_list->text_default);
}else{
    $message = str_replace(array('#verfytell' ,'#verfyemail' ), array( $user->authentication->tell_code_verify  , $user->authentication->email_code_verify  ), $notification_list->text_default);
}

 $notification_message = NotificationMessage::create([ 'text' => $message , 'notification_list_id' => $notification_list->id , 'user_id' => $user->id  ]);

return $notification_message->id;

    }
}


if(! function_exists('notif_array') ) {
    function notif_array( $notif_email , $notif_sms , $notif_elan    )
    {

        $notif['email']=$notif_email;
        $notif['sms']=$notif_sms;
        $notif['elan']=$notif_elan;
        return $notif;

    }
}

if(! function_exists('verify_login_tell') ) {
    function verify_login_tell( $user )
    {

        $authentication=  count_auth($user,$user->authentication);
        validate_empty($authentication , 'tell');
        $order = Null;
        $notif=notif_array( 'inactive','active','inactive' );
        send_notification_all($user,'validation_login', null , $notif );

    }
}



if(! function_exists('current_RouteName') ) {
    function current_RouteName( )
    {
        return Route::currentRouteName() ;

    }
}



if(! function_exists('login_active_tell_dashboard') ) {
    function login_active_tell_dashboard( )
    {

        if (Auth::guard('user')->user()) {
            if(Auth::guard('user')->user()->authentication->tell_verify == 'inactive'){
             return view('user.auth.mylogin'   );
            }else{
             return redirect()->route('user.dashboard.index');
            }
      }


    }
}


if(! function_exists('update_show_timeline') ) {
    function update_show_timeline($guard , $tab_active , $user_id)
    {

        if($guard=='admin'){
            $query=Timeline::where([ ['id' , '<>' ,'0'], ['activition' , '=' ,$tab_active], ['user_id' , '=' ,$user_id],['guard' , '=' ,'user'], ]);
            $query=$query->update([ 'showadmin' => 'read' ]);
        }


    }
}






// https://www.codewall.co.uk/add-jquery-ajax-loading-spinners-to-your-website/

https://www.ragni.com/assets/plugins/owl-carousel/demos/custom.html



