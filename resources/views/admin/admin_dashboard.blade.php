
<!doctype html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title> Refer Reviews - Admin</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset("css/main.css") }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">

        <!-- <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet"> -->

    </head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        
            @include('admin.partials.navbar')
        <div class="app-main">
           
            @include('admin.partials.sidebar')
            <div class="app-main__outer">
                <div class="container">
                    <div class="row my-4">
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-night-fade">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Reviews</div>
                                        <div class="widget-subheading">Last year expenses</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $totalReviews }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">New Reviews</div>
                                        <div class="widget-subheading">Last Month Record</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $latestReviews }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-happy-green">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Users</div>
                                        <div class="widget-subheading">People Interested</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $totalCustomer }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-arielle-smile">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">New Users</div>
                                        <div class="widget-subheading">People Interested</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $latestCustomer }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-premium-dark">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">Total Business</div>
                                        <div class="widget-subheading">Business Interested</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-warning"><span>{{ $totalBusiness }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-4">
                            <div class="card mb-3 widget-content bg-night-fade">
                                <div class="widget-content-wrapper text-white">
                                    <div class="widget-content-left">
                                        <div class="widget-heading">New Business</div>
                                        <div class="widget-subheading">Business Interested</div>
                                    </div>
                                    <div class="widget-content-right">
                                        <div class="widget-numbers text-white"><span>{{ $latestBusiness }}</span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row my-4">
                       
                        <!--<div class="col-md-6 col-xl-4">-->
                        <!--    <div class="card mb-3 widget-content bg-happy-green">-->
                        <!--        <div class="widget-content-wrapper text-white">-->
                        <!--            <div class="widget-content-left">-->
                        <!--                <div class="widget-heading">Active User</div>-->
                        <!--                <div class="widget-subheading">People Interested</div>-->
                        <!--            </div>-->
                        <!--            <div class="widget-content-right">-->
                        <!--                <div class="widget-numbers text-white"><span>356</span></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--<div class="d-xl-none d-lg-block col-md-6 col-xl-4">-->
                        <!--    <div class="card mb-3 widget-content bg-premium-dark">-->
                        <!--        <div class="widget-content-wrapper text-white">-->
                        <!--            <div class="widget-content-left">-->
                        <!--                <div class="widget-heading">Products Sold</div>-->
                        <!--                <div class="widget-subheading">Revenue streams</div>-->
                        <!--            </div>-->
                        <!--            <div class="widget-content-right">-->
                        <!--                <div class="widget-numbers text-warning"><span>$14M</span></div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <h5 style="font-size: 2.1rem; font-weight: 700;">Recent Users</h5>
                        </div>
                        <div class="col-12">
                        <div class="main-card mb-3 card">
                            <div class="card-body">
                                <div id="example_wrapper" class="dataTables_wrapper dt-bootstrap4">
                                    <div class="row">
                                        {{-- <div class="col-sm-12 col-md-6">
                                            <div class="dataTables_length" id="example_length"><label>Show <select
                                                        name="example_length" aria-controls="example"
                                                        class="custom-select custom-select-sm form-control form-control-sm">
                                                        <option value="10">10</option>
                                                        <option value="25">25</option>
                                                        <option value="50">50</option>
                                                        <option value="100">100</option>
                                                    </select> entries</label></div>
                                        </div> --}}
                                        {{-- <div class="col-sm-12 col-md-6">
                                            <div id="example_filter" class="dataTables_filter float-right">
                                                <label>Search:<input name="search" type="search" class="form-control form-control-sm"
                                                        placeholder="" aria-controls="example"></label></div>
                                        </div> --}}
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <table class="table top-companies table-striped">

                                                <tbody>

                                                @foreach ($recentUsers as $user)


                                                  <tr>
                                                    <td>
                                                        <div class="d-flex" style="align-items: center; gap:20px">
                                                        <img width="45" height="45" 
                                                            src="{{ isset($user->image) ? asset('storage/userProfile/'.$user->image): asset('images/profile-image.jpg') }}" 
                                                            class="attachment-gazek_size_170x170_crop size-gazek_size_170x170_crop" 
                                                            alt="" loading="lazy">
                                                        
                                                        <div>{{ $user->first_name }}</div>
                                                    </div>
                                                    </td>
                                                    {{-- <td>
                                                      <div class="rate">

                                                      <i class="rating__ fas fa-star"></i>
                                                      <i class="rating__ fas fa-star"></i>
                                                      <i class="rating__ fas fa-star"></i>
                                                      <i class="rating__ fas fa-star"></i>
                                                      <i class="rating__ far fa-star"></i>
                                                   </div> --}}
                                                  </td>
                                                    <td> {{$user->phone  }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td> <a class="btn-broker1" href="{{ route('admin.customerViewProfile',$user->id) }}">View Profile</a></td>
                                                  </tr>

                                                  @endforeach
                                                  
                                                </tbody>
                                              </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                     

                                </div>
                            </div>
                        </div>
                    </div>
                    </div>


                              
                              </div> 
                    <!--<div class="row">-->
                    <!--    <div class="col-12 ml-2">-->
                    <!--        <h5 style="font-size: 2.1rem; font-weight: 700;">Visitors</h5>-->
                    <!--    </div>-->
                    <!--    <div class="col-sm-12 col-md-6 my-4">-->

                    <!--        <canvas id="doughnutChart"></canvas>-->
                    <!--    </div>-->
                    <!--    <div class="col-sm-12 col-md-6 my-4">-->

                    <!--        <canvas id="doughnutChart2"></canvas>-->
                    <!--    </div>-->
                    <!--</div>-->

                </div>
            </div>

        </div>
    </div>
    <script>
        var ctxD = document.getElementById("doughnutChart").getContext('2d');
        var ctxD2 = document.getElementById("doughnutChart2").getContext('2d');
        var myLineChart = new Chart(ctxD, {
            type: 'doughnut',
            data: {
                labels: ["total Reviews", "Total users", "New Users", "Total Comments", "Total Reports"],
                datasets: [{
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
                responsive: true
            }
        });
        var myLineChart = new Chart(ctxD2, {
            type: 'doughnut',
            data: {
                labels: ["total Reviews", "Total users", "New Users", "Total Comments", "Total Reports"],
                datasets: [{
                    data: [300, 50, 100, 40, 120],
                    backgroundColor: ["#F7464A", "#46BFBD", "#FDB45C", "#949FB1", "#4D5360"],
                    hoverBackgroundColor: ["#FF5A5E", "#5AD3D1", "#FFC870", "#A8B3C5", "#616774"]
                }]
            },
            options: {
                responsive: true
            }
        });
    </script>

    <script type="text/javascript"
        src="https://demo.dashboardpack.com/architectui-html-free/assets/scripts/main.js"></script>
</body>

</html>
