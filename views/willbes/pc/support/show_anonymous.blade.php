@extends('willbes.pc.layouts.master')

@section('content')
<div id="Container" class="subContainer widthAuto c_both">
    @if (empty($__cfg['TabMenu']) === true)
        @include('willbes.pc.layouts.partial.site_menu')
    @else
        @include('willbes.pc.layouts.partial.site_tab_menu')
    @endif
    <div class="Depth pb-none">
        @include('willbes.pc.layouts.partial.site_route_path')
    </div>
    <div class="Content p_re">
        <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
            · 익명 자유게시판
        </div>
        <div class="willbes-Leclist c_both">
            <div class="LecViewTable">
                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                    <colgroup>
                        <col style="width: 150px;">
                        <col width="*">
                        <col style="width: 150px;">
                        <col style="width: 130px;">
                    </colgroup>
                    <thead>
                    <tr><th colspan="4" class="w-list tx-left pl20"><strong>{{$data['Title']}}</strong></th></tr>
                    <tr>
                        <td class="w-write">
                            {{ $data['RegNickName'] }}
                            <span class="row-line">|</span>
                        </td>
                        <td class="w-lec"><span class="row-line">|</span></td>
                        <td class="subTit tx-left pl20">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                        <td class="subTit tx-left pl20">조회수 {{$data['TotalReadCnt']}}</td>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td class="w-txt answer tx-left" colspan="4">
                            @if($data['RegType'] == 1)
                                {!! $data['Content'] !!}
                            @else
                                {{ nl2br($data['Content']) }}
                            @endif
                        </td>
                    </tr>
                    @if(empty($data['AttachData']) === false)
                        <tr>
                            <td class="w-file tx-left pl20" colspan="4">
                                @foreach($data['AttachData'] as $row)
                                    @if($row['FileType'] == 0)
                                        <a href="{{front_url($default_path.'/download/cate/'.$__cfg['CateCode'].'?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}">
                                            <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endif
                    </tbody>
                </table>

                <div class="search-Btn mt20 mb20 h36 p_re">
                    @if($data['RegType'] == 0 && $data['RegMemIdx'] == sess_data('mem_idx'))
                        {{--
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_del">
                            <a href="#none" class="tx-purple-gray">삭제</a>
                        </div>
                        --}}
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray f_left" id="btn_disuse">
                            <a href="#none" class="tx-purple-gray">삭제</a>
                        </div>
                        <div class="btnAuto90 h36 mem-Btn bg-white bd-dark-gray center" id="btn_modify">
                            <a href="#none" class="tx-purple-gray">수정</a>
                        </div>
                    @endif
                    <div id="btn_list" class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                        <a href="#none">목록</a>
                    </div>
                </div>

                {{-- @if (empty($data['BoardIsComment']) === false && $data['BoardIsComment'] == 'Y') --}}
                    @include('willbes.pc.support.anonymous_comment_partial')
                {{-- @endif --}}
            </div>
        </div>
    </div>
</div>
    <script type="text/javascript">
        $(document).ready(function() {
            {{-- 목록 --}}
            $('#btn_list').click(function() {
                location.href = '{!! front_url($default_path.'/index/cate/'.$__cfg['CateCode'].'?'.$get_params) !!}';
            });

            {{-- 수정 --}}
            $('#btn_modify').click(function() {
                location.href = '{!! front_url($default_path.'/create/cate/'.$__cfg['CateCode'].'?'.$get_params.'&board_idx='.$board_idx) !!}';
            });

            {{-- 삭제 --}}
            {{--
            $('#btn_del').click(function() {
                if (!confirm('삭제하시겠습니까?')) { return; }
                location.href = '{!! front_url($default_path.'/delete?'.$get_params.'&board_idx='.$board_idx) !!}';
            });
            --}}

            {{-- 미사용 --}}
            $('#btn_disuse').click(function() {
                if (!confirm('삭제하시겠습니까?')) { return; }
                location.href = '{!! front_url($default_path.'/disuse/cate/'.$__cfg['CateCode'].'?'.$get_params.'&board_idx='.$board_idx) !!}';
            });
        });
    </script>
@stop