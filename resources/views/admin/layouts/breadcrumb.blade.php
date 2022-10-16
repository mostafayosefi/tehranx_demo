

<nav class="page-breadcrumb">
    <ol class="breadcrumb">

        <li class="breadcrumb-item">
            <a href="{{ route('admin.dashboard') }}">داشبورد</a>
        </li>


        @if(isset($breadcrumb) && is_array($breadcrumb))
        @foreach($breadcrumb as $key=>$value)
            @if ($value['title'])
                <li class="breadcrumb-item {{ $value['class'] ?? '' }}">
                    @if(isset($value['class']) && $value['class'] == 'active')
                        <span>{{ $value['title'] }}</span>
                    @else
                        <a href="{{ $value['url'] ?? '#' }}">
                            <span>{{ $value['title'] }}</span>
                        </a>
                    @endif
                </li>
            @endif
        @endforeach
    @endif

    </ol>
  </nav>
