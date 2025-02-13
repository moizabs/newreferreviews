<!DOCTYPE html>
<html lang="en">

<head>
    <title>Refer Reviews - Companies</title>
    @include('layouts.head')
    <style>
        .card-head{
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="company-profile-banner">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h5 class="all-comp-head" style="text-align: center;font-size: 80px;color: #fff;text-transform: uppercase;font-weight: 800;">All Companies</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="search-contain">
        <div class="container">
            <div class="row">
                <div class="col-12 flex_">
                    <div class="col-sm-12 col-md-12 col-lg-6 breadcrumbs">
                        <span typeof="v:Breadcrumb">
                            <a href="{{ route('home') }}">Home</a>
                        </span>
                         
                    </div>
                    <div class="col-sm-12 col-md-12 col-lg-6 search-form">
                        <form id="searchform" action="{{ route('all.companies') }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <input class="inlineSearch" type="text" value="" name="search"
                                    placeholder="Filter By Keyword">
                                <button class="inlineSubmit" type="submit"><i class="fa fa-search"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4 mx-auto">
        <div class="row">
            <div class="grid grid_3 my-5 w-100">
            @foreach ($companies as $company)
                <div class="card company-prof-card my-4">
                    <a href="{{ route('company.show', $company->id) }}">
                        <div class="card-body">
                            <div class="align-start">
                                <div class="card-head">
                                    @if ($company->image != null)
                                    <img class="card-img-top" style="width:65px;  object-fit:cover;" src="{{ asset('storage/companyLogo/' .$company->image ) }}" alt="image">
                                    @else
                                    <img class="card-img-top" style=" width: 65px;  object-fit: cover;" src="{{ asset('images/profile-image.jpg') }}"alt="image" />
                                    @endif
                                    <div class="star-rate d-flex flex-column">
                                    <div class="rate">
                                        @php
                                            $stars = number_format(isset($company->avg[0]->totalRating) ? $company->avg[0]->totalRating : 0);
                                        @endphp
                                        {{-- Haseeb --}}
                                        @for ($i = 1; $i <= $stars; $i++)
                                            <i class="rating__ fas fa-star"></i>
                                        @endfor
                                        @for ($j = $stars + 1; $j <= 5; $j++)
                                            <i class="rating__ far fa-star"></i>
                                        @endfor
                                    </div>
                                    <span class="text-center">Rating {{  $stars }}/5.0</span>
                                </div>
                                </div>
                                <div class="my-2">
                                    <a href="{{ route('company.show',$company->id)}}">{{ $company->comp_name }}</a>
                                </div>
                                <div class="my-2">
                                    <p class="text-start">{{ \Illuminate\Support\Str::words($company->message,25) }}</p>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            </div>
        </div>
    </div>
    
    {{-- Pagination --}}
    <nav aria-label="Page navigation example">
        <div class="d-flex justify-content-center">
            {!! $companies->links() !!}
        </div>
    </nav>
    @include('layouts.footer')

    <!-- Link to page
================================================== -->
    @include('layouts.foot')

</body>

</html>
