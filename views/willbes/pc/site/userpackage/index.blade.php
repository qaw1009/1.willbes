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
                <div class="CurriBox">
                    <table cellspacing="0" cellpadding="0" class="curriTable">
                        <colgroup>
                            <col width="*">
                            <col width="*">
                            <col width="*">
                        </colgroup>
                        <tbody>
                        <tr>
                            <th class="tx-gray">대비년도</th>
                            <td class="tx-left">
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
                                <a href="#none" onclick="location.href=location.pathname"><img src="/public/img/willbes/sub/icon_clear.gif">전체해제</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- curriWrap -->

            <div class="willbes-Lec NG c_both mt50">
                <div class="willbes-Lec-Line">-</div>
                <!-- willbes-Lec-Line -->

                <div class="willbes-Lec-Table d_block">
                    <table cellspacing="0" cellpadding="0" class="lecTable">
                        <colgroup>
                            <col>
                            <col style="width: 140px;">
                        </colgroup>
                        <tbody>

                        @foreach($data['list'] as $row)
                            <tr>
                                <td class="tx-left pl25">
                                    <div class="w-tit">
                                        <a href="{{ front_url('/userPackage/show/cate/').$__cfg['CateCode'].'/prod-code/'.$row['ProdCode'] }}"> {{$row['ProdName']}}</a>
                                    </div>
                                </td>
                                <td class="w-sp btnBlue">
                                    <a href="{{ front_url('/userPackage/show/cate/').$__cfg['CateCode'].'/prod-code/'.$row['ProdCode'] }}">강좌선택</a>
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
