{!! Form::hidden('idtimenotavailables', isset($timenotavailables->id) ? $timenotavailables->id : '', ['class' => 'form-control', 'id' => 'idtimenotavailables']) !!}
<div class="form-group">
    <label>
        Dosen
    </label>
     {!! Form::select('lecturers', $lecturers, isset($timenotavailables->lecturers_id) ? $timenotavailables->lecturers_id : '' ,['class' => 'form-control select2 to-select','id' => 'lecturers', 'required', 'placeholder' => 'Pilih Dosen']) !!}
    <label id="lecturers-error" class="error" for="lecturers" style="display: none;">This field is required.</label>
</div>
<div class="form-group">
    <label>
        Hari
    </label>
     {!! Form::select('days', $days, isset($timenotavailables->days_id) ? $timenotavailables->days_id : '' ,['class' => 'form-control select2 to-select','id' => 'days', 'required', 'placeholder' => 'Pilih Hari']) !!}
    <label id="days-error" class="error" for="days" style="display: none;">This field is required.</label>
</div>
<div class="form-group">
    <label>
        Waktu
    </label>
    {!! Form::select('times', $times, isset($timenotavailables->times_id) ? $timenotavailables->times_id :'' , ['class' => 'form-control select2 to-select', 'id' => 'times', 'required','placeholder' => 'Pilih Waktu']) !!}
    <label id="times-error" class="error" for="times" style="display: none;">This field is required.</label>
</div>
<button class="btn btn-primary">
    Simpan
</button>
