@extends('willbes.m.layouts.master')

@section('page_title', element('CertTitle', $data, '단과반') . ' 모바일 수강증')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <!-- PageTitle -->
        @include('willbes.m.layouts.page_title')

        <div class="cardWrap">
            @if($data['SiteCode'] == '2002')
                {{-- 경찰 수강증 --}}
                <ul class="cardBox">
                    <li><span>경찰이 된다! 윌비스 경찰</span></li>
                    <li>
                        <div>{{ $data['ProdName'] }}</div>
                        <div>{{ $data['MinStudyStartDate'] }} ~ {{ $data['MaxStudyEndDate'] }}</div>
                        <div>{{ sess_data('mem_name') }} <span>({{ sess_data('mem_id') }})</span></div>
                    </li>
                    <li class="tx-right">
                        {{ number_format($data['RealPayPrice']) }}원 ({{ $data['PayMethodCcdName'] }})<br>
                        {{ $data['OrderNo'] }}<br>
                        {{ date('Y-m-d H:i') }}<br>
                    </li>
                    <li><img src="{{ img_static_url('promotion/m/police_card_logo.jpg') }}" alt=""></li>
                </ul>
            @else
                {{-- 임용 수강증 --}}
                <ul class="cardBox">
                    <li><span>합격을 부르는 윌비스 임용</span></li>
                    <li>
                        <div><span>수강생명 :</span> {{ sess_data('mem_name') }}({{ $data['CertNo'] }})</div>
                        <div><span>강의명 :</span> {{ $data['ProdName'] }}</div>
                    </li>
                    <li>{{ date('Y-m-d') }}</li>
                    <li><img src="{{ img_static_url('promotion/m/ssam_card_logo.jpg') }}" alt=""></li>
                </ul>
                <ul class="info">
                    <li>유의사항</li>
                    <li>본 수강증은 판매 및 양도, 공유할 수 없습니다. (적발시 법적책임이 따릅니다)</li>
                    <li>수강 환불 시, 원 수강료(할인전 수강료)에서 적용됩니다. </li>
                    <li>수강환불 시, 학원에 오셔서 카드결제하였다면 카드 영수증을 지참하셔야 합니다.</li>
                    <li>윌비스임용고시학원은 교육청의 수강료 반환기준을 준수합니다.</li>
                    <li>수강 등록 후, 학원의 제반 규정을 준수해야 합니다. </li>
                    <li>학원 관계자의 요구시 본 수강증을 제시하셔야 합니다. (미 지참시 강의실 입실 불가)</li>
                </ul>
            @endif
        </div>

        <!-- Topbtn -->
        @include('willbes.m.layouts.topbtn')
    </div>
    <!-- End Container -->
@stop
