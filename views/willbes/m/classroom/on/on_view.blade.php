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
                    강의수강하기
                </div>
            </div>
        </div>

        <div class="passProfTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <colgroup>
                    <col style="width: 15%;">
                    <col style="width: 85%;">
                </colgroup>
                <tbody>
                <tr>
                    <td>
                        <div class="w-prof p_re">
                            <img src="{{ $lec['ProfReferData']['lec_list_img'] or '' }}">
                            <div class="cover"><img src="{{ img_url('m/mypage/profImg-cover.png') }}"></div>
                        </div>
                        <div class="w-data tx-left pl15">
                            @if($lec['LecTypeCcd'] == '607003')
                                <div class="OTclass mr10"><span>직장인반</span></div>
                            @endif
                            <dl class="w-info">
                                <dt>{{$lec['SubjectName']}}<span class="row-line">|</span>{{$lec['CourseName']}}<span class="row-line">|</span>{{$lec['wProfName']}}교수님</dt>
                            </dl>
                            <div class="w-tit">
                                {{$lec['subProdName']}}
                            </div>
                        </div>
                        <div class="w-info tx-gray bdt-bright-gray">
                            <dl>
                                <dt><strong>강좌정보 :</strong> {{$lec['wLectureProgressCcdName']}}<span class="row-line">|</span>{{$lec['MultipleApply'] == '1' ? '무제한' : round($lec['MultipleApply'], 1).'배수' }}</dt><br/>
                                <dt><strong>진도율 :</strong> <span class="tx-blue">{{$lec['StudyRate']}}%</span><!-- (1강/20강) --><span class="row-line">|</span>
                                    <strong>잔여기간 :</strong> <span class="tx-blue">
                                        @if(strtotime($lec['LecStartDate']) > strtotime(date("Y-m-d", time())))
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['LecStartDate']))/86400 +1 }}일
                                        @elseif(empty($lec['lastPauseEndDate']) == true)
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                        @elseif(strtotime($lec['lastPauseEndDate']) >= strtotime(date("Y-m-d", time())))
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['lastPauseEndDate']))/86400 }}일
                                        @else
                                            {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                        @endif</span>({{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}})</dt>
                            </dl>
                        </div>
                        @if($lec['wControlCountUse'] > 0)
                            <div class="w-info tx-gray bdt-bright-gray">
                                ※ 해당 강좌는 회차별 자료 인쇄 제한이 있습니다.<br/>
                                자료는 PC에서만 확인 가능합니다.
                            </div>
                        @endif
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
        <div class="buttonTabs passTabs c_both">
            <div class="tabBox buttonBox passBox">
                <div id="notice1" class="tabContent">
                    <div class="passListTabs c_both">
                        <form name="downForm" id="downForm" >
                            <input type="hidden" name="m" value="{{$lec['MemIdx']}}" />
                            <input type="hidden" name="id" value="{{sess_data('mem_id')}}" />
                            <input type="hidden" name="o" value="{{$lec['OrderIdx']}}" />
                            <input type="hidden" name="op" value="{{$lec['OrderProdIdx']}}" />
                            <input type="hidden" name="p" value="{{$lec['ProdCode']}}" />
                            <input type="hidden" name="sp" value="{{$lec['ProdCodeSub']}}" />
                            <input type="hidden" name="q" id="quility" value="" />
                            <input type="hidden" name="st" value="D" />
                            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable" />
                                <colgroup>
                                    <col style="width: 13%;">
                                    <col style="width: 87%;">
                                </colgroup>
                                <thead>
                                <tr>
                                    <td class="w-chk" colspan="2"><input type="checkbox" id="allchk" name="allchk" class="goods_chk"> <label>전체선택</label></td>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($curriculum as $row)
                                    <tr @if($row['StudyTime'] > 0)
                                        class="finish"
                                            @endif>
                                        <td class="w-chk"><input type="checkbox" id="wUnitIdx" name="u[]" value="{{$row['wUnitIdx']}}" class="goods_chk unitchk" @if($row['timeover'] == 'Y')disabled="diabbled"@endif></td>
                                        <td class="w-data tx-left">
                                            <div class="w-tit mb10">
                                                @if($lec['SiteCode'] != '2001' && $lec['SiteCode'] != '2002')
                                                    @if($lec['IsOpenwUnitNum'] == 'Y')
                                                        {{$row['wUnitNum']}}회
                                                    @endif
                                                @endif
                                                {{$row['wUnitLectureNum']}}강
                                                {{$row['wUnitName']}}
                                                @if(empty($row['wUnitInfo']) == false)<p>[설명] {{$row['wUnitInfo']}}</p>@endif
                                            </div>
                                            <dl class="w-info tx-gray mb10">
                                                <dt>강의시간 : {{$row['wRuntime']}}분<span class="row-line">|</span></dt>
                                                <dt>수강시간 : {{floor(intval($row['RealStudyTime'])/60)}}분<span class="row-line">|</span></dt>
                                                <dt>잔여시간 : <span class="tx-blue">{{$row['remaintime']}}</span></dt>
                                            </dl>
                                            <ul class="w-free NGEB">
                                                @if($lec['canWeekView'] == false)
                                                    <li class="btn_black_line"><a>직장인반</a></li>
                                                @elseif($lec['isBtob'] == 'Y' && $lec['enableIp'] == 'N')
                                                    <li class="btn_black_line"><a>수강불가</a></li>
                                                @else
                                                    @if($row['isstart'] == 'Y' && $row['ispause'] == 'N')
                                                        @if($row['timeover'] == 'N')
                                                            @if($row['wWD'] != '')<li class="btn_black_line"><a href="javascript:;" onclick='fnMobile("https:{{site_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=WD&st=S", "{{config_item('starplayer_license')}}");' >WIDE</a></li>@endif
                                                            @if($row['wHD'] != '')<li class="btn_blue"><a href="javascript:;" onclick='fnMobile("https:{{site_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=HD&st=S", "{{config_item('starplayer_license')}}");' >HIGH</a></li>@endif
                                                            @if($row['wSD'] != '')<li class="btn_gray"><a href="javascript:;" onclick='fnMobile("https:{{site_url('/Player/getMobile/')}}?m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=SD&st=S", "{{config_item('starplayer_license')}}");' >LOW</a></li>@endif
                                                        @else
                                                            <li class="btn_black_line"><a>시간초과</a></li>
                                                        @endif
                                                    @elseif($row['ispause'] == 'Y')
                                                        <li class="btn_black_line"><a>일시중지</a></li>
                                                    @else
                                                        <li class="btn_black_line"><a>수강대기</a></li>
                                                    @endif
                                                @endif
                                                <li class="w-data">
                                                    @if(empty($row['wUnitAttachFile']) == false)
                                                        {{--
                                                        @if($row['wControlCount'] > 0)
                                                            <a href="javascript:;" onclick="alert('해당 강의자료는 PC에서만 확인 가능합니다.');">
                                                                @if($row['downcount'] > 0)
                                                                    <img src="{{ img_url('prof/icon_down.png') }}">
                                                                @else
                                                                    <img src="{{ img_url('m/mypage/icon_lec.png') }}">
                                                                @endif
                                                                <span class="underline">강의자료</span>
                                                            </a>
                                                        @else
                                                        --}}
                                                            <a href="/classroom/on/download/{{$row['OrderIdx']}}/{{$row['ProdCode']}}/{{$row['ProdCodeSub']}}/{{$row['wLecIdx']}}/{{$row['wUnitIdx']}}">
                                                                @if($row['downcount'] > 0)
                                                                    <img src="{{ img_url('prof/icon_down.png') }}">
                                                                @else
                                                                    <img src="{{ img_url('m/mypage/icon_lec.png') }}">
                                                                @endif
                                                                <span class="underline">강의자료</span>
                                                            </a>
                                                        {{--
                                                        @endif
                                                        --}}
                                                    @endif
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="2" class="w-data tx-center">개설된 강좌 목록이 없습니다.</td>
                                    </tr>
                                @endforelse
                                </tbody>
                            </table>
                        </form>
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
        @if($lec['canWeekView'] == false)
            {{-- 주말반 제한 --}}
        @elseif($lec['isBtob'] == 'Y' && $lec['enableIp'] == 'N')
            {{-- BtoB 강의 제한 --}}
        @elseif($lec['wShootingCcd'] == '104003')
            {{-- 라이브강의는 다운로드버튼 없음 --}}
        @else
            @if($lec['isstart'] == 'Y' && $lec['ispause'] == 'N')
                {{-- 실제 강의 수강기간일때만 --}}
            <div id="Fixbtn" class="Fixbtn three">
                <ul>
                    <li class="btn_black_line"><a href="javascript:;" onclick="fnDown('WD');">WIDE 다운</a></li>
                    <li class="btn-purple"><a href="javascript:;" onclick="fnDown('HD');">HIGH 다운</a></li>
                    <li class="btn_gray"><a href="javascript:;" onclick="fnDown('SD');">LOW 다운</a></li>
                </ul>
            </div>
            @endif
        @endif
        <!-- Fixbtn -->
    </div>
    <!-- End Container -->
@if($lec['wShootingCcd'] == '104003')
    {{-- 라이브강의 스타플레이어 플러스 --}}
    <script src="/public/vendor/starplayer/js/starplayer_app_plus.js"></script>
@else
    {{-- 다른강의 일반 스타플레이어 --}}
    <script src="/public/vendor/starplayer/js/starplayer_app.js"></script>
@endif
    <script>
        $(document).ready(function() {
            $('#allchk').on('change', function (){
                $('.unitchk').prop('checked', $(this).is(':checked'));
            });
        });

        function fnDown($quility)
        {
            if($quility == ""){
                $quility = "WD";
            }

            if($(".unitchk:checked").length < 1){
                alert("다운로드할 강의를 선택해주십시요.");
                return;
            }

            $("#quility").val($quility);

            $info_url = 'https:{{front_url('/Player/getMobile/')}}?' + $('#downForm').serialize();

            fnMobile($info_url, '{{config_item('starplayer_license')}}');
        }
    </script>
@stop