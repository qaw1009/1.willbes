@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            수강신청강좌
        </div>
        <form name="searchFrm" id="searchFrm" action="{{app_url('/classroom/off/list/ongoing/', 'www')}}" onsubmit="">
            <div class="willbes-Lec-Selected NG c_both tx-gray">
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
                <div class="resetBtn width10p ml1p">
                    <a href="{{front_app_url('/classroom/off/list/ongoing', 'www')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
        </form>
        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
            <tbody>
            @forelse( $list as $row )
                <tr>
                    <td class="w-data tx-left">
                        <dl class="w-info">
                            <dt>
                                {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                <span class="NSK ml10 nBox n{{ substr($row['AcceptStatusCcd'], -1)+1 }}">{{$row['AcceptStatusCcdName']}}</span>
                            </dt>
                        </dl>
                        <div class="w-tit">
                            <a href="javascript:;">{{$row['subProdName']}}</a>
                        </div>
                        <dl class="w-info acad tx-gray">
                            <dt>수강기간 : {{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</dt>
                            <dt>요일/회차 : {{$row['WeekArrayName']}} {{$row['Amount']}}회차<span class="row-line">|</span>
                                @if($row['StudyStartDate'] > date('Y-m-d', time()))
                                    {{str_replace('-', '.', $row['StudyStartDate'])}}<br/>
                                    개강
                                @else
                                    진행중
                                @endif
                            </dt>
                        </dl>
                    </td>
                </tr>
            @empty
                <tr>
                    <td class="w-data tx-center">수강신청 강좌가 없습니다.</td>
                </tr>
            @endforelse
            </tbody>
        </table>
        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

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
    </script>
@stop