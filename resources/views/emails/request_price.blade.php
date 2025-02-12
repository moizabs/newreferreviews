<!--<html>-->
<!--  <head>-->
<!--  </head>-->
<!--  <body>-->
<!--    <div-->
<!--      style="-->
<!--            width: 80%;-->
<!--    margin: 0 auto;-->
<!--    border: 1px solid grey;-->
<!--    border-radius: 10px;-->
<!--    padding: 20px;-->
<!--        position: absolute;-->
<!--        top: 50%;-->
<!--        left: 50%;-->
<!--        transform: translate(-50%, -50%);-->
<!--      "-->
<!--    >-->
<!--      <div-->
<!--        style="-->
<!--          background-color: rgb(0 83 156);-->
<!--          text-align: center;-->
<!--          padding: 20px 0;-->
<!--        "-->
<!--      >-->
<!--        <img-->
<!--          src="https://referreviews.com/images/logo.png"-->
<!--          alt=""-->
<!--          style="width: 30%"-->
<!--        />-->
<!--      </div>-->
<!--      <div style="padding: 20px; color: rgb(0 83 156); text-align: center">-->
<!--        <h2 style="color: #00539c; font-family: Arial, Helvetica, sans-serif;  font-weight: 700;">-->
<!--          @if($details['vehicle'] !=  '') {{$details['name']}} requested a price for {{$details['vehicle']}} @else-->
<!--           {{$details['name']}} sent you a message @endif-->
<!--        </h2>-->
<!--      </div>-->
<!--      <div-->
<!--        style="-->
<!--          background-color: rgb(0 83 156);-->
<!--          text-align: center;-->
<!--          padding: 20px 0;-->
<!--        "-->
<!--      >-->
<!--        <div-->
<!--          style="-->
<!--            width: 25rem;-->
<!--            background-color: #fff;-->
<!--            color: rgb(0 83 156);-->
<!--            margin: 0 auto;-->
<!--            padding: 13px;-->
<!--          "-->
<!--        >-->
<!--            @if($details['vehicle'] !=  '')-->
<!--          <div>-->
<!--            <h3-->
<!--              class="card-title"-->
<!--              style="font-family: Arial, Helvetica, sans-serif"-->
<!--            >-->
<!--              {{$details['vehicle']}}-->
<!--            </h3>-->
<!--            <div style="display: flex; flex-wrap: wrap">-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >Trailor Type:-->
<!--                </span>-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >Vechile Condition:</span-->
<!--                >-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >{{$details['type']}}</span-->
<!--                >-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >{{$details['condition']}}</span-->
<!--                >-->
<!--              </div>-->
<!--            </div>-->
<!--            <br />-->
<!--            <h6-->
<!--              style="font-size: 16px; font-family: monospace;margin:0;"-->
<!--            >-->
<!--              Requested By: Name-->
<!--            </h6>-->
<!--            <br />-->
<!--            <div style="display: flex; flex-wrap: wrap">-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >Pickup Location</span-->
<!--                >-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >Delivery Location</span-->
<!--                >-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >{{$details['pickup']}}</span-->
<!--                >-->
<!--              </div>-->
<!--              <div style="width: 50%">-->
<!--                <span style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >{{$details['delivery']}}</span-->
<!--                >-->
<!--              </div>-->
<!--            </div>-->
<!--            <br />-->
<!--            @if($details['message'])-->
<!--            <h5-->
<!--              style="-->
<!--                text-align: center;-->
<!--                font-size: 16px;-->
<!--                font-family: sans-serif;-->
<!--              "-->
<!--            >-->
<!--              Message:-->
<!--            </h5>-->
<!--            <p-->
<!--              style="font-family: Arial, Helvetica, sans-serif"-->
<!--            >-->
<!--              {{$details['message']}}-->
<!--            </p>-->
<!--            @endif-->
<!--          </div>-->
<!--          @else-->
<!--          <div>-->
<!--              <h5-->
<!--              style="-->
<!--                text-align: center;-->
<!--                font-size: 16px;-->
<!--                font-family: sans-serif;-->
<!--              "-->
<!--            >-->
<!--              Message:-->
<!--            </h5>-->
<!--            <p-->
<!--              style="font-family: Arial, Helvetica, sans-serif"-->
<!--            >-->
<!--              {{$details['message']}}-->
<!--            </p>-->
<!--          </div>-->
<!--          @endif-->
<!--      </div>-->
<!--    </div>-->
<!--      <div-->
<!--        style="-->
<!--          background-color: white;-->
<!--          text-align: center;-->
<!--          padding: 20px 0;-->
<!--          color: rgb(0 0 0);-->
<!--        "-->
<!--      >-->
<!--        <div>-->
<!--          <div>-->
<!--            <div>-->
<!--              <div>-->
<!--                <span-->
<!--                  style="font-family: Arial, Helvetica, sans-serif"-->
<!--                  >© 2003-2022-->
<!--                  <a-->
<!--                    href="https://www.referreviews.com"-->
<!--                    style="-->
<!--                      font-family: Arial, Helvetica, sans-ser;-->
<!--                      color: #00539c;-->
<!--                    "-->
<!--                    >Referreviews.com</a-->
<!--                  >-->
<!--                  All rights reserved by Referreview.</span-->
<!--                >-->
<!--              </div>-->
<!--            </div>-->
<!--          </div>-->
<!--        </div>-->
<!--      </div>-->
<!--    </div>-->
<!--  </body>-->
<!--</html>-->



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css"
        integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>

