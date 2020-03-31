@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            수강종료강좌
        </div>
        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">단과반 <span>{{count($list)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">종합반 <span>{{count($pkglist)}}</span></a></li>
            </ul>

            <div id="leclist1" class="tabContent">
                <form name="searchFrm" id="searchFrm" action="{{front_url('/classroom/off/list/end/')}}" onsubmit="">
                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess width21p">
                            <option selected="selected" value="">과정</option>
                            @foreach($sitegroup_arr as $row )
                                <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                            @endforeach
                        </select>
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
                            <a href="{{front_url('/classroom/off/list/end')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                        </div>
                    </div>
                </form>
                <div class="willbes-Txt NGR c_both pb20">※ 3개월 이전 수강종료내역은 PC에서 확인할 수 있습니다.</div>
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
                                    {{$row['subProdName']}}
                                </div>
                                <dl class="w-info acad tx-gray">
                                    @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                        <dt>
                                            (수강증번호 : {{$row['CertNo']}})<span class="row-line">|</span>
                                        </dt>
                                    @endif
                                    <dt>
                                        수강기간 : {{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}<span class="row-line">|</span>
                                    </dt>
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
                            <td class="w-data tx-center">수강종료 강좌가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>

            <div id="leclist2" class="tabContent">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @forelse( $pkglist as $row )
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    {{$row['ProdName']}}
                                </div>
                                <dl class="w-info acad tx-gray">
                                    @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                        <dt>
                                            (수강증번호 : {{$row['CertNo']}})
                                        </dt>
                                    @endif
                                    {{-- <dt>수강기간 : {{str_replace('-', '.', $row['StudyStartDate'])}} ~ {{str_replace('-', '.', $row['StudyEndDate'])}}</dt> --}}
                                </dl>
                                <div class="w-lecList">
                                    <div class="NG">강좌구성보기 <a href="javascript:;">▼</a></div>
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
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="w-data tx-center">수강신청 강좌가 없습니다.</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
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