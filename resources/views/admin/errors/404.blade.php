@component('admin.layouts.content', [
    'title' => '404',
    'tabTitle' => '404',
    'breadcrumb' => [['title' => 'بازگشت    ', 'url' => url()->previous() ], ['title' => 'صفحه مورد نظر وجود ندارد!',
    'class' => 'active']],
    ])




<div class="row w-100 mx-0 auth-page">
  <div class="col-md-8 col-xl-6 mx-auto d-flex flex-column align-items-center">
      <img src="{{ asset('template/assets/images/404.svg')}}" class="img-fluid mb-2" alt="404">
      <h1 class="font-weight-bold mb-22 mt-2 tx-80 text-muted">404</h1>
      <h4 class="mb-2">صفحه یافت نشد</h4>
      <h6 class="text-muted mb-3 text-center">اوه! متأسفانه صفحه مورد نظر شما در سایت وجود ندارد!
      </h6>
   </div>
</div>



    @slot('script')
    @endslot
@endcomponent
