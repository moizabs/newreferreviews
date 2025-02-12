<!DOCTYPE html>
<html lang="en">

<head>
    
    <title>Refer Reviews - Companies</title>
    @include('layouts.head')
   
    <style>
.header-menu{
    background-color: #fff;
    border-bottom: 1px solid #e3e4e4;
    padding:20px 0
}
.breadcrumb{
    padding-top: 10px;
}
.pcategories{
    display: flex;
    flex-wrap: wrap;
    gap: 10px;
    margin-bottom: 10px;
}
.pcategories a{
    height: 48px;
    padding: 0 32px;
    color: #205cd4;
    background-color: transparent;
    border:1px solid #205cd4;
    display: flex;
    text-align: center;
    cursor: pointer;
    -webkit-user-select: none;
    -ms-user-select: none;
    /* user-select: none; */
    white-space: nowrap;
    align-items: center;
    font-weight: 700;
    border-radius: 20px;
}
.popularcategories h6{
    font-weight: 700;
    margin: 10px 0;
}
.review-details {
    display: flex;
    justify-content: space-between;
    width: 100%;
    gap: 30px;
}
.categories_list{
    margin:30px 0;
    display: flex;
    gap: 20px;
    flex-direction: column;
}
.ratingSeparator{
    color: #dcdce6;
}
.card:hover{
    box-shadow: 0 0 8px 0 #0000004d;
    cursor:pointer
}
.main-content{
    background:#d3ebf8
}

a.showMore {
	 display: block;
	 font-size: 12px;
	 font-weight: 700;
	 text-transform: uppercase;
	 margin-top: 20px;
	 color: #0077c8;
	 text-decoration: none;
}
 a.showMore::after {
	 content: '+ VIEW MORE';
}
 a.showMore.showLess::after {
	 content: '- VIEW LESS';
}
.rating-cat input{
    height: 20px;
 margin: 0.2em 8px 0 1px;
 width: 20px;
}
.rating-cat span{
   
    font-weight: 400;
    line-height: 20px;
}
    </style>
</head>

<body>
    @include('layouts.navbar')
    <div class="main-content">
        <div class="header-menu">
            <div class="container">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">{{ isset($categories->name) ? $categories->name : '' }}</li>
                        
                    </ol>
                </nav>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-12 flex_ d-flex">
                    <div class="col-lg-8 col-sm-12">
                        <div class="" > 
                        
                            <div class="categories_list">
                                <h6>Best Companies in this Category</h6>
                                           
                                @foreach($cate_comp as $comp )
                                    <div class="card">
                                    <div class="card-body flex_ gap-30" style="align-items:center">
                                        <div class="companies-logo">
                                            @if(isset($comp->comp_info->image))
                                                <img src="{{ asset('storage/companyLogo/'.$comp->comp_info->image)}}" alt="image">
                                            @else
                                                <img src="{{ asset('images/profile-image.jpg') }}" alt="">
                                            @endif
                                        </div>
                                        <div>
                                            <div class="card-text"><a href="{{ route('company.show', $comp->comp_info->id) }}">{{ isset($comp->comp_info->comp_name) ? $comp->comp_info->comp_name : '' }}</a></div>
                                            <div class="review-details">
                                                <div class="rate float-left">
                                                   
                                                    @php
                                                        
                                                        $stars = number_format(isset($comp->comp_info->avg[0]->totalRating) ? $comp->comp_info->avg[0]->totalRating : 0);
                                                        
                                                    @endphp
                                                    {{-- Haseeb --}}
                                                    @for ($i = 1; $i <= $stars; $i++)
                                                        <i class="rating__ fas fa-star"></i>
                                                    @endfor
        
                                                    @for ($j = $stars + 1; $j <= 5; $j++)
                                                        <i class="rating__ far fa-star"></i>
                                                    @endfor
                                                    <!--<i class="rating__ fas fa-star"></i>-->
                                                    <!--<i class="rating__ fas fa-star"></i>-->
                                                    <!--<i class="rating__ fas fa-star"></i>-->
                                                    <!--<i class="rating__ fas fa-star"></i>        -->
                                                    <!--<i class="rating__ fas fa-star"></i>        -->
                                                </div>
                                                <div>
                                                <h6>Rating:{{ $stars }}</h6>
                                                </div>
                                                <span class="ratingSeparator">|</span>
                                                    
                                                <div>
                                                <h6>{{ isset($comp->comp_info->count_review[0]->totalReview) ? $comp->comp_info->count_review[0]->totalReview : 0 }} Reviews</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            <nav aria-label="Page navigation example">
                                {{ $cate_comp->links() }}
                                <!--<div class="d-flex justify-content-center">-->
                                <!--    <nav>-->
                                <!--        <ul class="pagination">-->
                                <!--            <li class="page-item disabled" aria-disabled="true" aria-label="« Previous">-->
                                <!--            <span class="page-link" aria-hidden="true">‹</span>-->
                                <!--            </li>-->
                                <!--            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>-->
                                <!--            <li class="page-item"><a class="page-link" href="">2</a></li>-->
                                <!--            <li class="page-item"><a class="page-link" href="">3</a></li>-->
                                <!--            <li class="page-item">-->
                                <!--            <a class="page-link" href="" rel="next" aria-label="Next »">›</a>-->
                                <!--            </li>-->
                                <!--        </ul>-->
                                <!--    </nav>-->
                                <!--</div>-->
                            </nav>
                        </div>
                    </div>
                    
                    <div class="col-lg-4 col-sm-12" style="margin-top: 22px;">
                    
                        <div class="card my-5" id="sticker">
                    
                        <div class="card-body">
                            <div class="styles_categoryBusinessAsideItem__3js9v">
                            <div class="styles_categoriesSideMenu__2kXgh">
                                <div class="styles_sideMenuHeader__12nJl">
                                    <h2 class="">Categories</h2>
                                </div>
                                <div class="styles_listHolder__RtSGZ">
                                    <div class="">
                                        <span>{{ isset($categories->name) ? $categories->name : '' }}</span>
                                    <ul class="" id="subcat-list">
                                        @foreach($categories->sub_category as $sub_cate)
                                            <li class="">
                                            <span class="" weight="heavy">{{ isset($sub_cate->name) ? $sub_cate->name : ''}}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts.footer') 
    @include('layouts.foot')

    <script>
    jQuery(document).ready(function(){
    
    var $this = $('#subcat-list');
    if ($this.find('li').length > 5 ) {
    $('#subcat-list').append('<div><a href="javascript:;" class="showMore"></a></div>');
    }
    
    // If more than 2 Education items, hide the remaining
    $('#subcat-list li').slice(0,5).addClass('shown');
    $('#subcat-list li').not('.shown').hide();
    $('#subcat-list .showMore').on('click',function(){
    $('#subcat-list li').not('.shown').toggle(300);
    $(this).toggleClass('showLess');
    
    });
    
    });
    
    </script>

</body>
</html>