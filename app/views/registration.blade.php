{{ Form::open( array('url' => 'registration',
                'method' => 'POST'
        )) }}

{{ Form::label('UserName','Enter Your Name') }}
{{ Form::text('name') }}

{{ Form::label('password') }}
{{ Form::password('password') }}

{{ Form::label('confirrm_password') }}
{{ Form::password('confirm_password') }}

{{ Form::submit('Submit') }}

{{ Form::close() }}


                                                                                                                                                   