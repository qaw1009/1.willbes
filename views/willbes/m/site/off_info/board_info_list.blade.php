@extends('willbes.m.layouts.master')

@section('content')
    <div id="Container" class="Container NG c_both">
        <form id="url_form" name="url_form" method="GET">
            @foreach($arr_input as $key => $val)
                <input type="hidden" name="{{ $key }}" value="{{ $val }}"/>
            @endforeach
            <div class="willbes-Tit NGEB p_re">
                <button type="button" class="goback" onclick="history.back(-1); return false;">
                    <span class="hidden">뒤로가기</span>
                </button>{{$bm_title}}
            </div>
            <div class="willbes-Lec-Selected NG tx-gray">
                @if($tab_menu === true)
                    <select class="seleProcess width24p" id="bm_idx" onchange="changeBoard(this.value);">
                        <option value="80" @if($bm_idx == '80') selected="selected" @endif>강의시간표</option>
                        <option value="82" @if($bm_idx == '82') selected="selected" @endif>강의실배정표</option>
                        <option value="109" @if($bm_idx == '109') selected="selected" @endif>강의계획서</option>
                        <option value="110" @if($bm_idx == '110') selected="selected" @endif>강의자료실</option>
                        <option value="75" @if($bm_idx == '75') selected="selected" @endif>휴강/보강공지</option>
                        <option value="78" @if($bm_idx == '78') selected="selected" @endif>신규강의안내</option>
                    </select>
                @endif
                <select id="s_cate_code" name="s_cate_code" title="카테고리" class="seleProcess width24p ml1p" onchange="goUrl('s_cate_code',this.value)" @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y') disabled @endif>
                    <option value="">카테고리</option>
                    @php $temp_s_cate_code = ''; @endphp
                    @foreach($arr_base['category'] as $row)
                        <option value="{{$row['CateCode']}}" class="{{$row['SiteCode']}}" @if(element('s_cate_code', $arr_input) == $row['CateCode'] || element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode']) selected="selected" @endif>{{$row['CateName']}}</option>
                        @php if(element('s_cate_code', $arr_input) == $row['CateCode'] || element('on_off_link_cate_code', $arr_input) == $row['OnOffLinkCateCode']) $temp_s_cate_code = $row['CateCode']; @endphp
                    @endforeach
                </select>
                @if(empty(element('s_cate_code_disabled', $arr_input)) == false && element('s_cate_code_disabled', $arr_input) == 'Y')
                    <input type="hidden" name="s_cate_code" value="{{$temp_s_cate_code}}">
                @endif
                @if(empty($arr_base['campus']) === false)
                    <select id="s_campus" name="s_campus" title="campus" class="seleCampus width40p ml1p" onchange="goUrl('s_campus',this.value)">
                        <option value="">캠퍼스</option>
                        @foreach($arr_base['campus'] as $row)
                            <option value="{{$row['CampusCcd']}}" @if(element('s_campus',$arr_input) == $row['CampusCcd']) selected @endif>{{$row['CcdName']}}</option>
                        @endforeach
                    </select>
                @endif
                <div class="willbes-Lec-Search NG width100p mt1p mb30">
                    <div class="inputBox width88p p_re">
                        <input type="text" id="s_keyword" name="s_keyword" maxlength="30" value="{{ element('s_keyword', $arr_input) }}" class="labelSearch width100p" placeholder="제목 및 내용 검색">
                        <button type="submit" onclick="goUrl('s_keyword', document.getElementById('s_keyword').value);" class="search-Btn">
                            <span class="hidden">검색</span>
                        </button>
                    </div>
                    <div class="resetBtn width10p">
                        <a href="javascript:void(0);" onclick="reset(); return false;"><img src="{{ img_url('m/mypage/icon_reset.png') }}"></a>
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
                                    <a href="{{front_url($default_path.'/show/'.$bm_idx.'?board_idx='.$row['BoardIdx'].'&'.$get_params)}}">
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
        </form>

        <div class="goTopbtn">
            <a href="javascript:link_go();">
                <img src="{{ img_url('m/main/icon_top.png') }}">
            </a>
        </div>
        <!-- Topbtn -->
    </div>

    <script type="text/javascript">
        function reset() {
            $("#s_keyword").val('');
            var bm_idx = $("#bm_idx").val();
            changeBoard(bm_idx);
        }
        function changeBoard(param) {
            var link_url = "{{ front_url('/offinfo/boardInfo/index/') }}"+param+"?";
            location.href=link_url+"@if(empty(element('s_cate_code', $arr_input)) === false){{'s_cate_code='.element('s_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('on_off_link_cate_code', $arr_input)) === false)&{{'on_off_link_cate_code='.element('on_off_link_cate_code', $arr_input)}}@endif{{----}}@if(empty(element('s_cate_code_disabled', $arr_input)) === false)&{{'s_cate_code_disabled='.element('s_cate_code_disabled', $arr_input)}}@endif";
        }
    </script>
@stop