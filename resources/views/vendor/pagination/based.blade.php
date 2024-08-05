@if ($paginator->hasPages())
                    @if ($paginator->onFirstPage())
                    <span class="pagination-page-current">
                        Back
                    </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-page">
                            Back
                        </a>
                    @endif
                    {{-- Previous Page Link --}}
                    @if ($paginator->onFirstPage())
                        <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                            <span class="" aria-hidden="true">
                            </span>
                        </span>
                    @else
                        <a href="{{ $paginator->previousPageUrl() }}" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="{{ __('pagination.previous') }}">
                        </a>
                    @endif

                    {{-- Pagination Elements --}}
                    @php
                    $counter = 0
                    @endphp
                        @if($paginator->currentPage() > 3)
                            <a href="{{ $paginator->url(1) }}" class="pagination-page" aria-label="{{ __('Go to page :page', ['page' => 1]) }}">
                                1
                            </a>
                            <div id="div-cp" class="div-cp margin-custompage h100 flex align-base" name="page-custom-div">
                                <a id="a-custompage" onclick="custompage(this)" class="pagination-custompage pagination-page-custom a-cp">...</a>
                                <input onkeypress='validate(event),sendPage(this, event)' style="display: none" type="text" id="custompage" class="page-custom-input">
                            </div>
                        @endif
                    @foreach ($elements as $element)
                       
                        
                        {{-- Array Of Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                

                                @if ($page == $paginator->currentPage())
                                
                                    <span aria-current="page">
                                        <span class="pagination-page-current">{{ $page }}</span>
                                    </span>
                                @elseif(abs($page - $paginator->currentPage()) < 3)
                                    <a href="{{ $url }}" class="pagination-page" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                        {{ $page }}
                                    </a>
                                @endif
                            @endforeach
                        @endif
                        
                    @endforeach
                    @if($paginator->lastPage() - $paginator->currentPage() > 2)
                            
                           
                            <div id="div-cp1" class="div-cp margin-custompage h100 flex align-base" name="page-custom-div">
                                <a id="a-custompage-1" onclick="custompage1(this)" class="pagination-custompage pagination-page-custom a-cp">...</a>
                                <input onkeypress='validate(event),sendPage(this, event)' style="display: none" type="text" id="custompage-1" class="page-custom-input">
                            </div>
                            <a href="{{ $paginator->url($paginator->lastPage()) }}" class="pagination-page" aria-label="{{ __('Go to page :page', ['page' => $paginator->lastPage()]) }}">
                                {{$paginator->lastPage()}}
                            </a>
                        @endif

                    {{-- Next Page Link --}}
                    @if ($paginator->hasMorePages())
                        <a href="{{ $paginator->nextPageUrl() }}" rel="next" class="pagination-page" aria-label="{{ __('pagination.next') }}">
                            Next
                        </a>
                    @else
                        <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                            <span class="pagination-page-current" aria-hidden="true">
                                Next
                            </span>
                        </span>
                    @endif
        </div>
@endif