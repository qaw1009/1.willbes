@extends('willbes.m.layouts.master')

@section('content')
    <!-- Container -->
    <div id="Container" class="Container NG c_both">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
        </form>

        <div class="willbes-Tit NGEB p_re">
            <button type="button" class="goback" onclick="history.back(-1); return false;">
                <span class="hidden">뒤로가기</span>
            </button>
            시험공고
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">
            <select id="s_announcement_type" name="s_announcement_type" title="공고유형" class="seleLecA width32n5p" onchange="goUrl('s_announcement_type',this.value)">
                <option value="">공고유형</option>
                @foreach($arr_base['announcement_type'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_announcement_type', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>

            <select id="s_area" name="s_area" title="지역" class="seleLecA width32n5p ml1p" onchange="goUrl('s_area',this.value)">
                <option value="">지역</option>
                @foreach($arr_base['area'] as $key => $val)
                    <option value="{{$key}}" @if(element('s_area', $arr_input) == $key)selected="selected"@endif>{{$val}}</option>
                @endforeach
            </select>

            <div class="willbes-Lec-Search NG width100p mt1p mb30">
                <div class="inputBox width90p p_re">
                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 또는 내용을 입력해 주세요">
                    <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url($default_path.'/examAnnouncement/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
                </div>
            </div>
        </div>

        <div class="lineTabs lecListTabs c_both">
            <table cellspacing="0" cellpadding="0" width="100%" class="lecTable bdt-m-gray">
                <tbody>
                @if(empty($list))
                    <tr>
                        <td class="w-data tx-left">등록된 내용이 없습니다.</td>
                    </tr>
                @endif

                @foreach($list as $row)
                    <tr class="{{$row['IsBest'] == '1' ? 'bg-light-blue' : ''}}">
                        <td class="w-data tx-left">
                            <div class="w-tit">
                                <a href="{{front_url($default_path.'/examAnnouncement/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
                                    {{hpSubString($row['Title'],0,40,'...')}}
                                </a>
                            </div>
                            <dl class="w-info tx-gray">
                                <dt>{{$row['RegDatm']}}<span class="row-line">|</span></dt>
                                <dt>조회수 : <span class="tx-blue">{{$row['TotalReadCnt']}}</span></dt>
                            </dl>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {!! $paging['pagination'] !!}
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