@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-PAYMENTZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 닫기 ▲</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black">
                        <tbody>
                        <tr>
                            <td>
                                <div class="Tit">포인트안내</div>
                                - <span class="tx-light-blue">강좌포인트</span>는 강좌구매시 적립 및 사용되는 포인트입니다.<br/>
                                - <span class="tx-light-blue">교재포인트</span>는 교재구매시 적립 및 사용되는 포인트입니다.<br/>
                                - 적립된포인트는 {{ number_format(config_item('use_min_point')) }}P 이상인 경우 {{ config_item('use_point_unit') }}P 단위로 유효기간까지 사용이 가능합니다.<br/>
                                - 포인트의 사용/소멸시에는 유효기간이 가까운 포인트부터 차감됩니다.<br/>
                                - 환불 시 사용된 포인트는 복원되지 않고 소멸되며, 적립된 포인트는 회수됩니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-PAYMENTZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <div class="willbes-Mypage-PointBox NG c_both">
                    <ul>
                        <li class="Tit">포인트현황</li>
                        <li>강좌포인트 <span class="tx-light-blue">{{ number_format($point['lecture']) }}</span>P</li>
                        <li>교재포인트 <span class="tx-light-blue">{{ number_format($point['book']) }}</span>P</li>
                    </ul>
                </div>
                <!-- willbes-Mypage-PointBox -->

                <div class="pointDetailWrap mt35">
                    <ul class="tabWrap tabDepth3 NG">
                        <li><a id="hover_lecture" data-tab="lecture" data-stab="save" class="tab">강좌포인트</a></li>
                        <li><a id="hover_book" data-tab="book" data-stab="save" class="tab">교재포인트</a></li>
                    </ul>
                    <div class="tabBox">
                        <div id="{{ $tab }}">
                            <table cellspacing="0" cellpadding="0" class="userPointTable NG mt20">
                                <colgroup>
                                    <col style="width: 50%;"/>
                                    <col style="width: 50%;"/>
                                </colgroup>
                                <tbody>
                                <tr>
                                    <td>
                                        <div style="margin-bottom: 5px;">사용가능포인트 <span class="tx-light-blue">{{ number_format($point['available']) }}</span>P</div>
                                        <div class="tx-gray">
                                            총적립포인트 {{ number_format($point['total_save']) }} P<br/>
                                            총사용포인트 {{ number_format($point['total_use']) }} P
                                        </div>
                                    </td>
                                    <td>
                                        당월소멸예정포인트 <span class="tx-light-blue">{{ number_format($point['expiring']) }}</span>P
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <div class="useDetailWrap mt25">
                                <ul class="tabWrap tabDepthPass">
                                    <li><a id="hover_{{ $tab }}_save" data-tab="{{ $tab }}" data-stab="save" class="tab">적립내역</a></li>
                                    <li><a id="hover_{{ $tab }}_use" data-tab="{{ $tab }}" data-stab="use" class="tab">사용내역</a></li>
                                </ul>
                                <div class="tabBox mt20">
                                    <div id="{{ $stab }}">
                                        <div class="willbes-Mypage-Tabs">
                                            <form id="search_form" name="search_form" method="GET">
                                                <input type="hidden" name="tab" value="{{ $tab }}"/>
                                                <input type="hidden" name="stab" value="{{ $stab }}"/>

                                                <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                                                    <span class="w-data">
                                                        기간검색 &nbsp;
                                                        <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                                                        <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                                                    </span>
                                                    <span class="w-month">
                                                        <ul>
                                                            <li><a class="btn-set-search-date" data-period="0-all">전체</a></li>
                                                            <li><a class="btn-set-search-date" data-period="1-months">1개월</a></li>
                                                            <li><a class="btn-set-search-date" data-period="3-months">3개월</a></li>
                                                            <li><a class="btn-set-search-date" data-period="6-months">6개월</a></li>
                                                        </ul>
                                                    </span>
                                                    <button type="submit" onclick="" class="search-Btn">
                                                        <span>검색</span>
                                                    </button>
                                                </div>
                                                <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                                                    <select id="site_group" name="site_group" title="과정" class="seleProcess f_left mr10">
                                                        <option value="">과정</option>
                                                        @foreach($arr_site_group as $key => $val)
                                                            <option value="{{ $key }}">{{ $val }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="LeclistTable pointTable">
                                                    @if($stab == 'save')                                                    
                                                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 80px;">
                                                                <col style="width: 130px;">
                                                                <col style="width: 130px;">
                                                                <col style="width: 300px;">
                                                                <col style="width: 150px;">
                                                                <col style="width: 150px;">
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>과정<span class="row-line">|</span></th>
                                                                    <th>적립일<span class="row-line">|</span></th>
                                                                    <th>적립액<span class="row-line">|</span></th>
                                                                    <th>적립내역<span class="row-line">|</span></th>
                                                                    <th>주문번호<span class="row-line">|</span></th>
                                                                    <th>유효기간</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(empty($data) === false)
                                                                @foreach($data as $idx => $row)
                                                                <tr>
                                                                    <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                                                    <td class="w-date">{{ substr($row['SaveDatm'], 0, 10) }}</td>
                                                                    <td class="w-point">+ {{ number_format($row['SavePoint']) }}</td>
                                                                    <td class="w-list">{{ $row['ReasonName'] }}</td>
                                                                    <td class="w-number">{{ $row['OrderNo'] }}</td>
                                                                    <td class="w-period">~ {{ substr($row['ExpireDatm'], 0, 16) }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="6">포인트 내역이 없습니다</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    @else
                                                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                                                            <colgroup>
                                                                <col style="width: 80px;">
                                                                <col style="width: 130px;">
                                                                <col style="width: 130px;">
                                                                <col style="width: 450px;">
                                                                <col style="width: 150px;">
                                                            </colgroup>
                                                            <thead>
                                                                <tr>
                                                                    <th>과정<span class="row-line">|</span></th>
                                                                    <th>차감일<span class="row-line">|</span></th>
                                                                    <th>사용액<span class="row-line">|</span></th>
                                                                    <th>차감내역<span class="row-line">|</span></th>
                                                                    <th>주문번호</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if(empty($data) === false)
                                                                @foreach($data as $idx => $row)
                                                                <tr>
                                                                    <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                                                    <td class="w-date">{{ substr($row['UseDatm'], 0, 10) }}</td>
                                                                    <td class="w-point">- {{ number_format($row['UsePoint']) }}</td>
                                                                    <td class="w-list">{{ $row['ReasonName'] }}</td>
                                                                    <td class="w-number">{{ $row['OrderNo'] }}</td>
                                                                </tr>
                                                                @endforeach
                                                            @else
                                                                <tr>
                                                                    <td colspan="5">포인트 내역이 없습니다</td>
                                                                </tr>
                                                            @endif
                                                            </tbody>
                                                        </table>
                                                    @endif
                                                    {!! $paging['pagination'] !!}
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- useDetailWrap -->
                        </div>
                    </div>
                </div>
                <!-- pointDetailWrap -->
            </div>
            <!-- willbes-Mypage-Tabs -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
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

            // 과정, 정렬일자, 상태 변경시 검색
            $search_form.on('change', 'select[name="site_group"]', function () {
                $search_form.submit();
            });

            // 탭 선택할 경우 페이지 이동
            $('.tab').on('click', function() {
                var tab = $(this).data('tab');
                var stab = $(this).data('stab');

                location.replace('{{ site_url('/classroom/point/index') }}?tab=' + tab + '&stab=' + stab);
            });

            // 탭 active 처리
            $(function() {
                $('.pointDetailWrap .tabWrap li a').removeClass('on');
                $('.pointDetailWrap .tabWrap #hover_{{ $tab }}').addClass('on');
                $('.pointDetailWrap .tabWrap #hover_{{ $tab . '_' .$stab }}').addClass('on');
            });
        });
    </script>
@stop