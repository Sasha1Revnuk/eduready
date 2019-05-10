
<nav class="blog-pagination justify-content-center d-flex">
    @if ($courses->hasPages())
        <ul class="pagination">
            <li class="page-item {{$courses->onFirstPage() ? 'disabled' : ''}}">
                <a href="{{$courses->previousPageUrl()}}" class="page-link" aria-label="Previous">
          <span aria-hidden="true">
              <i class="ti-angle-left"></i>
          </span>
                </a>
            </li>
            @for($i = 1; $i <= $courses->lastPage(); $i++)
            <li class="page-item {{$courses->currentPage() == $i ? 'active' : ''}}"><a href="{{'/category/' . $category->url . '?page=' . $i}}" class="page-link">{{$i}}</a></li>
            @endfor
            <li class="page-item {{$courses->hasMorePages() == false ? 'disabled' : ''}}">
                <a href="{{$courses->nextPageUrl()}}" class="page-link " aria-label="Next">
          <span aria-hidden="true">
              <i class="ti-angle-right"></i>
          </span>
                </a>
            </li>
        </ul>
    @endif
</nav>