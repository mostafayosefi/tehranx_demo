<style>
    .show {
        background-color: #591fe0 !important;
    }

</style>


@if ($name_nav == 'panel')

    <div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
        data-elementor-settings="[]">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
                    data-id="2279b4e" data-element_type="section"
                    data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">





@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'پروفایل',   'route_warp' =>   route('user.profile.index')  ,
'src_warp' => 'resume.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'اطلاعات اکانت',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'whois.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات دامنه',   'route_warp' =>   route('user.domain.index')  ,
'src_warp' => 'domaincheck1.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات NameServer',   'route_warp' =>   route('user.nameserver.index')  ,
'src_warp' => 'server_panel.png'  ,  'active_show' => ['user.nameserver.index'] ]  ])




                        </div>
                    </div>
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات Dns',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'dns_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات ترانسفر',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'transfer_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات Privacy',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'privacy_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات گواهی SSL',   'route_warp' =>   route('user.ssl.index')  ,
'src_warp' => 'ssl.png'  ,  'active_show' => [''] ]  ])




                </div>

                    </div>



                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">


                            @include('index.layouts.warp', [  'warp' => [  'name_warp' => 'خدمات Marketplace',   'route_warp' =>   route('user.contact.index')  ,
                            'src_warp' => 'marketplace_panel.png'  ,  'active_show' => [''] ]  ])

                            @include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت مالی',   'route_warp' =>   route('user.finical.index')  ,
                            'src_warp' => 'open-economy.png'  ,  'active_show' => [''] ]  ])



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت سفارش ها',   'route_warp' =>   route('user.order.index')  ,
'src_warp' => 'order.png'  ,  'active_show' => ['user.order.index','user.order.show'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تیکت    ',   'route_warp' =>   route('user.ticket.index')  ,
'src_warp' => 'messages.png'  ,  'active_show' => [''] ]  ])








            </div>
        </div>





        <div class="elementor-container elementor-column-gap-default">
            <div class="elementor-row">




                <div class="elementor-column elementor-col-25 elementor-top-column elementor-element elementor-element-c5ec86c"
                data-id="c5ec86c" data-element_type="column">
                <div class="elementor-column-wrap elementor-element-populated">
                    {{-- {{route('index.user.logout')}} --}}
                    <a href="{{ route('index.user.logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                        <div class="elementor-widget-wrap">
                            <div class="elementor-element elementor-element-f464a19 elementor-view-stacked elementor-shape-circle elementor-widget elementor-widget-icon"
                                data-id="f464a19" data-element_type="widget"
                                data-widget_type="icon.default">
                                <div class="elementor-widget-container">
                                    <div class="elementor-icon-wrapper">
                                        <div class="elementor-icon">
                                            <img    src="{{ asset('upload/images/icon/logout.png') }}"  />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="elementor-element elementor-element-3dad55e elementor-widget elementor-widget-heading"
                                data-id="3dad55e" data-element_type="widget"
                                data-widget_type="heading.default">
                                <div class="elementor-widget-container">
                                    <h2 class="elementor-heading-title elementor-size-default">خروج </h2>
                                </div>
                            </div>
                        </div>
                    </a>
                    <form id="logout-form" action="{{ route('index.user.logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                </div>
            </div>





            </div>
            </div>

                </section>
            </div>
        </div>
    </div>

@elseif ($name_nav == 'profile')
    <div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
        data-elementor-settings="[]">
        <div class="elementor-inner">
            <div class="elementor-section-wrap">
                <section
                    class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
                    data-id="2279b4e" data-element_type="section"
                    data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
                    <div class="elementor-container elementor-column-gap-default">
                        <div class="elementor-row">



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'پروفایل',   'route_warp' =>   route('user.profile.show')  ,
 'src_warp' => 'profile.png'  ,  'active_show' => ['user.profile.show', 'user.profile.edit']  ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تنظیمات پیش فرض',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'account.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تنظیمات امنیتی',   'route_warp' =>   route('user.profile.secret')  ,
'src_warp' => 'document.png'  ,  'active_show' => ['user.profile.secret'] ]  ])




                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>


@elseif ($name_nav == 'domain')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
 'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بررسی دامنه',   'route_warp' =>   route('user.domain.check')  ,
 'src_warp' => 'domaincheck1.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تمدید دامنه',   'route_warp' =>   route('user.domain.check')  ,
'src_warp' => 'contract.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تنظیمات whois',   'route_warp' =>   route('user.domain.check')  ,
'src_warp' => 'who.png'  ,  'active_show' => [''] ]  ])





                </div>
            </div>



            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ثبت دامنه',   'route_warp' =>   route('user.domain.check')  ,
'src_warp' => 'domain-registration.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تنظیمات NameServer',   'route_warp' =>   route('user.domain.check')  ,
 'src_warp' => 'dns1.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'تنظیمات Dns',   'route_warp' =>   route('user.domain.check')  ,
 'src_warp' => 'dns.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'انتقال دامنه',   'route_warp' =>   route('user.domain.check')  ,
 'src_warp' => 'transfer-data.png'  ,  'active_show' => [''] ]  ])



                </div>
            </div>






            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ثبت پروفایل',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'add-user.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'حذف پروفایل',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'delete.png'  ,  'active_show' => [''] ]  ])

