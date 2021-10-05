{!! $calendar !!}
<script type="text/javascript">
    $(document).ready(function() {
        $("#average_box").html('출석완료 : {{$member_average['MemberCount']}}/{{$member_average['LastDay']}}</span> <span class="ml-10">출석률 : {{$member_average['MemberAverage']}}%');
    });
</script>