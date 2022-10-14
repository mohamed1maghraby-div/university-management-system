<div class="card-body">

  <div class="form-group">
    {!! Form::label('facultie_id', __('university.choose_fac')) !!}
    {!! Form::select('facultie_id', $faculties, old('facultie_id'), ['class' => 'custom-select']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('name', __('classroom.name')) !!}
    {!! Form::text('name', null, ['placeholder' => __('facultie.name') , 'class' => 'form-control']) !!}
  </div>
</div>
<!-- /.card-body -->

