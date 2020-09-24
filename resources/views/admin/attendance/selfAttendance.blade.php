@extends('layouts.admin')
@section('Heading')
    <h3 class="text-themecolor">Điểm danh</h3>
	<ol class="breadcrumb">
		<li class="breadcrumb-item"><a href="javascript:void(0)">Bảng điều khiển</a></li>
		<li class="breadcrumb-item active">Tự điểm danh</li>
	</ol>
@stop

@section('content')
    <div>
        <form action="{{route('attendance.selfStoreAttendance')}}" method="POST">
            {{ csrf_field() }}
            @if($is_attended)
                <div class="alert alert-success">
                    Bạn đã điểm danh
                </div>
            @else
                <div class="form-group">
                    <label for="my-input">Lý do</label>
                    <input type="text" name="reason" class="form-control" placeholder="Nêu rõ lý do nếu đến muộn">
                </div>
            @endif

            <div class="form-group">
                @if(!$is_attended)
                    <button type="sumit" class="btn btn-success" data-dismiss="modal" name="action" value="attend">Điểm danh</button>
                @endif
                @if($is_attended && !$is_left)
                    <button type="sumit" class="btn btn-warning" data-dismiss="modal" name="action" value="leave">Ra về</button>
                @endif
            </div>
        </form>
    </div>
@stop