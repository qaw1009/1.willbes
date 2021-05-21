@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    보강/복습동영상
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <div class="tabBox lineBox lecListBox">
                <div class="tabContent">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 보강/복습동영상 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div>></div>
                        - 보강/복습동영상은 내강의실 > 학원강좌 > 수강신청강좌에서 보강 신청한 강좌를 수강하실 수 있습니다.<br/>
                        - 보강/복습동영상은 기본 2일 기간으로 제공되며, <span class="tx-red">수강시작을 하지 않으면 7일 이후에 자동으로 수강시작됩니다.</span>
                    </div>
                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <form name="searchFrm" id="searchFrm" action="{{front_url('/classroom/on/bogang/')}}" onsubmit="">
                            <select id="subject_ccd" name="subject_ccd" title="lec" class="seleLec width21p ml1p">
                                <option selected="selected" value="">과목</option>
                                @foreach($subject_arr as $row )
                                    <option value="{{$row['SubjectIdx']}}" @if(isset($input_arr['subject_ccd']) && $input_arr['subject_ccd'] == $row['SubjectIdx']) selected="selected" @endif >{{$row['SubjectName']}}</option>
                                @endforeach
                            </select>
                            <select id="prof_ccd" name="prof_ccd" title="Prof" class="seleProf width45p ml1p">
                                <option selected="selected" value="">교수님</option>
                                @foreach($prof_arr as $row )
                                    <option value="{{$row['wProfIdx']}}" @if(isset($input_arr['prof_ccd']) && $input_arr['prof_ccd'] == $row['wProfIdx']) selected="selected" @endif >{{$row['wProfName']}}</option>
                                @endforeach
                            </select>
                            <div class="resetBtn width10p ml1p">
                                <a href="{{front_url('/classroom/on/bogang/')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                            </div>
                        </form>
                    </div>
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <tbody>
                        @forelse( $lecList as $row )
                            <tr>
                                <td class="w-data tx-left pb-zero">
                                    @if($row['LecTypeCcd'] == '607003')
                                        <div class="OTclass"><span>직장인반</span></div>
                                    @endif
                                    @if($row['IsDisp'] == 'N')
                                        <div class="OTclass"><span class="red">직강전환</span></div>
                                    @endif
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
                                            <a href="{{ front_url('/classroom/on/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!} {{$row['subProdName']}}</a>
                                        @endif
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span><span class="row-line">|</span></dt>
                                        <dt>보강/복습동영상 신청일 : <span class="tx-black">{{$row['OrderDate']}}</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">
                                        <ul class="two">
                                            @if($row['LecStartDate'] <= date("Y-m-d", time()))
                                                @if($row['IsDisp'] == 'N')
                                                    <li class="btn_blue"><a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!}{{$row['subProdName']}}</a></li>
                                                @else
                                                    <li class="btn_blue"><a href="{{ front_url('/classroom/on/view/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">강의보기</a></li>
                                                @endif
                                            @else
                                                <li class="btn_white"><a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');">수강시작</a></li>
                                                <li><span class="tx-red">수강대기</span></li>
                                            @endif
                                        </ul>
                                    </div>
                                    <div class="w-line">-</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="tx-center">수강중인 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        {{--
                                                <tr>
                                                    <td class="w-data tx-left pb-zero">
                                                        <dl class="w-info">
                                                            <dt>유아<span class="row-line">|</span>민정선</dt>
                                                        </dl>
                                                        <div class="w-tit tx-blue">
                                                            <a href="#none">2020 (9~10월) 실전 모의고사반 (7주)</a>
                                                        </div>
                                                        <dl class="w-info tx-gray">
                                                            <dt>수강기간 : <span class="tx-black">2021.00.00 ~ 2021.00.00 </span><span class="row-line">|</span></dt>
                                                            <dt>상 신청일 : <span class="tx-black">2021. 00. 00</span>일</dt>
                                                        </dl>
                                                        <div class="w-start tx-gray">
                                                            <ul class="two">
                                                                <li class="btn_white"><a href="#none">수강시작</a></li>
                                                                <li><span class="tx-red">수강대기</span></li>
                                                            </ul>
                                                        </div>
                                                        <div class="w-line">-</div>
                                                    </td>
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
                            <li><a href="#none">5</a></li>
                            <li class="Next"><a href="#none"><img src="{{ img_url('paging/paging_next.png') }}"> </a></li>
                        </ul>
                    </div> --}}
                </div>
            </div>
        </div>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->

    <form name="chgForm" id="chgForm"  >
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