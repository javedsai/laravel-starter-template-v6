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
                                ADD NEW CLIENT
                            </h2>
                        </div>
                        <div class="body">                            
                            <form method="POST" action="{{ route('admin.client.store') }}" >
                             @csrf

                             <label class="form-label">Client Name<span class="font-bold col-pink"> *</span></label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="client_name" name="client_name" value="{{ old('client_name') }}" placeholder="Enter Client Name" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Contact Person</label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="contact_person" name="contact_person" value="{{ old('contact_person') }}" placeholder="Enter Contact Person" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Contact No</label>
                             <div class="form-group">
                             	<div class="form-line">
                             		<input type="text" id="contact_no" name="contact_no" value="{{ old('contact_no') }}" placeholder="Enter Digits" autocomplete="off" class="form-control">
                             	</div>
                             </div>

                             <label class="form-label">Address</label>
                             <div class="form-group">
                             	<div class="form-line">
                                    <textarea name="address" id="address" cols="90" rows="8">{{ old('address')}}</textarea>
                             	</div>
                             </div>


                             <a class="btn btn-danger m-t-15 waves-effect" href="{{ route('admin.client.index') }}"> BACK</a>

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

@endpush
