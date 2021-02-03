@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            수강신청강좌
        </div>
        <div class="lineTabs lecListTabs c_both">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap two mt-zero">
                <li><a href="#leclist1" class="on">종합반 <span>{{count($pkglist)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2">단과반 <span>{{count($list)}}</span></a></li>
            </ul>

            <div id="leclist1" class="tabContent">
                <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                    <tbody>
                    @forelse( $pkglist as $row )
                        <tr>
                            <td class="w-data tx-left">
                                <div class="w-tit">
                                    <a href="#none">{{$row['ProdName']}}</a>
                                </div>
                                @if(in_array($row['SiteCode'], ['2010','2011','2013']))
                                    <ul class="w-info acad tx-gray">
                                        <li>(수강증번호 : {{$row['CertNo']}})</li>
                                    </ul>
                                @endif
                                @if($row['PackTypeCcd'] == '648003')
                                    <div class="btnblue02 mt5"><a href="javascript:;" onclick="ViewAssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')">강사선택현황보기 ></a></div>
                                @endif

                                @if($row['PackTypeCcd'] == '648003')
                                    <div class="mt10">
                                        <a href="javascript:;" onclick="AssignProf('{{$row['OrderIdx']}}','{{$row['OrderProdIdx']}}')" class="btnSt01 mr10">강사선택</a>
                                        {{--
                                        <a href="#none" class="btnSt02 mr10">좌석선택</a>
                                        <a href="#none" class="btnSt03">온라인첨삭</a>
                                        --}}
                                    </div>
                                @endif
                                {{-- 좌석선택/온라인첨
                                <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                    <div>1기스터디  <span class="row-line">|</span>  감정평가실무  <span class="row-line">|</span>  여지훈 교수님</div>
                                    <div class="w-tit mb10">1기스터디 감정평가실무 여지훈</div>
                                    <ul>
                                        <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                        <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                        <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>
                                    </ul>
                                    <div class="mt10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>
                                    <div class="mt10"><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>
                                </div>
                                <div class="w-info bg-light-gray pd10 mt10 bdb-bright-gray">
                                    <div>1기스터디  <span class="row-line">|</span>  감정평가 및 보상법규  <span class="row-line">|</span>  이현진 교수님</div>
                                    <div class="w-tit">1기스터디 감정평가 및 보상법규 이현진</div>
                                    <ul class="mb10">
                                        <li>[강의실명] <span class="tx-light-blue">404호</span> <span class="row-line">|</span> <span class="tx-light-blue">404호</span><li>
                                        <li>[좌석번호] <span class="tx-light-blue">41</span><li>
                                        <li>[좌석선택기간] 2020-00-00 ~ 2020-00-00<li>
                                    </ul>
                                    <div class="mb10"><a href="#none" class="btnStfull01">좌석선택 ></a></div>
                                    <div><a href="#none" class="btnStfull02">온라인첨삭 ></a></div>
                                </div>
                                 좌석선택 / 온라인 첨삭 --}}
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

            <div id="leclist2" class="tabContent">
                <form name="searchFrm" id="searchFrm" action="{{front_url('/classroom/off/list/ongoing/')}}" onsubmit="">
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
                            <a href="{{front_url('/classroom/off/list/ongoing')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
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
                                    <span class="tx-blue">{{ $row['StudyPatternCcdName'] }}</span>
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
    <form name="postForm" id="postForm" method="post">
        {!! csrf_field() !!}
        {!! method_field('POST') !!}
        <input type="hidden" name="choice_box_p_no" id="choice_box_p_no" value="" />
        <input type="hidden" name="choice_box_no" id="choice_box_no" value="" />
        <input type="hidden" name="orderidx" id="orderidx" value="" />
        <input type="hidden" name="orderprodidx" id="orderprodidx" value="" />

        <input type="hidden" name="pkg_yn" id="pkg_yn" value="" />
        <input type="hidden" name="prod_code" id="prod_code" value="" />
        <input type="hidden" name="prod_code_sub" id="prod_code_sub" value="" />
        <input type="hidden" name="lr_code" id="lr_code" value="" />
        <input type="hidden" name="lr_unit_code" id="lr_unit_code" value="" />
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

        function ViewAssignProf(o,op){
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);
            $("#postForm").attr("action", "{{ front_url("/classroom/off/ViewAssignProf/") }}").submit();
        }

        function AssignProf(o,op)
        {
            $('#orderidx').val(o);
            $('#orderprodidx').val(op);
            $("#postForm").attr("action", "{{ front_url("/classroom/off/AssignProf/") }}").submit();
        }
    </script>
@stop