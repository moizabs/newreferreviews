<div class="row">
    <div class="col-sm-12">
        <table class="table top-companies table-striped">
            <thead>
                <tr>
                    <th>Customer Name</th>
                    <th>Company Name</th>
                    <th>Company Information</th>
                    <th>Review</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($reviews as $review)
                    <tr>
                        <td>
                            <div class="d-flex"
                                style="align-items: center; ">
                                <img width="45" height="45"
                                    src="{{ asset('images/avatar.png') }}"
                                    class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop"
                                    alt="" loading="lazy">
                                <div>
                                    <span>{{ $review->get_customer->first_name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex"
                                style="align-items: center; ">
                                <img width="45" height="45"
                                    src="{{ asset('images/Montway-Auto-Transport.png') }}"
                                    class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop"
                                    alt="" loading="lazy">
                                <div>
                                    <span>{{ $review->get_business->comp_name }}</span>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <span>{{ $review->get_business->phone }}</span>
                                <span><a
                                        href="">{{ $review->get_business->website }}</a>
                                </span>
                            </div>
                        </td>


                        <td>
                            <div>
                                <div class="rate">

                                    @php

                                        $stars = number_format(isset($review['rating']) ? $review['rating'] : 0);
                                        $status = $review['status'];
                                       
                                    @endphp
                                    {{-- Haseeb --}}
                                    @for ($i = 1; $i <= $stars; $i++)
                                        <i
                                            class="rating__ fas fa-star"></i>
                                    @endfor

                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                        <i
                                            class="rating__ far fa-star"></i>
                                    @endfor

                                </div>
                                <div>
                                    <h5 style="    font-size: 1.05rem;
                                font-weight: 600;
                                color: #3f6ad8;">
                                        {{ $review['title'] }}
                                    </h5>

                                </div>
                                <div>
                                    <p>{{ $review['review'] }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td>{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}
                        </td>
                        <td>
                            @if(\Request::segment(2) == 'reviews_list_active_search')
                            <button type="button"
                                data-toggle="modal"
                                data-target="#exampleModalLong{{$review->id}}"
                                class="btn btn-info my-1 w-100">Edit</button>
                            @endif
                            @if ($status == 0)
                            <a href="{{ route('admin.deactiveReview',$review['id']) }}"
                                class="btn btn-warning my-1 w-100">Publish</a>
                            @else
                            <a href="{{ route('admin.deactiveReview',$review['id']) }}"
                                class="btn btn-success my-1 w-100">Pending</a>
                            @endif

                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
<div class="row">
    <div class="col-sm-12 col-md-7">
        <div class="d-flex">
            {{ $reviews->links() }}
        </div>
    </div>
</div>
