


<style>
    .lw-table-responsive {
        width: 100%;
        margin:0;
        padding:0;
        border-collapse: collapse;
        border-spacing: 0;
    }
    .lw-table-responsive tr {
        padding: 5px;
    }
    .lw-table-responsive th,
    .lw-table-responsive td {
        padding: 10px;
        text-align: center;
    }
    .lw-table-responsive th {
        text-transform: uppercase;
        font-size: 14px;
        letter-spacing: 1px;
    }
    /* multi-steps */
    .multi-steps {
        display: table;
        table-layout: fixed;
        width: 100%;
        margin: 0px;
        padding: 0px;
    }
    .multi-steps > li {
        counter-increment: stepNum;
        text-align: center;
        display: table-cell;
        position: relative;
        color: #56BA56;
        font-size: 11px;
    }
    .multi-steps > li:before {
        content: '\f00c';
        display: block;
        margin: 0 auto 4px;
        background-color: #fff;
        width: 36px;
        height: 36px;
        line-height: 32px;
        text-align: center;
        font-family: 'FontAwesome';
        border-width: 2px;
        border-style: solid;
        border-color: #56BA56;
        border-radius: 50%;
    }
    .multi-steps > li:after {
        content: '';
        height: 2px;
        width: 100%;
        background-color: #56BA56;
        position: absolute;
        top: 16px;
        right: 50%;
        z-index: -1;
    }
    .multi-steps > li:last-child:after {
        display: none;
    }
    .multi-steps > li.is-active {
        color: #F3AB45;
    }
    .multi-steps > li.is-active:before {
        background-color: #fff;
        border-color: #F3AB45;
    }
    .multi-steps > li.is-actived {
        color: #56BA56;
    }
    .multi-steps > li.is-actived:before {
        background-color: #fff;
        border-color: #56BA56;
    }
    .multi-steps > li.is-deactived {
        color: red;
    }
    .multi-steps > li.is-deactived:before {
        content: '\f00d';
        background-color: #fff;
        border-color: red;
    }
    .multi-steps > li.is-active ~ li {
        color: #808080;
    }
    .multi-steps > li.is-active ~ li:before {
        background-color: #fff;
        border-color: #aaa;
    }
    .multi-steps > li.is-active:before, .multi-steps > li.is-active ~ li:before {
        content: counter(stepNum);
        font-family: inherit;
        font-weight: 700;
    }
    .multi-steps > li.is-active:after, .multi-steps > li.is-active ~ li:after {
        background-color: #aaa;
    }
    @media screen and (max-width: 992px) {
        .lw-table-responsive {
            border: 0;
        }
        .lw-table-responsive thead {
            display: none;
        }
        .lw-table-responsive > tbody > tr > td{
            border: 0;
        }
        .lw-table-responsive tr {
            margin-bottom: 10px;
            display: block;
        }			.lw-table-responsive tbody tr {		border-top: 1px solid #eee;	}		.lw-table-responsive tbody tr:first-child {		border-top: 0px;	}		.lw-table-responsive tr:nth-child(even) {		background-color: #f5f5f5;	}
        .lw-table-responsive td {
            display: block;
            text-align: center;
            font-size: 13px;
        }
        .lw-table-responsive td:before {
            content: attr(data-label);
            display: block;
            margin-bottom: 10px;
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }
    }
    </style>


@if($order->status=='waiting') @elseif($order->status=='active')  @elseif($order->status=='active')   @endif

@if($order->status=='inactive')

<ul class="list-unstyled multi-steps">
    <li  class="is-actived"   >ثبت سفارش</li>
    <li   class="is-deactived "   >سفارش لغو شده</li>
</ul>

@else


<ul class="list-unstyled multi-steps">
    <li  class="is-actived"   >ثبت سفارش</li>
    <li @if($order->status=='register')  class="is-active" @else    class="is-actived"  @endif >در انتظار براورد قیمت</li>
    <li  @if($order->status=='waiting')  class="is-active" @else    class="is-actived"  @endif  >در انتظار پرداخت </li>

    @if($order->status=='waitpay')
    <li class="is-active"  >در انتظار تایید پرداخت </li>
    @endif

    <li     class="is-actived"   >پرداخت باموفقیت انجام شد   </li>
</ul>

@endif
<hr>
