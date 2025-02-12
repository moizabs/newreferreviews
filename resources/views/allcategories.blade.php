<html lang="en">

    <head>
        <title>Refer Reviews - Categories</title>
        @include('layouts.head')
        
    <style>
        .card-head{
            padding: 10px 0;
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 1px solid #ddd;
        }
        .card{
    box-shadow: 0 4px 10px rgba(0,0,0,0.16), 0 4px 10px rgba(0,0,0,0.23);
    }
    .card:hover {
    box-shadow: 0 4px 10px rgba(0,0,0,0.16), 0 4px 10px rgba(0,0,0,0.23);
    }
    .grid.grid_3 {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 2.6rem;
    }
    .grid.grid_2 {
    display: grid;
    grid-template-columns: repeat(2,1fr);
    gap: 0.6rem;
    }
    .sub_cat{
    border-radius: 5px;
    border: 1px solid;
    padding: 5px 10px;
    background: #E7E9EB;
    color: #757677;
    font-weight: 600;
    font-size: 12px;
    
    }
    .card-header h3{
    left: 50%;
    position: absolute;
    /* top: 50%; */
    /* left: 50%; */
    margin: auto;
    /* top: 40%; */
    font-size: 3.2rem;
    /* line-height: 3; */
    align-items: center;
    /* top: 50%; */
    text-transform: capitalize;
    /* margin-left: auto; */
    /* margin-right: auto; */
    /* left: 50%; */
    /* right: 50%; */
    width: fit-content;
    /* top: 50%; */
    /* left: 50%; */
    transform: translateX(-50%) translateY(-50%);
    top: 40%;
    }
    .card-img-top{
    opacity: 0.5;
    width: 100%;
    height: 200px;
    object-fit: cover;
    }
    .card-header{
    padding:0%
    }
    .searching-cont{
    padding: 120px 16px;
    align-items: center;
    width: 100%;
    }
    .sub_cat:first-child {
    background: #184f9c;
    color: #fff;
    }
    
    
    /*new services*/
    
    .custom-shape-divider-bottom-1635508836 {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    overflow: hidden;
    line-height: 0;
    transform: scaleX(-1);
    }
    
    .custom-shape-divider-bottom-1635508836 svg {
    position: relative;
    display: block;
    width: calc(183% + 1.3px);
    height: 80px;
    transform: rotateY(180deg);
    }
    
    .custom-shape-divider-bottom-1635508836 .shape-fill {
    fill: #FFFFFF;
    }
    
    .card-overlay{
    opacity:0;
    transition:0.5s ease-in-out;
    }
    
    .card:hover .card-overlay{
    opacity:0.8;
    }
    
    h1,h2{
    font-family: 'Playfair Display', serif;
    }
    h1{
    font-weight:700;
    }
    h2{
    font-weight:400;
    }
    </style>
    <style>
    
    .animation {
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    }
    
    .card {
    
    -webkit-transition: 0.6s;
    transition: 0.6s;
    text-align: center;
    -webkit-transition: -webkit-transform 0.4s;
    -moz-transition: -moz-transform 0.4s;
    -o-transition: -o-transform 0.4s;
    transition: transform 0.4s;
    -webkit-transform-style: preserve-3d;
    -moz-transform-style: preserve-3d;
    -o-transform-style: preserve-3d;
    transform-style: preserve-3d;
    width: 100%;
    height: 260px;
    padding: 0;
    margin: 0.8%;
    margin-bottom: 18px;
    }
    .card .front,
    .card .backs {
    display: block;
    height: 100%;
    width: 100%;
    line-height: 260px;
    color: white;
    text-align: center;
    font-size: 4em;
    position: absolute;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
    
    box-shadow: 3px 5px 20px 2px rgba(0, 0, 0, 0.25);
    }
    .card .back,
    .card .front {
    padding:10px;
    width:100%;
    color: white;
    font-size: 4em;
    position: absolute;
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -o-backface-visibility: hidden;
    backface-visibility: hidden;
    
    }
    
    
    .card .back {
    -webkit-transform: rotateY(180deg);
    transform: rotateY(180deg);
    color: #fff;
    background: #d2e9f8;
    }
    .card.flipped {
    -webkit-transform: rotateY( 180deg );
    -moz-transform: rotateY( 180deg );
    -o-transform: rotateY( 180deg );
    transform: rotateY( 180deg );
    }
    .grid.grid_3 {
    display: grid;
    grid-template-columns: repeat(3,1fr);
    gap: 1rem;
    }
    .sub_cat{
    cursor:pointer;
    }
    
    </style>
    </head>
    
    <body>
        @include('layouts.navbar')
        <div class="container">
            <div class="p-3">
            <h1 style="color:#184f9c" class="capitalize text-3xl md:text-4xl lg:text-6xl text-center mb-10 lg:mb-10 text-indigo-600">Categories</h1>
            
        </div>
                    <div class="wrapper-card">
                    <div class="grid grid_3">
                        @if($categories)
                            @foreach($categories as $category)
                                <a href = '/company_search_by_cate_id/{{ $category->id }}'>
                                    <div class="max-w-sm shadow-xl card-click   card rounded-md ">
                                <input type=hidden name='cate_id' class='cate_id' value='{{$category->id}}'>  
                                <div class="front">
                                    <div class="">
                                    @if($category->image)
                                        <img style="height: 100%;  object-fit: cover;"  class="max-w-full w-100" src="{{ asset('storage/categoryImage/'.$category->image) }}" alt="Card image cap">
                                    @else
                                        <img style="height: 100%;  object-fit: cover;"  class="max-w-full w-100" src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(31).webp" alt="Card image cap">
                                    @endif
                                        <div class="custom-shape-divider-bottom-1635508836">
                                            <svg data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1200 120" preserveAspectRatio="none">
                                                <path d="M985.66,92.83C906.67,72,823.78,31,743.84,14.19c-82.26-17.34-168.06-16.33-250.45.39-57.84,11.73-114,31.07-172,41.86A600.21,600.21,0,0,1,0,27.35V120H1200V95.8C1132.19,118.92,1055.71,111.31,985.66,92.83Z" class="shape-fill"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    
                                  <div style="top:210px" class="absolute ">
                                    
                                    <h2 style="color:#184f9c" class="text-xl text-pink-400">{{ $category->name }}</h2>
                                  </div>
                                   <div class="absolute top-0 right-0 bg-pink-400 cursor-pointe z-50 w-full h-full flex justify-center items-center card-overlay">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-white cursor-pointer flip-button" viewBox="0 0 20 20" fill="currentColor">
                                    <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                  </svg>
                                      </div>
                                  </div>
                            
                         </div>
                                </a>
                            @endforeach
                        @endif
                    </div>
                    
                  
                  </div>
                  </div>
      
        
        
        
        @include('layouts.footer')
    
    
    
        <!-- Link to page
    ================================================== -->
    
        @include('layouts.foot')
        
    
        <script>
        $('.sub_cat').click(function(){
            var t = $(this).text();
            
        })
        
        
    </script>
    
    </body>

</html>