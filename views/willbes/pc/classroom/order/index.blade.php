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
                                <div class="Tit">주문/배송조회 안내</div>
                                - 주문/배송상태는 입금대기→결제완료→발송준비→발송완료 단계로 이루어집니다.<br/>
                                - 주문번호 혹은 주문내역을 클릭하시면 주문상세정보를 확인할 수 있습니다.<br/>
                                - 무통장입금(가상계좌)는 주문 번호별 다른 계좌번호가 발급되오니 주문 상세정보에서 계좌번호를 확인해 주시기 바랍니다.<br/>

                                <div class="Tit pt30">배송안내</div>
                                - 배송상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송처리되므로(토, 일, 공휴일 제외), '발송준비'로 변경된 배송상품의 주문취소/배송지 변경의 경우 고객센터를 통해서만 가능합니다.<br/>
                                - '발송완료'단계부터 배송조회가 가능하며, '배송조회'버튼 클릭시 배송상황을 확인할 수 있습니다.<br/>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-PAYMENTZONE -->

            <form id="search_form" name="search_form" method="GET">
                <div class="willbes-Leclist c_both mt40">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                        <span class="w-data">
                            기간검색 &nbsp;
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                            <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                        </span>
                        <span class="w-month">
                            <ul>
                                <li><a class="btn-set-search-date" data-period="0-all">전체</a></li>
                                <li><a class="btn-set-search-date" data-period="15-days">15일</a></li>
                                <li><a class="btn-set-search-date" data-period="1-months">1개월</a></li>
                                <li><a class="btn-set-search-date" data-period="3-months">3개월</a></li>
                                <li><a class="btn-set-search-date" data-period="6-months">6개월</a></li>
                            </ul>
                        </span>
                        <button type="submit" class="search-Btn">
                            <span>검색</span>
                        </button>
                    </div>
                    <div class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                        <select id="site_group" name="site_group" title="과정" class="seleProcess f_left">
                            <option value="">과정</option>
                            @foreach($arr_site_group as $key => $val)
                                <option value="{{ $key }}">{{ $val }}</option>
                            @endforeach
                        </select>
                        <select id="is_pass" name="is_pass" title="구분" class="seleAcad ml10 f_left">
                            <option value="">구분</option>
                            <option value="N">온라인</option>
                            <option value="Y">학원</option>
                        </select>
                        <div class="f_left ml15 mt10">
                            <input type="checkbox" id="is_book" name="is_book" value="Y" class="" @if(element('is_book', $arr_input) == 'Y') checked="checked" @endif/>
                            <label for="is_book">교재주문</label>
                        </div>
                    </div>
                    <div class="LeclistTable orderTable">
                        <table cellspacing="0" cellpadding="0" class="listTable cartTable upper-gray bdt-gray tx-gray">
                            <colgroup>
                                <col style="width: 80px;">
                                <col style="width: 110px;">
                                <col style="width: 220px;">
                                <col style="width: 240px;">
                                <col style="width: 130px;">
                                <col style="width: 160px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th>과정<span class="row-line">|</span></th>
                                <th>주문일<span class="row-line">|</span></th>
                                <th>주문번호<span class="row-line">|</span></th>
                                <th>주문내역<span class="row-line">|</span></th>
                                <th>결제금액<span class="row-line">|</span></th>
                                <th>결제수단</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $idx => $row)
                                <tr>
                                    <td class="w-process">{{ $row['SiteGroupName'] }}</td>
                                    <td class="w-date">{{ substr($row['OrderDatm'], 0, 10) }}</td>
                                    <td class="w-number"><a href="{{ site_url('/classroom/order/show?order_no=' . $row['OrderNo'] . '&' . http_build_query($arr_input)) }}">{{ $row['OrderNo'] }}</a></td>
                                    <td class="w-list">{{ $row['ReprProdName'] }}</td>
                                    <td class="w-price">{{ number_format($row['RealPayPrice']) }}</td>
                                    <td class="w-method">{{ empty($row['PayMethodCcd']) === false ? $row['PayMethodCcdName'] : $row['PayRouteCcdName'] }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {!! $paging['pagination'] !!}
                    </div>
                </div>
                <!-- willbes-Leclist -->
            </form>
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
                $search_form.find('select[name="is_pass"]').val('{{ $arr_input['is_pass'] or '' }}');
            };

            initSearch();

            // 과정, 구분, 교재주문 선택시 검색
            $search_form.on('change', 'select[name="site_group"], select[name="is_pass"], input[name="is_book"]', function () {
                $search_form.submit();
            });
        });
    </script>
@stop