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
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif ">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">일시정지강좌</div>
                                <div class="Txt">
                                    - '일시정지해제'버튼을 클릭하시면 일시정지 상태가 해제되어 즉시 수강하실 수 있습니다.<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/on/list/ongoing/', 'www')}}" onsubmit="">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($sitegroup_arr as $row )
                                <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                            @endforeach
                        </select>
                        <!--
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
                        -->
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
                        <select id="orderby" name="orderby" title="Laststudy" class="seleStudy">
                            <option value="lastStudyDate^DESC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'lastStudyDate') selected="selected" @endif>최종학습일순</option>
                            <option value="LecStartDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'LecStartDate^ASC') selected="selected" @endif>개강일순</option>
                            <option value="RealLecEndDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'RealLecEndDate^ASC') selected="selected" @endif>종료임박순</option>
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

                <div class="DetailWrap c_both">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                        <li><a href="#Mypagetab2">패키지강좌 ({{count($pkgList)}})</a></li>
                    </ul>
                    <div class="tabBox">
                        <div id="Mypagetab1" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 820px;">
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
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                @if($row['LecTypeCcd'] == '607003')
                                                    <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                @endif
                                                <div class="w-tit">
                                                    <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>잔여기간 : <span class="tx-blue">{{intval((strtotime($row['RealLecEndDate'])-strtotime($row['lastPauseEndDate']))/86400)}}일</span>({{ str_replace('-', '.', date("Y-m-d", strtotime($row['lastPauseEndDate'].'+1day'))) }}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnRestart('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="2" class="tx-center">일시중지 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Mypagetab2" class="tabLink">
                            @forelse( $pkgList as $row )
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl10">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>잔여기간 : <span class="tx-blue">{{intval((strtotime($row['RealLecEndDate'])-strtotime($row['lastPauseEndDate']))/86400)}}일</span>({{ str_replace('-', '.', date("Y-m-d", strtotime($row['lastPauseEndDate'].'+1day'))) }}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                    <dt class="MoreBtn"><a href="#none">강좌 열기 ▼</a></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnRestart('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');"><span class="bBox whiteBox NSK">일시정지해제</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable">
                                        <colgroup>
                                            <col style="width: 120px;">
                                            <col style="width: 820px;">
                                        </colgroup>
                                        <tbody>
                                        @foreach( $row['subleclist'] as $subrow )
                                            <tr>
                                                <td class="w-percent">진도율<br/>
                                                    <span class="tx-blue">{{$subrow['StudyRate']}}%</span>
                                                </td>
                                                <td class="w-data tx-left pl10">
                                                    <dl class="w-info">
                                                        <dt>
                                                            {{$subrow['SubjectName']}}<span class="row-line">|</span>
                                                            {{$subrow['wProfName']}}교수님
                                                            <span class="NSK ml15 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                        </dt>
                                                    </dl><br/>
                                                    @if($subrow['LecTypeCcd'] == '607003')
                                                        <div class="OTclass mr10"><span>직장인/재학생반</span></div>
                                                    @endif
                                                    <div class="w-tit">
                                                        <a href="{{ site_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>잔여기간 : <span class="tx-blue">{{intval((strtotime($row['RealLecEndDate'])-strtotime($row['lastPauseEndDate']))/86400)}}일</span>({{ date("Y-m-d", strtotime($row['lastPauseEndDate'].'+1day')) }}~{{$row['RealLecEndDate']}})</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                    </dl>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @empty
                                <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <td colspan="2" class="tx-center">일시중지중인 패키지강좌가 없습니다.</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- willbes-Mypage-Tabs -->
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>

    <!-- End Container -->
    <form name="postForm" id="postForm" >
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="prodcode" id="prodcode" value="" />
        <input type="hidden" name="prodcodesub" id="prodcodesub" value="" />
        <input type="hidden" name="prodtype" id="prodtype" value="" />
    </form>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby,#sitegroup_ccd').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });

        function fnRestart(o, p, sp, t)
        {
            if(window.confirm('일시정지를 해제하고 오늘부터 수강을 시작하시겠습니까?') == false){
                return;
            }

            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);

            url = "{{ site_url("/classroom/on/restartPause/") }}";
            data = $('#postForm').serialize();

            sendAjax(url,
                data,
                function(d){
                    alert('일시정지가 해제되었습니다.\n수강중인 강의에서 수강해주십시요.');
                    document.location.replace('{{front_url('/classroom/on/list/ongoing/')}}');
                },
                function(ret, status){
                    alert(ret.ret_msg);
                }, false, 'GET', 'html');
        }
    </script>
@stop