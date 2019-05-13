<div class="col-lg-12">
    <div class="row" style="  display: flex; justify-content: center">
        <nav class="blog-pagination justify-content-center d-flex">
            @if ($searchPages->hasPages())
                <ul class="pagination">
                    <li class="page-item {{$searchPages->onFirstPage() ? 'disabled' : ''}}">
                        <a href="{{$searchPages->previousPageUrl()}}" class="page-link" aria-label="Previous">
          <span aria-hidden="true">
              <i class="ti-angle-left"></i>
          </span>
                        </a>
                    </li>
                    @for($i = 1; $i <= $searchPages->lastPage(); $i++)
                        <li class="page-item {{$searchPages->currentPage() == $i ? 'active' : ''}}"><a href="{{'/category/' . $category->url . '?page=' . $i}}" class="page-link">{{$i}}</a></li>
                    @endfor
                    <li class="page-item {{$searchPages->hasMorePages() == false ? 'disabled' : ''}}">
                        <a href="{{$searchPages->nextPageUrl()}}" class="page-link " aria-label="Next">
          <span aria-hidden="true">
              <i class="ti-angle-right"></i>
          </span>
                        </a>
                    </li>
                </ul>
            @endif
        </nav></div></div>