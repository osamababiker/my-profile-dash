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
              <h5 class="card-title">Posts DataTable</h5>

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
                    <th scope="col">Title</th>
                    <th scope="col">Category</th>
                    <th scope="col">Summery</th>
                    <th scope="col">Created Date</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($posts as $post)
                  <tr>
                    <th scope="row">{{ $post->id }}</th>
                    <td>{{ $post->enTitle }}</td>
                    <td>{{ $post->category->enName }}</td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_{{ $post->id }}" >
                        <i class="bi bi-trash-fill"></i>
                      </a>
                      <a href="{{ route('posts.edit', ['post' => $post->id]) }}" class="btn" target="_blank">
                        <i class="bi bi-pencil-square"></i>
                      </a>
                    </td>
                    <td>{{ $post->created_at->diffForHumans() }}</td>
                  </tr>
                  @include('admin/posts/modals/delete')
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