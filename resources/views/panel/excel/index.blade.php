@extends('panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-6 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h6 class="card-category">Generate Excel From Mysql</h6>
                    <p class="card-description">
                        Click the button to Generate & Download Excel from Mysql
                    </p>
                    <a target="_blank" href="{{url('download-excel')}}">
                        <button type="submit" class="btn btn-primary btn-round">
                            Download Excel
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
