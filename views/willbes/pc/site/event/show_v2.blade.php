@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        <!-- site nav -->
        @include('willbes.pc.layouts.partial.site_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <div class="willbes-Leclist c_both pb60">
                <!-- View -->
                <div class="willbes-Leclist c_both">
                    <div class="LecViewTable">
                        <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                            <colgroup>
                                <col>
                                <col style="width: 150px;">
                                <col style="width: 150px;">
                            </colgroup>
                            <thead>
                            <tr>
                                <th colspan="3" class="w-list tx-left pl20"><span class="w-select tx-blue">[{{$data['RequestTypeName']}}]</span> <strong>{{$data['EventName']}}</strong></th></tr>
                            <tr>
                                <td class="w-type tx-left pl20">
                                    @if($data['IsRegister'] == 'Y' && $data['RegisterEndDate'] > date('Y-m-d H:i:s'))
                                        <span class="mr10">진행중</span>
                                    @else
                                        <span class="mr10">종료</span>
                                    @endif
                                    <span class="mr10">{{ $data['TakeTypeName']}}</span>
                                    <span class="mr10">[접수기간] {{$data['RegisterStartDay']}} ~ {{$data['RegisterEndDay']}}</span>
                                    <span class="row-line">|</span>
                                </td>
                                <td class="w-date">{{$data['RegDay']}}<span class="row-line">|</span></td>
                                <td class="w-click"><strong>조회수</strong> {{$data['ReadCnt']}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            @if(empty($arr_base['file_F']) === false)
                                <tr>
                                    <td class="w-file tx-left pl20" colspan="3">
                                        <a href="{{front_url('/event/download?file_idx=').$arr_base['file_F']['EfIdx'].'&event_idx='.element('event_idx', $arr_input) }}" target="_blank">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$arr_base['file_F']['FileRealName']}}
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            <tr>
                                <td class="w-txt tx-left" colspan="3">
                                    @if($data['ContentType'] == $arr_base['content_type']['image'])
                                        <img src="{{$arr_base['file_C']['FileFullPath'] . $arr_base['file_C']['FileName']}}">
                                    @else
                                        {!! $data['Content'] !!}
                                    @endif
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- show_regist_list -->
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['regist_list'], $data['data_option_ccd']) === true )
                    @include('willbes.pc.site.event.show_regist_list_partial')
                @endif
                <!-- show_regist_list -->

                <!-- show_comment_list -->
                @if( empty($data['data_option_ccd']) === false && array_key_exists($arr_base['option_ccd']['comment_list'], $data['data_option_ccd']) === true && array_key_exists($arr_base['comment_use_area']['event'], $data['data_comment_use_area']) === true)
                    @include('willbes.pc.site.event.show_comment_list_partial')
                @endif
                <!-- show_comment_list -->

                <div class="search-Btn btnAuto90 h36 mt20 f_right p_ab" style="right: 0; bottom: 5px;">
                    <button type="button" id="btn_list" class="mem-Btn bg-purple-gray bd-dark-gray">
                        <span>목록</span>
                    </button>
                </div>
            </div>
        </div>
        {!! banner('이벤트_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#btn_list').click(function() {
                location.href = '{!! front_url($arr_base['page_url'] . '?' . $get_page_params) !!}';
            });

            /**
             * 이벤트 신청자 자료 파일 다운로드
             */
            $('#btn_register_file_download').click(function() {
                {!! login_check_inner_script('로그인 후 이용하여 주십시오.',''); !!}
                var _url = '{!! front_url('/event/registerFileDownload') !!}';
                location.href = _url + '/?el_idx={{$data['ElIdx']}}';
            });
        });
    </script>
@stop