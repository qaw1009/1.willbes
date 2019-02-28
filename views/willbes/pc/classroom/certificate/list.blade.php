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
                <div id="info1" class="willbes-Cart-Txt willbes-Mypage-Txt NG p_re">
                    <span class="MoreBtn"><a href="#none">유의사항안내 @if(get_cookie('moreInfo') == 'off')보기 ▼@else닫기 ▲@endif</a></span>
                    <table cellspacing="0" cellpadding="0" class="txtTable tx-black @if(get_cookie('moreInfo') == 'off') off @endif">
                        <tbody>
                        <tr @if(get_cookie('moreInfo') == 'off') style="display: none; !important" @endif>
                            <td>
                                <div class="Tit">수강확인증출력</div>
                                <div class="Txt">
                                    - 결제완료된 강좌의 수강확인증 출력이 가능합니다.<br/>
                                    &nbsp; (※ 환불된 강좌는 수강확인증 출력 리스트에서 노출되지 않음)<br/>
                                    - 무한패스의 경우 강의추가/삭제 설정으로 인해 단강좌 기준의 수강확인증 출력이 불가능합니다.<br/>
                                    - 패키지의 경우 패키지 기준 수강확인증과 단강좌 기준 수강확인증을 각각 출력할 수 있습니다.<br/>
                                    - 단, 패키지 기준 수강확인증 출력 시 진도율은 제공되지 않습니다. (단강좌 기준 수강확인증에서만 진도율 제공)<br/>
                                </div>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Mypage-ONLINEZONE -->
            <div class="willbes-Mypage-Tabs mt40">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/certificate/list/', 'www')}}" onsubmit="">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected willbes-Mypage-Selected-Search tx-gray">
                        <span class="w-data">
                            기간검색 &nbsp;
                            <input type="text" id="search_start_date" name="search_start_date" value="{{ $input_arr['search_start_date'] or '' }}" title="검색시작일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/> ~&nbsp;
                            <input type="text" id="search_end_date" name="search_end_date" value="{{ $input_arr['search_end_date'] or '' }}" title="검색종료일자" class="iptDate datepicker" maxlength="10" autocomplete="off"/>
                        </span>
                        <span class="w-month">
                            <ul>
                                <li><a class="btn-set-search-date" data-period="0-all" style="cursor:pointer;">전체</a></li>
                                <li><a class="btn-set-search-date" data-period="1-months" style="cursor:pointer;">1개월</a></li>
                                <li><a class="btn-set-search-date" data-period="3-months" style="cursor:pointer;">3개월</a></li>
                                <li><a class="btn-set-search-date" data-period="6-months" style="cursor:pointer;">6개월</a></li>
                            </ul>
                        </span>
                        <div class="willbes-Lec-Search GM f_right">
                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess">
                                <option selected="selected" value="">과정</option>
                                @foreach($sitegroup_arr as $row )
                                    <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                                @endforeach
                            </select>
                            <!--
                            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess f_left">
                                <option selected="selected" value="">과정</option>
                                @foreach($course_arr as $row )
                                    <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                                @endforeach
                            </select>
                            -->
                            <div class="inputBox p_re">
                                <input type="text" id="search_text" name="search_text" class="labelSearch" value="@if(isset($input_arr['search_text'])){{$input_arr['search_text']}}@endif" placeholder="강좌명을 검색해 주세요" maxlength="30"  style="width: 220px;">
                                <button type="submit" onclick="" class="search-Btn">
                                    <span>검색</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="DetailWrap c_both">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" class="on">단강좌 ({{count($lecList)}})</a></li>
                        <li><a href="#Mypagetab2" >무한패스 ({{count($passList)}})</a></li>
                        <li><a href="#Mypagetab3" >패키지강좌 ({{count($pkgList)}})</a></li>
                        <li><a href="#Mypagetab4" >무료강좌 ({{count($freeList)}})</a></li>
                    </ul>
                    <div class="tabBox">
                        <div id="Mypagetab1" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 120px;">
                                        <col style="width: 700px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $lecList as $row )
                                        <tr>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    {{$row['subProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>결제일 : <span class="tx-black">{{str_replace('-', '.',$row['OrderDate'])}}</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnView('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="tx-center">수강종료 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div id="Mypagetab2" class="tabLink">
                            <div class="willbes-Lec-Table willbes-Package-Table pt20 NG d_block">
                                @forelse( $passList as $row )
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl30">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>결제일 : <span class="tx-black">{{str_replace('-', '.',$row['OrderDate'])}}</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnView('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @empty
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-center pl30">
                                                수강종료 강좌가 없습니다.
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endforelse
                            </div>
                        </div>
                        <div id="Mypagetab3" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                @forelse( $pkgList as $row )
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr class="bg-light-blue">
                                            <td class="w-data tx-left pl30">
                                                <div class="w-tit">
                                                    {{$row['ProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>수강기간 : {{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                                    <dt class="MoreBtn"><a href="javascript:;" onclick="fnOpenSub('{{$row['OrderIdx']}}-{{$row['ProdCode']}}');">강좌 열기 ▼</a></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnView('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <table cellspacing="0" cellpadding="0" class="packInfoTable lecTable" id="sub-{{$row['OrderIdx']}}-{{$row['ProdCode']}}">
                                        <colgroup>
                                            <col style="width: 120px;">
                                            <col style="width: 700px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        @foreach( $row['subleclist'] as $subrow )
                                            <tr class="replyTxt">
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
                                                    <div class="w-tit">
                                                        {{$subrow['subProdName']}}
                                                    </div>
                                                    <dl class="w-info tx-gray">
                                                        <dt>강의수 : <span class="tx-black">{{$subrow['wUnitLectureCnt']}}강</span></dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>수강기간 : {{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</dt>
                                                        <dt><span class="row-line">|</span></dt>
                                                        <dt>최종학습일 : <span class="tx-black">{{ $subrow['lastStudyDate'] == '' ? '학습이력없음' : $subrow['lastStudyDate'] }}</span></dt>
                                                    </dl>
                                                </td>
                                                <td class="w-answer">
                                                    <a href="javascript:;" onclick="fnView('{{$subrow['OrderIdx']}}','{{$subrow['ProdCode']}}','{{$subrow['ProdCodeSub']}}','S');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                @empty
                                    <table cellspacing="0" cellpadding="0" class="packTable lecTable bdt-dark-gray">
                                        <colgroup>
                                            <col style="width: 820px;">
                                            <col style="width: 120px;">
                                        </colgroup>
                                        <tbody>
                                        <tr>
                                            <a href="javascript:;" onclick="fnView('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                        </tr>
                                        </tbody>
                                    </table>
                                @endforelse
                            </div>
                        </div>
                        <div id="Mypagetab4" class="tabLink">
                            <div class="willbes-Lec-Table pt20 NG d_block">
                                <table cellspacing="0" cellpadding="0" class="lecTable bdt-dark-gray">
                                    <colgroup>
                                        <col style="width: 120px;">
                                        <col style="width: 700px;">
                                        <col style="width: 120px;">
                                    </colgroup>
                                    <tbody>
                                    @forelse( $freeList as $row )
                                        <tr>
                                            <td class="w-percent">진도율<br/>
                                                <span class="tx-blue">{{$row['StudyRate']}}%</span>
                                            </td>
                                            <td class="w-data tx-left pl10">
                                                <dl class="w-info">
                                                    <dt>
                                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                                        {{$row['wProfName']}}교수님
                                                        <span class="NSK ml15 nBox n{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                                    </dt>
                                                </dl><br/>
                                                <div class="w-tit">
                                                    {{$row['subProdName']}}
                                                </div>
                                                <dl class="w-info tx-gray">
                                                    <dt>결제일 : <span class="tx-black">{{str_replace('-', '.',$row['OrderDate'])}}</span></dt>
                                                    <dt><span class="row-line">|</span></dt>
                                                    <dt>수강기간 : <span class="tx-blue">{{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}}</span></dt>
                                                </dl>
                                            </td>
                                            <td class="w-answer">
                                                <a href="javascript:;" onclick="fnView('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');"><span class="bBox blueBox NSK">수강확인증</span></a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="3" class="tx-center">수강종료 강좌가 없습니다.</td>
                                        </tr>
                                    @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-Mypage-Tabs -->
        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
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

        function fnView(o,p,ps,t)
        {
            popupOpen('{{front_url('/classroom/certificate/view')}}?o='+o+'&p='+p+'&ps='+ps+'&t='+t,'Certificate'
                ,800,700,null,null,'yes','yes');
        }

        function fnOpenSub(id)
        {
            $('.packInfoTable').hide();
            $('#sub-'+id).show();
        }
    </script>
@stop