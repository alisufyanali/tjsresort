@extends('admin.layouts.app')

@section('style')

<link rel="stylesheet" href="https://richtexteditor.com/richtexteditor/rte_theme_default.css" />
<style>
.upload__btn-box {
    margin-bottom: 10px;
}

.upload__img-wrap {
    display: flex;
    flex-wrap: wrap;
    margin: 0 -10px;
}

.upload__img-box {
    width: 200px;
    padding: 0 10px;
    margin-bottom: 12px;
}

.upload__img-close {
    width: 24px;
    height: 24px;
    border-radius: 50%;
    background-color: rgba(0, 0, 0, 0.5);
    position: absolute;
    top: 10px;
    right: 10px;
    text-align: center;
    line-height: 24px;
    z-index: 1;
    cursor: pointer;
}

.upload__img-close:after {
    content: '\2716';
    font-size: 14px;
    color: white;
}

.img-bg {
    background-repeat: no-repeat;
    background-position: center;
    background-size: cover;
    position: relative;
    padding-bottom: 100%;
}

.error {
    color: red;
}
</style>
@endsection




@section('content')

<!-- testimonial and top selling start -->
<div class="col-md-12">
    <div class="card table-card">
        <div class="card-header">

            <a href="{{ route('admin.location.list') }}" class="btn btn-primary waves-effect"> Back</a>

            @if ($message = Session::get('success'))
            <div class="alert alert-success mt-2">
                <p>{{ $message }}</p>
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

            <form id="locationForm">
                @csrf
                <input type="hidden" id="location_id">
                <div class="form-group">
                    <label for="location_name">Location Name:</label>
                    <input type="text" name="location_name" class="form-control" id="location_name">
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group oversized_price_div">
                            <label for="adult">Adult Max:</label>
                            <input type="number" name="adult" class="form-control" id="adult">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group oversized_price_div">
                            <label for="children">Children Max:</label>
                            <input type="number" name="children" class="form-control" id="children">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group oversized_price_div">
                            <label for="pets">Pets Max:</label>
                            <input type="number" name="pets" class="form-control" id="pets">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="short_description">Short Description:</label>
                    <textarea class="form-control" name="short_description" id="short_description"></textarea>
                </div>
                
                <div class="form-group">
                    <label for="description">Description:</label>
                    <textarea id="div_editor1" placeholder="description..." class="form-control" name="description">{{ old('summary') }}</textarea>
                </div>
 
                <div class="form-group">
                    <label for="featured_image">Featured Image:</label>
                    <!-- <div class="dropzone" id="featuredImageDropzone"></div> -->
                    <input type="file" name="featured_image" class="form-control" id="featured_image">
                    <img src="" id="featured_image_src" alt="" width="60px">
                </div>
                <div class="form-group">
                    <label for="location_services">Location Amenities:</label>
                    <div class="tags_max">
                        <input class="" name="location_services" id="location_services" type="text"
                            value="Dog Park , Fishing Lake ,  Fire Pits , Inground Pool , Outdoor Kitchen , Driver’s lounge , Indoor Gym , Van Service "
                            data-role="tagsinput">
                    </div>
                    <br>
                </div>
               <br>
                <h3>Pricing</h3>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="daily">Daily Pricng:</label>
                            <input type="text" name="daily" class="form-control" id="daily">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="weekly">Weekly Pricng:</label>
                            <input type="text" name="weekly" class="form-control" id="weekly">
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="monthly">Monthly Pricng:</label>
                            <input type="text" name="monthly" class="form-control" id="monthly">
                        </div>
                    </div>

                </div>



                <div class="row" style="align-items: center;">
                    <div class="col-md-10 dynamic-field" id="dynamic-field-1">
                        <div class="row">
                            <div class="col-5">
                                <div class="form-group">
                                    <label for="social_name" class="hidden-md">Social Name</label>
                                    <input type="text" id="social_name" placeholder="Social Name" class="form-control"
                                        name="social_name[]" />
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <label>Social Link</label>
                                    <input type="text" placeholder="Social Link" class="form-control"
                                        name="social_link[]">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2 mt-30 append-buttons">
                        <div class="clearfix">
                            <button type="button" id="add-button"
                                class="btn btn-secondary float-left text-uppercase shadow-sm"><i
                                    class="fa fa-plus fa-fw"></i>
                            </button>
                            <button type="button" id="remove-button"
                                class="btn btn-secondary float-left text-uppercase ml-1" disabled="disabled"><i
                                    class="fa fa-minus fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>



                <div class="col-12 upload__box p-0">
                    <div class="form-group">
                        <label for="gallery_images">Location / Resort Images</label>
                        <div class="upload__btn">
                            <input type="file" multiple="" name="location_images[]" data-max_length="20"
                                class="form-control upload__inputfile">
                        </div>
                    </div>
                    <div class="upload__img-wrap"></div>
                </div>


                <div class="border-checkbox-group border-checkbox-group-primary">
                    <input class="border-checkbox" type="checkbox" id="featured" name="featured">
                    <label class="form-label border-checkbox-label" for="featured">Featured Location:</label>
                </div>

 

                <button type="button" class="btn btn-primary" id="saveBtn">Save</button>
            </form>
            <br>
        </div>
    </div>
