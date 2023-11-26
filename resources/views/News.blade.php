<div class="card">
  
    <h5 class="card-header">News</h5>
    <div class="card-body">
      <div class="table-responsive text-nowrap">
        <table class="table table-bordered">
          <thead>
            <tr>
              <th>title</th>
              <th>content</th>
              <th>author</th>
              <th>published</th>
            </tr>
          </thead>
          @foreach ($news as $data)

          <tbody>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->newsTitle}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->content}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->author}}</strong>
            </td>
            <td>
              <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$data->published}}</strong>
            </td>
            <td>
              <div class="dropdown">
                <button
                  type="button"
                  class="btn p-0 dropdown-toggle hide-arrow"
                  data-bs-toggle="dropdown"
                >
                  <i class="bx bx-dots-vertical-rounded"></i>
                </button>
                <div class="dropdown-menu">
                    <form action="{{updateNews}}" method="POST">
                        <button type="submit"><a class="dropdown-item" href="/updateNews/{{$data->id}}"
                            ><i class="bx bx-edit-alt me-1"></i> Edit</a></button>
                          >
                    </form>
                  <a class="dropdown-item" href="/deleteNews/{{$data->id}}"
                    ><i class="bx bx-trash me-1"></i> Delete</a
                  >
                </div>
              </div>
            </td>
      </tbody>
      @endforeach

        </table>
      </div>
    </div>
  </div>