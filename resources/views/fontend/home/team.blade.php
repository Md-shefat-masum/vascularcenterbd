<section class="service sec-padd2">
    <div class="container">

        <div class="section-title">
            <h2>Our Team</h2>
        </div>

        <style>
                .our-team-section {
                  position: relative;
                  padding-top: 40px;
                  padding-bottom: 40px;
                }
                .our-team-section:before {
                  position: absolute;
                  top: -0;
                  left: 0;
                  content: " ";
                  background: url(img/service-section-bottom.png);
                  background-size: 100% 100px;
                  width: 100%;
                  height: 100px;
                  float: left;
                  z-index: 99;
                }
                .our-team {
                  padding: 0 0 40px;
                  background: #f9f9f9;
                  text-align: center;
                  overflow: hidden;
                  position: relative;
                  border-bottom: 5px solid #00325a;
                }
                .our-team:hover {
                  border-bottom: 5px solid #2f2f2f;
                }

                .our-team .pic {
                  display: inline-block;
                  width: 130px;
                  height: 130px;
                  margin-bottom: 50px;
                  z-index: 1;
                  position: relative;
                }
                .our-team .pic:before {
                  content: "";
                  width: 100%;
                  height: 100%;
                  border-radius: 50%;
                  background: #00325a;
                  position: absolute;
                  bottom: 135%;
                  right: 0;
                  left: 0;
                  opacity: 1;
                  transform: scale(3);
                  transition: all 0.3s linear 0s;
                }
                .our-team:hover .pic:before {
                  height: 100%;
                  background: #2f2f2f;
                }
                .our-team .pic:after {
                  content: "";
                  width: 100%;
                  height: 100%;
                  border-radius: 50%;
                  background: #ffffff00;
                  position: absolute;
                  top: 0;
                  left: 0;
                  z-index: 1;
                  transition: all 0.3s linear 0s;
                }
                .our-team:hover .pic:after {
                  background: #145889;
                }
                .our-team .pic img {
                  width: 100%;
                  height: 100%;
                  border-radius: 50%;
                  transform: scale(1);
                  transition: all 0.9s ease 0s;
                  box-shadow: 0 0 0 14px #f7f5ec;
                  transform: scale(0.7);
                  position: relative;
                  z-index: 2;
                }
                .our-team:hover .pic img {
                  box-shadow: 0 0 0 14px #f7f5ec;
                  transform: scale(0.7);
                }
                .our-team .team-content {
                  margin-bottom: 30px;
                }
                .our-team .title {
                  font-size: 22px;
                  font-weight: 700;
                  color: #4e5052;
                  letter-spacing: 1px;
                  text-transform: capitalize;
                  margin-bottom: 5px;
                }
                .our-team .post {
                  display: block;
                  font-size: 15px;
                  color: #4e5052;
                  text-transform: capitalize;
                }
                .our-team .social {
                  width: 100%;
                  padding-top: 10px;
                  margin: 0;
                  background: #2f2f2f;
                  position: absolute;
                  bottom: -100px;
                  left: 0;
                  transition: all 0.5s ease 0s;
                }
                .our-team:hover .social {
                  bottom: 0;
                }
                .our-team .social li {
                  display: inline-block;
                }
                .our-team .social li a {
                  display: block;
                  padding-top: 6px;
                  font-size: 15px;
                  color: #fff;
                  transition: all 0.3s ease 0s;
                }
                .our-team .social li a:hover {
                  color: #145889;
                  background: #f7f5ec;
                }
                @media only screen and (max-width: 990px) {
                  .our-team {
                    margin-bottom: 10px;
                  }
                }
            </style>

        <div class="row">
            @foreach($team as $item)
                <div class="col-md-4">
                    <div class="our-team h-100">
                        <div class="pic">
                            <img src="{{$item->image}}">
                        </div>
                        <div class="team-content">
                            <h3 class="title">{{$item->name}}</h3>
                            <br>
                            <span class="post">{{$item->description}}</span>
                            <br>
                            <br>
                            <table class="table" style="font-size: 12px">
                                @php
                                    $designations = json_decode($item->designation);
                                @endphp
                                @foreach ($designations as $key=>$designation)
                                    <tr>
                                        <td>{{  $key }}</td>
                                        <td style="width: 3px;">:</td>
                                        <td>{{ $designation }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                        <ul class="social">
                            @php
                                $s_links = json_decode($item->s_links);
                            @endphp
                            @foreach ($s_links as $key=>$link)
                                <li>
                                    <a href="{{$link}}" target="_blank" class="fa fa-{{$key}}"></a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>


