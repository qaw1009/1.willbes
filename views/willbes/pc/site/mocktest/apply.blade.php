@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_menu')

        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mocktest INFOZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 모의고사
                </div>
            </div>
            <!-- "willbes-Mocktest INFOZONE -->

            <div class="willbes-Mypage-Tabs mt10">
                @include('willbes.pc.site.mocktest.tab_menu_partial')
                <form id="url_form" name="url_form" method="GET">

                    <div class="willbes-Leclist c_both mt60">

                        <div class="willbes-LecreplyList tx-gray c_both mt-zero">
                            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                                <select id="state" name="state" title="state" class="seleState mr10 h30 f_left">
                                    <option>응시형태</option>
                                    <option value="1" @if($state == '1') selected @endif>Online</option>
                                    <option value="2" @if($state == '2') selected @endif>Off(학원)</option>
                                </select>
                            </span>
                            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                                <select id="s_type" name="s_type" title="state" class="seleState mr10 h30 f_left">
                                    <option value="">진행상태</option>
                                    <option value="1" @if($s_type == 1) selected @endif>접수대기</option>
                                    <option value="2" @if($s_type == 2) selected @endif>접수중</option>
                                </select>
                            </span>
                            <span class="willbes-Lec-Search willbes-SelectBox mb20 GM f_left">
                                <div class="inputBox p_re">
                                    <input type="text" id="s_keyword" name="s_keyword" class="labelSearch" value="{{element('s_keyword', $arr_input)}}" placeholder="모의고사명을 입력해 주세요" maxlength="30">
                                    <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                                        <span>검색</span>
                                    </button>
                                </div>
                            </span>
                        </div>


                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable mockTable under-gray bdt-gray tx-gray">
                                <colgroup>
                                    <col style="width: 40px;">
                                    <col style="width: 80px;">
                                    <col style="width: 70px;">
                                    <col style="width: 130px;">
                                    <col style="width: 230px;">
                                    <col style="width: 70px;">
                                    <col style="width: 130px;">
                                    <col style="width: 80px;">
                                    <col style="width: 110px;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <th>No<span class="row-line">|</span></li></th>
                                    <th>응시분야<span class="row-line">|</span></li></th>
                                    <th>응시형태<span class="row-line">|</span></li></th>
                                    <th>시험응시일<span class="row-line">|</span></li></th>
                                    <th>모의고사명<span class="row-line">|</span></li></th>
                                    <th>응시료<span class="row-line">|</span></li></th>
                                    <th>접수기간<span class="row-line">|</span></li></th>
                                    <th>진행상태<span class="row-line">|</span></li></th>
                                    <th>나의 접수상태</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(empty($list) === false)
                                    @foreach($list as $row)
                                        @php
                                            $sales_info = json_decode($row['ProdPriceData'], true);
                                        @endphp
                                        <tr>
                                            <td class="w-no">{{$paging['rownum']}}</td>
                                            <td class="w-type">{{$row['CateName']}}</td>
                                            <td class="w-form">@if($row['TakeFormsCcd_Name'] == "off(학원)")<span class="tx-red strong">Off</span>@else<span class="tx-blue strong">Online</span>@endif</td>
                                            <td class="w-date">{{$row['TakeStartDatm']}} ~<br/>{{$row['TakeEndDatm']}}</td>
                                            <td class="w-list tx-left pl15"><a href="javascript:;" onclick="applyRegist('{{$row['ProdCode']}}','{{$row['OrderProdIdx']}}')">{{$row['ProdName']}}</a></td>
                                            <td class="w-price">@if(empty($sales_info)==false){{ number_format($sales_info[0]['RealSalePrice'],0)}}원@endif</td>
                                            <td class="w-day">{{$row['SaleStartDatm']}}~<br/>{{$row['SaleEndDatm']}}</td>
                                            <td class="w-state">
                                                @if($row['SaleStartDatm'] > date('Y-m-d H:i:s'))
                                                    접수대기
                                                @elseif($row['SaleStartDatm'] < date('Y-m-d H:i:s') && $row['SaleEndDatm'] > date('Y-m-d H:i:s'))
                                                    접수중
                                                @else
                                                    접수마감
                                                @endif

                                            </td>
                                            <td class="w-user-state">{{$row['OrderProdIdx'] > 0 ? '결제완료' : '미접수'}}</td>
                                        </tr>
                                        @php $paging['rownum']-- @endphp
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="9">등록된 자료가 없습니다.</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>

                            {!! $paging['pagination'] !!}
                        </div>
                    </div>
                </form>
            </div>
            <!-- willbes-Mypage-Tabs -->

            <div id="mock_apply" class="willbes-Layer-PassBox willbes-Layer-PassBox740 abs"></div>


        </div>
        {!! banner('수험정보_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function(){

        });

        function applyRegist(prod_code,order_prod) {

            @if( empty(sess_data('mem_idx')) )
                alert("로그인 후 이용하실 수 있습니다.");
            @else

                if(order_prod == '0') {
                    url = '{{front_url('/mockTest/apply_modal/')}}' + 'prod-code/' + prod_code;
                    ele_id = 'mock_apply';
                    var data = { 'ele_id' : ele_id };
                    sendAjax(url, data, function(ret) {
                        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                    }, showAlertError, false, 'GET', 'html');
                } else {
                    /*
                    url = '{{front_url('/mockTest/apply_order/')}}' + order_prod;
                    ele_id = 'mock_apply';
                    var data = { 'ele_id' : ele_id };
                    sendAjax(url, data, function(ret) {
                        $('#' + ele_id).html(ret).show().css('display', 'block').trigger('create');
                    }, showAlertError, false, 'GET', 'html');
                   */
                    url = '{{front_url('/mockTest/apply_order/')}}' + order_prod;
                    window.open(url, '_blank', 'width=755, height=845, scrollbars=yes, resizable=no');

            }

            @endif
        }

    </script>
@stop