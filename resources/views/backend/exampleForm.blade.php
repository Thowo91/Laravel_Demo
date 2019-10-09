@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6">
            {{ Form::open(['method' => 'GET', 'id' => 'exampleForm']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['Placeholder' => 'Name', 'class' => 'form-control', 'required', 'minlength' => 3, 'maxlength' => 50]) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['Placeholder' => 'Email', 'class' => 'form-control', 'required']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Passwort') }}
                {{ Form::password('password', ['Placeholder' => 'Passwort', 'class' => 'form-control', 'required', 'minlength' => 5]) }}
            </div>
            <div class="form-group">
                {{ Form::label('confirmPassword', 'Passwort wiederholen') }}
                {{ Form::password('confirmPassword', ['Placeholder' => 'Passwort', 'class' => 'form-control', 'required', 'minlength' => 5]) }}
            </div>
            <div class="form-group">
                {{ Form::label('url', 'Url') }}
                {{ Form::text('url', null, ['Placeholder' => 'Url', 'class' => 'form-control']) }}
            </div>

            {{ Form::submit('Go!', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $("#exampleForm").validate({
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid').addClass('is-valid');
                },
                rules: {
                    confirmPassword: {
                        equalTo: '#password'
                    },
                    url: {
                        url: true
                    }
                }
            });
        });
    </script>


@endsection
