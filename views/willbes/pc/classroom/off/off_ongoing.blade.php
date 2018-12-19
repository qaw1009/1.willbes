@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">

            <div class="willbes-Mypage-ACADZONE c_both">
                <div class="willbes-Prof-Subject willbes-Mypage-Tit NG">
                    · 수강신청강좌
                </div>
            </div>
            <!-- willbes-Mypage-ACADZONE -->

            <div class="willbes-Leclist c_both">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/off/list/ongoing/', 'www')}}" onsubmit="">
                    <div class="willbes-Lec-Selected willbes-Mypage-Selected tx-gray">
                        <select id="course_ccd" name="course_ccd" title="process" class="seleProcess">
                            <option selected="selected" value="">과정</option>
                            @foreach($course_arr as $row )
                                <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                            @endforeach
                        </select>
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
                            <option value="OrderDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'OrderDate^ASC') selected="selected" @endif>신청일순</option>
                            <option value="StudyStartDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'StudyStartDate^ASC') selected="selected" @endif>개강일순</option>
                            <option value="StudyEndDate^ASC" @if(isset($input_arr['orderby']) && $input_arr['orderby'] == 'StudyEndDate^ASC') selected="selected" @endif>종료임박순</option>
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
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col style="width: 510px;">
                            <col style="width: 160px;">
                            <col style="width: 150px;">
                            <col style="width: 120px;">
                        </colgroup>
                        <tbody>
                        @forelse( $list as $row )
                        <tr>
                            <td class="w-data tx-left pl10">
                                <dl class="w-info">
                                    <dt>
                                        {{$row['SubjectName']}}<span class="row-line">|</span>
                                        {{$row['wProfName']}} 교수님
                                        <span class="NSK ml15 nBox n{{ substr($row['AcceptStatusCcd'], -1)+1 }}">{{$row['AcceptStatusCcdName']}}</span>
                                    </dt>
                                </dl><br/>
                                <div class="w-tit">{{$row['subProdName']}}</div>
                            </td>
                            <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td>
                            <td class="w-schedule">
                                {{$row['WeekArrayName']}}<br/>
                                {{$row['Amount']}}회차
                            </td>
                            <td class="w-answer">
                                @if($row['StudyStartDate'] > date('Y-m-d', time()))
                                    {{str_replace('-', '.', $row['StudyStartDate'])}}<br/>
                                    개강
                                @else
                                    진행중
                                @endif
                            </td>
                        </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="tx-center">수강신청 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Leclist -->
        </div>
        {!! banner('내강의실_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#course_ccd,#subject_ccd,#prof_ccd,#orderby').on('change', function (){
                $('#searchFrm').submit();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });
    </script>
@stop