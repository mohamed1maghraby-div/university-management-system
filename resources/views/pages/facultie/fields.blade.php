<div class="card-body">
  <div class="form-group">
    <h3>{{ __('university.add_fac') }}
      <small class="text-muted">
        <button type="button" class="close" onclick="closeForm()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
      </button>
      </small>
    </h3>
    
  </div>
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

<div class="card-footer">
    {!! Form::button( __('facultie.submit') , ['type' => 'submit', 'class' => 'btn bg-gradient-info btn-flat']) !!}
</div>
  