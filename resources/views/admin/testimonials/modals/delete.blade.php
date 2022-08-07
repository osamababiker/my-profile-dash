<!-- Message Modal -->
<div class="modal fade" id="delete_{{ $testimonial->id }}" tabindex="-1">
<div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title">Delete {{ $testimonial->enTitle }}</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
       Are you sure you want to delete this testimonial
       <form id="delete_form_{{ $testimonial->id }}" action="{{ route('testimonials.destroy') }}" method="testimonial">
        @csrf 
        <input type="hidden" name="testimonialId" value="{{ $testimonial->id }}">
       </form>
    </div>
    <div class="modal-footer">
        <button type="submit" form="delete_form_{{ $testimonial->id }}" class="btn btn-success">Yes Sure</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
    </div>
    </div>
</div>
</div><!-- End Message Modal-->