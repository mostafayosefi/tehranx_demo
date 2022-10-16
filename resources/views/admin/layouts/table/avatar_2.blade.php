

<div class="wizard wizard-4" id="kt_wizard" data-wizard-state="step-first" data-wizard-clickable="true">
</div>


<div class="form-group row">
    <label class="col-xl-3 col-lg-3 col-form-label text-left">{{$label}}</label>
    <div class="col-lg-9 col-xl-9">
    <div class="image-input image-input-outline {{$style}}" id="kt_user_add_avatar{{$id_av}}"    >

@if ($avatarimage)
 <div class="{{$class}}" style="background-image: url({{ asset($avatarimage . '') }})"   ></div>

@else
<div class="{{$class}}" style="background-image: url({{ asset('template/assets/images/user.png') }})"   ></div>

@endif





<label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="تغییر عکس">
    <i class="fa fa-pen icon-sm text-muted"></i>
    <input type="file" name="image{{$id_av}}" accept=".png, .jpg, .jpeg"/>
    <input type="hidden" name="profile_avatar_remove"/>
</label>

<span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="لغو avatar">
    <i class="ki ki-bold-close icon-xs text-muted"></i>
</span>
</div>
</div>
</div>

