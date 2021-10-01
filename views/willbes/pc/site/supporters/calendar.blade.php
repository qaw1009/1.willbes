{!! $calendar !!}
<script type="text/javascript">
    $(document).ready(function() {
        $("#average_box").html('<div>출석완료 <strong>{{$member_average['MemberCount']}}</strong>/{{$member_average['LastDay']}} <span>|</span>출석률 <strong>{{$member_average['MemberAverage']}}%</strong></div>');
    });
</script>