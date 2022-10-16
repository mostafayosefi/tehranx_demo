<div class="row">
    <div class="col-12 grid-margin">
        <div class="profile-header">
            <div class="cover">
                <div class="gray-shade"></div>
                <figure>
                    <img src="{{ asset('template/assets/images/profile-cover.jpg') }}" class="img-fluid"
                        alt="profile cover">
                </figure>
                <div class="cover-body d-flex justify-content-between align-items-center">
<div>

@include('admin.layouts.table.avatar', [$admin , 'avatarimage' => $admin->image , 'class'=>'profile-pic' , 'style' => 'height: 100px;width: 100px;'  ])
<span class="profile-name">{{ $admin->name }}</span>
</div>
                    <div class="d-none d-md-block">
                        <button class="btn btn-primary btn-icon-text btn-edit-profile">
                            <i data-feather="edit" class="btn-icon-prepend"></i> ویرایش پروفایل
                        </button>
                    </div>
                </div>
            </div>
            <div class="header-links">

            </div>
        </div>
    </div>
</div>
