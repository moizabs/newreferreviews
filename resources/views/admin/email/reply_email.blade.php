<!doctype html>

<html lang="en">

  <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta http-equiv="Content-Language" content="en">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <title> Refer Reviews - Admin</title>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="{{ asset("css/main.css") }}" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
            integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />

        <meta name="description" content="This is an example dashboard created using build-in elements and components.">
        <meta name="msapplication-tap-highlight" content="no">
        <link rel="icon" type="image/x-icon" href="{{ asset('images/logo.png') }}">
        <script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>

        <!-- <link href="https://demo.dashboardpack.com/architectui-html-free/main.css" rel="stylesheet"> -->
        <style>
            
        
        </style>

    </head>
    
    <body>
        <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
            @include('admin.partials.navbar')
            <div class="app-main">
                @include('admin.partials.sidebar')
                <div class="app-main__outer my-2">
                    <div class="content-wrapper " style="min-height: 688px;">
                        <div class="row">
                    <div class="col-md-7 offset-3 mt-4">
                        <div class="card-body">
                            <form method="post" action="" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"/>
                            </div>  
                            <div class="form-group">
                                <label><strong>Description :</strong></label>
                                <textarea class="ckeditor form-control" name="description"></textarea>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-sm">Save</button>
                            </div>
                        </form>
                        </div>
                    </div>
                 </div>
                    </div>
                    
                </div>
                
            </div>
        </div>
        
    </body>
    

<script type="text/javascript">
   
            ClassicEditor
            .create( document.querySelector( '.ckeditor' ) )
            .then( editor => {
                console.log( 'successful' );
              })
              .catch( error => {
                console.error( 'faile' );
            });
    
</script>


</html>