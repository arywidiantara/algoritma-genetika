{!! Form::hidden('iduser', isset($users->id) ? $users->id : '', ['class' => 'form-control', 'id' => 'iduser']) !!}
<div class="form-group">
    <label>
        Nama Lengkap
    </label>
    {!! Form::text('name', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nama Lengkap']) !!}
</div>
<div class="form-group">
    <label>
        Email
    </label>
    {!! Form::email('emailuser', isset($users->email) ? $users->email : '', ['class' => 'form-control', 'required', 'maxlength' => '50', 'placeholder' => 'Masukkan Email', 'id' => 'emailuser']) !!}
</div>
@if(empty($users->password))
    <div class="form-group">
        <label>
            Password
        </label>
        {!! Form::password('password', ['class' => 'form-control','id' => 'password', 'maxlength' => '20', 'required', 'placeholder' => 'Masukkan Password']) !!}
    </div>
    <div class="form-group">
        <label>
            Password Konfirmasi
        </label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'maxlength' => '20', 'required', 'placeholder' => 'Masukkan assword Konfirmasi']) !!}
    </div>
@else
    <div class="form-group">
        <label>
            Password
        </label>
        {!! Form::password('password', ['class' => 'form-control','id' => 'password', 'maxlength' => '20', 'placeholder' => 'Masukkan Password']) !!}
    </div>
    <div class="form-group">
        <label>
            Password Konfirmasi
        </label>
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'maxlength' => '20', 'placeholder' => 'Masukkan Password Konfirmasi']) !!}
    </div>
@endif
<button class="btn btn-primary">
    Simpan
</button>