</div>
<!-- testimonial and top selling end -->



@endsection



@section('script')

<!-- Switch component js -->
<script type="text/javascript" src="{{ asset('public/admin/bower_components/switchery/js/switchery.min.js') }}">
</script>

<!-- Tags js -->
<script type="text/javascript"
    src="{{ asset('public/admin/bower_components/bootstrap-tagsinput/js/bootstrap-tagsinput.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.10.4/typeahead.bundle.min.js"></script>

<script type="text/javascript" src="{{ asset('public/admin/assets/pages/advance-elements/swithces.js') }}"></script>



<script type="text/javascript" src="https://richtexteditor.com/richtexteditor/rte.js"></script>
<script type="text/javascript" src='https://richtexteditor.com/richtexteditor/plugins/all_plugins.js'></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script>
var editor1 = new RichTextEditor("#div_editor1");
</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});
</script>
<script>
$(document).ready(function() {
    ImgUpload();
});

function ImgUpload() {
    var imgWrap = "";
    var imgArray = [];

    $('.upload__inputfile').each(function() {
        $(this).on('change', function(e) {
            imgWrap = $(this).closest('.upload__box').find('.upload__img-wrap');
            var maxLength = $(this).attr('data-max_length');

            var files = e.target.files;
            var filesArr = Array.prototype.slice.call(files);
            var iterator = 0;
            filesArr.forEach(function(f, index) {

                if (!f.type.match('image.*')) {
                    return;
                }

                if (imgArray.length > maxLength) {
                    return false
                } else {
                    var len = 0;
                    for (var i = 0; i < imgArray.length; i++) {
                        if (imgArray[i] !== undefined) {
                            len++;
                        }
                    }
                    if (len > maxLength) {
                        return false;
                    } else {
                        imgArray.push(f);

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var html =
                                "<div class='upload__img-box'><div style='background-image: url(" +
                                e.target.result + ")' data-number='" + $(
                                    ".upload__img-close").length + "' data-file='" + f
                                .name +
                                "' class='img-bg'><div class='upload__img-close'></div></div></div>";
                            imgWrap.append(html);
                            iterator++;
                        }
                        reader.readAsDataURL(f);
                    }
                }
            });
        });
    });

    $('body').on('click', ".upload__img-close", function(e) {
        var id = $(this).parent().data("id");
        var file = $(this).parent().data("file");
        // var parentElement = $(this).parent().parent();
        for (var i = 0; i < imgArray.length; i++) {
            if (imgArray[i].name === file) {
                imgArray.splice(i, 1);
                break;
            }
        }
        $(this).parent().parent().remove();
    });
}
$(document).ready(function() {
    var buttonAdd = $("#add-button");
    var buttonRemove = $("#remove-button");
    var className = ".dynamic-field";
    var count = 0;
    var field = "";
    var maxFields = 50;

    function totalFields() {
        return $(className).length;
    }

    function addNewField() {
        count = totalFields() + 1;
        field = $("#dynamic-field-1").clone();
        field.attr("id", "dynamic-field-" + count);
        field.children("label").text("Field " + count);
        field.find("input").val("");
        $(className + ":last").after($(field));
    }

    function removeLastField() {
        if (totalFields() > 1) {
            $(className + ":last").remove();
        }
    }

    function enableButtonRemove() {
        if (totalFields() === 2) {
            buttonRemove.removeAttr("disabled");
            buttonRemove.addClass("shadow-sm");
        }
    }

    function disableButtonRemove() {
        if (totalFields() === 1) {
            buttonRemove.attr("disabled", "disabled");
            buttonRemove.removeClass("shadow-sm");
        }
    }

    function disableButtonAdd() {
        if (totalFields() === maxFields) {
            buttonAdd.attr("disabled", "disabled");
            buttonAdd.removeClass("shadow-sm");
        }
    }

    function enableButtonAdd() {
        if (totalFields() === (maxFields - 1)) {
            buttonAdd.removeAttr("disabled");
            buttonAdd.addClass("shadow-sm");
        }
    }

    buttonAdd.click(function() {
        addNewField();
        enableButtonRemove();
        disableButtonAdd();
    });

    buttonRemove.click(function() {
        removeLastField();
        disableButtonRemove();
        enableButtonAdd();
    });
});
$(document).ready(function() {


    $(document).on('click', '#saveBtn', function() {
        var formData = new FormData($('#locationForm')[0]);
        var location_id = $('#location_id').val();
        var ajaxUrl = location_id ? 'update/' + location_id : 'store';
        var ajaxMethod = location_id ? 'POST' : 'POST';
        if (location_id) formData.append('_method', 'PUT');
        $('.error').remove();
        $.ajax({
            url: ajaxUrl,
            method: ajaxMethod,
            data: formData,
            processData: false,
            contentType: false,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            success: function(response) {
                if (response.status == 'danger') {
                    alert(response.message)
                } else {
                    location.reload();
                }
            },
            error: function(response) {
                errors = response.responseJSON.errors;
                jQuery.each(errors, function(index, item) {
                    $("#" + index).after('<span class="error" >' + item +
                        ' </span>')
                });
            }
        });
    });

});
</script>

@endsection