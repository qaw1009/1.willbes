@extends('willbes.pc.layouts.master_no_sitdbar')

@section('content')
    <div class="willbes-Prof-Subject pl-zero NG tx-dark-black">
        · 교수님 TCC
    </div>
    <!-- List -->
    <div class="willbes-Leclist c_both">
        <ul class="tccWrap">
            @if(empty($list) === true)
                <li>
                    등록된 내용이 없습니다.
                </li>
            @else
                @foreach($list as $row)
                    <li>
                        <img src="{{ img_url('prof/tccImg.jpg') }}" alt="TCC영상제목">
                        <div class="tccInfo">
                            <h4><span class="NG">{{ hpSubString($row['Title'],0,40,'...') }}</span><span class="date">{{ $row['RegDatm'] }}</span></h4>
                            <div>
                                {!! $row['Content'] !!}
                            </div>
                        </div>
                        <a id="youtube-{{ $loop->index }}" href="#none" onclick="setPlayVideo('{{ $row['VideoUrl'] }}');" class="playBtn">영상보기</a>
                    </li>
                    @php $paging['rownum']-- @endphp
                @endforeach
            @endif
        </ul>
    </div>

    <div class="row">
        <div class="col-xs-12">
            {!! $paging['pagination'] !!}
        </div>
    </div>

    <script type="text/javascript">
    function setPlayVideo(url)
    {
        parent.playVideo(url);
    }
    </script>
@stop