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
                    수강중강좌
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both mb50">
            <ul class="tabWrap lineWrap rowlineWrap lecListWrap four mt-zero">
                <li><a href="#leclist1" class="on" onclick="fnSetMoreTable();" >단과강좌 <span>{{count($lecList)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist2" onclick="fnSetMoreTable();">패키지강좌 <span>{{count($pkgList)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist3" onclick="fnSetMoreTable();">무료특강 <span>{{count($freeList)}}</span></a><span class="row-line">|</span></li>
                <li><a href="#leclist4" class="p_re" onclick="fnSetMoreTable();">관리자부여 <span>{{count($adminList['lec'])+count($adminList['pkg'])}}</span><div class="twoRow">복습동영상</div></a></li>
            </ul>

            <div class="tabBox lineBox lecListBox">
                <div id="leclist1" class="tabContent">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 단과강좌수강 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 일시정지(잔여횟수)버튼을 클릭하면 강좌별로 <span class="tx-red">최대 3회까지 가능</span>합니다.<br/>
                        - 1회 일시정지 기간은 수강 잔여일을 초과할 수 없으며, <span class="tx-red">일시 정지기간의 총합은 수강기간을 초과할 수 없습니다.</span><br/>
                        - 일시정지된 강좌는 일시정지강좌에서 확인할 수 있습니다.<br/>
                        - 단, 사이트(과정)별 수강정책에 특이사항이 있을 경우 예외 정책을 반영할 수 있습니다.<br/>
                        <div class="willbes-Txt-Tit NG mt30">· 수강연장</div>
                        - 수강연장된 강의는 일시정지를 신청할 수 없습니다.<br/>
                        - 수강연장(잔여횟수)버튼을 클릭하면 강좌별로 <span class="tx-red">최대 3회까지</span> 연장이 가능합니다.<br/>
                        - <span class="tx-red">연장일수는 본래 수강기간의 50%를 초과할 수 없습니다.</span><br/>
                        - 수강연장은 수강종료일 전까지만 신청이 가능하며 5일 단위(5일,10일,15일등)로 신청할 수 있습니다.<br/>
                        - 수강연장은 유료로 신청이 가능하며 연장일수에 따라 결제금액이 상이합니다.<br/>
                        - 폐강된 강좌는 수강연장이 제공되지 않습니다.<br/>
                        - 단, 사이트(과정)별 수강정책에 특이사항이 있을 경우 예외 정책을 반영할 수 있습니다.<br/>
                    </div>

                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <form name="searchFrm" id="searchFrm" action="{{front_url('/classroom/on/list/ongoing/')}}" onsubmit="">
                            <select id="sitegroup_ccd" name="sitegroup_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($sitegroup_arr as $row )
                                    <option value="{{$row['SiteGroupCode']}}" @if(isset($input_arr['sitegroup_ccd']) && $input_arr['sitegroup_ccd'] == $row['SiteGroupCode']) selected="selected" @endif  >{{$row['SiteGroupName']}}</option>
                                @endforeach
                            </select>
                            {{--
                            <select id="course_ccd" name="course_ccd" title="process" class="seleProcess width21p">
                                <option selected="selected" value="">과정</option>
                                @foreach($course_arr as $row )
                            <option value="{{$row['CourseIdx']}}" @if(isset($input_arr['course_ccd']) && $input_arr['course_ccd'] == $row['CourseIdx']) selected="selected" @endif  >{{$row['CourseName']}}</option>
                                @endforeach
                                </select>
                               --}}

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
                                <a href="{{front_url('/classroom/on/list/ongoing/')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
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
                                            {{$row['wProfName']}}교수님 <span class="NSK ml10 nBox nn{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                        </dt>
                                    </dl>
                                        @if($row['LearnPatternCcd'] == '615002')
                                            <div class="w-tit pkg-tit">
                                                <a href="#none"><span>패키지</span> {{$row['ProdName']}}</a>
                                            </div>
                                        @endif
                                    <div class="w-tit">
                                        @if($row['IsDisp'] == 'N')
                                            <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!}{{$row['subProdName']}}</a>
                                        @else
                                            <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{!! ($row['SalePatternCcd'] == '694003') ? '<span class="tx-red">[수강연장]</span> ':'' !!} {{$row['subProdName']}}</a>
                                        @endif
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                        <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                        <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                    </dl>
                                    <div class="w-start tx-gray">
                                        <ul class="two">
                                            @if($row['IsExten'] == 'N')
                                                <li class="btn_blue"><a>수강연장불가</a></li>
                                            @elseif($row['LearnPatternCcd'] == '615002' && $row['IsPackExtenType'] == 'P')
                                                <li class="btn_blue"><a>수강연장불가</a></li>
                                            @elseif($row['RebuyCount'] >= $row['ExtenNum'])
                                                <li class="btn_blue"><a>연장횟수초과({{$row['RebuyCount']}})</a></li>
                                            @elseif($row['IsDisp'] == 'N')
                                                <li class="btn_blue"><a href="javascript:alert('직강으로 전환된 강좌로 변경이 불가능합니다.');">수강연장({{$row['RebuyCount']}})</a></li>
                                            @else
                                                <li class="btn_blue"><a href="javascript:;" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');">수강연장({{$row['RebuyCount']}})</a></li>
                                            @endif

                                            {{-- @if($row['IsRebuy'] > 0 || $row['RebuyCount'] > 0) --}}
                                            @if($row['SalePatternCcd'] == '694003')
                                                <li class="btn_white"><a>일시정지불가</a></li>
                                            @elseif($row['LearnPatternCcd'] == '615002' && $row['IsPackPauseType'] == 'P')
                                                <li class="btn_white"><a>일시정지불가</a></li>
                                            @elseif($row['IsPause'] == 'N')
                                                <li class="btn_white"><a>일시정지불가</a></li>
                                            @elseif($row['PauseCount'] >= $row['PauseNum'])
                                                <li class="btn_white">정지횟수초과({{$row['PauseCount']}})</li>
                                            @elseif($row['IsDisp'] == 'N')
                                                <li class="btn_white"><a href="javascript:alert('직강으로 전환된 강좌로 변경이 불가능합니다.');">일시정지({{$row['PauseCount']}})</a></li>
                                            @else
                                                <li class="btn_white"><a href="javascript:;" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','{{$row['ProdCodeSub']}}','S');">일시정지({{$row['PauseCount']}})</a></li>
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
                        </tbody>
                    </table>
                </div>
                <div id="leclist2" class="tabContent" style="display: none;">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 패키지강좌수강 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 패키지 강좌는 수강일변경, 일시정지, 수강연장, 재수강 기능이 제공되지 않습니다.<br/>
                    </div>
                    @forelse( $pkgList as $row )
                        <div class="willbes-Open-Table">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-left pb-zero">
                                        <div class="w-tit">
                                            {{$row['ProdName']}}
                                            <div class="MoreBtn f_right tx-right">
                                                <a href="#none"><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a>
                                            </div>
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일 ({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                        </dl>
                                        <div class="w-start tx-gray">
                                            <ul class="two">
                                                @if(true)
                                                <!-- 패키지강좌 재수강 불가 -->
                                                @elseif($row['IsExten'] == 'N')
                                                    <li class="btn_blue"><a>수강연장불가</a></li>>
                                                @elseif($row['RebuyCount'] >= $row['ExtenNum'])
                                                    <li class="btn_blue"><a>연장횟수초과({{$row['RebuyCount']}})</a></li>
                                                @else
                                                    <li class="btn_blue"><a href="javascript:;" onclick="fnExtend('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');">수강연장({{$row['RebuyCount']}})</a></li>
                                                @endif


                                                @if(false)
                                                <!-- 패키지강의 일시중지 불가 -->
                                                @elseif($row['IsPause'] == 'N')
                                                    <li class="btn_white"><a>일시정지불가</a></li>
                                                @elseif($row['PauseCount'] >= $row['PauseNum'])
                                                    <li class="btn_white"><a>정지횟수초과({{$row['PauseCount']}})</a></li>
                                                @else
                                                    <li class="btn_white"><a href="javascript:;" onclick="fnPause('{{$row['OrderIdx']}}','{{$row['ProdCode']}}','','P');">일시정지({{$row['PauseCount']}})</a></li>
                                                @endif
                                            </ul>                                            
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
                                            @if($subrow['LecTypeCcd'] == '607003')
                                                <div class="OTclass"><span>직장인반</span></div>
                                            @endif
                                            @if($subrow['IsDisp'] == 'N')
                                                <div class="OTclass"><span class="red">직강전환</span></div>
                                            @endif
                                            <dl class="w-info">
                                                <dt>
                                                    {{$subrow['SubjectName']}}<span class="row-line">|</span>{{$subrow['wProfName']}}교수님
                                                    <span class="NSK ml10 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl>
                                            <div class="w-tit">
                                                @if($subrow['IsDisp'] == 'N')
                                                    <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{{$subrow['subProdName']}}</a>
                                                @else
                                                    <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                @endif
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
                        <div class="willbes-Open-Table">
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-center">수강중인 패키지 강좌가 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    @endforelse
                </div>
                <div id="leclist3" class="tabContent" style="display: none;">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 무료특강수강 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 무료특강는 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                    </div>
                    <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                        <tbody>
                        @forelse( $freeList as $row )
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
                                            {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                            <span class="NSK ml10 nBox nn{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                        </dt>
                                    </dl>
                                    <div class="w-tit">
                                        @if($row['IsDisp'] == 'N')
                                            <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{{$row['subProdName']}}</a>
                                        @else
                                            <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}">{{$row['subProdName']}}</a>
                                        @endif
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                        <dt>진도율 : <span class="tx-blue">{{$row['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                        <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                        <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                    </dl>
                                    <div class="w-line mt20">-</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="tx-center">수강중인 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div id="leclist4" class="tabContent" style="display: none;">
                    <div class="willbes-Txt NGR c_both mt20 @if(get_cookie('moreInfo') == 'off') on @endif">
                        <div class="willbes-Txt-Tit NG">· 관리자부여강좌 수강 유의사항 <div class="MoreBtn underline"><a href="#none">@if(get_cookie('moreInfo') == 'off')열기 ▼@else닫기 ▲@endif</a></div></div>
                        - 관리자부여강좌는 무상 혜택으로 지급된 강좌이므로 수강일변경, 일시정지, 수강연장기능이 제공되지 않습니다.<br/>
                    </div>
                    <div class="willbes-Lec-Selected NG c_both tx-gray">
                        <select id="admintab" name="admintab" title="lecture" class="seleLec width49p">
                            <option value="admintab1" selected="selected">단과강좌</option>
                            <option value="admintab2">패키지</option>
                        </select>
                    </div>
                    <table id="admintab1" cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray admintab">
                        <tbody>
                        @forelse( $adminList['lec'] as $row )
                            <tr>
                                <td class="w-data tx-left pb-zero">
                                    @if($row['LecTypeCcd'] == '607003')
                                        <div class="OTclass mr10"><span>직장인반</span></div>
                                    @endif
                                    @if($row['IsDisp'] == 'N')
                                        <div class="OTclass"><span class="red">직강전환</span></div>
                                    @endif
                                    <dl class="w-info">
                                        <dt>
                                            {{$row['SubjectName']}}<span class="row-line">|</span>{{$row['wProfName']}}교수님
                                            <span class="NSK ml10 nBox nn{{ substr($row['wLectureProgressCcd'], -1)+1 }}">{{$row['wLectureProgressCcdName']}}</span>
                                        </dt>
                                    </dl>
                                    <div class="w-tit">
                                        @if($row['IsDisp'] == 'N')
                                            <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');"><span class="tx-red">[{{$row['PayRouteCcdName']}}]</span> {{$row['subProdName']}}</a>
                                        @else
                                            <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}"><span class="tx-red">[{{$row['PayRouteCcdName']}}]</span> {{$row['subProdName']}}</a>
                                        @endif
                                    </div>
                                    <dl class="w-info tx-gray">
                                        <dt>강의수 : <span class="tx-black">{{$row['wUnitLectureCnt']}}강</span><span class="row-line">|</span></dt>
                                        <dt>진도율 : <span class="tx-blue">{{$row['StudyRate']}}%</span><span class="row-line">|</span></dt>
                                        <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일<span class="row-line">|</span></dt>
                                        <dt>최종학습일 : <span class="tx-black">{{ $row['lastStudyDate'] == '' ? '학습이력없음' : $row['lastStudyDate'] }}</span></dt>
                                    </dl>
                                    <div class="w-line mt20">-</div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="tx-center">수강중인 강좌가 없습니다.</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                    <div id="admintab2" class="willbes-Open-Table admintab"  style="display:none;">
                        @forelse( $adminList['pkg'] as $row )
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-left pb-zero">
                                        <div class="w-tit">
                                            <span class="tx-red">[{{$row['PayRouteCcdName']}}]</span> {{$row['ProdName']}}
                                        </div>
                                        <dl class="w-info tx-gray">
                                            <dt>잔여기간 : <span class="tx-blue">{{$row['remainDays']}}</span>일 ({{str_replace('-', '.', $row['LecStartDate'])}}~{{str_replace('-', '.', $row['RealLecEndDate'])}})</dt>
                                        </dl>
                                        <div class="w-start tx-gray">
                                            <div class="MoreBtn f_right tx-right">
                                                <a href="#none"><img src="{{ img_url('m/mypage/icon_arrow_on.png') }}"></a>
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
                                            @if($subrow['LecTypeCcd'] == '607003')
                                                <div class="OTclass"><span>직장인반</span></div>
                                            @endif
                                            @if($subrow['IsDisp'] == 'N')
                                                <div class="OTclass"><span class="red">직강전환</span></div>
                                            @endif
                                            <dl class="w-info">
                                                <dt>
                                                    {{$subrow['SubjectName']}}<span class="row-line">|</span>{{$subrow['wProfName']}}교수님
                                                    <span class="NSK ml10 nBox n{{ substr($subrow['wLectureProgressCcd'], -1)+1 }}">{{$subrow['wLectureProgressCcdName']}}</span>
                                                </dt>
                                            </dl>
                                            <div class="w-tit">
                                                @if($subrow['IsDisp'] == 'N')
                                                    <a href="javascript:alert('직강으로 전환된 강좌로 수강이 불가능합니다.');">{{$subrow['subProdName']}}</a>
                                                @else
                                                    <a href="{{ front_url('/classroom/on/view/ongoing/') }}?o={{$subrow['OrderIdx']}}&p={{$subrow['ProdCode']}}&ps={{$subrow['ProdCodeSub']}}">{{$subrow['subProdName']}}</a>
                                                @endif
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
                        @empty
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                                <tbody>
                                <tr class="bg-light-blue">
                                    <td class="w-data tx-center">수강중인 패키지 강좌가 없습니다.</td>
                                </tr>
                                </tbody>
                            </table>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        @if(sess_data('is_login') == true && empty(sess_data('mem_ssamid')) == false)
        <div class="widthAutoFull NSK mb20 c_both">
            <a href="{{ front_app_url('/classroom/home/gotoSsam/', 'www', false, true) }}" class="btnStA" target="_blank">
                윌비스 임용
                <p class="tx18"><strong class="NSK-Black tx-yellow">이전 내강의실</strong> 바로가기</p>
            </a>
        </div>
        @endif

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
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

            $("#admintab").on('change', function () {
                $('.admintab').hide();
                $('#'+$(this).val()).show();
            });

            // 검색어 입력 후 엔터
            $('#search_text').on('keyup', function() {
                if (window.event.keyCode === 13) {

                }
            });
        });

        /**
         * 탭이동시 나머지 설명 탭 on off 설정
         */
        function fnSetMoreTable(){
            var $obj = $('.willbes-Txt');
            var $onoff = $.cookie('moreInfo');

            $obj.each(function(){
                if( $onoff == 'on') {
                    $(this).removeClass('on');
                    $(this).find('span a').text('열기 ▼');
                } else {
                    $(this).addClass('on');
                    $(this).find('span a').text('닫기 ▲');
                }
            });
        }

        function fnPause(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);
            $("#postForm").attr("action", "{{ front_url("/classroom/on/layerPause/") }}").submit();
        }

        function fnExtend(o, p, sp, t)
        {
            $("#STARTPASS").html('');
            $('#orderidx').val(o);
            $('#prodcode').val(p);
            $('#prodcodesub').val(sp);
            $('#prodtype').val(t);
            $("#postForm").attr("action", "{{ front_url("/classroom/on/layerExtend/") }}").submit();
        }
    </script>
@stop