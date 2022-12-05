<!-- Modal -->
<div class="modal fade p-5" id="apply{{ $job->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content p-5">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Apply for job</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('jobApply')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()  }}
            <div class="modal-body py-3">
                <input type="hidden" name="job_id" value="{{ $job->id }}">
                <h4>Are you sure you want to apply to {{$job->title}}?</h4>
            </div>
            <div class="modal-footer d-flex justify-content-lg-between">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Apply for Job</button>
            </div>
            </form>
        </div>
    </div>
</div>