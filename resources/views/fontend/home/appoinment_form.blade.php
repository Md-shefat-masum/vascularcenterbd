<section class="consultations sec-padd" style="background-image: url({{ asset('contents/frontend') }}/images/background/5.jpg);">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <div class="contact-info">
                    <div class="section-title">
                        <h3>Take an appoinment</h3>
                    </div>
                    <div class="text">
                        <p>Please find below contact details <br>and contact us today!</p>
                    </div>
                    <div class="widget-content">
                        <ul class="list-info">
                            <li class="d-flex">
                                <div>
                                    <span class="fa fa-phone"></span>
                                    Phone:
                                </div>
                                <div>
                                    @foreach ($website_info['Mobile Number'] as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                </div>
                            </li>
                            <li class="d-flex">
                                <div>
                                    <span class="fa fa-envelope"></span>
                                    Email:
                                </div>
                                <div>
                                    @foreach ($website_info['Email Address'] as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                </div>
                            </li>
                            <li>
                                <div>
                                    <span class="fa fa-clock-o"></span>
                                </div>
                                <div>
                                    @foreach ($website_info['Working Hour'] as $item)
                                        {{ $item }} <br>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-8 col-sm-12 col-xs-12">
                <div class="section-title">
                    <h2>Request For Call Back</h2>
                </div>
                <div class="default-form-area">
                    <style>
                        .form_column{
                            margin-bottom: 20px;
                        }
                        .form_columns input,
                        .form_columns textarea,
                        .form_columns select
                        {
                            color: orange;
                            background-color: transparent;
                        }
                        @media (min-width: 992px){
                            .form_column{
                                column-count: 2;
                            }
                        }
                    </style>
                    <form id="contact_form" name="contact_form" class="default-form" action="{{ route('website_appointment_store') }}" enctype="multipart/form-data" method="post">
                        @csrf
                        <div class="row-10 clearfix">
                            <div class="col-xs-12 column form_column form_columns" >
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">name</label>
                                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Name *" >
                                    @error('name')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">date</label>
                                    <input type="date" name="date" class="form-control" value="{{ old('date') }}" placeholder="date *" required="">
                                    @error('date')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">time</label>
                                    <input type="time" name="time" class="form-control" value="{{ old('tiem') }}" placeholder="time *" required="">
                                    @error('time')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}" placeholder="phone *" required="">
                                    @error('phone')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">email</label>
                                    <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="email *">
                                    @error('email')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">topic</label>
                                    <select type="text" name="topic" class="form-control" value="{{ old('topic') }}"
                                        placeholder="chember *" required="">
                                        @foreach (App\Models\AppoinmentTopic::get() as $key=>$item)
                                            <option {{ $key==0?'selected':'' }} value="{{ $item->title }}">{{ $item->title }}</option>
                                        @endforeach
                                    </select>
                                    @error('topic')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">chember</label>
                                    <select type="text" name="chember" class="form-control" value="{{ old('chember') }}"
                                        placeholder="chember *" required="">
                                        @foreach (App\Models\Chember::get() as $key=>$item)
                                            <option {{ $key==0?'selected':'' }} value="{{ $item->location }}">{{ $item->location }}</option>
                                        @endforeach
                                    </select>
                                    @error('chember')
                                        <div style="color: red;padding: 5px 0px;">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="col-xs-12 column form_columns">
                                <div class="form-group">
                                    <label for="" class="text-capitalize mb-2" style="color: white">Related Image</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                                <div class="form-group style-2">
                                    <textarea name="message" class="form-control textarea required" placeholder="additional message...">{{ old('message') }}</textarea>
                                    <button class="thm-btn thm-color" type="submit">
                                        <i class="fa fa-paper-plane"></i>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
