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
                            @if(empty($data['CampusName']) === false)<col style="width: 65px;">@endif
                            <col style="width: 110px;">
                            <col style="width: 465px;">
                            <col style="width: 150px;">
                            <col style="width: 150px;">
                        </colgroup>
                        <thead>
                        <tr><th colspan="5" class="w-list tx-left pl20"><span class="w-select tx-blue">[{{$data['RequstTypeName']}}]</span> <strong>{{$data['EventName']}}</strong></th></tr>
                        <tr>
                            @if(empty($data['CampusName']) === false)<td class="w-type">{{$data['CampusName']}}<span class="row-line">|</span></td>@endif
                            <td class="w-area tx-left pl20">{{$data['TakeTypeName']}}<span class="row-line">|</span></td>
                            <td class="w-area tx-left pl20">[접수기간] {{$data['RegisterStartDay']}} ~ {{$data['RegisterEndDay']}}<span class="row-line">|</span></td>
                            <td class="w-date">{{$data['RegDay']}}<span class="row-line">|</span></td>
                            <td class="w-click"><strong>조회수</strong> {{$data['ReadCnt']}}</td>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="w-file tx-left pl20" colspan="5">
                                @if(empty($data['UploadFileRealName']) === false)
                                    <a href="{{front_url('/event/download?path=').urlencode($data['UploadFileFullPath'].$data['UploadFileName']).'&fname='.urlencode($data['UploadFileRealName']).'&event_idx='.element('event_idx', $arr_input) }}" target="_blank">
                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$data['UploadFileRealName']}}</a>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td class="w-txt tx-left" colspan="5">
                                @if($data['ContentType'] == $arr_base['content_type']['image'])
                                    <img src="{{$data['FileFullPath'] . $data['FileName']}}">
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

    <!--
    TODO : 배너섹션 등록 후 설정 필요
    -->
    <div class="Quick-Bnr ml20">
        {!! banner('이벤트_우측', '', $__cfg['SiteCode'], '0') !!}
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#btn_list').click(function() {
            location.href = '{!! front_url($arr_base['page_url']) !!}';
        });
    });
</script>
@stop