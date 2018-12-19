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

            <div class="willbes-Lec-Search mb60">
                <div class="inputBox p_re">
                    <input type="text" id="prod_name" name="prod_name" maxlength="30" value="{{ element('prod_name', $arr_input) }}" placeholder="강의명">
                    <button type="submit" onclick="goUrl('prod_name', document.getElementById('prod_name').value);" class="search-Btn">
                        <span>검색</span>
                    </button>
                </div>
                <div class="InfoBtn"><a href="#none">수강신청안내 <span>▶</span></a></div>
            </div>
            <!-- willbes-Lec-Search -->

            <div class="willbes-Lec NG c_both">
                <div class="willbes-Lec-Subject tx-dark-black">{{$title}}</div>
                <!-- willbes-Lec-Subject -->

                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Lec-Table d_block">
                    <table cellspacing="0" cellpadding="0" class="lecTable">
                        <colgroup>
                            <col style="width: 95px;">
                            <col style="width: 665px;">
                            <col style="width: 180px;">
                        </colgroup>
                        <tbody>

                        @foreach($data['list'] as $row)
                        <tr>
                            <td class="w-list bg-light-white">{{$row['CourseName']}}</td>
                            <td class="w-data tx-left pl25">
                                <div class="w-tit">
                                    <a href="{{ site_url('/package/show/cate/').$__cfg['CateCode'].'/pack/'.$pack.'/prod-code/'.$row['ProdCode'] }}">{{$row['ProdName']}}</a>
                                </div>
                                <dl class="w-info">
                                    <dt class="mr20">
                                        <a href="#none" onclick="productInfoModal('{{ $row['ProdCode'] }}', '', '{{ site_url() }}package')">
                                            <strong>패키지상세정보</strong>
                                        </a>
                                    </dt>
                                    <dt>개강일 : <span class="tx-blue">{{$row['StudyStartDateYM']}}</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>수강기간 : <span class="tx-blue">{{$row['StudyPeriod']}}일</span></dt>
                                    <dt class="NSK ml15">
                                        <span class="nBox n1">{{$row['MultipleApply']}}배수</span>
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
        <div class="Quick-Bnr ml20">
            {!! banner('강좌상품_우측날개', '', $__cfg['SiteCode'], '0') !!}
        </div>
    </div>
    <!-- willbes-Lec-buyBtn-sm -->
    <!-- End Container -->
    <script src="/public/js/willbes/product_util.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

        });
    </script>
@stop
