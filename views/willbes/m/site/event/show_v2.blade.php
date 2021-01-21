@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            이벤트
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable">
                <tbody>
                <tr class="list bg-light-gray">
                    <td class="w-data tx-left">
                        <div class="w-tit"><span class="tx-blue">[{{$data['RequestTypeName']}}]</span> {{hpSubString($data['EventName'],0,40,'...')}}</div>
                        <dl class="w-info tx-gray">
                            @if($data['IsRegister'] == 'Y' && $data['RegisterEndDate'] > date('Y-m-d H:i:s'))
                                <dt class="tx-red">진행중<span class="row-line">|</span></dt>
                            @else
                                <dt>종료<span class="row-line">|</span></dt>
                            @endif
                            <dt>기간 : {{$data['RegisterStartDay']}} ~ {{$data['RegisterEndDay']}}</dt><br>
                            <dt>{{$data['RegDay']}}<span class="row-line">|</span></dt>
                            <dt>조회수 : <span class="tx-blue">{{$data['ReadCnt']}}</span></dt>
                        </dl>
                    </td>
                </tr>

                <tr class="txt">
                    <td class="w-txt NGR">
                        @if($data['ContentType'] == $arr_base['content_type']['image'])
                            <div class="mb10"><img src="{{$arr_base['file_C']['FileFullPath'] . $arr_base['file_C']['FileName']}}"></div>
                        @else
                            {!! $data['Content'] !!}
                        @endif
                    </td>
                </tr>

                @if(empty($arr_base['file_F']) === false)
                    <tr class="flie">
                        <td class="w-file NGR">
                            <a href="{{front_url('/event/download?file_idx=').$arr_base['file_F']['EfIdx'].'&event_idx='.element('event_idx', $arr_input) }}" target="_blank">
                                <img src="{{ img_url('prof/icon_file.gif') }}"> {{$arr_base['file_F']['FileRealName']}}
                            </a>
                        </td>
                    </tr>
                @endif
                </tbody>
            </table>

            <!-- show_regist_list -->
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['regist_list'], $data['data_option_ccd']) === true )
                @include('willbes.m.site.event.show_regist_list_partial')
            @endif
            <!-- show_regist_list -->

            <!-- show_comment_list -->
            @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                @include('willbes.m.site.event.show_comment_list_partial')
            @endif
            <!-- show_comment_list -->

            <div class="lecSubject mt40">
                <a href="{{ front_url('/event/list/all') }}">목록</a>
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
@stop