<body style="margin: 0%; font-family: sans-serif; height:100vh ">
    <div class="container" style="width: 600px; margin: 10px auto; border: 1px solid;">
        <div class="header"
            style="width:100%; height:auto;background-color: rgb(0 83 156); display: flex; justify-content: center;align-items: center;">
            <div class="header-logo">
                <img style="width:75px;padding: 10px;" src="https://referreviews.com/images/logo.png" alt="">
            </div>
            <div>
                <h2 style="color: #fff;
                font-weight: 700;">Refer Reviews</h2>
            </div>
        </div>
        <div style="background: #d3ebf8;">
            <h6 style="    text-align: center;
            font-family: sans-serif;
            margin: 0;
            color: #000;
            font-size: 18px;
            font-weight: 800;
            border: 1px solid #aaa;
            width: 100%;
            background: #fdfdfdaa;
            "> 
            <strong style="color: #184f9c; 
            font-weight: 800"
            > 
            @if($details['vehicle'] !=  '') 
            {{$details['name']}}
            </strong> 
            Request a quote for 
            {{$details['vehicle']}}
            @else
            {{$details['name']}} 
            sent you a message 
            @endif
            </h6>
            <div style="    display: flex;
            justify-content: space-between;
            padding: 0px 30px; gap: 70px;">
                <div style="    width: 50%;
                text-align: center;">
                <h6 style="padding: 5px;
                background: #184f9c;
                color: #fff;
                font-size: 14px;
                font-weight: 800;">Pickup</h6>
                <h6 style="padding: 5px;
                margin-top: -30px;
                color: #000;
                font-size: 14px;
                font-weight: 800;">{{isset($details['pickup']) ? $details['pickup'] : ''}}</h6>
            </div>
           
            <div style="    width: 50%;
            text-align: center;">
                <div>
                    <h6 style="padding: 5px;
                    background: #184f9c;
                    color: #fff;
                    font-size: 14px;
                    font-weight: 800;">Delivery</h6>
                    <h6 style="padding: 5px;
                    margin-top: -30px;
                    color: #000;
                    font-size: 14px;
                    font-weight: 800;">{{isset($details['delivery']) ? $details['delivery'] : ''}}</h6>
                </div>
            </div>
           </div>
            <div style="display: flex;
            justify-content: space-around;padding: 0px 30px; gap: 70px; ">
                <div style="    width: 50%;
                text-align: center;">
                <h6 style="padding: 5px;
                background: #184f9c;
                color: #fff;
                font-size: 14px;
                font-weight: 800;">Vehicle Condition</h6>
                <h6 style="padding: 5px;
                margin-top: -30px;
                color: #000;
                font-size: 14px;
                font-weight: 800;">{{isset($details['condition']) ? $details['condition'] : ''}}</h6>
            </div>
           
            <div style="    width: 50%;
            text-align: center;">
                <div>
                    <h6 style="padding: 5px;
                    background: #184f9c;
                    color: #fff;
                    font-size: 14px;
                    font-weight: 800;">Trailor Type</h6>
                    <h6 style="padding: 5px;
                    margin-top: -30px;
                    color: #000;
                    font-size: 14px;
                    font-weight: 800;">{{isset($details['type']) ? $details['type'] : ''}}</h6>
                </div>
            </div>
           </div>
    </div>
        <div style="
        margin: 0 auto;
        align-items: center;
        display: flex;
        flex-direction: column;
        background: #fff;    border-top: 1px solid;   height:200px;    background: #d3ebf8;">
            <!-- <h5>Name</h5> -->
        @if($details['message'])
          <div style="    border: 1px solid;
          width: 100%;
          text-align: center;
          background: #eef6fa;">Message</div>
            <div style="text-align: center;     margin: 20px;"><span style="    color: #000;
                font-size: 14px;
                font-weight: 700;">{{ $details['message']}}</span></div>
        @endif
            <button style="border: none;
            padding: 8px 20px;
            background: rgb(0 83 156);
            color: #fff;
            border-radius: 4px; margin-top: 50px;">Reply</button>
        </div>
    </div>
</body>

</html>