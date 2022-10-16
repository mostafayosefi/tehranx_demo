
                                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

                                        <script type="text/javascript">
                                            $(document).ready(function(){
                                                var maxField = 10; //Input fields increment limitation
                                                var addButton = $('.add_button'); //Add button selector
                                                var wrapper = $('.field_wrapper'); //Input field wrapper
                                                var fieldHTML = '<div><div class="col-sm-11" {{$required}}><label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$name_select}}</label><input type="text"  name="{{$index_id}}"  value="" class="form-control"/><a href="javascript:void(0);" class="remove_button"><img src="{{asset('template/addform/remove-icon.png')}}"/></a></div></div>'; //New input field html
                                                var x = 1; //Initial field counter is 1

                                                //Once add button is clicked
                                                $(addButton).click(function(){
                                                    //Check maximum number of input fields
                                                    if(x < maxField){
                                                        x++; //Increment field counter
                                                        $(wrapper).append(fieldHTML); //Add field html
                                                    }
                                                });

                                                //Once remove button is clicked
                                                $(wrapper).on('click', '.remove_button', function(e){
                                                    e.preventDefault();
                                                    $(this).parent('div').remove(); //Remove field html
                                                    x--; //Decrement field counter
                                                });
                                            });
                                            </script>

<hr>
<div class="field_wrapper" >
<div class="col-sm-11"    {{$required}}>
<label for="exampleInputUsername2" class="col-sm-3 col-form-label">{{$name_select}}</label>
<input type="text" name="{{$index_id}}"  class="form-control"  value=""/>
</div>
<div class="col-sm-1">
<a href="javascript:void(0);" class="add_button" title="اضافه کردن {{$name_select}}"><img src="{{asset('template/addform/add-icon.png')}}"/></a>
</div>
</div>

<hr>



