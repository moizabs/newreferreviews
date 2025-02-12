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
   <div class="row">
        <div class="container pt-5">
            <div class="card">
                <div class="card-header">
                   <h5>All Notifications</h5>
                </div>
                    <div class="card-body">
                       
                @foreach($noti as $item )
                        <span class="dropdown-item viewNoti" href="#" style="white-space: normal !important; ">
                            <input type="hidden" value="37" class="notiId">
                            <span>From : {{$item->reqPrice->get_customer->first_name}} {{$item->reqPrice->get_customer->last_name}} 
                            </span>
                            <br>
                            <span>Message : {{ $item->reqPrice->message }} </span>
                            <br>
                            <span style="opacity:0.7;">{{ Carbon\Carbon::parse($item->created_at)->format('m/d/Y') }}</span>
                        </span>
                @endforeach
                    </div>
            </div>
        </div>
    </div>
    
    
    
@include('layouts.footer')



    <!-- Link to page
================================================== -->
    @include('layouts.foot')
    


</body>

</html>