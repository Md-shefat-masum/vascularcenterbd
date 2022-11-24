<section class="rev_slider_wrapper">
    <div id="slider1" class="rev_slider" data-version="5.0">
        <ul>
            @foreach ($data as $item)
                <li data-transition="fade">
                    <img src="/{{ $item->image }}" alt="" width="1920" height="683" data-bgposition="top center"
                        data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">

                    <div class="banner_overlay">
                        <div class="tp-caption  tp-resizeme" data-x="left" data-hoffset="15" data-y="top"
                            data-voffset="240" data-transform_idle="o:1;"
                            data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" data-splitin="none"
                            data-splitout="none" data-responsive_offset="on" data-start="700">
                            <div class="slide-content-box">
                                <h1 style="font-family: 'bangla', 'Hind', sans-serif;padding-left:10px;">{!! $item->banner_title !!}</h1>
                                <p style="font-family: 'bangla', 'Hind', sans-serif;padding-left:10px;font-size:25px;">
                                    {!! $item->banner_sub_title !!}
                                </p>
                            </div>
                        </div>
                        <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="15" data-y="top"
                            data-voffset="470" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="2300">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn" href="chember.html#appoinment_form">get appoinment</a>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="tp-caption tp-resizeme" data-x="left" data-hoffset="225" data-y="top"
                            data-voffset="470" data-transform_idle="o:1;"
                            data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;"
                            data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"
                            data-splitin="none" data-splitout="none" data-responsive_offset="on" data-start="2600">
                            <div class="slide-content-box">
                                <div class="button">
                                    <a class="thm-btn-tr" href="#about_us">About us</a>
                                </div>
                            </div>
                        </div> -->
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
