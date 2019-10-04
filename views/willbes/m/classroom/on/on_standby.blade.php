@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    수강대기강좌
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">단강좌 <span>{{count($lecList)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">패키지강좌 <span>{{count($pkgList)}}</span></a></li>
            </ul>
            <div class="tabBox lineBox lecListBox">
                <div class="tabContent">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 수강시작일 설정
                            <div class="MoreBtn underline"><a href="javascript:;">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 수강시작일은 개강일 전까지만 변경 가능합니다.<br/>
                        (수강연장강좌는 시작일 변경이 불가능합니다.)<br/>
                        - 사직일 변경(잔여횟수) 버튼을 클릭하면 강의별 <span class="tx-red">최대3회, 개강일 기준 30일까지만</span> 변경이 가능합니다.<br/>
                        - 수강시작일을 변경하면 변경된 시작일에 맞춰 종료기간 및 잔여기간이 자동으로 셋팅됩니다.<br/>
                        - 수강시작이 이루어진 강좌는 시작일 변경이 불가능합니다.<br/>
                    </div>

                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <form name="searchFrm" id="searchFrm" action="{{front_app_url('/classroom/on/list/standby/', 'www')}}">
                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($sitegroup_arr as $row )
                                    <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                                @endforeach
                            </select>
                            <!--
                            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($course_arr as $row )
                                    <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                            -->
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
                        </form>
                        <div class="resetBtn width10p ml1p">
                            <a href="{{front_url('/classroom/on/list/standby/')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                        </div>
                    </div>
                    
                    <div id="leclist1">
                        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                            <tbody>
                            @forelse( $lecList as $row )
                                <tr>
                                    <td class="w-data tx-left pb-zero">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                                <span class="NSK ml10 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                            </dt>
                                        </dl>
                                        <div class="w-tit">
                                            <a href="{{ front_url('/classroom/on/view/standby/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{!! ($row['IsRebuy'] > 0) ? '<span class="tx-red">[수강연장]</span> ':'' !!}{{$row['subProdName']}}</a>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['RealLecExpireDay']}}</span>일</dt>
                                        </dl>
                                        <div class="w-start tx-gray">
                                            <span class="w-subtxt">수강시작일 : {{$row['LecStartDate']}}</span>
                                            <ul class="two">
                                                @if($row['IsRebuy'] > 0 || $row['RebuyCount'] > 0)
                                                    <li class="btn_black_line"><a>시작일변경 불가</a></li>
                                                @elseif($row['IsLecStart'] == 'Y')
                                                    <li class="btn_white"><a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');">시작일변경</a></li>
                                                    <li class="btn_blue"><a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}', 'S');">수강시작</a></li>
                                                @else
                                                    <li class="btn_black_line"><a>시작일변경 불가</a></li>
                                                @endif
                                            </ul>
                                        </div>
                                        <div class="w-line">-</div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="tx-center">수강대기중인 강좌가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div id="leclist2" style="display: none;">
                        @forelse( $pkgList as $row )
                            <div class="willbes-Open-Table">
                                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                    <tbody>
                                    <tr class="bg-light-blue">
                                        <td class="w-data tx-left pb-zero">
                                            <div class="w-tit">
                                                {{$row['ProdName']}}
                                            </div>
                                            <dl class="w-info tx-gray">
                                                <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일 ({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                            </dl>
                                            <div class="w-start tx-gray">
                                                <ul class="two">
                                                    @if($row['IsLecStart'] == 'Y')
                                                        <li class="btn_white"><a href="javascript:;" onclick="fnStartChange('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');">시작일변경</a></li>
                                                        <li class="btn_blue"><a href="javascript:;" onclick="fnStartToday('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','', 'P');">수강시작</a></li>
                                                    @else
                                                        <li class="btn_black_line"><a>시작일변경 불가</a></li>
                                                    @endif
                                                </ul>
                                                <div class="MoreBtn f_right tx-right">
                                                    <a href="javascript:;"><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a>
                                                </div>
                                            </div>
                                            <div class="w-line">-</div>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable openTable">
                                    <tbody>
                                    @foreach( $row['subleclist'] as $subrow )
                                        <tr>
                                            <td class="w-data tx-left pb-zero">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$subrow['SubjectName']}}<span class="row-line">|</span>{{$subrow['wProfName']}}교수님
                                                        <span class="NSK ml10 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl>
                                                <div class="w-tit">
                                                    <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                                    <dt>진도율 : <span class="tx-blue">{{$subrow['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{$subrow['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                </dl>
                                                <div class="w-line mt20">-</div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @empty
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-center">수강대기중인 패키지가 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        @endforelse
                    </div>
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

        function fnStartChange(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);
            $("#chgForm").attr("action", "{{ front_url("/classroom/on/layerStartDate/") }}").submit();
            return;
            url = "{{ front_url("/classroom/on/layerStartDate/") }}";
            data = $('#chgForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    $("#STARTPASS").html(d).end();
                    openWin('STARTPASS');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }

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