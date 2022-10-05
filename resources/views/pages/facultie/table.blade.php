<div class="card-body table-responsive p-0">
    <table id="example2" class="table table-hover table-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>{{ __('facultie.name') }}</th>
          <th>{{ __('facultie.notes') }}</th>
          <th>{{ __('facultie.processes') }}</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($faculties as $i => $facultie)
          <tr>
            <td>{{ $i + 1 }} </td>
                <td>{{ $facultie->name }}</td>
                <td>{{ $facultie->notes }}</td>
                <td>
                  <span class="tag tag-success">
                    <a class="btn btn-info btn-sm" href="#" onclick="showFormEdit(event)" data-target="edit{{ $facultie->id }}">
                      <i class="fas fa-pencil-alt"></i> Edit
                    </a>
                    {!! Form::model($facultie, ['route' => ['facultie.destroy', $facultie->id], 'method' => 'post', 'role' => 'form', 'class' => 'btn']) !!}
                      @method('delete')
                      {!! Form::button('<i class="fas fa-trash"></i>Delete', ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                    {!! Form::close() !!}
                </span>
              </td>
            </tr>

            <div id="edit{{ $facultie->id }}" style="display: none">
              <!-- left column -->
              <div class="col-md-6 offset-3">
                <!-- general form elements -->
                <div class="card card-primary">
                  
                  <!-- /.card-header -->
                  <!-- form start -->
                  {!! Form::model($facultie, ['route' => ['facultie.update', $facultie->id], 'method' => 'patch', 'role' => 'form']) !!}
                    @include('pages.facultie.fields')
                  {!! Form::close() !!}

                </div>
                <!-- /.card -->
              </div>
          </div>

            @empty
                <td colspan="7">No university founded</td>
            @endforelse
      </tbody>
    </table>
  </div>
<script>
  function showFormEdit(event){
    event.preventDefault();
    document.getElementById(event.target.closest("[data-target]").dataset.target).classList.add("fly-form");
  }
</script>