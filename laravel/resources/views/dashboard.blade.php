<x-app-layout>
  <div class="content-wrapper">
    <div class="page-header">
      <h3 class="page-title">
        <span class="page-title-icon bg-gradient-primary text-white me-2">
          <i class="mdi mdi-home"></i>
        </span> Task Management
      </h3>
    </div>
    <div class="col-lg-12 grid-margin stretch-card">
      @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
      @endif
      @if (session('error'))
      <div class="alert alert-warning">
          {{ session('error') }}
      </div>
      @endif

      <div class="card">
        <div class="card-body">
          <button type="button" class="btn btn-gradient-primary" data-bs-toggle="modal" data-bs-target="#filterModal">
            Filters
          </button>
          <table class="table table-striped">
            <thead>
              <tr>
                <th> Title </th>
                <th> Description </th>
                <th> Due Date </th>
                <th> Status </th>
                <th> Priority </th>
              </tr>
            </thead>
            <tbody>
              @forelse ($allTasks as $allTask)
              <tr>
                <td class="py-1">
                  {{ $allTask->title }}
                </td>
                <td class="py-1">
                  {{ $allTask->description }}
                </td>
                <td class="py-1">
                  {{ $allTask->due_date }}
                </td>
                <td>
                  @if($allTask->status == 1)
                    <label class="badge badge-success">Pending</label>
                  @elseif($allTask->status == 2)
                    <label class="badge badge-warning">On Hold</label>
                  @else
                    <label class="badge badge-danger">Completed</label>
                  @endif
                </td>
                <td>
                  @if($allTask->priority == 1)
                    <label class="badge badge-primary">Low</label>
                  @elseif($allTask->priority == 2)
                    <label class="badge badge-warning">Medium</label>
                  @else
                    <label class="badge badge-danger">High</label>
                  @endif
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="5" class="text-center">No Data Found...</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstaro Modal -->
  <div class="modal fade" id="filterModal" tabindex="-1" aria-labelledby="filterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="filterModalLabel">Filter Tasks</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="GET" action="{{ Route( 'tasks.index' )}}">

            <div class="mb-3">
              <label for="statusFilter" class="form-label">Status</label>
              <select class="form-select" id="statusFilter" name="status">
                <option value="">Select Status</option>
                <option value="1">Pending</option>
                <option value="2">On Hold</option>
                <option value="3">Completed</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="priorityFilter" class="form-label">Priority</label>
              <select class="form-select" id="priorityFilter" name="priority">
                <option value="">Select Priority</option>
                <option value="1">Low</option>
                <option value="2">Medium</option>
                <option value="3">High</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="dueDateFilter" class="form-label">Due Date</label>
              <input type="date" class="form-control" id="dueDateFilter" name="due_date">
            </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Apply Filters</button>
          <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Clear Filters</button>
        </div>
      </form>
      </div>
    </div>
  </div>

</x-app-layout>
