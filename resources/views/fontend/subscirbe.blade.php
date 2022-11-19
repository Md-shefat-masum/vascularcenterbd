<section id='subscirbe_section_div'>
    <div class="container">
        <div class="row col-lg-11 m-auto">
            <div class="col-md-6 img_div">
                <img src="/assets/img/smartphone.svg" alt="ICT Village">
            </div>
            <div class="col-md-6 newsletter">
                <h5>আমাদের কোর্স ও বিভিন্ন অফার সম্পর্কে নিয়মিত আপডেট পেতে সাবস্ক্রাইব করুন</h5>
                <form action='/' method="POST" id="email_form">
                    <div class="form_div" id='email_div'>
                        <input type="email" class="form-control" placeholder="ইমেইল" name='email' required>
                    </div>
                    <div id='display_alert' class='text-center subscribe_success'></div>
                    <div class="form_div">
                        <button class="btn btn-danger" type="submit" id='subscribe'>সাবস্ক্রাইব</button>
                    </div>

                </form>
                <div class="other_social_link row">
                    <div>
                        @if (isset($website_info["Facebook Group Link Subscribe"]))
                            @if (str_starts_with($website_info["Facebook Group Link Subscribe"][0], 'http'))
                            <a href="{{$website_info['Facebook Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-facebook"></i> ফেসবুক গ্রুপ</a>
                            @else
                            <a href="http://{{$website_info['Facebook Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-facebook"></i> ফেসবুক গ্রুপ</a>
                            @endif
                        @endif
                    </div>
                    <div>
                        @if (isset($website_info["WhatsApp Group Link Subscribe"]))
                            @if (str_starts_with($website_info["WhatsApp Group Link Subscribe"][0], 'http'))
                            <a href="{{$website_info['WhatsApp Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-whatsapp"></i> হোয়াটসঅ্যাপ গ্রুপ</a>
                            @else
                            <a href="http://{{$website_info['WhatsApp Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-whatsapp"></i> হোয়াটসঅ্যাপ গ্রুপ</a>
                            @endif
                        @endif
                    </div>
                    <div>
                        @if (isset($website_info["Telegram Group Link Subscribe"]))
                            @if (str_starts_with($website_info["Telegram Group Link Subscribe"][0], 'http'))
                            <a href="{{$website_info['Telegram Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-telegram"></i> টেলিগ্রাম চ্যানেল</a>
                            @else
                            <a href="http://{{$website_info['Telegram Group Link Subscribe'][0]}}" target="_blank" rel="noopener noreferrer"><i
                                class="fab fa-telegram"></i> টেলিগ্রাম চ্যানেল</a>
                            @endif
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@push("cjs")
    <script>
        $(function(){
            $.ajaxSetup({
            headers:
            { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') }
            });
            $("#email_form").on("submit",function(e){
                e.preventDefault();
                var email=$('input[name="email"]').val();
                var re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                let form = new FormData($(this)[0]);
                if(re.test(email)){
                    $.ajax({
                    type:"POST",
                    url:"/subscribe-email",
                    data:form,
                    datatype: "json",
                    success:function(data){
                        console.log(data);
                        if(data==1)
                        {
                            $("#email_div").hide();
                            $('input[name="email"]').val("");
                            $("#display_alert").text("সাবস্ক্রাইব করার জন্য ধন্যবাদ");
                            $("#display_alert").show('slow');
                            setTimeout('$("#display_alert").hide("slow")',3000);
                            setTimeout('$("#email_div").show("slow")',3000);
                        }
                    }
                });
                }
                else{
                    $("#email_div").hide();
                    $('input[name="email"]').val("");
                    $("#display_alert").text("দয়া করে সঠিক জিমেইল দিন");
                    $("#display_alert").show('slow');
                    setTimeout('$("#display_alert").hide("slow")',3000);
                    setTimeout('$("#email_div").show("slow")',3000);
                }
            });

        });
    </script>
@endpush
