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
            공지사항
        </div>
        <div class="willbes-Lec-Selected NG tx-gray">
            @if(empty($arr_base['category']) === false)
                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleProcess width32n5p" onchange="goUrl('s_cate_code',this.value)">
                    <option value="">카테고리</option>
                    @foreach($arr_base['category'] as $row)
{{--                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif>{{$row['CateName']}}</option>--}}
                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'])selected="selected"@endif @if(empty($row['ChildCnt']) === false && $row['ChildCnt'] > 0) disabled @endif>{{$row['CateNameRoute']}}</option>
                    @endforeach
                </select>
            @endif

            @if(empty($arr_base['campus']) === false)
                <select id="s_campus" name="s_campus" title="campus" class="seleCampus width32n5p ml1p">
                    <option value="">캠퍼스</option>
                    @foreach($arr_base['campus'] as $row)
                        <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CcdName']}}</option>
                    @endforeach
                </select>
            @endif

            <div class="willbes-Lec-Search NG width100p mt1p mb30">
                <div class="inputBox width90p p_re">
                    <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 또는 내용을 입력해 주세요">
                    <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                        <span class="hidden">검색</span>
                    </button>
                </div>
                <div class="resetBtn width10p">
                    <a href="{{front_url($default_path.'/notice/index')}}"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
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
                                <a href="{{front_url($default_path.'/show?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
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