@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'لیست پروفایل',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'contact-list.png'  ,  'active_show' => [''] ]  ])





                </div>
            </div>

        </section>
    </div>
</div>
</div>




@elseif ($name_nav == 'contact')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
 'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت اکانت',   'route_warp' =>   route('user.contact.index')  ,
'src_warp' => 'account-profile.png'  ,  'active_show' => ['user.contact.index', 'user.contact.show', 'user.contact.edit'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ثبت اکانت جدید',   'route_warp' =>   route('user.contact.create')  ,
'src_warp' => 'add-user.png'  ,  'active_show' => ['user.contact.create'] ]  ])




                </div>
            </div>
        </section>
      </div>
   </div>
</div>






@elseif ($name_nav == 'finical')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'لیست صورتحساب',   'route_warp' =>   route('user.finical.wallet.index')  ,
'src_warp' => 'shopping-list.png'  ,  'active_show' => ['user.finical.wallet.index', 'user.contact.show', 'user.contact.edit'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت کیف پول',   'route_warp' =>   route('user.finical.wallet.index')  ,
'src_warp' => 'open-economy.png'  ,  'active_show' => ['' ] ]  ])



                </div>
            </div>
        </section>
      </div>
   </div>
</div>




@elseif ($name_nav == 'ssl')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ثبت گواهی Ssl ',   'route_warp' =>   route('user.ssl.index')  ,
'src_warp' => 'addssl.png'  ,  'active_show' => ['user.ssl.index', 'user.contact.show', 'user.contact.edit'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'گواهی های من',   'route_warp' =>   route('user.ssl.index')  ,
'src_warp' => 'mngssl.png'  ,  'active_show' => ['' ] ]  ])



                </div>
            </div>
        </section>
      </div>
   </div>
</div>




@elseif ($name_nav == 'wallet')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.finical.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مشاهده تراکنش ها',   'route_warp' =>   route('user.finical.wallet.index')  ,
'src_warp' => 'transaction.png'  ,  'active_show' => ['user.finical.wallet.index', 'user.contact.show', 'user.contact.edit'] ]  ])



@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'افزایش موجودی',   'route_warp' =>   route('user.finical.wallet.create')  ,
'src_warp' => 'charging-station.png'  ,  'active_show' => ['user.finical.wallet.create' ] ]  ])



                </div>
            </div>
        </section>
      </div>
   </div>
</div>


@elseif ($name_nav == 'nameserver')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت Namesrver',   'route_warp' =>   route('user.nameserver.index')  ,
'src_warp' => 'index_nameserver.png'  ,  'active_show' => ['user.nameserver.index', 'user.nameserver.show', 'user.nameserver.edit'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ثبت Nameserver',   'route_warp' =>   route('user.nameserver.create')  ,
'src_warp' => 'add_nameserver.png'  ,  'active_show' => ['user.nameserver.create' ] ]  ])



                </div>
            </div>
        </section>
      </div>
   </div>
</div>




@elseif ($name_nav == 'ticket')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت تیکتهای من',   'route_warp' =>   route('user.ticket.index')  ,
'src_warp' => 'message.png'  ,  'active_show' => ['user.ticket.index', 'user.ticket.show', 'user.ticket.edit'] ]  ])


@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'ایجاد تیکت جدید  ',   'route_warp' =>   route('user.ticket.create')  ,
'src_warp' => 'new-message.png'  ,  'active_show' => ['user.ticket.create' ] ]  ])



                </div>
            </div>
        </section>
      </div>
   </div>
</div>



@elseif ($name_nav == 'order')


<div data-elementor-type="wp-page" data-elementor-id="2792" class="elementor elementor-2792"
data-elementor-settings="[]">
<div class="elementor-inner">
    <div class="elementor-section-wrap">
        <section
            class="elementor-section elementor-top-section elementor-element elementor-element-2279b4e elementor-section-boxed elementor-section-height-default elementor-section-height-default default-style"
            data-id="2279b4e" data-element_type="section"
            data-settings="{&quot;rt_color_sets&quot;:&quot;default-style&quot;}">
            <div class="elementor-container elementor-column-gap-default">
                <div class="elementor-row">




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'بازگشت',   'route_warp' =>   route('user.panel.index')  ,
'src_warp' => 'back_panel.png'  ,  'active_show' => [''] ]  ])




@include('index.layouts.warp', [  'warp' => [  'name_warp' => 'مدیریت سفارش ها',   'route_warp' =>   route('user.order.index')  ,
'src_warp' => 'order.png'  ,  'active_show' => ['user.order.index','user.order.show'] ]  ])




                </div>
            </div>
        </section>
      </div>
   </div>
</div>










</div>






@endif


