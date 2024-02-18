@extends('admin.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="px-4 py-3 border-bottom">
                    <h5 class="card-title fw-semibold mb-0">Chỉnh sửa loại phòng</h5>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.room_types.update', $roomType->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="mb-4 row align-items-center">
                            <label for="input_name" class="form-label fw-semibold col-sm-2 col-form-label">Tên loại
                                phòng</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_name" name="name"
                                    value="{{ $roomType->name }}" placeholder="Nhập tên loại phòng" autofocus required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_price" class="form-label fw-semibold col-sm-2 col-form-label">Giá (1
                                giờ)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_price" name="price"
                                    placeholder="Nhập giá" value="{{ $roomType->price }}" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_discount" class="form-label fw-semibold col-sm-2 col-form-label">Giảm giá
                                (%)</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="input_discount" name="discount"
                                    placeholder="Nhập giảm giá" value="{{ $roomType->discount }}" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_description" class="form-label fw-semibold col-sm-2 col-form-label">Mô
                                tả</label>
                            <div class="col-sm-10">
                                <textarea class="summernote" id="input_description" name="description">{!! $roomType->description !!}</textarea>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_number_of_bathroom"
                                class="form-label fw-semibold col-sm-2 col-form-label">Hình ảnh (tối đa 5)</label>
                            <div class="col-sm-10">
                                <input type="file" class="filepond" id="filepond" name="images[]"
                                    data-images="{{ $roomType->image_url }}" multiple data-allow-reorder="true"
                                    data-max-file-size="3MB" data-max-files="5">
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_number_of_bed" class="form-label fw-semibold col-sm-2 col-form-label">Số
                                giường
                                ngủ</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="input_number_of_bed" name="number_of_bed"
                                    placeholder="Nhập số giường ngủ" min="1" value="{{ $roomType->number_of_bed }}"
                                    required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_number_of_bathroom" class="form-label fw-semibold col-sm-2 col-form-label">Số
                                phòng tắm</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="input_number_of_bathroom"
                                    name="number_of_bathroom" placeholder="Nhập số phòng tắm" min="1"
                                    value="{{ $roomType->number_of_bathroom }}" required>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="input_description" class="form-label fw-semibold col-sm-2 col-form-label">Chọn tiện
                                ích</label>
                            <div class="col-sm-10">
                                <select class="select2 form-control" style="width: 100%; height: 36px" id="select_utilities"
                                    name="utilities[]" multiple required>
                                    @foreach ($utilities as $utility)
                                        <option value="{{ $utility->id }}"
                                            {{ in_array($utility->id, json_decode($roomType->utilities, true) ?? []) ? 'selected' : '' }}>
                                            {{ $utility->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="mb-4 row align-items-center">
                            <label for="cbx_is_shown" class="form-label fw-semibold col-sm-2 col-form-label">Hiển
                                thị</label>
                            <div class="col-sm-10">
                                <input type="checkbox" class="form-check-input" id="cbx_is_shown" name="is_shown"
                                    {{ $roomType->is_shown ? 'checked' : '' }}>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary">Gửi</button>
                                <a href="{{ route('admin.room_types.index') }}" class="btn btn-dark ms-2">Quay về</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('styles')
    <link href="https://unpkg.com/filepond/dist/filepond.css" rel="stylesheet" />
    <link href="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.css"
        rel="stylesheet" />
@endpush

@push('scripts')
    <script src="https://unpkg.com/filepond-plugin-image-preview/dist/filepond-plugin-image-preview.js"></script>
    <script src="https://unpkg.com/filepond-plugin-image-exif-orientation/dist/filepond-plugin-image-exif-orientation.js">
    </script>
    <script src="https://unpkg.com/filepond-plugin-file-encode/dist/filepond-plugin-file-encode.js"></script>
    <script src="https://unpkg.com/filepond/dist/filepond.js"></script>

    <script>
        const images = JSON.parse(document.getElementById('filepond').getAttribute('data-images'));

        FilePond.registerPlugin(
            FilePondPluginImagePreview,
            FilePondPluginImageExifOrientation,
            FilePondPluginFileEncode,
        );

        FilePond.create(
            document.querySelector('.filepond'), {
                files: images
            }
        );
    </script>
@endpush
