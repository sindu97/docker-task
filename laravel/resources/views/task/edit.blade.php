<x-app-layout>

    <div class="content-wrapper">
      <div class="page-header">
        <h3 class="page-title">
          <span class="page-title-icon bg-gradient-primary text-white me-2">
            <i class="mdi mdi-home"></i>
          </span> Task Management
        </h3>
      </div>

    {{-- Add form  --}}
    <div class="col-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">Basic form elements</h4>
            <p class="card-description"> Basic form elements </p>
            <form class="forms-sample" action="{{ route('tasks.update', $task->id) }}" method= "POST">
              @csrf
              @method('PUT')
              <div class="form-group">
                <label for="exampleInputName1">Title</label>
                <input type="text" class="form-control" id="exampleInputName1" placeholder="title" name="title"  value="{{ old('description', $task->title) }}" required>
                @error('title')
                <div class="text-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleInputTextArea4">Description</label>
                <textarea class="form-control" id="exampleInputTextArea4" rows="4" placeholder="Description" name="description" >{{ old('description', $task->description) }}</textarea>
                @error('description')
                <div class="text-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleDate">Due date</label>
                <input type="date" class="form-control" id="exampleDate" placeholder="Enter the Title" value="{{ \Carbon\Carbon::parse($task->due_date)->format('Y-m-d') ?? '' }}" name="due_date">
                @error('due_date')
                <div class="text-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Status</label>
                <select class="form-select" id="exampleSelectGender" name="status">
                  @foreach (App\Enum\StatusEnum::cases()  as $item)
                  <option value="{{ $item->value }}" @if($task->status == $item->value) selected @endif>{{ ucfirst(strtolower($item->name)) }}</option>
                  @endforeach
                </select>
                @error('status')
                <div class="text-danger">{{ $message }}</div>
               @enderror
              </div>
              <div class="form-group">
                <label for="exampleSelectGender">Priority</label>
                <select class="form-select" id="exampleSelectGender" name="priority">
                  @foreach (App\Enum\PriorityEnum::cases()  as $item)
                  <option value="{{ $item->value }}" @if($task->priority == $item->value) selected @endif>{{ ucfirst(strtolower($item->name)) }}</option>
                  @endforeach
                </select>
                @error('priority')
                <div class="text-danger">{{ $message }}</div>
               @enderror
              </div>
              <button type="submit" class="btn btn-gradient-primary me-2">Update</button>
            </form>
          </div>
        </div>
      </div>
    </div>
</x-app-layout>
