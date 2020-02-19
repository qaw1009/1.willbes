@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach
            </form>
            <div class="curriWrap c_both">
                {{-- 과정 --}}
                <ul class="curriTabs c_both">
                    <li><a href="#none" onclick="goUrl('course_idx', '');" class="@if(empty(element('course_idx', $arr_input)) === true) on @endif">전체</a></li>
                    @foreach($arr_base['course'] as $idx => $row)
                    <li><a href="#none" onclick="goUrl('course_idx', '{{ $row['CourseIdx'] }}');" class="@if(element('course_idx', $arr_input) == $row['CourseIdx']) on @endif">{{ $row['CourseName'] }}</a></li>
                    @endforeach
                </ul>
                <div class="CurriBox">
                    <table cellspacing="0" cellpadding="0" class="curriTable">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td colspan="8" class="tx-left">
                            <span>
                                <input type="radio" id="school_year" name="school_year" value="" onclick="goUrl('school_year', '');" @if(empty(element('school_year', $arr_input)) === true) checked="checked" @endif/>
                                <label for="school_year">전체</label>
                            </span>
                                @for($i=2017; $i<=date('Y')+1; $i++)
                                    <span>
                                    <input type="radio" id="school_year" name="school_year" value="{{ $i }}" onclick="goUrl('school_year', '{{ $i }}');" @if(element('school_year', $arr_input) == $i) checked="checked" @endif/>
                                    <label for="school_year">{{ $i }}년</label>
                                </span>
                                @endfor
                            </td>
                            <td class="All-Clear">
                                <a href="#none" onclick="location.href=location.pathname"><img src="{{ img_url('sub/icon_clear.gif') }}" style="margin: -2px 6px 0 0">전체해제</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- curriWrap -->

            <div class="willbes-Bnr">
                <script src="{{ app_url('/banner/show/site/' . $__cfg['SiteCode'] . '/cate/' . $__cfg['CateCode'] . '/section/00000/location/000000', 'www') }}"></script>
            </div>
            <!-- willbes-Bnr -->

            <div class="willbes-Lec-Search p_re mb60">
                <div class="inputBox p_re">
                    <div class="selectBox">
                        <select id="search_order" name="search_order" class="" onchange="goUrl('search_order', this.value);">
                            <option value="regist" @if(element('search_order', $arr_input) == 'regist') selected="selected" @endif>최근등록순</option>
                            <option value="course" @if(element('search_order', $arr_input) == 'course') selected="selected" @endif>과정순</option>
                        </select>
                    </div>
                    <input type="text" id="prod_name" name="prod_name" maxlength="30" value="{{ element('prod_name', $arr_input) }}" placeholder="강의명">
                    <button type="submit" onclick="goUrl('prod_name', document.getElementById('prod_name').value);" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                
                <div class="InfoBtn"><a href="#none" onclick="openWin('requestInfo')">수강신청안내 <span>▶</span></a></div>
                <div id="requestInfo" class="willbes-Layer-requestInfo">
                    <a class="closeBtn" href="#none" onclick="closeWin('requestInfo')">
                        <img src="{{ img_url('prof/close.png') }}">
                    </a>
                    <div class="Layer-Tit NG tx-dark-black">수강신청 <span class="tx-blue">안내</span></div>
                    <div class="Layer-Cont">
                        <div class="Layer-SubTit tx-gray">
                            <ul>
                                <li>
                                    <strong>도서구입비 소득공제 시행에 따른 분리결제 적용 안내</strong><br>
                                    - 소득공제 대상 상품(교재)와 비대상 상품 (강의)을 함께 주문하실 수 없습니다. <br>
                                    (소득공제를 위한 가맹점 분리로 인해 2회 결제 진행)<br>
                                    - 반드시 <span class="tx-red">강의와 교재를 각각 결제</span>해주시기 바랍니다. (강좌상품 선구매 후 교재 구매 가능)
                                </li>
                                <li>
                                    <strong>아이콘 안내</strong><br>
                                    - 강좌리스트에 보여지고 있는 아이콘에 대한 설명입니다. 참고하시어 수강신청해 주세요.
                                </li>
                            </ul>
                        </div>
                        <div class="LeclistTable">
                            <table cellspacing="0" cellpadding="0" class="listTable csTable under-gray upper-black tx-gray">
                                <colgroup>
                                    <col style="width: 130px;">
                                    <col style="width: auto;">
                                </colgroup>
                                <tbody>
                                    <tr>
                                        <td><span class="nBox n4">완강</span></td>
                                        <td class="tx-left">모든 강의 제작 및 업데이트가 완료된 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><span class="nBox n2">진행중</span></th>
                                        <td class="tx-left">강의 업데이트가 진행중인 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><span class="nBox n3">예정</span></th>
                                        <td class="tx-left">신규강좌 업데이트가 예정중인 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><span class="nBox n1">2배수</span></th>
                                        <td class="tx-left">공유 방지를 위해 전체강의시간/개별강의시간의 2배까지 수강이 가능한 강좌</td>
                                    </tr>
                                    <tr>
                                        <th><img src="{{ img_url('sub/icon_detail.gif') }}"></th>
                                        <td class="tx-left">돋보기 아이콘 클릭 시 해당 강좌의 상세정보 팝업 노출</td>    
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- requestInfo //-->
            </div>
            <!-- willbes-Lec-Search -->

            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">{{--$title--}}</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Lec-Table d_block">
                    <table cellspacing="0" cellpadding="0" class="lecTable">
                        <colgroup>
                            <col style="width: 140px;">
                            <col>
                            <col style="width: 180px;">
                        </colgroup>
                        <tbody>

                        @foreach($data['list'] as $row)
                        <tr>
                            <td class="w-list bg-light-white pl10 pr10">{{$row['CourseName']}}</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/package/show/cate/').$__cfg['CateCode'].'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url() }}package')">
                                            <strong class="open-info-modal">패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">{{ $row['MultipleApply'] === "1" ? '무제한' : $row['MultipleApply'].'배수'}}</span>
                                    </dt>
                                </dl>
                            </td>
                            <td class="w-notice">
                            @if(empty($row['ProdPriceData'] ) === false)
                                @foreach($row['ProdPriceData'] as $price_row)
                                    @if($loop -> index === 1)
                                    <div class="priceWrap">
                                        <span class="price tx-blue">{{ number_format($price_row['RealSalePrice'],0)}}원</span>
                                        <span class="discount">(↓{{ $price_row['SaleRate'] . $price_row['SaleRateUnit'] }})</span>
                                    </div>
                                    @endif
                                @endforeach
                            @endif
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <!-- lecTable -->
                </div>
                <!-- willbes-Lec-Table -->

                <div class="TopBtn">
                    <a href="#none" onclick="goTop()"><span class="arrow-Btn">></span> TOP</a>
                </div>
                <!-- TopBtn-->
            </div>
            <!-- willbes-Lec -->

            <div id="InfoForm" class="willbes-Layer-Box d2"></div>

            <!-- willbes-Layer-Box -->
        </div>
        {!! banner('수강신청_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}

    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    {!! popup('657002') !!}
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@stop
