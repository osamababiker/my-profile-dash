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
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Add new testimonial</h5> 
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
            <!-- General Form Elements -->
            <form action="{{ route('testimonials.store') }}" enctype="multipart/form-data" method="post">
                @csrf
            <div class="row mb-3">
                <label for="client_name" class="col-form-label">Client name</label>
                <div class="col-sm-12">
                <input id="client_name" name="client_name" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="client_position" class="col-form-label">Client position</label>
                <div class="col-sm-12">
                <input id="client_position" name="client_position" type="text" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <label for="client_image" class="col-form-label">Client image</label>
                <div class="col-sm-12">
                    <input id="client_image" class="form-control" name="client_image" type="file">
                </div>
            </div>
            <div class="row mb-3">
                <label for="client_review" class="col-form-label">Client review</label>
                <div class="col-sm-12">
                <textarea id="client_review" name="client_review" class="form-control" style="height: 100px"></textarea>
                </div>
            </div>

            <div class="row mb-3 mt-3">
                <div class="col-sm-12">
                <button type="submit" id="submitTestimonial" class="btn btn-primary">Submit Testimonial</button>
                </div>
            </div>

            </form><!-- End General Form Elements -->

        </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('admin/components/footer')