
<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Refer Reviews - User Reviews</title>
    @include('layouts.head')
</head>

<body>

   
  
  @include('layouts.navbar')


<div class="container">
    <div class="col-12">
        <div class="main-card mb-3 card my-4">
            <div class="card-body">
                <h5 class="card-title">Reviews History</h5>
                
              
                        <table class="tables w-100 top-companies table-striped">
                            <thead>
                                <tr>
                                    <th>Buisness Name</th>
                                    <!-- <th>Phone Number</th> -->
                                    <th>Review</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                
                               
                            @foreach($user_Reviews as $review)   
                                    
                                <tr>
                                    <td>
                                        <div class="d-flex" style="align-items: center; gap: 10px;">
                                            @if ($review->get_business->image != null)
                                                <img class="rounded-circle" height="50" width="50" src="{{ asset('storage/companyLogo/'.$review->get_business->image) }}" alt="image">
                                            @else
                                           
                                                <img class="rounded-circle" height="50" width="50" alt="hotel_logo-1" src = "{{ asset('images/profile-image.jpg') }}">
                                            @endif
                                            <div><span>{{ $review->get_business->comp_name }}</span></div>
                                        </div>
                                    </td>
                               

                                    <td>
                                        <div>
                                            <div class="rate">

                                                @php
                                                    $stars = number_format($review->rating);
                                                                   
                                                @endphp

                                                @for ($i = 1; $i <= $stars; $i++)
                                                    <i class="rating__ fas fa-star"></i>
                                                @endfor

                                                @for ($j = $stars + 1; $j <= 5; $j++)
                                                    <i class="rating__ far fa-star"></i>
                                                @endfor
                                                <!--<i class="rating__ fas fa-star"></i>-->
                                                <!--<i class="rating__ fas fa-star"></i>-->
                                                <!--<i class="rating__ fas fa-star"></i>-->
                                                <!--<i class="rating__ fas fa-star"></i>-->
                                                <!--<i class="rating__ far fa-star"></i>-->
                                            </div>
                                            <div>
                                                <h5>{{ $review->title }}</h5>
                                                
                                            </div>
                                            <div>
                                                <p>{{ $review->review }}</p>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ \Carbon\Carbon::parse($review->created_at)->diffForHumans() }}</td>
                                    <td>
                                        @if($review->status === 1)
                                            <button type="button" class="btn btn-success my-1">Active</button>
                                        @else
                                            <button type="button" class="btn btn-danger my-1">Deactive</button>
                                        @endif
                                        
                                    </td>
                                </tr>
                            @endforeach
                               
                            
                                

                            </tbody>
                        </table>
              
            </div>
        </div>
        <nav aria-label="Page navigation example">
         {{-- Pagination --}}
        <div class="d-flex justify-content-center">
            {!! $user_Reviews->links() !!}
        </div>
        
    </nav>
    </div>
</div>


@include('layouts.footer')


    @include('layouts.foot');

</body>

</html>