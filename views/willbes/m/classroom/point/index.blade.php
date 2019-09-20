@extends('willbes.m.layouts.master')

@section('page_title', '포인트 관리')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">
        <form id="search_form" name="search_form" method="GET">
            <input type="hidden" name="tab" value="{{ $tab }}"/>

            <div class="pointHead">
                <h4 class="NGEB">포인트 관리</h4>
                <ul>
                    <li>
                        강좌<br>
                        <span class="tx-blue">{{ number_format($point['lecture']) }}</span> P
                    </li>
                    <li>
                        교재<br>
                        <span class="tx-blue">{{ number_format($point['book']) }}</span> P
                    </li>
                </ul>
            </div>

            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a id="hover_lecture" data-tab="lecture" class="tab">강좌</a><span class="row-line">|</span></li>
                <li><a id="hover_book" data-tab="book" class="tab">교재</a></li>
            </ul>

            <div id="{{ $tab }}" class="pointBox">
                <ul class="pointLec">
                    <li>
                        사용가능<br>
                        <span class="tx-blue">{{ number_format($point['available']) }}</span> P
                    </li>
                    <li>
                        당월소멸예정<br>
                        <span class="tx-blue">{{ number_format($point['expiring']) }}</span> P
                    </li>
                </ul>

                <div class="paymentDate">
                    <div class="payLecList NGR">
                        <strong>기간검색</strong>
                        <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="datepicker" maxlength="10" autocomplete="off" style="width:110px"/>
                        ~ <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="datepicker" maxlength="10" autocomplete="off" style="width:110px">
                    </div>
                    <ul class="c_both">
                        <li><a href="#none" class="btn-set-search-date" data-period="0-all">전체</a></li>
                        <li><a href="#none" class="btn-set-search-date" data-period="15-days">15일</a></li>
                        <li><a href="#none" class="btn-set-search-date" data-period="1-months">1개월</a></li>
                        <li><a href="#none" class="btn-set-search-date" data-period="3-months">3개월</a></li>
                        <li><a href="#none" class="btn-set-search-date" data-period="6-months">6개월</a></li>
                    </ul>
                    <div class="btnSearch">
                        <a href="#none" id="btn_search">검색</a>
                    </div>
                </div>

                <div class="willbes-Lec-Selected NG c_both tx-gray pt-zero">
                    <select id="site_group" name="site_group" title="과정" class="seleProcess width30p">
                        <option value="">과정</option>
                        @foreach($arr_site_group as $key => $val)
                            <option value="{{ $key }}">{{ $val }}</option>
                        @endforeach
                    </select>
                </div>

                @if(empty($data) === false)
                    <div class="pointList">
                        @foreach($data as $idx => $row)
                            <div>
                                <ul>
                                    <li>{{ $row['SiteGroupName'] }}</li>
                                    <li>{{ substr($row['RegDatm'], 0, 10) }}</li>
                                    @if($row['PointStatusType'] == 'S')
                                        <li class="tx-blue">+ {{ number_format($row['PointAmt']) }}</li>
                                    @else
                                        <li>- {{ number_format($row['PointAmt']) }}</li>
                                    @endif
                                </ul>
                            </div>
                        @endforeach
                    </div>
                    {!! $paging['pagination'] !!}
                @else
                    <div class="pointList tx-center pt20">
                        <img src="{{ img_url('m/mypage/icon_warning.png') }}">
                        <div class="mt10 pb20 bdb-dark-gray">포인트 내역이 없습니다.</div>
                    </div>
                @endif
            </div>

            <div class="paymentCheckInfo">
                <h4>포인트안내</h4>
                <ul>
                    <li><span class="tx-blue">강좌포인트</span>는 강좌구매시 적립 및 사용되는 포인트입니다.</li>
                    <li><span class="tx-blue">교재포인트</span>는 교재구매시 적립 및 사용되는 포인트입니다.</li>
                    <li>적립된포인트는 {{ number_format(config_item('use_min_point')) }}P 이상인 경우 {{ config_item('use_point_unit') }}P 단위로 유효기간까지 사용이 가능합니다.</li>
                    <li>포인트의 사용/소멸시에는 유효기간이 가까운 포인트부터 차감됩니다.</li>
                    <li>환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.</li>
                    <li>자세한 포인트 적립 및 사용 내역은 PC버전에서 확인 가능합니다.</li>
                </ul>
            </div>
        </form>
    </div>

    <!-- Topbtn -->
    @include('willbes.m.layouts.topbtn')
</div>
<!-- End Container -->
<script type="text/javascript">
    var $search_form = $('#search_form');

    $(document).ready(function() {
        // 검색어 디폴트 설정
        var initSearch = function() {
            $search_form.find('select[name="site_group"]').val('{{ $arr_input['site_group'] or '' }}');
        };

        initSearch();

        // 검색 버튼 클릭
        $search_form.on('click', '#btn_search, .btn-set-search-date', function() {
            $search_form.submit();
        });

        // 과정, 정렬일자, 상태 변경시 검색
        $search_form.on('change', 'select[name="site_group"]', function () {
            $search_form.submit();
        });

        // 탭 선택할 경우 페이지 이동
        $('.tab').on('click', function() {
            var tab = $(this).data('tab');
            location.replace('{{ front_url('/classroom/point/index') }}?tab=' + tab);
        });

        // 탭 active 처리
        $(function() {
            $('.paymentWrap .tabWrap li a').removeClass('on');
            $('.paymentWrap .tabWrap #hover_{{ $tab }}').addClass('on');
        });
    });
</script>
@stop