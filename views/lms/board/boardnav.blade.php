<ul class="nav nav-tabs bar_tabs mb-20" role="tablist">
    <li role="presentation" class="active"><a href="#" class="">전체 <span class="red">{{$unanswered['total'] or ''}}</span></a></li>
    @foreach($baseSiteInfos as $key => $val)
        <li role="presentation" class=""><a href="{{$key}}" class="">{{$val}} <span class="red">{{$unanswered[$key] or ''}}</span></a></li>
    @endforeach
</ul>

@if($campusOnOff == 'on')
    <ul class="nav nav-pills">
        <li><a href="">전체</a></li>
        @foreach($campusInfos as $key => $val)
            <li><a href="{{$key}}">{{$val}}</a></li>
        @endforeach
    </ul>
@endif