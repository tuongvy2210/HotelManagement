<!-- Booking Start -->
<div class="container-fluid booking pb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container">
        <div class="bg-white shadow" style="padding: 35px;">
            <form action="{{ route('booking') }}">
                <div class="row g-2">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-3">
                                <div class="date" id="date1" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" name="checkin_at"
                                        value="{{ request()->checkin_at }}" placeholder="Thời gian vào"
                                        data-target="#date1" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="room_type_id">
                                    <option value="">Chọn loại phòng</option>
                                    @foreach ($roomTypes as $roomType)
                                        <option value="{{ $roomType->id }}"
                                            {{ request()->room_type_id == $roomType->id ? 'selected' : '' }}>
                                            {{ $roomType->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="number_of_adults">
                                    <option value="">Số người lớn</option>
                                    @for ($i = 1; $i <= 3; $i++)
                                        <option value="{{ $i }}" {{ request()->number_of_adults == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                            <div class="col-md-3">
                                <select class="form-select" name="number_of_children">
                                    <option value="" selected>Số trẻ em</option>
                                    @for ($i = 1; $i <= 3; $i++)
                                        <option value="{{ $i }}" {{ request()->number_of_children == $i ? 'selected' : '' }}>{{ $i }}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">Đặt phòng ngay</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Booking End -->
