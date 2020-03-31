@extends('willbes.pc.layouts.master_popup')

@section('content')
    <img src="{{ (empty($seat_map_info['SeatMapFileRoute']) === false ? $seat_map_info['SeatMapFileRoute'] : '') }}">
@stop