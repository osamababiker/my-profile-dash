@include('admin/components/head')

<body>

  <!-- ======= Header ======= -->
  @include('admin/components/nav')
  <!-- End Header -->

  <!-- ======= Sidebar ======= --> 
  @include('admin/components/sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <section class="section">
      <div class="row">
        <div class="col-lg-12">
 
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Testimonials DataTable</h5>

              @if(session()->has('feedback'))
                  <div class="alert alert-success alert-dismissible" id="successAlert" role="alert">
                      <div class="alert-message">
                          <strong> {{session()->get('feedback')}}
                      </div>
                  </div>
              @endif
              @if($errors->any())
                  {!! implode('', $errors->all('<div class="alert alert-warning">:message</div>')) !!}
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">client name</th>
                    <th scope="col">client position</th>
                    <th scope="col">client image</th>
                    <th scope="col">client review</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($testimonials as $testimonial)
                  <tr>
                    <th scope="row">{{ $testimonial->id }}</th>
                    <td>{{ $testimonial->client_name }}</td>
                    <td>{{ $testimonial->client_position }}</td>
                    <td>
                      <a target="_blank" href="{{ asset('upload/testimonials/'. $testimonial->client_image) }}">
                        <img src="{{ asset('upload/testimonials/'. $testimonial->client_image) }}" width="50" height="50" alt="">
                      </a>
                    </td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#review_{{ $testimonial->id }}" >
                        <i class="bi bi-three-dots"></i>
                      </a>
                    </td>
                    <td>{{ $testimonial->created_at->diffForHumans() }}</td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_{{ $testimonial->id }}" >
                        <i class="bi bi-trash-fill"></i>
                      </a>
                      <a href="{{ route('testimonials.edit', ['testimonial' => $testimonial->id]) }}" class="btn" target="_blank">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Message Modal -->
                  <div class="modal fade" id="review_{{ $testimonial->id }}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">client review</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          {{ $testimonial->client_review }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Message Modal-->
                  @include('admin/testimonials/modals/delete')
                  @endforeach
                </tbody>
              </table>

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin/components/footer')