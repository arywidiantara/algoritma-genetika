    {!! Form::hidden('idcourse', isset($courses->id) ? $courses->id : '', ['class' => 'form-control', 'id' => 'idcourse']) !!}
<div class="form-group">
    <label>
        Kode Mata Kuliah
    </label>
    {!! Form::text('code_courses', null, ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Kode Mata Kuliah', 'id' => 'code_courses']) !!}
</div>
<div class="form-group">
    <label>
        Nama Mata Kuliah
    </label>
    {!! Form::text('namecourses', isset($courses->name) ? $courses->name : '', ['class' => 'form-control', 'required', 'maxlength' => '100', 'placeholder' => 'Masukkan Nama Mata Kuliah', 'id' => 'namecourses']) !!}
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
<div class="form-group">
    <label>
        Semester
    </label>
    {!! Form::select('semester', [
        'Ganjil' => 'Ganjil',
        'Genap' => 'Genap',
    ], null, ['class' => 'form-control select2 to-select', 'id' => 'semester', 'required','placeholder' => 'Pilih Semester']) !!}
    <label id="semester-error" class="error" for="semester" style="display: none;">This field is required.</label>
</div>
<div class="form-group">
    <label>
        Jenis
    </label>
    {!! Form::select('type', $type, null, ['class' => 'form-control select2 to-select', 'id' => 'type', 'required','placeholder' => 'Pilih Jenis']) !!}
    <label id="type-error" class="error" for="type" style="display: none;">This field is required.</label>
</div>
<button class="btn btn-primary">
    Simpan
</button>
