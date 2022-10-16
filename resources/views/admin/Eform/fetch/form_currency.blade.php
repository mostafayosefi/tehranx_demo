
@if($currency)
    <div class="form-group">
        <label for="group"> هزینه براساس {{$currency->name}}</label>
        <input type="text" class="form-control" id="money" autocomplete="off"
         name="money" placeholder=" هزینه براساس {{$currency->name}}"  value="">
    </div>
@endif
