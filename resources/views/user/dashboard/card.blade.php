

          <div class="card">
            <div class="card-body">
              <div class="d-flex justify-content-between align-items-baseline">
                <h2 class="card-title mb-0">{{$title_card}}</h2>
                <div class="dropdown mb-2">
                  <button class="btn p-0" type="button" id="dropdownMenuButton2" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="icon-lg text-muted pb-3px" data-feather="more-horizontal"></i>
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton2">


                      @if($route_create)
                      <a class="dropdown-item d-flex align-items-center" href="{{$route_create}}"><i data-feather="edit-2"
                        class="icon-sm ml-2"></i> <span class="">ثبت {{$desc_card}} جدید </span></a>
                      @endif


                      @if($route_index)
                      <a class="dropdown-item d-flex align-items-center" href="{{$route_index}}"><i data-feather="eye"
                        class="icon-sm ml-2"></i> <span class="">مدیریت {{$title_card}} </span></a>
                      @endif

                  </div>
                </div>



              </div>
              <div class="row">
                <div class="col-6 col-md-12 col-xl-8">
                  <h4 class="mb-2">{{$count_card}} {{$desc_card}}</h4>

                  @if($new_card)
                  <div class="d-flex align-items-baseline">
                    <p class="text-success">
                      <span>{{$new_card}}</span>
                      <i data-feather="file-plus" class="icon-sm mb-1"></i>
                    </p>
                  </div>
                  @endif

                </div>
                <div class="col-6 col-md-12 col-xl-4">
                   <i data-feather="{{$icon_card}}" class="text-primary icon-xxl d-block mx-auto my-3"></i>
                </div>
              </div>
            </div>
          </div>
