@extends('willbes.m.layouts.master')

@section('page_title', '단과반 모바일 수강증')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')

        <div class="cardWrap">
            <ul>
                <li>{{ sess_data('mem_name') }}({{ $data['CertNo'] }})</li>
                <li>{{ $data['ProdName'] }}</li>
                <li>{{ date('Y-m-d') }}
                    <div>
                        <img src="{{ img_static_url('promotion/m/card_logo.png') }}" alt="willbes"/>
                        <span>임용</span>
                        <img src="{{ img_url('stamp/stamp.png') }}" alt="직인"/>
                    </div>
                </li>
            </ul>
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
@stop
