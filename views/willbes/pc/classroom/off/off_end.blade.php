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
                <div class="c_both mb30">
                    <ul class="tabWrap tabDepthPass">
                        <li><a href="#Mypagetab1" class="on">단과반 ({{count($list)}})</a></li>
                        <li><a href="#Mypagetab2">종합반 ({{count($pkglist)}})</a></li>
                    </ul>
                </div>
                <div id="Mypagetab1">
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
                                <col>
                                <col style="width: 160px;">
                                <col style="width: 150px;">
                            </colgroup>
                            <tbody>
                            @forelse( $list as $row )
                                <tr>
                                    <td class="w-data tx-left pl10">
                                        <dl class="w-info">
                                            <dt>
                                                {{$row['CourseName']}}<span class="row-line">|</span>
                                                </span>{{$row['SubjectName']}}<span class="row-line">|</span>
                                                {{$row['wProfName']}} 교수님
                                                {{--
                                                <span class="NSK ml15 nBox n{{ substr($row['AcceptStatusCcd'], -1)+1 }}">{{$row['AcceptStatusCcdName']}}</span>
                                                --}}
                                            </dt>
                                        </dl>
                                        <div class="w-tit">{{$row['subProdName']}}</div>
                                        @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                            <dl class="w-info">
                                                <dt>
                                                    (수강증번호 : {{$row['CertNo']}})
                                                </dt>
                                            </dl>
                                        @endif
                                    </td>
                                    <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td>
                                    <td class="w-schedule">
                                        {{$row['WeekArrayName']}}<br/>
                                        {{$row['Amount']}}회차
                                    </td>
                                    {{-- <td class="w-answer">
                                        @if($row['StudyStartDate'] > date('Y-m-d', time()))
                                            {{str_replace('-', '.', $row['StudyStartDate'])}}<br/>
                                            개강
                                        @else
                                            진행중
                                        @endif
                                    </td> --}}
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                <div id="Mypagetab2">
                    <div class="willbes-Lec-Table NG d_block c_both">
                        <table cellspacing="0" cellpadding="0" class="lecTable acadTable bdt-dark-gray">
                            <colgroup>
                                <col>
                                {{-- <col style="width: 160px;"> --}}
                                <col style="width: 120px;">
                            </colgroup>
                            <tbody>
                            @forelse( $pkglist as $row )
                                <tr>
                                    <td class="w-data tx-left pl10">
                                        <div class="w-tit">{{$row['ProdName']}}</div>
                                        @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                            <dl class="w-info">
                                                <dt>
                                                    (수강증번호 : {{$row['CertNo']}})
                                                </dt>
                                            </dl>
                                        @endif
                                    </td>
                                    {{-- <td class="w-period">{{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</td> --}}
                                    <td class="w-answer p_re">
                                        <a href="#none" onclick="$('willbes-Layer-lecList').hide();openWin('lecList{{$row['OrderProdIdx']}}')"><span class="bBox grayBox">강좌구성보기</span></a>
                                        <div id="lecList{{$row['OrderProdIdx']}}" class="willbes-Layer-lecList">
                                            <a class="closeBtn" href="#none" onclick="closeWin('lecList{{$row['OrderProdIdx']}}')">
                                                <img src="{{ img_url('prof/close.png') }}">
                                            </a>
                                            <div class="Layer-Cont">
                                                <div class="Layer-SubTit tx-gray">
                                                    <ul>
                                                        @if(empty($row['subleclist']) == true)
                                                            <li>강의가 없습니다.</li>
                                                        @else
                                                            @foreach($row['subleclist'] as $subrow)
                                                                <li>{{$subrow['subProdName']}}</li>
                                                            @endforeach
                                                        @endif
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="tx-center">수강신청 강좌 정보가 없습니다.</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
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