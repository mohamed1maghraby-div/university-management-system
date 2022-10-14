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
                  <!-- <a class="btn btn-info btn-sm" href="#" onclick="showFormEdit(event)" data-target="edit{{ $facultie->id }}">
                    <i class="fas fa-pencil-alt"></i> Edit
                  </a> -->

                  <button type="button" class="btn bg-gradient-info btn-flat btn-sm" data-toggle="modal" data-target="#modal-lg-{{$facultie->id}}">
                  <i class="fas fa-pencil-alt"></i> {{__('university.edit')}}
                  </button>

                  {!! Form::model($facultie, ['route' => ['facultie.destroy', $facultie->id], 'method' => 'post', 'role' => 'form', 'class' => 'btn']) !!}
                    @method('delete')
                    {!! Form::button('<i class="fas fa-trash"></i> ' . __('university.delete'), ['type' => 'submit', 'class' => 'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}
              </span>
            </td>
          </tr>

          

        <div class="modal fade" id="modal-lg-{{$facultie->id}}">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title">{{ __('university.add_fac') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <!-- form start -->
                {!! Form::model($facultie, ['route' => ['facultie.update', $facultie->id], 'method' => 'patch', 'role' => 'form']) !!}
                  @include('pages.facultie.fields')
              </div>
              <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                {!! Form::button(__('university.edit'), ['type'=> 'submit', 'class' => 'btn bg-gradient-info btn-flat']) !!}
              </div>
              {!! Form::close() !!}
                  <!-- form end -->
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
    <!-- /.modal -->

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