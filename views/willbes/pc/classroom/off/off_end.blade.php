@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both">
                <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/off/list/end/', 'www')}}" onsubmit="">
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
                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess f_left">
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
                <div class="willbes-Lec-Table NG d_block c_both">
                    <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                        <colgroup>
                            <col style="width: 550px;">
                            <col style="width: 220px;">
                            <col style="width: 170px;">
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
                            </tr>
                        @empty
                            <tr>
                                <td colspan="2" class="tx-center">수강종료 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- willbes-Leclist -->

        </div>
        {!! banner('내강의실_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
    <script type="text/javascript">
        $(document).ready(function() {
            $('#sitegroup_ccd').on('change', function (){
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