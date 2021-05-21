@extends('willbes.app.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div id="Sticky" class="sticky-Title">
            <div class="sticky-Grid sticky-topTit">
                <div class="willbes-Tit NGEB p_re">
                    <button type="button" class="goback" onclick="history.back(-1); return false;">
                        <span class="hidden">뒤로가기</span>
                    </button>
                    보강/복습동영상 수강하기
                </div>
            </div>
        </div>

        <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
            <tbody>
            <tr>
                <td class="w-data tx-left">
                    <dl class="w-info">
                        <dt>{{$lec['SubjectName']}}<span class="row-line">|</span>{{$lec['wProfName']}} </dt>
                    </dl>
                    <div class="w-tit tx-blue">
                        {{$lec['subProdName']}}
                    </div>
                    <dl class="w-info tx-gray">
                        <dt>수강기간 : <span class="tx-black">{{str_replace('-', '.', $lec['LecStartDate'])}}~{{str_replace('-', '.', $lec['RealLecEndDate'])}}
                            (@if(strtotime($lec['LecStartDate']) > strtotime(date("Y-m-d", time())))
                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['LecStartDate']))/86400 +1 }}일
                                @elseif(empty($lec['lastPauseEndDate']) == true)
                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                @elseif(strtotime($lec['lastPauseEndDate']) >= strtotime(date("Y-m-d", time())))
                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime($lec['lastPauseEndDate']))/86400 }}일
                                @else
                                    {{ intval(strtotime($lec['RealLecEndDate']) - strtotime(date("Y-m-d", time())))/86400 +1 }}일
                                @endif)</span>{{-- <span class="row-line">|</span> --}}</dt>
                        {{-- <dt>보강/복습동영상 신청일 : <span class="tx-black">{{$lec['OrderDate']}}</span>일</dt> --}}
                    </dl>
                </td>
            </tr>
            </tbody>
        </table>

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
                                            @if($row['wWD'] != '')<li class="btn_black_line"><a href="javascript:;" onclick='fnApp("https:{{front_url('/Player/getApp/')}}","m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=WD&st=S", "https:{{current_url()}}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}");' >WIDE</a></li>@endif
                                            @if($row['wHD'] != '')<li class="btn_blue"><a href="javascript:;"       onclick='fnApp("https:{{front_url('/Player/getApp/')}}","m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=HD&st=S", "https:{{current_url()}}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}");' >HIGH</a></li>@endif
                                            @if($row['wSD'] != '')<li class="btn_gray"><a href="javascript:;"       onclick='fnApp("https:{{front_url('/Player/getApp/')}}","m={{$lec['MemIdx']}}&id={{sess_data('mem_id')}}&o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&sp={{$row['ProdCodeSub']}}&l={{$row['wLecIdx']}}&u={{$row['wUnitIdx']}}&q=SD&st=S", "https:{{current_url()}}?o={{$row['OrderIdx']}}&p={{$row['ProdCode']}}&ps={{$row['ProdCodeSub']}}");' >LOW</a></li>@endif
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

        @if($lec['canWeekView'] == false)
        @elseif($lec['isBtob'] == 'Y' && $lec['enableIp'] == 'N')
        @elseif($lec['wShootingCcd'] == '104003' || $lec['wShootingCcd'] == '104004')
        @else
            @if($lec['isstart'] == 'Y' && $lec['ispause'] == 'N')
                <div id="Fixbtn" class="Fixbtn three">
                    <ul>
                        <li class="btn_black_line"><a href="javascript:;" onclick="fnDown('WD');">WIDE 다운</a></li>
                        <li class="btn-purple"><a href="javascript:;" onclick="fnDown('HD');">HIGH 다운</a></li>
                        <li class="btn_gray"><a href="javascript:;" onclick="fnDown('SD');">LOW 다운</a></li>
                    </ul>
                </div>
            @endif
        @endif

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->

    </div>
    <!-- End Container -->
    <input type="hidden" id="device_id" name="device_id" value="" />
    <input type="hidden" id="device_name" name="device_name" value="" />
    <input type="hidden" id="device_model" name="device_model" value="" />
    <script>
        var app = null;

        $(document).ready(function() {
            app = new StarPlayerBridge();
            app.bindEvent("initEvent", onInitEvent);

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

            fnAppDown('https:{{front_url('/Player/getApp/')}}', $('#downForm').serialize());
        }

        function onInitEvent(){
            app.getDeviceInfo(function(id, name, model){
                $('#device_id').val(id);
                $('#device_name').val(name);
                $('#device_model').val(model);
            });
        }
    </script>
@stop