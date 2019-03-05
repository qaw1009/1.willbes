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
            <div class="Acad_info mt30">
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
                                <th colspan="3" class="w-list tx-left  pl20">
                                    @if($data['IsBest'] == '1')<img src="{{ img_url('prof/icon_HOT.gif') }}" style="marign-right: 5px;">@endif
                                    <strong>{{$data['Title']}}</strong>
                                </th>
                            </tr>
                            <tr>
                                <td class="w-acad tx-left pl20">
                                    <dl>
                                        <dt class="tx-bright-gray">{{$data['Category_NameString']}}<span class="row-line">|</span></dt>
                                        <dt class="tx-bright-gray">{{$data['CampusCcd_Name']}}</dt>
                                    </dl>
                                    <span class="row-line">|</span>
                                </td>
                                <td class="w-date">{{$data['RegDatm']}}<span class="row-line">|</span></td>
                                <td class="w-click"><strong>조회수</strong> {{$data['TotalReadCnt']}}</td>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td class="w-gallery" colspan="7">
                                    @if(empty($data['AttachData']) === false)
                                    <div class="sliderGallery cSliderTM">
                                        <div class="sliderNum">
                                            @foreach($data['AttachData'] as $attach_row)
                                                <img src="{{$attach_row['AttachFilePath'].$attach_row['AttachFileName']}}">
                                            @endforeach
                                        </div>
                                    </div>
                                    @endif
                                    <div class="w-gallery-txt tx-left">
                                        {!! $data['Content'] !!}
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="search-Btn mt20 mb35 h36 p_re">
                            <div class="btnAuto90 h36 mem-Btn bg-purple-gray bd-dark-gray f_right">
                                <a href="{{front_url($default_path.'/index/?'.$get_params)}}"><span>목록</span></a>
                            </div>
                        </div>
                    </div>
                    {{--comment start--}}
                    @if (empty($data['BoardIsComment']) === false && $data['BoardIsComment'] == 'Y')
                        @include('willbes.pc.support.comment_partial')
                    @endif
                    {{--comment end--}}
                </div>
            </div>
        </div>
        {!! banner('학원안내_우측퀵', 'Quick-Bnr ml20', $__cfg['SiteCode'], $__cfg['CateCode']) !!}
    </div>
@stop