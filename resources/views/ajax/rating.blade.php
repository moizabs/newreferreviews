@foreach ($rating as $review)
   
    <t>
        <div class="my-4">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <img src="https://image.ibb.co/cbCMvA/logo.png" />

                    </div>
                </div>
            </div>
            <div class="bio-info">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="bio-image">
                                    <!--<img src="https://image.ibb.co/f5Kehq/bio-image.jpg"-->
                                    <!--    alt="image" />-->
                                     @if ($review['get_customer']['image'] != null)
                                        <img src="{{ asset('storage/userProfile/' . $review['get_customer']['image']) }}"
                                        alt="image">
                                    @else
                                        <img src="{{ asset('images/profile-image.jpg') }}"
                                        alt="image" />
                                    @endif
                                    <span>{{ $review['get_customer']['first_name'] }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        
                        <div class="bio-content">
                            <div class="d-flex justify-content-between align-center">
                                <div class="star-rate d-flex flex-column">
                                    <div class="rate">
                                        @php
                                            $stars = number_format($review['rating']);
                                            
                                        @endphp

                                        @for ($i = 1; $i <= $stars; $i++)
                                            <i class="rating__ fas fa-star"></i>
                                        @endfor

                                        @for ($j = $stars + 1; $j <= 5; $j++)
                                            <i class="rating__ far fa-star"></i>
                                        @endfor
                                      


                                    </div>
                                    <span class="">Rating
                                        {{ $stars }}/5.0</span>

                                </div>
                                <span class="comment--time fl-text-regular-style">
                                    <span class="fl-link-comment">
                                        <span class="fl-comment-date-text">Review Published:
                                        </span>
                                        <span
                                            class="fl-comment-date">{{ \Carbon\Carbon::parse($review['created_at'])->diffForHumans() }}</span>
                                    </span>
                                </span>
                            </div>
                            <div>
                                <h5 class="my-4">{{ $review['title'] }}</h5>
                                <h6>{{ $review['review'] }}</h6>
                            </div>
                            @if (Session::get('user'))
                                <div class="">
                                    @if (Session::get('user')['type'] == 'BUSINESS')
                                        @if(Session::get('user')['id'] == $review['comp_id'])
                                            <div>
                                                 @if ($review['reply'] == null && $review['reply'] == '')
                                            <div class="reply reply-button fl-header-phone-contain">
                                                <a class="fl-header-phone" type="button"
                                                    data-toggle="reply-form"
                                                    data-target="comment-1-reply-form">Reply</a>
                                            </div>
                                                @endif
                                            <form
                                                action="{{ route('review.reply', $review['id']) }}"
                                                method="POST" class="reply-form"
                                                id="comment-1-reply-form">
                                                @csrf
                                                
                                                <textarea name="reply" placeholder="Reply to comment" rows="4"></textarea>
                                                <button class="fl-header-phone-small"type="submit">Submit</button>
                                            </form>
                                            </div>
                                        @endif
                                    @endif
                                </div>
                                @if (Session::get('user')['type'] == 'BUSINESS')
                                    @if (!$review['reply'] == null && !$review['reply'] == '')
                                    <div class="replies">
                                        <div>
                                            <div class="comment-heading my-3">
                                            
                                                <div class="comment-info">
                                                    <a href="#"
                                                    class="comment-author">{{ Session::get('user')['comp_name'] }}</a>
                                                            
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-body my-2">
                                            <p>
                                            {{ $review['reply'] }}
                                            </p>
                                            
                                            
                                            <!-- Reply form start -->
                                            
                                            <!-- Reply form end -->
                                        </div>
                                        
                                    </div>
                                    @endif   
                                    
                                @endif
                            @endif    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </t>
@endforeach
 <script>
        $('.reply-form').hide();
            $('.reply-button').click(function(){
               $(this).siblings('.reply-form').toggle();
            })
 </script>