<!-- start header -->
<header class="header mb-4">


    <!-- start top-header logo, searchbox and cart -->
    <section class="top-header">
        <section class="container-xxl ">
            <section class="d-flex justify-content-between align-items-center py-3">
                <section class=""><a class="text-decoration-none" href="{{ route('user.dashboard.index') }}">
                    @include('admin.layouts.table.avatar', [  'avatarimage' => $setting->logo , 'class'=>'' , 'style' => 'height: 30px;width: 30px;'  ])
                </a></section>

            </section>
        </section>
    </section>
    <!-- end top-header logo, searchbox and cart -->


</header>
<!-- end header -->