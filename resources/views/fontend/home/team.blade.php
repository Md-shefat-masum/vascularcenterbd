<section class="default-section sec-padd">
    <div class="container">
        <div class="section-title center">
            <h2>Our Team</h2>
        </div>
        <ul class="one">

            @foreach ($team as $item)

                <li class="transition">
                    <div class="wrapper">
                        <img class="transition" style="width: 150px;" src="/{{$item->image}}">
                        <ul class="social">
                            <li>
                                {!!
                                    $item->description
                                !!}
                            </li>
                            @foreach (json_decode($item->s_links) as $key => $s_link)
                                @if ($key=='facebook')
                                    <li class="transition">
                                        <a href="{{ $s_link }}">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                @elseif ($key=='twitter')
                                    <li class="transition">
                                        <a href="{{ $s_link }}">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                @elseif ($key=='linkedin')
                                    <li class="transition">
                                        <a href="{{ $s_link }}">
                                            <i class="fa fa-linkedin"></i>
                                        </a>
                                    </li>
                                @elseif ($key=='instagram')
                                    <li class="transition">
                                        <a href="{{ $s_link }}">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                        <span class="transition">
                        <h3>Lucy Copycat <em>CEO & Founder</em></h3>
                        <img src="http://dooreight.com/codepen/people/more.svg"> </span>
                    </div>
                </li>

            @endforeach

        </ul>
    </div>
</section>


