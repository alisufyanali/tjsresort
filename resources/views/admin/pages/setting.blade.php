@extends('admin.layouts.app')
@section('content')
<style>
.image_style {
    height: 100px;
    width: 40%;
    object-fit: cover;
    border-radius: 29px;
    margin-top: 19px;
}

.image_slider {
    height: 150px;
    margin-top: 19px;
    width: 30%;
    object-fit: cover;
    border-radius: 21px;
}
</style>
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">
            <a href="{{ url()->previous() }}" class="btn btn-primary waves-effect"> Back</a>
            <br>
            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
            </div>
            @endif

            @if ($errors->any())
            <br>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <div class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="first-opt"><i class="feather icon-chevron-left open-card-option"></i></li>
                    <li><i class="feather icon-maximize full-card"></i></li>
                    <li><i class="feather icon-minus minimize-card"></i></li>
                    <li><i class="feather icon-refresh-cw reload-card"></i></li>
                    <li><i class="feather icon-trash close-card"></i></li>
                    <li><i class="feather icon-chevron-left open-card-option"></i></li>
                </ul>
            </div>
        </div>
        <div class="card-block p-b-0">
            <h4>Settins</h4>
            <form action="{{ route('admin.setting.do') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <input type="hidden" value="{{ Auth::user()->id ?? null }}" name="id">
                            <label for="logo">Logo</label>
                            <input type="file" name="logo" accept=".png, .jpg, .jpeg,.wepb" class="form-control">
                            @if (!empty($setting->logo))
                            <img src="{{ asset($setting->logo) }}" class="image_style">
                            @endif
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label for="favicon">Favicon</label>
                            <input type="file" name="favicon" accept=".png, .jpg, .jpeg,.wepb" class="form-control">
                            @if (!empty($setting->favicon))
                            <img src="{{ asset($setting->favicon) }}" class="image_style">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="sliders">Sliders</label>
                    <input type="file" name="sliders[]" accept=".png, .jpg, .jpeg,.wepb" multiple class="form-control">
                    @if (!empty($setting->sliders))
                    @php
                    $sliders = isset($setting->sliders) ? explode(',', $setting->sliders) : [];
                    @endphp
                    @foreach ($sliders as $index => $slider)
                    <img src="{{ asset($slider) }}" class="image_slider">
                    @endforeach
                    @endif
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Email" value="{{ $setting->email ?? null }}"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_no">Contact No</label>
                    <input type="number" value="{{ $setting->contact_no ?? null }}" name="contact_no"
                        placeholder="Contact No" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ $setting->address ?? null }}" placeholder="Address"
                        class="form-control">
                </div>
                <div class="form-group">
                    <label for="meta_tags">Meta Tags</label>
                    <input type="hidden" name="meta_tags" id="meta_tags" value="{{ $setting->meta_tags }}">
                    <div id="meta_tags_container">
                    </div>
                    <button type="button" id="add_meta_tag" class="btn btn-success mt-2">Add Meta Tag</button>
                </div>
              
              <div class="form-group">
                    <label for="coming_soon_visible">Coming Soon Visible</label>
                    <select name="coming_soon_visible" class="form-select">
                        <option selected disabled>Select</option>
                        <option value="1" {{ isset($setting->coming_soon_visible) && $setting->coming_soon_visible ? 'selected' : '' }}>Yes</option>
                        <option value="0" {{ isset($setting->coming_soon_visible) && !$setting->coming_soon_visible ? 'selected' : '' }}>No</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Save</button>
                <br>
            </form>
            <br>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    function updateMetaTagsInput() {
        var commaSeparatedString = $('#meta_tags').val();
        var tagsArray = commaSeparatedString ? commaSeparatedString.split(',') : [];

        $('#meta_tags_container').empty();

        if (tagsArray.length === 0) {
            var html = '<div class="input-group mb-2">' +
                '<input type="text" name="meta_tags[]" placeholder="Enter Meta Tag" class="form-control">' +
                '<div class="input-group-append">' +
                '<button class="btn btn-danger delete-tag" type="button">Delete</button>' +
                '</div>' +
                '</div>';
            $('#meta_tags_container').append(html);
        } else {
            tagsArray.forEach(function(tag) {
                var trimmedTag = tag.trim();
                if (trimmedTag !== '') {
                    var html = '<div class="input-group mb-2">' +
                        '<input type="text" name="meta_tags[]" value="' + trimmedTag +
                        '" placeholder="Enter Meta Tag" class="form-control">' +
                        '<div class="input-group-append">' +
                        '<button class="btn btn-danger delete-tag" type="button">Delete</button>' +
                        '</div>' +
                        '</div>';
                    $('#meta_tags_container').append(html);
                }
            });
        }
    }
    updateMetaTagsInput();
    $('#add_meta_tag').click(function() {
        var html = '<div class="input-group mb-2">' +
            '<input type="text" name="meta_tags[]" placeholder="Enter Meta Tag" class="form-control">' +
            '<div class="input-group-append">' +
            '<button class="btn btn-danger delete-tag" type="button">Delete</button>' +
            '</div>' +
            '</div>';
        $('#meta_tags_container').append(html);
    });
    $(document).on('click', '.delete-tag', function() {
        var inputGroup = $(this).closest('.input-group');
        var inputValue = inputGroup.find('input[type="text"]').val().trim();
        var commaSeparatedString = $('#meta_tags').val();
        var tagsArray = commaSeparatedString ? commaSeparatedString.split(',') : [];
        var index = tagsArray.indexOf(inputValue);
        if (index !== -1) {
            tagsArray.splice(index, 1);
        }
        $('#meta_tags').val(tagsArray.join(','));
        inputGroup.remove();
        if (tagsArray.length === 0) {
            updateMetaTagsInput();
        }
    });
});
</script>
@endsection