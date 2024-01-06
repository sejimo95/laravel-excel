@extends('panel.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                        <h6 class="text-white text-capitalize ps-3">Products</h6>
                    </div>
                </div>
                <div class="card-body pb-2">
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">productId</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">picture</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">name</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">available</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">sub category</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">url</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">price</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">oldprice</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">currencyId</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">vendor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($rows as $row)
                                    <tr>
                                        <td>{{$row->productId}}</td>
                                        <td>
                                            <div>
                                                <img src="{{$row->picture}}" class="avatar avatar-lg me-3 border-radius-lg" alt="user2">
                                            </div>
                                        </td>
                                        <td>{{$row->name}}</td>
                                        <td>{{$row->available}}</td>
                                        <td>{{$row->category->name}}</td>
                                        <td>{{$row->category->category->name}}</td>
                                        <td>
                                            <a target="_blank" href="{{$row->url}}">
                                                <button class="btn btn-link text-secondary mb-0 btn-primary">
                                                    <i class="fa fa-link text-xs" aria-hidden="true"></i>
                                                </button>
                                            </a>
                                        </td>
                                        <td>{{$row->price}}</td>
                                        <td>{{$row->oldprice}}</td>
                                        <td>{{$row->currencyId}}</td>
                                        <td>{{$row->vendor}}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="col-sm-12">
                            {!! $rows->withQueryString()->links('pagination::bootstrap-5') !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
