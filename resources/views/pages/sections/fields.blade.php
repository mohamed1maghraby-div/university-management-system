@php $id = isset($section) ? $section->id : ''; @endphp
<div class="card-body">
  <div class="form-group">
    {!! Form::label('facultie_id', __('facultie.choose')) !!}
    {!! Form::select('facultie_id', ['0'=>'select Facultie', ...$chooseFaculties], null, ['class' => 'custom-select', 'id' => 'type'. $id]) !!}
  </div>
  <div class="form-group">
    {!! Form::label('classroom_id', __('classroom.choose')) !!}
    @php
      $getclassroomId = isset($section) ? $section->classroom->id : '';
      $getclassroomName = isset($section) ? $section->classroom->name : '';
    @endphp
    {!! Form::select('classroom_id', ['' => 'Select Classroom', $getclassroomId => $getclassroomName], old('classroom_id', $getclassroomId), ['class' => 'custom-select', 'id' => 'size'.$id]) !!}
  </div>
  <div class="form-group">
    {!! Form::label('name', __('facultie.name')) !!}
    {!! Form::text('name', null, ['placeholder' => __('facultie.name') , 'class' => 'form-control']) !!}
  </div>
  <div class="form-group">
    <div class="form-check">
      <div class="row">

        <div class="col-lg-2">
          {!! Form::radio('status', 1, true, ['class' => 'form-check-input', 'id' => 'exampleCheck1']) !!}
          {!! Form::label('exampleCheck1', 'Active', ['class' => 'form-check-label']) !!}
        </div>
        <div class="col-lg-2">
          {!! Form::radio('status', 0, false,['class' => 'form-check-input', 'id' => 'exampleCheck2']) !!}
          {!! Form::label('exampleCheck2', 'Disactive', ['class' => 'form-check-label']) !!}
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /.card-body -->


@section('script')
<script>
  $(document).ready(function () {
    $("#type").change(function () {
      var val = $(this).val();
      @foreach ($faculties as $facultie)
      if (val == "{{ $facultie->id }}") {
        console.log('medo');
        $("#size").empty();
        @foreach ($facultie->classrooms as $classroom)
          $("#size").append("<option value='{{ $classroom->id }}'>{{ $classroom->name }}</option>");
        @endforeach
      }
      @endforeach
      if (val == 0) {
        $("#size").empty();
      }
  });
});


</script>
@endsection
