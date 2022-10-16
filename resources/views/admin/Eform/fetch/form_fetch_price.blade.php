

{{-- <h1>{{$value}}</h1> --}}


@include('admin.Eform.card.pack' , [ 'name_pack' => 'price' , 'disable_currency' => ''  , 'disable_money' => ''
, $currencies   , $form , 'form_data' =>null , 'form_data_list' =>null ])
