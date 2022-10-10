<div class="card-body">

  <div class="form-group">
    {!! Form::label('name', __('facultie.name')) !!}
    {!! Form::text('name', null, ['placeholder' => __('facultie.name') , 'class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    {!! Form::label('notes', __('facultie.notes')) !!}
    {!! Form::textarea('notes', null, ['id'=> 'notes','class' => 'form-control', 'placeholder' => 'Your notes']) !!}
  </div>
</div>
<!-- /.card-body -->

