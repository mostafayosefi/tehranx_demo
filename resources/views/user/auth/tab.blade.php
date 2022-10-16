
                    <div class="page-links">
                        <a href="{{route('user.login')}}"   @if($active=='login') class="active" @endif >ورود</a>
                        <a href="{{route('user.register')}}" @if($active=='register') class="active" @endif >عضویت</a>
                        <a href="{{route('user.forgetpass')}}" @if($active=='forgetpass') class="active" @endif >فراموشی رمزعبور</a>
                    </div>
