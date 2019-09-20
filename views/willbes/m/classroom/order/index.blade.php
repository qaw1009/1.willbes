@extends('willbes.m.layouts.master')

@section('page_title', '주문/배송조회')

@section('content')
<!-- Container -->
<div id="Container" class="Container NG c_both">
    <!-- PageTitle -->
    @include('willbes.m.layouts.page_title')

    <div class="paymentWrap">
        <form id="search_form" name="search_form" method="GET">
            <div class="paymentDate">
                <div class="payLecList NGR">
                    <strong>기간검색</strong>
                    <input type="text" id="search_start_date" name="search_start_date" value="{{ $arr_input['search_start_date'] or '' }}" title="검색시작일자" class="datepicker" maxlength="10" autocomplete="off" style="width:100px"/>
                    ~ <input type="text" id="search_end_date" name="search_end_date" value="{{ $arr_input['search_end_date'] or '' }}" title="검색종료일자" class="datepicker" maxlength="10" autocomplete="off" style="width:100px"/>
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
                <select id="is_pass" name="is_pass" title="구분" class="seleLec width30p ml1p">
                    <option value="">구분</option>
                    <option value="N">온라인</option>
                    <option value="Y">학원</option>
                </select>
                <span class="chk">
                    <input type="checkbox" id="is_book" name="is_book" value="Y" @if(element('is_book', $arr_input) == 'Y') checked="checked" @endif/>
                    <label for="is_book">교재주문</label>
                </span>
            </div>
            @if(empty($data) === false)
                <div class="paymentCheck">
                    @foreach($data as $idx => $row)
                        <h4>
                            {{ substr($row['OrderDatm'], 0, 10) }}
                            <a href="{{ front_url('/classroom/order/show?order_no=' . $row['OrderNo'] . '&' . http_build_query($arr_input)) }}">주문상세보기 ></a>
                        </h4>
                        <ul>
                            <li>{{ $row['SiteGroupName'] }}</li>
                            <li>{{ $row['ReprProdName'] }}</li>
                            <li>{{ empty($row['PayMethodCcd']) === false ? $row['PayMethodCcdName'] : $row['PayRouteCcdName'] }}</li>
                        </ul>
                    @endforeach
                </div>
                {!! $paging['pagination'] !!}
            @else
                <div class="paymentCheck bdb-none bdt-gray tx-center pt20">
                    <img src="{{ img_url('m/mypage/icon_warning.png') }}">
                    <div class="mt10 pb20 bdb-dark-gray">주문 내역이 없습니다.</div>
                </div>
            @endif
        </form>

        <div class="paymentCheckInfo">
            <h4>주문/배송조회 안내</h4>
            <ul>
                <li>주문/배송상태는 입금대기→결제완료→발송준비→발송완료 단계로 이루어집니다.</li>
                <li>주문번호 혹은 주문내역을 클릭하시면 주문상세정보를 확인할 수 있습니다. </li>
                <li>무통장입금(가상계좌)는 주문 번호별 다른 계좌번호가 발급되오니 주문 상세정보에서 계좌번호를 확인해 주시기 바랍니다.</li>
            </ul>
            <h4>배송 안내</h4>
            <ul>
                <li>배송상품은 당일 오후 2시까지 결제한 상품에 한해 당일 발송처리되므로(토, 일, 공휴일 제외), '발송준비'로 변경된 배송상품의 주문취소/배송지 변경의 경우 고객센터를 통해서만 가능합니다.</li>
                <li>'발송완료'단계부터 배송조회가 가능하며, '배송조회'버튼 클릭시 배송상황을 확인할 수 있습니다.</li>
            </ul>
        </div>
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
            $search_form.find('select[name="is_pass"]').val('{{ $arr_input['is_pass'] or '' }}');
        };

        initSearch();

        // 검색 버튼 클릭
        $search_form.on('click', '#btn_search, .btn-set-search-date', function() {
            $search_form.submit();
        });

        // 과정, 구분, 교재주문 선택시 검색
        $search_form.on('change', 'select[name="site_group"], select[name="is_pass"], input[name="is_book"]', function() {
            $search_form.submit();
        });
    });
</script>
@stop