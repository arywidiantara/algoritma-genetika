{!! Form::hidden('idtimeday', isset($timedays->id) ? $timedays->id : '', ['class' => 'form-control', 'id' => 'idtimenotavailables']) !!}
<div class="form-group">
    <label>
        Kode Manajemen Waktu
    </label>
     {!! Form::text('code_timedays', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Kode']) !!}
</div>
<div class="form-group">
    <label>
        Hari
    </label>
     {!! Form::select('days', $days, isset($timedays->days_id) ? $timedays->days_id : '' ,['class' => 'form-control select2 to-select','id' => 'days', 'required', 'placeholder' => 'Pilih Hari']) !!}
</div>
<div class="form-group">
    <label>
        Waktu
    </label>
    {!! Form::select('times', $times, isset($timedays->times_id) ? $timedays->times_id :'' , ['class' => 'form-control select2 to-select', 'id' => 'times', 'required','placeholder' => 'Pilih Waktu']) !!}
</div>
<button class="btn btn-primary">
    Simpan
</button>
