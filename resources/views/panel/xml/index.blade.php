@extends('panel.master')

@section('content')
    <div class="row">
        <div class="col-lg-6 cards">
            <div class="card card-pricing card-raised">
                <div class="card-body">
                    <h6 class="card-category">Generate XML</h6>
                    <p class="card-description">
                        Generate XML from this url:
                        <br/>
                        https://quarta-hunt.ru/bitrix/catalog_export/export_Ngq.xml
                    </p>
                    <button id="generate" type="submit" class="btn btn-primary btn-round">
                        Generate XML
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        // generate ajax
        $(document).ready(function () {
            $('#generate').click(function () {
                $(this).prop('disabled', true)
                $.ajax({
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ url('generate-xml') }}",
                    type: "POST",
                    data: {},
                    processData: false,
                    contentType: false,
                    async: true,
                    success: function (data) {
                        $('#messageToast').removeClass('hide')
                        $('#messageToast').addClass('show')
                        $('#toast-body-message').text('Generate Completely')
                    },
                    error: function () {
                        $('#messageToast').removeClass('hide')
                        $('#messageToast').addClass('show')
                        $('#toast-body-message').text('Generate Failed')
                    },
                    complete: function () {
                        $('#generate').prop('disabled', false)
                    }
                })
            })
        })
    </script>
@endsection
