@extends('willbes.pc.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="subContainer widthAuto c_both">
        @include('willbes.pc.layouts.partial.site_tab_menu')
        <div class="Depth">
            @include('willbes.pc.layouts.partial.site_route_path')
        </div>
        <div class="Content p_re">
            <!-- willbes-CScenter -->
            <div class="willbes-CScenter c_both">
                <div class="willbes-Lec-Tit NG bd-none tx-black pt-zero">· 학습 프로그램 설치</div>
                <div class="Act6 mt30">
                    <div class="willbes-Leclist c_both">
                        <div class="DownloadTable NG">
                            <table cellspacing="0" cellpadding="0" class="listTable upper-gray bdt-gray bdb-gray tx-gray fc-bd-none">
                                <colgroup>
                                    <col style="width: 130px;">
                                    <col style="width: 700px;">
                                    <col style="width: 110px;">
                                </colgroup>
                                <tbody>
                            @foreach($program_ccd as $row)
                                <tr>
                                    <td class="w-img"><img src="{{ img_url('cs/icon_program_'.$row['Ccd'].'.gif') }}"></td>
                                    <td class="w-txt tx-left pl20">
                                        <div class="tx-black">{{$row['CcdName']}}</div>
                                        {!! $row['CcdDesc'] !!}
                                    </td>
                                    <td class="w-download">
                                        <a href="{{$row['CcdEtc']}}" target="_blank"><img src="{{ img_url('cs/icon_download.gif') }}"></a>
                                    </td>
                                </tr>
                            @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- willbes-CScenter -->
        </div>
        {!! banner('고객센터_우측날개', 'Quick-Bnr ml20', $__cfg['SiteCode'], '0') !!}
    </div>
    <!-- End Container -->
@stop