@extends('layouts.backend.app')
@section('title', 'Dashboard')
@push('css')

@endpush
@section('content')
<div class="container-fluid">

            <!-- Vertical Layout | With Floating Label -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                CREATE NEW PAGE
                            </h2>
                        </div>
                        <div class="body">                            
                            <form method="POST" action="{{ route('admin.pages.store') }}" enctype="multipart/form-data" >
                             @csrf

                             <label class="form-label">Page Headline<span class="font-bold col-pink"> *</span></label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="page_headline" name="page_headline" value="{{ old('page_headline') }}" placeholder="Enter Page Headline (Page URL / Slug)" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Page Title</label>
                             <div class="form-group">
                                <div class="form-line">
                                    <input type="text" id="page_title" name="page_title" value="{{ old('page_title') }}" placeholder="Enter Page Title (Page Title)" autocomplete="off" class="form-control">
                                </div>
                             </div>

                             <label class="form-label">Keywords</label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="keywords" name="keywords" value="{{ old('keywords') }}" placeholder="Enter Keywords for SEO" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Meta Description</label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="meta_description" name="meta_description" value="{{ old('meta_description') }}" placeholder="Enter Meta Description for SEO" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Page Content <span class="font-bold col-pink"> *</span></label>
                             <div class="form-group">
                             	<div class="form-line">
                                    <textarea name="page_content" id="tinymce" rows="1">{{ old('page_content') }}</textarea>
                             	</div>
                             </div>

                             <div class="clearfix m-t-15">&nbsp;</div>
                            
                            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                                <label class="form-label">Upload Image</label>
                                 <div class="form-group">
                                    
                                        <input type="file" name="image" class="form-control">
                                    
                                 </div>
                            </div>

                            <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                <div class="switch panel-switch-btn">
                                    <label class="m-r-10 form-label" style="font-size: 14px; font-weight: 700;">Display Image on Left</label>
                                    <label>NO<input type="checkbox" id="display_image_on_left" name="display_image_on_left" value="true" checked><span class="lever switch-col-teal"></span>YES</label>
                                </div>
                            </div>

                            <div class="clearfix">&nbsp;</div>

                             <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.pages.index') }}"> BACK</a>

                             <button type="submit" class="btn btn-primary m-t-15 waves-effect">SUBMIT</button>

                         </form><br/><br/>

                        </div>
                    </div>
                </div>
            </div>
            <!-- Vertical Layout | With Floating Label -->
        </div>
@endsection

@push('js')
<!-- Ckeditor -->
    <script src="{{ asset('assets/backend/plugins/ckeditor/ckeditor.js') }}"></script>

<!-- TinyMCE -->
    <script src="{{ asset('assets/backend/plugins/tinymce/tinymce.js') }}"></script>
    <script>
    $(function () {

    //TinyMCE
    tinymce.init({
        selector: "textarea#tinymce",
        theme: "modern",
        height: 300,
        plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
        toolbar2: 'print preview media | forecolor backcolor emoticons',
        image_advtab: true
    });
    tinymce.suffix = ".min";
    tinyMCE.baseURL = "{{ asset('assets/backend/plugins/tinymce') }}";
});

</script>
@endpush
