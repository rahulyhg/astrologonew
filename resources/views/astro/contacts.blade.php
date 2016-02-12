@extends('astro.template')
@section('title', trans('astro/contacts.title'))
@section('main')


@include('astro.panel', ['left' => trans('astro/contacts.title'), 'right' => ''])



<!-- Contact Info -->
<section class="contacts_block">
    <div class="row">
        <div class="col-lg-7 col-sm-7 padbot20" data-animated="fadeIn">
            <h2>{{ trans('astro/contacts.title') }}</h2>
            <!-- Contact Form -->
            <div class="contact_form top_form">
                <div id="note"></div>
                <div id="fields">

<!--
                        <input type="text" name="name2"  placeholder="{{ trans('astro/contacts.name') }}" required="required" />
                        <input type="text" name="email2"   placeholder="Email" required="required" />
                        <textarea name="message" placeholder="{{ trans('astro/contacts.message') }}" required="required" ></textarea>
                        <input class="contact_btn sent_btn" type="submit" value="{{ trans('astro/contacts.submit') }}" />
-->






                    @if(session()->has('ok'))
                        @include('partials/error', ['type' => 'success', 'message' => session('ok')])
                    @endif



                    @if(!session()->has('ok'))
                    {!! Form::open(['role' => 'form','id'=>'myform']) !!}

                    {!! Form::control('text', '', 'name', $errors, '','','',trans('astro/contacts.name')) !!}



                    {!! Form::control('email', '', 'email', $errors,  '','','','E-mail') !!}

                    {!! Form::control('textarea', '', 'message', $errors, '','','',trans('astro/contacts.message')) !!}

                        {!! app('captcha')->display() !!}
                    <br>
                    {!! Form::submit(trans('astro/contacts.submit')) !!}


                    {!! Form::close() !!}
                    @endif


                    <form method="post" action="<?=url('save_form')?>" id="myform2">
                        <input type="hidden" name="_token" value="<?=csrf_token()?>">
                        <div class="form-group">
                            <label for="nombre">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="nombre2">Name</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="descripcion">Description</label>
        <textarea type="text" name="message" id="message" rows="5" class="form-control">
        </textarea>
                        </div>
                        <input type="submit" value="Save" class="btn btn-success">
                    </form>







                </div>
            </div><!-- //Contact Form -->
        </div>
        <div class="col-lg-5 col-sm-5 padbot20" data-animated="fadeIn">
            <h2>{{ trans('astro/contacts.ContactUs') }}</h2>
            <!-- Contact Info -->
            <ul class="list4 contacts_info">
                <li><b class="glyphicon glyphicon-ok"></b><span>{{ HTML::mailto('me@gmail.com') }}</span></li>
                <li><b class="glyphicon glyphicon-ok"></b><span><a href="javascript:void(0);" alt="">{{config('social.twitter')}}</a></span></li>
                <li><b class="glyphicon glyphicon-ok"></b><span><a href="javascript:void(0);">{{config('social.facebook')}}</a></span></li>


            </ul><!-- //Contact Info -->
        </div>
    </div>
</section><!-- //Contacts Info -->

@include('vendor.lrgt.ajax_script', ['form' => '#myform2',
 'request'=>'App/Http/Requests/ContactsRequest'])



@stop