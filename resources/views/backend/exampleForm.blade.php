@extends('layouts.backend')

@section('content')

    <div class="row">
        <div class="col-6">
            {{ Form::open(['method' => 'GET', 'id' => 'exampleForm']) }}

            <div class="form-group">
                {{ Form::label('name', 'Name') }}
                {{ Form::text('name', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('email', 'Email') }}
                {{ Form::email('email', null, ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('password', 'Passwort') }}
                {{ Form::password('password', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('confirmPassword', 'Passwort wiederholen') }}
                {{ Form::password('confirmPassword', ['class' => 'form-control']) }}
            </div>
            <div class="form-group">
                {{ Form::label('url', 'Url') }}
                {{ Form::text('url', null, ['class' => 'form-control']) }}
            </div>

            {{ Form::submit('Go!', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>

    <style>
        .error {
            color: red;
            font-weight: bold;
        }
    </style>

    <script>
        $(document).ready(function() {
            $("#exampleForm").validate({
                rules: {
                    name: {
                        required: true,
                        minlength: 3,
                        maxlength: 50
                    },
                    email: {
                        required: true,
                        email: true
                    },
                    password: {
                        required: true,
                        minlength: 5
                    },
                    confirmPassword: {
                        required: true,
                        minlength: 5,
                        equalTo: '#password'
                    },
                    url: {
                        url: true
                    }
                },
                messages: {
                    name: {
                        required: "Please enter name",
                        minlength: "At Least 3 Characters"
                    }
                }
            });
        });
    </script>


@endsection
