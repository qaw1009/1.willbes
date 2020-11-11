<h2>강의안내</h2>
<div class="lnb-List">
    @foreach($arr_lnb_professor as $lnb_cate_name => $lnb_subject_row)
        <div class="lnb-List-Tit-ssam">
            {{-- 카테고리명 --}}
            <div><span class="Txt">{{ $lnb_cate_name }}</span></div>
        </div>
        <div class="lnb-List-Depth lnb-List-Depth-ssam">
            <dl>
                @foreach($lnb_subject_row as $lnb_subject_idx => $lnb_prof_row)
                    @foreach($lnb_prof_row as $lnb_prof_idx => $lnb_prof_info)
                        {{-- 카테고리코드::과목식별자::과목명::교수명 --}}
                        @php $lnb_prof_data = explode('::', $lnb_prof_info); @endphp
                        @php $lnb_show_url = '/professor/show/prof-idx/' . $lnb_prof_idx . '?cate_code=' . $lnb_prof_data[0] . '&subject_idx=' . $lnb_prof_data[1] . '&subject_name=' . rawurlencode($lnb_prof_data[2]); @endphp
                        <dt><a href="{{ front_url($lnb_show_url) }}" class="{{ isset($prof_idx) === true && $lnb_prof_idx == $prof_idx ? 'active' : '' }}">· {{ $lnb_prof_data[2] }} <span class="NGEB">{{ $lnb_prof_data[3] }}</span></a></dt>
                    @endforeach
                @endforeach
            </dl>
        </div>
    @endforeach
    <div class="lnb-List-Depth"></div>
</div>
