{!! Form::hidden('idday', isset($days->id) ? $days->id : '', ['class' => 'form-control', 'id' => 'idday']) !!}
<div class="form-group">
	<label>
        Kode Hari
    </label>
    {!! Form::text('code_days', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Kode Hari']) !!}
 </div>
<div class="form-group">
    <label>
        Nama
    </label>
    {!! Form::text('name_day', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nama Hari']) !!}
</div>
<button class="btn btn-primary">
    Simpan
</button>
