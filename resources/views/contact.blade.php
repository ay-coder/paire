@extends('fofContact')
@section('pageTitle','Contact Us')
@section('contactContent')
    <div class="footerdiv contactpage">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-12 footertext">
                    <h3>Get in touch</h3>
                    <h2>Vel illum qui dolorem eum fugiat</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.</p>
                </div>
                <div class="col-md-6 col-sm-12 footerorm">
                    {!! Form::open(array('url' => 'contacts','class' => '', 'id' => '')) !!}
                        <div class="row">
                            <div class="col-sm-12">
                                <input type="text" placeholder="Your Name" name="name"/>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" placeholder="Email Address" name="email"/>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <input type="text" placeholder="Contact Number" name="contact"/>
                            </div>
                            <div class="col-sm-12">
                                <input type="text" placeholder="Subject" name="subject"/>
                            </div>
                            <div class="col-sm-12">
                                <textarea placeholder="Description" name="description"></textarea>
                            </div>
                            <div class="col-sm-12">
                                <input type="submit" value="Send Message" />
                            </div>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
    @stop