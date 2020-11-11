<div class="lnb-List">
    @foreach($arr_lnb_professor as $lnb_cate_name => $lnb_subject_row)
        <div class="lnb-List-Tit hover">
            {{-- 카테고리명 --}}
            <a href="#none"><span class="Txt">{{ $lnb_cate_name }}<span class="arrow-Btn">></span></span></a>
        </div>
        <div class="lnb-List-Depth d_block">
            <dl>
                @foreach($lnb_subject_row as $lnb_subject_idx => $lnb_prof_row)
                    @foreach($lnb_prof_row as $lnb_prof_idx => $lnb_prof_info)
                        {{-- 카테고리코드::과목식별자::과목명::교수명 --}}
                        @php $lnb_prof_data = explode('::', $lnb_prof_info); @endphp
                        @php $lnb_show_url = '/professor/show/prof-idx/' . $lnb_prof_idx . '?cate_code=' . $lnb_prof_data[0] . '&subject_idx=' . $lnb_prof_data[1] . '&subject_name=' . rawurlencode($lnb_prof_data[2]); @endphp
                        <dt><a href="{{ front_url($lnb_show_url) }}" class="{{ isset($prof_idx) === true && $lnb_prof_idx == $prof_idx ? 'active' : '' }}">{{ $lnb_prof_data[2] }} {{ $lnb_prof_data[3] }}</a></dt>
                    @endforeach
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>
