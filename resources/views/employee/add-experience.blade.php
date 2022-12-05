<div class="modal fade" id="modalFormHigh{{$employee->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="padding: 0px;">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Add Experience </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body ">
          <form action="{{ route('employee.addExperience') }}" method="post" role="form">
            {{ csrf_field() }}
            <div class="">
              <div class="card">
                <div class="card-body">
                  <input type="hidden" value="{{$employee->id}}" class="form-control" name="employee_id">
                  <div class="row">
                    <div class="form-group col-md-6">
                      <label>Job Title <span class="colo">*</span></label>
                      <input type="text" class="form-control" required name="job_title">
                    </div>
                    <div class="form-group col-md-6">
                      <label>Company Name <span class="colo">*</span></label>
                      <input type="text" class="form-control" name="company_name" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Job Category <span class="colo">*</span></label>
                    <select name="category_id" class="form-select" aria-label="Default select example" required>
                        <option selected>Job Category</option>
                        @foreach($jobCategories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Experience Type <span class="colo">*</span> </label><br>
                    <div class="row">
                      @foreach($jobTypes as $jobType)
                      <div class="col-md-3">
                        <input type="radio"  class="btn-check" name="job_type_id[]" id="jobType{{$jobType->id}}" autocomplete="off" value="{{$jobType->id}}"> 
                        <label style="font-size: 13px; display: flex; align-items: center; justify-content:center; width: 100%; height: 45; border-radius: 0px;"
                        class="btn btn-secondary " for="jobType{{$jobType->id }}">
                            {{$jobType->name}}
                            <i class="fa fa-check"></i>
                        </label> 
                      </div>
                      @endforeach
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-md-6">
                        <label class="css-1xujd69" for="name">starting from <span class="colo">*</span></label>
                        <select name="start_month" class="form-select">
                          <option slelected>Start Month</option>
                          <option value="Jan">Jan</option>
                          <option value="Feb">Feb</option>
                          <option value="Mar">Mar</option>
                          <option value="Apr">Apr</option>
                          <option value="May">May</option>
                          <option value="Jun">Jun</option>
                          <option value="Jul">Jul</option>
                          <option value="Aug">Aug</option>
                          <option value="Sep">Sep</option>
                          <option value="Oct">Oct</option>
                          <option value="Nov">Nov</option>
                          <option value="Dec">Dec</option>
                        </select>
                        <br>
                        <input type="text" class="yearpicker form-control" name="start_year" placeholder="Start Year">
                      </div>
                      <div class="form-group col-md-6" id="end">
                        <label class="css-1xujd69" for="name">Ending in <span class="colo">*</span></label>
                        <select name="end_month" class="form-select">
                          <option slelected>End Month</option>
                          <option value="Jan">Jan</option>
                          <option value="Feb">Feb</option>
                          <option value="Mar">Mar</option>
                          <option value="Apr">Apr</option>
                          <option value="May">May</option>
                          <option value="Jun">Jun</option>
                          <option value="Jul">Jul</option>
                          <option value="Aug">Aug</option>
                          <option value="Sep">Sep</option>
                          <option value="Oct">Oct</option>
                          <option value="Nov">Nov</option>
                          <option value="Dec">Dec</option>
                        </select>
                        <br>
                        <input type="text" class="yearpicker form-control" name="end_year" placeholder="End Year">
                      </div>
                      <label class="css-1pj5q09 mx-2">
                        <input type="checkbox" id="isCurrent" onclick="ShowHideDiv(this)" class="css-8l35kf">
                        <span class="css-5oy7fs">I currently work there</span>
                      </label>
                  </div>
                </div>
              </div>
              <div class="modal-footer d-block">
                <button type="submit" class="btn btn-warning float-right" id="btnSave">Save</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>