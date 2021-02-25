@if(empty($stab_list) === false)
    <ul class="tabWrap lineWrap rowlineWrap lecListWrap mt-zero">
        @foreach($stab_list as $stab_id => $stab_name)
            <li style="width: {{ $stab_width }}%">
                <a href="#none" onclick="goTabUrl('tab', '{{ $stab_id }}');" class="{{ $arr_input['tab'] == $stab_id ? 'on' : '' }}">
                    {{ $stab_name }}
                </a>
                @if($loop->last === false)
                    <span class="row-line">|</span>
                @endif
            </li>
        @endforeach
    </ul>
@endif
