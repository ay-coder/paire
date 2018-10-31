<div class="footer-menu">
    <div class="container">
        <div class="row">
            <div class="col-md-5 col-sm-12">
                <ul>
                    <li>&copy; 2015 - {!! now()->year !!} FOF.com</li>
                    <li>The F Factor</li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-12">
                <div class="foologo">
                    <span>Powered By</span>
                    {!! Form::image('images/wvelabs_logo.png','logo', array('class'=>'','alt'=>'The F Factor'))  !!}
                    {{--<img src="images/wvelabs_logo.png" alt="wvelabs">--}}
                </div>
            </div>
            <div class="col-md-5 col-sm-12">
                <ul class="foorightmenu">
                    <li><a href="#" title="Terms of use">Terms of use</a></li>
                    <li><a href="#" title="Privacy Policy">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php //include 'include/footer-menu.php';?>
{!! Html::script('js/jquery.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
</div>
</body>
</html>