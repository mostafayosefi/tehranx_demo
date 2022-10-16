

  @include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_categories ,  'input_name' => 'name'  ,  'name_select' => ' گروه فرم ' ,  'value' =>   $form->form_subcategory->form_category_id , 'required'=>'required'  , 'index_id'=>'form_category_id' ])
  @include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_subcategories ,  'input_name' => 'name'  ,  'name_select' => 'زیرگروه ' ,  'value' =>  $form->form_subcategory->id , 'required'=>'required'  , 'index_id'=>'form_subcategory_id' ])


  <div class="form-group">
    <label for="group">group</label>
    <input type="text" class="form-control" id="group" autocomplete="off"
        placeholder="group " name="group" value="{{$form->group}}">
</div>

<div class="form-group">
    <label for="subgroup">subgroup</label>
    <input type="text" class="form-control" id="subgroup" autocomplete="off"
        placeholder="subgroup " name="subgroup" value="{{$form->subgroup}}">
</div>

<div class="form-group">
    <label for="name">نام فرم</label>
    <input type="text" class="form-control" id="name" autocomplete="off"
        placeholder=" نام فرم  " name="name" value="{{$form->name}}">
</div>

<div class="form-group">
    <label for="link">لینک فرم</label>
    <input type="text" class="form-control" id="link" autocomplete="off"
        placeholder=" لینک فرم  " name="link" value="{{$form->link}}"   >
</div>


<div class="form-group">
    <label for="short"> خلاصه توضیحات فرم</label>
    <textarea class="form-control" id="short" autocomplete="off"
              placeholder="خلاصه توضیحات فرم" name="short" rows="6" >{{$form->short}}</textarea>
</div>


<div class="form-group">
    <label for="text"> توضیحات فرم</label>
    <textarea class="form-control" id="tinymceExample" autocomplete="off"
              placeholder="توضیحات فرم" name="text" rows="8" >{{$form->text}}</textarea>
</div>


<div class="form-group">
    <label for="texttimerecv"> زمان تحویل</label>
    <input type="text" class="form-control" id="texttimerecv" autocomplete="off"
        placeholder="  زمان تحویل  " name="texttimerecv" value="{{$form->texttimerecv}}"   >
</div>

<div class="form-group">
    <label for="textrecv"> تحویل</label>
    <input type="text" class="form-control" id="textrecv" autocomplete="off"
        placeholder="  تحویل  " name="textrecv" value="{{$form->textrecv}}"   >
</div>

{{-- {{$form->typeservices->name}} --}}

@include('admin.layouts.table.selectbox', [ 'allforeachs' => $typeservices ,  'input_name' => 'name'  ,  'name_select' => 'نوع خدمات' ,  'value' => $form->typeservices->id   , 'required'=>'required'  , 'index_id'=>'typeservice' ])


@include('admin.layouts.table.selectbox', [ 'allforeachs' => $form_templates ,  'input_name' => 'name'  ,  'name_select' => ' قالب فرم ' ,  'value' =>  $form->form_template_id , 'required'=>'required'  , 'index_id'=>'form_template_id' ])
@include('admin.layouts.table.selectbox', [ 'allforeachs' => $currencies ,  'input_name' => 'name'  ,  'name_select' => 'ارز' ,  'value' =>  $form->form_currency_id   , 'required'=>'required'  , 'index_id'=>'form_currency_id' ])

<div id="currency_name">



@if($form->form_currency_id)
@foreach ($currencies as $currency )
@if($form->form_currency_id==$currency->id)

<div class="form-group">
    <label for="group"> هزینه براساس {{$currency->name}}</label>
    <input type="text" class="form-control" id="money" autocomplete="off"
     name="money" placeholder=" هزینه براساس {{$currency->name}}"  value="{{$form->money}}">
</div>

@endif
@endforeach
@endif

</div>
<hr>




@include('admin.layouts.table.java_price')

<div class="form-group">
    <label for="price">هزینه فرم مربوطه (به ریال)</label>
    <input type="text" class="form-control" id="price" autocomplete="off"
           placeholder="هزینه فرم مربوطه (به ریال)" name="price" value="{{$form->price}}"
           onkeyup="separateNum(this.value,this);"  >
</div>

<hr>

<input type="hidden" name="comision" value="inactive" />

<div class="form-group">
    <label for="price">هزینه خدمات

<div class="form-check">
    <label class="form-check-label">
        <input type="checkbox" class="form-check-input" name="comision"
            id="comision" value="active"  @if($form->comision=='active') checked @endif >
        فعال
    </label>
</div>
    </label>
</div>
<hr>

@include('admin.layouts.table.avatarnul', [  'avatarimage' => $form->image , 'class'=>'profile-pic' , 'style' => 'height: 100px;width: 100px;'  ])


<hr>
<div class="form-group" >
<label for="exampleInputUsername1"> آپلود عکس </label>
<input type="file"     id="exampleInputUsername1" autocomplete="off"  name="image" >
</div>




