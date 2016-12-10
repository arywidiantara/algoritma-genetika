{!! Form::hidden('idtimes', isset($times->id) ? $times->id : '', ['class' => 'form-control', 'id' => 'idday']) !!}

<div class="form-group">
    <label>
        Kode Waktu
    </label>
    {!! Form::text('code_times', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Kode Waktu']) !!}
</div>
<div class="form-group">
    <label>
        Waktu Mulai
    </label>
    <div class="input-group bootstrap-timepicker timepicker">
        {!! Form::text('time_begin', null, ['class' => 'form-control timepicker input-small', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Waktu Mulai']) !!}
    </div>
</div>
<div class="form-group">
    <label>
        Waktu Akhir
    </label>
    <div class="input-group bootstrap-timepicker timepicker">
        {!! Form::text('time_finish', null, ['class' => 'form-control timepicker input-small', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Waktu Mulai']) !!}
    </div>
</div>
<div class="form-group">
    <label>
        Sks
    </label>
    {!! Form::select('sks', [
        '1' => '1',
        '2' => '2',
        '3' => '3',
        '4' => '4',
    ], null, ['class' => 'form-control select2 to-select', 'id' => 'sks', 'required','placeholder' => 'Pilih Sks']) !!}
    <label id="sks-error" class="error" for="sks" style="display: none;">This field is required.</label>
</div>

<button class="btn btn-primary">
    Simpan
</button>
