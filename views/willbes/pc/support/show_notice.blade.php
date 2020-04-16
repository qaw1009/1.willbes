@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @if (empty($__cfg['TabMenu']) === true)
            @include('willbes.pc.layouts.partial.site_menu')
        @else
            @include('willbes.pc.layouts.partial.site_tab_menu')
        @endif
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <form id="url_form" name="url_form" method="GET">
                @foreach($arr_input as $key => $val)
                    <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
                @endforeach

                <div class="willbes-CScenter c_both">
                    <div class="Act2">
                        <!-- List -->
                        <div class="willbes-Leclist c_both">
                            <div class="LecViewTable">
                                <table cellspacing="0" cellpadding="0" class="listTable upper-gray upper-black bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <thead>
                                    <tr>
                                        <th colspan="3" class="w-list tx-left pl20">
                                            @if($data['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;">@endif
                                                <strong>{{$data['Title']}}</strong>
                                        </th>
                                    </tr>
                                    <tr>
                                        <td class="w-acad tx-left pl20">
                                            {{$data['Category_NameString']}}
                                            <span class="w-lec pl20"><span class="oBox campus_{{$data['CampusCcd']}} NSK">{{$data['CampusCcd_Name']}}</span></span>
                                        </td>
                                        <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                                        <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
                                    </tr>
                                    </thead>
                                    <tbody>                                    
                                    <tr>
                                        <td id="board_content" class="w-txt tx-left" colspan="3">
                                            {!! $data['Content'] !!}
                                        </td>
                                    </tr>
                                    @if(empty($data['AttachData']) === false)
                                    <tr>
                                        <td class="w-file tx-left" colspan="3">
                                            @foreach($data['AttachData'] as $row)
                                                <a href="{{front_url($default_path.'/download?file_idx=').$row['FileIdx'].'&board_idx='.$board_idx }}" target="_blank">
                                                    <img src="{{ img_url('prof/icon_file.gif') }}"> {{$row['RealName']}}</a>
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endif
                                    </tbody>
                                </table>
                                <div class="search-Btn mt20 mb20 h36 p_re">
                                    <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                        <a href="{{front_url($default_path.'/index'.$cate_path.'?'.$get_params)}}">목록</a>
                                    </div>
                                </div>

                            @if($data['IsBest'] != '1')
                                <table cellspacing="0" cellpadding="0" class="listTable prevnextTable upper-gray bdt-gray bdb-gray tx-gray">
                                    <colgroup>
                                        <col style="width: 150px;">
                                        <col style="width: 640px;">
                                        <col style="width: 150px;">
                                    </colgroup>
                                    <tbody>
                                    <tr>
                                        <td class="w-prev bg-light-gray"><strong>이전글</strong></td>
                                        <td class="tx-left pl20">
                                            @if(empty($pre_data) === false)
                                                <a href="{{front_url($default_path.'/show'.$cate_path.'?board_idx='.$pre_data['BoardIdx'].'&'.$get_params)}}">{{$pre_data['Title']}}</a><span class="row-line">|</span>
                                            @else
                                                이전글이 없습니다.
                                            @endif
                                        </td>
                                        <td class="w-date">@if(empty($pre_data) === false){{$pre_data['RegDatm']}}@endif</td>
                                    </tr>
                                    <tr>
                                        <td class="w-next bg-light-gray"><strong>다음글</strong></td>
                                        <td class="tx-left pl20">
                                            @if(empty($next_data) === false)
                                                <a href="{{front_url($default_path.'/show'.$cate_path.'?board_idx='.$next_data['BoardIdx'].'&'.$get_params)}}">{{$next_data['Title']}}</a><span class="row-line">|</span>
                                            @else
                                                다음글이 없습니다.
                                            @endif
                                        </td>
                                        <td class="w-date">@if(empty($next_data) === false){{$next_data['RegDatm']}}@endif</td>
                                    </tr>
                                    </tbody>
                                </table>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            <!-- willbes-CScenter -->
        </div>
        {!! banner('고객센터_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'],  '0') !!}
    </div>
    <!-- End Container -->

    <script>
        // 이미지 팝업
        $(document).ready(function() {
            $('#board_content').find('img').attr('onclick', 'javascript:img_popup(this);');
        });

        function img_popup(image){
            var obj = document.createElement('img');
            obj.src=image.src;
            var intWidth = obj.width+50; // 실제 이미지크기
            var intHeight = obj.height;
            var etc = 'width='+intWidth+',height='+intHeight+',scrollbars=yes,resizable=no';
            var imageWin = window.open('', '',etc);
            imageWin.focus();
            imageWin.document.open();
            imageWin.document.write('<html><body style="margin:0">');
            imageWin.document.write('<a href=javascript:window.close()><img src="' + obj.src + '" border=0></a>');
            imageWin.document.write('</body></html>');
            imageWin.document.close();
        }
    </script>
@stop