@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Mypage-ONLINEZONE c_both">
                <div class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">보강동영상 안내</div>
                                <div class="Txt">
                                    - 보강동영상은 내강의실 > 학원강좌 > 수강신청강좌 메뉴에서 보강 신청한 강좌를 수강하실 수 있습니다.<br>
                                    - 보강동영상은 기본 2일 기간으로 제공되며, <span class="tx-red">수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.</span>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->

            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/bogang/', 'www')}}" onsubmit="">
                <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                    <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec">
                        <option selected="selected" value="">과목</option>
                        @foreach($subject_arr as $row )
                            <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                        @endforeach
                    </select>
                    <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf">
                        <option selected="selected" value="">교수님</option>
                        @foreach($prof_arr as $row )
                            <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                        @endforeach
                    </select>
                    <div class="willbes-Lec-Search GM f_right">
                        <div class="inputBox p_re">
                            <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30">
                            <button type="submit" class="search-Btn">
                                <span>검색</span>
                            </button>
                        </div>
                    </div>
                </div>
                </form>

                <div class="willbes-Lec-Table pt20 NG d_block">
                    <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                        <colgroup>
                            <col>
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                        @forelse( $lecList as $row )
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                        {{$row['wProfName']}}교수님
                                    </dt>
                                </dl>
                                <div class="w-tit tx-blue">
                                    @if($row['IsDisp'] == 'N')
                                        <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!}{{$row['subProdName']}}</a>
                                    @else
                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                    @endif
                                </div>
                                <dl class="w-info tx-gray">
                                    <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                    <dt><span class="row-line">|</span></dt>
                                    <dt>보강동영상 신청일 : <span class="tx-black">{{$row['OrderDate']}}</span></dt>
                                </dl>
                            </td>
                            <td class="w-answer">
                                @if($row['LecStartDate'] <= date("Y-m-d", time()))
                                    @if($row['IsDisp'] == 'N')
                                        <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!}{{$row['subProdName']}}</a>
                                    @else
                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><span class="bBox whiteBox NSK">강의보기</span></a>
                                    @endif
                                @else
                                    <span class="tx-red">수강대기</span>
                                    <a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');"><span class="bBox blueBox NSK">수강시작 ></span></a>
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="tx-center">수강중인 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        {{--
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        유아<span class="row-line">|</span>민정선
                                    </dt>
                                </dl>
                                <div class="w-tit tx-blue"">
                                <a href="#nnoe">2020 (9~10월) 실전 모의고사반 (7주)</a>
                </div>
                <dl class="w-info tx-gray">
                    <dt>수강기간 : <span class="tx-black">2021.00.00 ~ 2021.00.00</span></dt>
                    <dt><span class="row-line">|</span></dt>
                    <dt>보강동영상 신청일 : <span class="tx-black">2021.00.00 00:00</span></dt>
                </dl>
                </td>
                <td class="w-answer">
                    <span class="tx-red">수강대기</span>
                    <a href="#none"><span class="bBox blueBox NSK">수강시작 ></span></a>
                </td>
                </tr>
                <tr>
                    <td colspan="2" class="tx-center">강좌 정보가 없습니다.</td>
                </tr> --}}
                </tbody>
                </table>
                    {{--
                <div class="Paging">
                    <ul>
                        <li class="Prev"><a href="#none"><img src="{{ img_url('paging/paging_prev.png') }}"> </a></li>
                        <li><a class="on" href="#none">1</a><span class="row-line">|</span></li>
                        <li><a href="#none">2</a><span class="row-line">|</span></li>
                        <li><a href="#none">3</a><span class="row-line">|</span></li>
                        <li><a href="#none">4</a><span class="row-line">|</span></li>
                        <li><a href="#none">5</a><span class="row-line">|</span></li>
                        <li><a href="#none">6</a><span class="row-line">|</span></li>
                        <li><a href="#none">7</a><span class="row-line">|</span></li>
                        <li><a href="#none">8</a><span class="row-line">|</span></li>
                        <li><a href="#none">9</a><span class="row-line">|</span></li>
                        <li><a href="#none">10</a></li>
                        <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                    </ul>
                </div> --}}
            </div>
        </div>

    </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    <div class="Quick-Bnr ml20">

    </div>
    </div>
    <!-- End Container -->
    <form name="chgForm" id="chgForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="prodcode" id="prodcode" value="" />
        <input type="hidden" name="prodcodesub" id="prodcodesub" value="" />
        <input type="hidden" name="prodtype" id="prodtype" value="" />
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {
                }
            });
        });

        function fnStartToday(o, p, sp, t)
        {
            if(window.confirm('시작일을 오늘로 설정하시겠습니까?') == false){
                return;
            }

            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/setStartToday/") }}";
            data = $('#chgForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert("시작일이 오늘로 설정되었습니다.");
                    location.reload();
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, true, 'POST', 'html');
        }

    </script>
@stop