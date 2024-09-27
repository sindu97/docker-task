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
                    <form class="forms-sample" action="{{ Route('tasks.store')}}" method= "POST">
                      @csrf
                      <div class="form-group">
                        <label for="exampleInputName1">Title</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Enter the Title" value="{{ old('title') }}" name="title">
                        @error('title')
                        <div class="text-danger">{{ $message }}</div>
                       @enderror
                      </div>


                      <div class="form-group">
                        <label for="exampleInputTextArea4">Description</label>
                        <textarea class="form-control" id="exampleInputTextArea4" rows="4" placeholder="Description..." name="description" > {{ old('description') }}</textarea>
                        @error('description')
                        <div class="text-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleDate">Due date</label>
                        <input type="date" class="form-control" id="exampleDate" placeholder="Enter the Title" value="{{ old('due_date') }}" name="due_date">
                        @error('due_date')
                        <div class="text-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Status</label>
                        <select class="form-select" id="exampleSelectGender" name="status">
                          @foreach (App\Enum\StatusEnum::cases()  as $item)
                          <option value="{{ $item->value }}" {{ old('status') == $item->value ? 'selected' : '' }}>{{ ucfirst(strtolower($item->name)) }}</option>
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
                          <option value="{{ $item->value }}" {{ old('priority') == $item->value ? 'selected' : '' }}>{{ ucfirst(strtolower($item->name)) }}</option>
                          @endforeach
                        </select>
                        @error('priority')
                        <div class="text-danger">{{ $message }}</div>
                       @enderror
                      </div>
                      <button type="submit" class="btn btn-gradient-primary me-2">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
</x-app-layout>
