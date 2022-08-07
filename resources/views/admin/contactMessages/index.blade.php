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
              <h5 class="card-title">Contact Messages DataTable</h5>

              @if(session()->has('feedback'))
                  <div class="alert alert-success alert-dismissible" id="successAlert" role="alert">
                      <div class="alert-message">
                          <strong> {{session()->get('feedback')}}
                      </div>
                  </div>
              @endif

              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">subject</th>
                    <th scope="col">message</th>
                    <th scope="col">Created Date</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($messages as $message)
                  <tr>
                    <th scope="row">{{ $message->id }}</th>
                    <td>{{ $message->name }}</td>
                    <td>{{ $message->email }}</td>
                    <td>{{ $message->subject }}</td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#message_{{ $message->id }}" >
                        <i class="bi bi-three-dots"></i>
                      </a>
                    </td>
                    <td>{{ $message->created_at->diffForHumans() }}</td>
                    <td>
                      <a type="button" class="btn" data-bs-toggle="modal" data-bs-target="#delete_{{ $message->id }}" >
                        <i class="bi bi-trash-fill"></i>
                      </a>
                    </td>
                  </tr>
                  <!-- Message Modal -->
                  <div class="modal fade" id="message_{{ $message->id }}" tabindex="-1">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">message body</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          {{ $message->message }}
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                  </div><!-- End Message Modal-->
                  @include('admin/contactMessages/modals/delete')
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