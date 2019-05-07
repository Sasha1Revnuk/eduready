<section class="contact_area section_gap">
    <div class="container">
        <div class="col-lg-12">
            @foreach($errors->all() as $message)
                <div class="alert alert-danger" role="alert">
                    {{$message}}
                </div>
            @endforeach
        </div>
        <div class="mb-5"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1270.1360523148574!2d30.50450757094727!3d50.45465749836033!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40d4ce5d8c515749%3A0xe1a4da5710d46c46!2z0JrQndCV0KMgNyDQmtC-0YDQv9GD0YE!5e0!3m2!1sru!2sua!4v1557256650758!5m2!1sru!2sua" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe></div>
        <div class="row">
            <div class="col-lg-3">
                <div class="contact_info">
                    <div class="info_item">
                        <i class="ti-home"></i>
                        <h6>@lang('lang.contacts.city'), @lang('lang.contacts.country')</h6>
                        <p>@lang('lang.contacts.street')</p>
                    </div>
                    <div class="info_item">
                        <i class="ti-headphone"></i>
                        <h6>@lang('lang.contacts.phone1')</h6>
                        <p>@lang('lang.contacts.phone2')</p>
                    </div>
                    <div class="info_item">
                        <i class="ti-email"></i>
                        <h6>@lang('lang.contacts.email')</h6>
                        <p>@lang('lang.contacts.emailText')</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <form  class="row contact_form" action="/contacts"  method="post"  id="contactForm">
                    {!! csrf_field() !!}
                    <div class="col-md-6">
                        <div class="form-group">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="name"
                                    name="name"
                                    placeholder="Ім'я"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Ім\'я'"
                                    required=""
                                    value="{{old('name')}}"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                    type="email"
                                    class="form-control"
                                    id="email"
                                    name="email"
                                    placeholder="Email"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Email'"
                                    required="{{old('email')}}"
                            />
                        </div>
                        <div class="form-group">
                            <input
                                    type="text"
                                    class="form-control"
                                    id="subject"
                                    name="subject"
                                    placeholder="Тема"
                                    onfocus="this.placeholder = ''"
                                    onblur="this.placeholder = 'Тема'"
                                    required="{{old('subject')}}"
                            />
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                  <textarea
                          class="form-control"
                          name="message"
                          id="message"
                          rows="1"
                          placeholder="Повідомлення"
                          onfocus="this.placeholder = ''"
                          onblur="this.placeholder = 'Повідомлення'"
                          required=""
                  >{{old('message')}}</textarea>
                        </div>
                    </div>
                    <div class="col-md-12 text-right">
                        <button type="submit" value="submit" class="btn primary-btn">
                            @lang('lang.contacts.sendButton')
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>